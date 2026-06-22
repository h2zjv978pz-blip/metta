<?php

namespace App\Repositories;

use App\Helpers\Utils;
use App\Models\StorageItem;
use App\Traits\ImageHandler;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogRepository
{
    use ImageHandler;

    public function findBlog($id)
    {
        return StorageItem::ofType('blogs')
            ->whereId($id)
            ->first();
    }

    public function findBlogBySlug($slug)
    {
        return $this->getBlogs()->first(fn($b) => Str::slug($b->props['title'] ?? '') === $slug);
    }

    public function getBlogs($request = null)
    {
        $blogs = StorageItem::ofType('blogs');

        return $blogs->orderByDesc('id')
            ->get();
    }

    public function getOtherBlogs($id, $limit = 5)
    {
        return StorageItem::ofType('blogs')
            ->where('id', '<>', $id)
            ->orderByDesc('id')
            ->limit($limit)
            ->get();
    }

    public function storeBlog($request)
    {
        $blog = $this->createStorageItem('blogs');

        $feature_image = $this->saveImage($request, 'feature_image', "blog_fi");

        if (!empty($request->file('gallery_images'))) {
            $gallery_images = [];

            foreach ($request->gallery_images_sort_orders as $sl) {
                $gallery_images[] = $this->saveImage($request, null, 'blog_gi', $request->file('gallery_images')[$sl]);
            }
        }

        if (!empty($request->file('video'))) {
            $video = $this->saveVideo($request, 'video', 'blog_vid');
        }

        if (!empty($request->file('pdf_file'))) {
            $pdf_file = $this->saveDoc($request, 'pdf_file', 'blog_pdf');
        }

        $blog->setProps([
            'title'             => $request->title,
            'title_bn'          => $request->title_bn ?? null,
            'author'            => $request->author,
            'author_bn'         => $request->author_bn ?? null,
            'body'              => $request->body,
            'body_bn'           => $request->body_bn ?? null,
            'word_count'        => Utils::getWordCount($request->body),
            'read_time'         => Utils::getReadingTime($request->body),
            'feature_image'     => $feature_image,
            'gallery_images'    => $gallery_images ?? null,
            'video'             => $video ?? null,
            'pdf_file'          => $pdf_file ?? null,
        ]);
        $blog->save();
    }

    public function updateBlog($id, $request)
    {
        $blog = $this->findBlog($id);

        if (!empty($request->file('feature_image'))) {
            $feature_image = $this->saveImage($request, 'feature_image', "blog_fi");
            $this->deleteImageIfExists($blog->prop('feature_image'));
        }

        if ($blog->getJson('props', 'gallery_images')) {
            $curr_gallery_images = $request->curr_gallery_images ?? [];
            $discarded_gallery_images = array_diff($blog->getJson('props', 'gallery_images'), $curr_gallery_images);

            foreach ($discarded_gallery_images as $discarded_gallery_image) {
                $this->deleteImageIfExists($discarded_gallery_image);
            }
        }

        if (!empty($request->file('new_gallery_images'))) {
            $new_gallery_images = $this->saveBatchImages($request, 'new_gallery_images', 'blog_gi');
        }

        $gallery_images = array_merge($curr_gallery_images ?? [], $new_gallery_images ?? []);

        if (!empty($request->file('video'))) {
            $this->deleteVideoIfExists($blog->getJson('props', 'video'));
            $video = $this->saveVideo($request, 'video', 'blog_vid');
        }

        if (!empty($request->file('pdf_file'))) {
            $this->deleteDocIfExists($blog->prop('pdf_file'));
            $pdf_file = $this->saveDoc($request, 'pdf_file', "blog_pdf");
        }

        $blog->setProps([
            'title'             => $request->title,
            'title_bn'          => $request->title_bn ?? null,
            'author'            => $request->author,
            'author_bn'         => $request->author_bn ?? null,
            'body'              => $request->body,
            'body_bn'           => $request->body_bn ?? null,
            'word_count'        => Utils::getWordCount($request->body),
            'read_time'         => Utils::getReadingTime($request->body),
            'feature_image'     => $feature_image ?? $blog->prop('feature_image'),
            'gallery_images'    => !empty($gallery_images) ? $gallery_images : null,
            'video'             => $video ?? $blog->prop('video', null),
            'pdf_file'          => $pdf_file ?? $blog->prop('pdf_file', null),
        ]);
        $blog->save();
    }

    public function deleteBlog($id)
    {
        $blog = $this->findBlog($id);

        if (!empty($blog)) {
            $this->deleteImageIfExists($blog->prop('feature_image'));

            if (!empty($blog->getJson('props', 'gallery_images'))) {
                foreach ($blog->getJson('props', 'gallery_images') as $gallery_image) {
                    $this->deleteImageIfExists($gallery_image);
                }
            }

            if ($blog->prop('pdf_file')) {
                $this->deleteDocIfExists($blog->prop('pdf_file'));
            }

            $blog->delete();
        }
    }

    private function createStorageItem($type)
    {
        $si = new StorageItem();
        $si->type = $type;

        return $si;
    }
}

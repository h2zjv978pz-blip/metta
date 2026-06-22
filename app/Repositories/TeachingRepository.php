<?php

namespace App\Repositories;

use App\Helpers\Utils;
use App\Models\StorageItem;
use App\Traits\ImageHandler;

class TeachingRepository
{
    use ImageHandler;

    public function findTeaching($id)
    {
        return StorageItem::ofType('teachings')
            ->whereId($id)
            ->first();
    }

    public function findTeachingBySlug($slug)
    {
        return $this->getTeachings()->first(fn($t) => \Illuminate\Support\Str::slug($t->props['title'] ?? '') === $slug);
    }

    public function getTeachings($request = null)
    {
        $teachings = StorageItem::ofType('teachings');

        return $teachings->orderByDesc('id')
            ->get();
    }

    public function storeTeaching($request)
    {
        $teaching = $this->createStorageItem('teachings');

        $feature_image = $this->saveImage($request, 'feature_image', "teaching_fi");

        if (!empty($request->file('gallery_images'))) {
            $gallery_images = [];

            foreach ($request->gallery_images_sort_orders as $sl) {
                $gallery_images[] = $this->saveImage($request, null, 'teaching_gi', $request->file('gallery_images')[$sl]);
            }
        }

        if (!empty($request->file('video'))) {
            $video = $this->saveVideo($request, 'video', 'teaching_vid');
        }

        $teaching->setProps([
            'title'             => $request->title,
            'title_bn'          => $request->title_bn ?? null,
            'author'            => $request->author,
            'author_bn'         => $request->author_bn ?? null,
            'body'              => $request->body,
            'body_bn'           => $request->body_bn ?? null,
            'word_count'        => Utils::getWordCount($request->body),
            'word_count_bn'     => Utils::getWordCount($request->body_bn ?? ''),
            'read_time'         => Utils::getReadingTime($request->body),
            'feature_image'     => $feature_image,
            'gallery_images'    => $gallery_images ?? null,
            'video'             => $video ?? null,
        ]);
        $teaching->save();
    }

    public function updateTeaching($id, $request)
    {
        $teaching = $this->findTeaching($id);

        if (!empty($request->file('feature_image'))) {
            $feature_image = $this->saveImage($request, 'feature_image', "teaching_fi");
            $this->deleteImageIfExists($teaching->prop('feature_image'));
        }

        if ($teaching->prop('gallery_images')) {
            $curr_gallery_images = $request->curr_gallery_images ?? [];
            $discarded_gallery_images = array_diff($teaching->prop('gallery_images'), $curr_gallery_images);

            foreach ($discarded_gallery_images as $discarded_gallery_image) {
                $this->deleteImageIfExists($discarded_gallery_image);
            }
        }

        if (!empty($request->file('new_gallery_images'))) {
            $new_gallery_images = $this->saveBatchImages($request, 'new_gallery_images', 'b_site_gi');
        }

        $gallery_images = array_merge($curr_gallery_images ?? [], $new_gallery_images ?? []);

        if (!empty($request->file('video'))) {
            $this->deleteVideoIfExists($teaching->getJson('props', 'video'));
            $video = $this->saveVideo($request, 'video', 'teaching_vid');
        }

        $teaching->setProps([
            'title'             => $request->title,
            'title_bn'          => $request->title_bn ?? null,
            'author'            => $request->author,
            'author_bn'         => $request->author_bn ?? null,
            'body'              => $request->body,
            'body_bn'           => $request->body_bn ?? null,
            'word_count'        => Utils::getWordCount($request->body),
            'word_count_bn'     => Utils::getWordCount($request->body_bn ?? ''),
            'read_time'         => Utils::getReadingTime($request->body),
            'feature_image'     => $feature_image ?? $teaching->prop('feature_image'),
            'gallery_images'    => $gallery_images,
            'video'             => $video ?? $teaching->prop('video', null),
        ]);
        $teaching->save();
    }

    public function deleteTeaching($id)
    {
        $teaching = $this->findTeaching($id);

        if (!empty($teaching)) {
            $this->deleteImageIfExists($teaching->prop('feature_image'));

            if (!empty($teaching->prop('gallery_images'))) {
                foreach ($teaching->prop('gallery_images') as $gallery_image) {
                    $this->deleteImageIfExists($gallery_image);
                }
            }

            $teaching->delete();
        }
    }

    private function createStorageItem($type)
    {
        $si = new StorageItem();
        $si->type = $type;

        return $si;
    }
}

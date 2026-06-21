<?php

namespace App\Repositories;

use App\Models\StorageItem;
use App\Traits\ImageHandler;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryImageRepository
{
    use ImageHandler;

    public static array $categories = ["General", "Kids Gallery"];

    public function findGalleryImage($id)
    {
        return StorageItem::ofType('gallery_images')
            ->whereId($id)
            ->first();
    }

    public function getGalleryImages($request = null)
    {
        $gallery_images = StorageItem::ofType('gallery_images');

        if (!empty($request->category)) {
            $gallery_images->whereRaw("props->'$.category' = ?", [$request->category]);
        }

        return $gallery_images->orderByDesc('id')
            ->get();
    }

    public function storeGalleryImage($request)
    {
        $gallery_image = $this->createStorageItem('gallery_images');

        $image = $this->saveImage($request, 'feature_image', "gi_fi");

        if (!empty($request->file('gallery_images'))) {
            $gallery_images = [];

            foreach ($request->gallery_images_sort_orders as $sl) {
                $gallery_images[] = $this->saveImage($request, null, 'gi_gi', $request->file('gallery_images')[$sl]);
            }
        }

        $gallery_image->setProps([
            'title'             => $request->title,
            'feature_image'     => $image,
            'category'          => $request->category ?? null,
            'gallery_images'    => $gallery_images ?? null,
        ]);

        $gallery_image->save();
    }

    public function updateGalleryImage($id, $request)
    {
        $gallery_image = $this->findGalleryImage($id);

        if (!empty($request->file('feature_image'))) {
            $feature_image = $this->saveImage($request, 'feature_image', "gi_fi");
            $this->deleteImageIfExists($gallery_image->prop('feature_image'));
        }

        if ($gallery_image->prop('gallery_images')) {
            $curr_gallery_images = $request->curr_gallery_images ?? [];
            $discarded_gallery_images = array_diff($gallery_image->prop('gallery_images'), $curr_gallery_images);

            foreach ($discarded_gallery_images as $discarded_gallery_image) {
                $this->deleteImageIfExists($discarded_gallery_image);
            }
        }

        if (!empty($request->file('new_gallery_images'))) {
            $new_gallery_images = $this->saveBatchImages($request, 'new_gallery_images', 'gi_gi');
        }

        $gallery_images = array_merge($curr_gallery_images ?? [], $new_gallery_images ?? []);

        $gallery_image->setProps([
            'title'             => $request->title,
            'feature_image'     => $feature_image ?? $gallery_image->prop('feature_image'),
            'category'          => $request->category ?? $gallery_image->prop('category', null),
            'gallery_images'    => $gallery_images,


        ]);

        $gallery_image->save();
    }

    public function deleteGalleryImage($id)
    {
        $gallery_image = $this->findGalleryImage($id);

        if (!empty($gallery_image)) {
            $this->deleteImageIfExists($gallery_image->prop('feature_image'));

            if (!empty($gallery_image->getJson('props', 'gallery_images'))) {
                foreach ($gallery_image->getJson('props', 'gallery_images') as $gi) {
                    $this->deleteImageIfExists($gi);
                }
            }

            $gallery_image->delete();
        }
    }

    private function createStorageItem($type)
    {
        $si = new StorageItem();
        $si->type = $type;

        return $si;
    }
}
<?php

namespace App\Repositories;

use App\Helpers\Utils;
use App\Models\StorageItem;
use App\Traits\ImageHandler;

class TeachingsSlideRepository
{
    use ImageHandler;

    public function findTeachingsSlide($id)
    {
        return StorageItem::ofType('teachings_slides')
            ->whereId($id)
            ->first();
    }

    public function getTeachingsSlides($request = null)
    {
        $teachings_slides = StorageItem::ofType('teachings_slides');

        return $teachings_slides->orderByDesc('id')
            ->get();
    }

    public function storeTeachingsSlide($request)
    {
        $teachings_slide = $this->createStorageItem('teachings_slides');

        $image = $this->saveImage($request, 'image', "ts_img");

        $teachings_slide->setProps([
            'caption'       => $request->caption,
            'caption_bn'    => $request->caption_bn ?? null,
            'image'         => $image,
        ]);

        $teachings_slide->save();
    }

    public function updateTeachingsSlide($id, $request)
    {
        $teachings_slide = $this->findTeachingsSlide($id);

        if (!empty($request->file('image'))) {
            $image = $this->saveImage($request, 'image', "ts_img");
            $this->deleteImageIfExists($teachings_slide->prop('image'));
        }

        $teachings_slide->setProps([
            'caption'           => $request->caption,
            'caption_bn'        => $request->caption_bn ?? null,
            'image'             => $image ?? $teachings_slide->prop('image'),
        ]);
        $teachings_slide->save();
    }

    public function deleteTeachingsSlide($id)
    {
        $teachings_slide = $this->findTeachingsSlide($id);

        if (!empty($teachings_slide)) {
            $this->deleteImageIfExists($teachings_slide->prop('image'));

            $teachings_slide->delete();
        }
    }

    private function createStorageItem($type)
    {
        $si = new StorageItem();
        $si->type = $type;

        return $si;
    }
}
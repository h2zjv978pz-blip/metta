<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait ImageHandler
{
    private function saveImage($request, $fn, $prefix = '', $file = null)
    {
        $file           = $file ?? $request->file($fn);
        $imageDir       = storage_path('app/public/img/');
        $imageName      = (!empty($prefix) ? $prefix . '_' : '') . Str::random(30) . '.' . $file->getClientOriginalExtension();
        $fsPath         = $imageDir . $imageName;
        $image          = Image::make($file->getRealPath());

        File::ensureDirectoryExists($imageDir);
        $image->save($fsPath, 70);

        if (filesize($fsPath) > filesize($file->getRealPath())) {
            unlink($fsPath);
            File::put($fsPath, file_get_contents($file));
        }

        return $imageName;
    }

    private function saveVideo($request, $fn, $prefix = '', $file = null)
    {
        $file           = $file ?? $request->file($fn);
        $videoDir       = storage_path('app/public/video/');
        $videoName      = (!empty($prefix) ? $prefix . '_' : '') . Str::random(30) . '.' . $file->getClientOriginalExtension();

        File::ensureDirectoryExists($videoDir);
        File::put($videoDir . $videoName, file_get_contents($file));

        return $videoName;
    }

    private function saveBatchImages($request, $fn, $prefix = '')
    {
        $imageNames = [];

        foreach ($request->file($fn) as $i => $img) {
            $imageNames[] = $this->saveImage($request, null, $prefix, file: $img);
        }

        return $imageNames;
    }

    private function saveAudio($request, $fn, $prefix = '', $file = null)
    {
        $file = $file ?? $request->file($fn);

        $audioDir = storage_path('app/public/audio/');
        $audioName = (!empty($prefix) ? $prefix . '_' : '') . Str::random(30) . '.' . $file->getClientOriginalExtension();

        File::ensureDirectoryExists($audioDir);
        File::put($audioDir . $audioName, file_get_contents($file));

        return $audioName;
    }

    private function deleteImageIfExists($fn)
    {
        $imageDir = storage_path('app/public/img/');

        if (!empty($fn) && File::exists($imageDir . $fn)) {
            File::delete($imageDir . $fn);
        }
    }

    private function deleteVideoIfExists($fn)
    {
        $videoDir = storage_path('app/public/video/');

        if (!empty($fn) && File::exists($videoDir . $fn)) {
            File::delete($videoDir . $fn);
        }
    }

    private function deleteAudioIfExists($fn)
    {
        $audioDir = storage_path('app/public/audio/');

        if (!empty($fn) && File::exists($audioDir . $fn)) {
            File::delete($audioDir . $fn);
        }
    }

    private function saveDoc($request, $fn, $prefix = '', $file = null)
    {
        $file           = $file ?? $request->file($fn);
        $docDir         = storage_path('app/public/doc/');
        $docName        = (!empty($prefix) ? $prefix . '_' : '') . Str::random(30) . '.' . $file->getClientOriginalExtension();

        File::ensureDirectoryExists($docDir);
        File::put($docDir . $docName, file_get_contents($file));

        return $docName;
    }

    private function deleteDocIfExists($fn)
    {
        $docDir = storage_path('app/public/doc/');

        if (!empty($fn) && File::exists($docDir . $fn)) {
            File::delete($docDir . $fn);
        }
    }
}

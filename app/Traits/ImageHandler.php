<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait ImageHandler
{
    private function saveImage($request, $fn, $prefix = '', $file = null)
    {
        $file           = $file ?? $request->file($fn);
        $imageDir       = 'app/public/img/';
        $imageName      = (!empty($prefix) ? $prefix . '_' : '') . Str::random(30) . '.' . $file->getClientOriginalExtension();
        $fsPath         = $imageDir . $imageName;
        $image          = Image::make($file->getRealPath());

        $image->save(storage_path($fsPath), 70);

        if (filesize(storage_path($fsPath)) > filesize($file->getRealPath())) {
            $fsPathNew = Str::replace('app/', '', $fsPath);
            unlink(storage_path($fsPath));
            Storage::disk('local')->put($fsPathNew, file_get_contents($file));
        }

        return $imageName;
    }

    private function saveVideo($request, $fn, $prefix = '', $file = null)
    {
        $file           = $file ?? $request->file($fn);
        $videoDir       = 'public/video/';
        $videoName      = (!empty($prefix) ? $prefix . '_' : '') . Str::random(30) . '.' . $file->getClientOriginalExtension();
        $fsPath         = $videoDir . $videoName;

        Storage::disk('local')->put($fsPath, file_get_contents($file));

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

        $audioDir = 'public/audio/';
        $audioName = (!empty($prefix) ? $prefix . '_' : '') . Str::random(30) . '.' . $file->getClientOriginalExtension();

        $fsPath = $audioDir . $audioName;

        Storage::disk('local')->put($fsPath, file_get_contents($file));

        return $audioName;
    }

    private function deleteImageIfExists($fn)
    {
        $imageDir = 'public/img/';

        if (!empty($fn) && File::exists(storage_path('app/' . $imageDir . $fn))) {
            File::delete(storage_path('app/' . $imageDir . $fn));
        }
    }

    private function deleteVideoIfExists($fn)
    {
        $fileDir = 'public/video/';

        if (!empty($fn) && File::exists(storage_path('app/' . $fileDir . $fn))) {
            File::delete(storage_path('app/' . $fileDir . $fn));
        }
    }

    private function deleteAudioIfExists($fn)
    {
        $fileDir = 'public/audio/';

        if (!empty($fn) && File::exists(storage_path('app/' . $fileDir . $fn))) {
            File::delete(storage_path('app/' . $fileDir . $fn));
        }
    }

    private function saveDoc($request, $fn, $prefix = '', $file = null)
    {
        $file           = $file ?? $request->file($fn);
        $docDir         = 'public/doc/';
        $docName        = (!empty($prefix) ? $prefix . '_' : '') . Str::random(30) . '.' . $file->getClientOriginalExtension();
        $fsPath         = $docDir . $docName;

        Storage::disk('local')->put($fsPath, file_get_contents($file));

        return $docName;
    }

    private function deleteDocIfExists($fn)
    {
        $docDir = 'app/public/doc/';

        if (!empty($fn) && File::exists(storage_path($docDir . $fn))) {
            File::delete(storage_path($docDir . $fn));
        }
    }
}

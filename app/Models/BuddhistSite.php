<?php

namespace App\Models;

use App\Traits\JsonPropManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BuddhistSite extends Model
{
    use HasFactory, JsonPropManager;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getFeatureImageUrl() {
        return !empty($this->feature_image) ? $this->getImageLink($this->feature_image) : '';
    }

    public function getImageLink($file)
    {
        return asset('storage/img/' . $file);
    }

    public function getVideoUrl($key = 'video') {
        $video_fn = $this->prop($key);

        return $video_fn ? (Str::startsWith($video_fn, 'http') ? $video_fn : asset("storage/video/{$video_fn}")) : '';
    }
}

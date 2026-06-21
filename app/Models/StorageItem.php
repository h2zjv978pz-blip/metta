<?php

namespace App\Models;

use App\Traits\JsonPropManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class StorageItem extends Model
{
    use JsonPropManager, SoftDeletes;

    protected $fillable = ['type'];

    protected $casts = [
        'props'         => 'array',
//        'created_at'    => 'timestamp',
//        'updated_at'    => 'timestamp',
//        'deleted_at'    => 'timestamp',
    ];

    public function scopeOfType(Builder $query, $type)
    {
        return $query->where('type', $type);
    }

    public function parent() {
        return $this->belongsTo(StorageItem::class, 'parent_id', 'id');
    }

    public function children() {
        return $this->hasMany(StorageItem::class, 'parent_id', 'id');
    }

    public function getFeatureImageUrl() {
        return $this->getImageUrl('feature_image');
    }

    public function getImageUrl($key) {
        return $this->prop($key) ? asset('storage/img/' . $this->prop($key)) : '';
    }

    public function getImageLink($file)
    {
        return asset('storage/img/' . $file);
    }

    public function getVideoUrl($key = 'video') {
        $video_fn = $this->prop($key);

        return $video_fn ? (Str::startsWith($video_fn, 'http') ? $video_fn : asset("storage/video/{$video_fn}")) : '';
    }

    public function getSlug($key = 'name') {
        return Str::slug($this->prop($key));
    }

    public function is_it($fact) {
        switch ($fact) {
            case 'video_project':
                return strtolower($this->parent->prop('name', '')) == 'video';
        }

        return false;
    }
}

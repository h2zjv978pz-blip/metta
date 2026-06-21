<?php

namespace App\Repositories;

use App\Models\StorageItem;
use App\Traits\ImageHandler;
use Illuminate\Support\Str;

class VideoRepository
{
    use ImageHandler;

    public static array $categories = ['Lecture', 'Meditation', 'Kids Gallery', 'Documentary', 'Travel'];

    public function findVideo($id)
    {
        return StorageItem::ofType('videos')
            ->whereId($id)
            ->first();
    }

    public function getVideos($request = null)
    {
        $videos = StorageItem::ofType('videos');

        if (!empty($request->category)) {
            $videos->whereRaw("props->'$.category' = ?", [$request->category]);
        }

        return $videos->orderByDesc('id')
            ->get();
    }

    /**
     * Extract YouTube video ID from URL.
     *
     * @param string $url
     * @return string|null
     */
    public function extractYouTubeId($url)
    {
        $pattern =
            '%^# Match any YouTube URL
            (?:https?://)?
            (?:www\.)?
            (?: 
                youtu\.be/
                | youtube\.com
                (?:
                    /embed/
                    | /v/
                    | .*v=
                )
            )
            ([\w-]{11}) %x';

        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    public function storeVideo($request)
    {
        $video = $this->createStorageItem('videos');

        if ($request->hasFile('feature_image')) {
            $feature_image = $this->saveImage($request, 'feature_image', "video_fi");
        }

        // Determine video type
        if ($request->input('video_type') === 'youtube') {
            $youtube_url = trim($request->input('youtube_url'));
            $video_id = $this->extractYouTubeId($youtube_url);

            if (!$video_id) {
                throw new \Exception('Invalid YouTube URL.');
            }

            $video_url = $video_id;
        } elseif ($request->file('video_file')) {
            $video_file = $this->saveVideo($request, 'video_file', 'video_file');
            $video_url = $video_file;
        } else {
            // Handle error: No video provided
            throw new \Exception('No video provided.');
        }

        $video->setProps([
            'title'         => $request->title,
            'title_bn'      => $request->title_bn ?? null,
            'category'      => $request->category,
            'feature_image' => $feature_image ?? null,
            'video'         => $video_url,
        ]);

        $video->save();
    }

    public function updateVideo($id, $request)
    {
        $video = $this->findVideo($id);

        if (!$video) {
            throw new \Exception('Video not found.');
        }

        if (!empty($request->file('feature_image'))) {
            $feature_image = $this->saveImage($request, 'feature_image', "video_fi");
            $this->deleteImageIfExists($video->prop('feature_image'));
        } else {
            $feature_image = $video->prop('feature_image');
        }

        // Determine video type
        if ($request->input('video_type') === 'youtube') {
            $youtube_url = trim($request->input('youtube_url'));
            $video_id = $this->extractYouTubeId($youtube_url);

            if (!$video_id) {
                throw new \Exception('Invalid YouTube URL.');
            }

            $video_url = $video_id;

            // If previous video was uploaded, delete it
            if ($this->isVideoUploaded($video->prop('video'))) {
                $this->deleteVideoIfExists($video->prop('video'));
            }
        } elseif ($request->file('video_file')) {
            // If previous video was uploaded, delete it
            if ($this->isVideoUploaded($video->prop('video'))) {
                $this->deleteVideoIfExists($video->prop('video'));
            }

            $video_file = $this->saveVideo($request, 'video_file', 'video_file');
            $video_url = $video_file;
        } else {
            // Keep existing video URL
            $video_url = $video->prop('video');
        }

        $video->setProps([
            'title'         => $request->title,
            'title_bn'      => $request->title_bn ?? null,
            'category'      => $request->category,
            'feature_image' => $feature_image ?? null,
            'video'         => $video_url,
        ]);

        $video->save();
    }

    public function deleteVideo($id)
    {
        $video = $this->findVideo($id);

        if (!empty($video)) {
            $this->deleteImageIfExists($video->prop('feature_image'));

            if ($this->isVideoUploaded($video->prop('video'))) {
                $this->deleteVideoIfExists($video->prop('video'));
            }

            $video->delete();
        }
    }

    /**
     * Check if the video is uploaded (server-hosted) or YouTube.
     *
     * @param string $video
     * @return bool
     */
    private function isVideoUploaded($video)
    {
        return Str::endsWith($video, '.mp4');
    }

    private function createStorageItem($type)
    {
        $si = new StorageItem();
        $si->type = $type;

        return $si;
    }
}

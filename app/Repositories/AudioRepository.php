<?php

namespace App\Repositories;

use App\Models\StorageItem;
use App\Traits\ImageHandler;

class AudioRepository
{
    use ImageHandler;

    public static array $categories = ['Meditation', 'Chanting'];

    public function findAudio($id)
    {
        return StorageItem::ofType('audios')
            ->whereId($id)
            ->first();
    }

    public function getAudios($request = null)
    {
        $audios = StorageItem::ofType('audios');

        if (!empty($request->category)) {
            $audios->whereRaw("props->'$.category' = ?", [$request->category]);
        }

        return $audios->orderByDesc('id')
            ->get();
    }

    public function storeAudio($request)
    {
        $audio = $this->createStorageItem('audios');

        $audio_file = $this->saveAudio($request, 'audio', 'audio_file');

        $audio->setProps([
            'title'         => $request->title,
            'title_bn'      => $request->title_bn ?? null,
            'category'      => $request->category,
            'audio'         => $audio_file,
        ]);

        $audio->save();
    }

    public function updateAudio($id, $request)
    {
        $audio = $this->findAudio($id);

        if (!empty($request->file('audio'))) {
            $this->deleteAudioIfExists($audio->prop('audio'));
            $audio_file = $this->saveAudio($request, 'audio', 'audio_file');
        } else {
            $audio_file = $audio->prop('audio');
        }

        $audio->setProps([
            'title'         => $request->title,
            'title_bn'      => $request->title_bn ?? null,
            'category'      => $request->category,
            'audio'         => $audio_file,
        ]);

        $audio->save();
    }

    public function deleteAudio($id)
    {
        $audio = $this->findAudio($id);

        if (!empty($audio)) {
            $this->deleteAudioIfExists($audio->prop('audio'));

            // Delete the audio entity
            $audio->delete();
        }
    }

    private function createStorageItem($type)
    {
        $si = new StorageItem();
        $si->type = $type;

        return $si;
    }
}

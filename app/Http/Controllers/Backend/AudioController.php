<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\AudioRepository;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    protected $repo;

    public function __construct(AudioRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $audios = $this->repo->getAudios($request);

        return view('backend.audios.index', compact('audios'));
    }

    public function create()
    {
        return view('backend.audios.create');
    }

    public function store(Request $request)
    {
        $this->repo->storeAudio($request);

        return redirect()->route('backend.audios.index');
    }

    public function edit($id)
    {
        $audio = $this->repo->findAudio($id);

        return view('backend.audios.edit', compact('audio'));
    }

    public function update(Request $request, $id)
    {
        $this->repo->updateAudio($id, $request);

        return redirect()->route('backend.audios.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteAudio($id);

        return redirect()->route('backend.audios.index');
    }
}

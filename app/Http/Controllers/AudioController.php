<?php

namespace App\Http\Controllers;

use App\Repositories\AudioRepository;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    protected AudioRepository $repo;

    public function __construct(AudioRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $audios = $this->repo->getAudios($request);

        return view('frontend.library.audio', compact('audios'));
    }
}

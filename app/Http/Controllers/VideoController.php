<?php

namespace App\Http\Controllers;

use App\Repositories\VideoRepository;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected $repo;

    public function __construct(VideoRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $videos = $this->repo->getVideos($request);

        return view('frontend.library.video', compact('videos'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Repositories\TeachingRepository;
use App\Repositories\TeachingsSlideRepository;
use Illuminate\Http\Request;

class TeachingController extends Controller
{
    public function __construct(TeachingRepository $repo, TeachingsSlideRepository $tsRepo)
    {
        $this->repo = $repo;
        $this->tsRepo = $tsRepo;
    }

    public function index(Request $request)
    {
        $teachings = $this->repo->getTeachings($request);
        $teachings_slides = $this->tsRepo->getTeachingsSlides();

        return view('frontend.teachings.index', compact('teachings', 'teachings_slides'));
    }

    public function show($locale, $id)
    {
        $teaching = $this->repo->findTeaching($id);

        return view('frontend.teachings.show', compact('teaching'));
    }
}

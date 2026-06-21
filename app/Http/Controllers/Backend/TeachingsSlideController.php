<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\TeachingsSlideRepository;
use Illuminate\Http\Request;

class TeachingsSlideController extends Controller
{
    public function __construct(TeachingsSlideRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $teachings_slides = $this->repo->getTeachingsSlides($request);

        return view('backend.teachings-slides.index', compact('teachings_slides'));
    }

    public function create()
    {
        return view('backend.teachings-slides.create');
    }

    public function store(Request $request)
    {
        $this->repo->storeTeachingsSlide($request);

        return redirect()->route('backend.teachings-slides.index');
    }

    public function edit($id)
    {
        $teachings_slide = $this->repo->findTeachingsSlide($id);

        return view('backend.teachings-slides.edit', compact('teachings_slide'));
    }

    public function update(Request $request, $id)
    {
        $this->repo->updateTeachingsSlide($id, $request);

        return redirect()->route('backend.teachings-slides.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteTeachingsSlide($id);

        return redirect()->route('backend.teachings-slides.index');
    }
}

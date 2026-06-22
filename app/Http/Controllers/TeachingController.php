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
        if (ctype_digit((string) $id)) {
            $teaching = $this->repo->findTeaching($id);

            if ($teaching && !empty($teaching->props['title'])) {
                return redirect()->route('teachings.show', ['locale' => $locale, 'teaching' => \Illuminate\Support\Str::slug($teaching->props['title'])], 301);
            }
        } else {
            $teaching = $this->repo->findTeachingBySlug($id);
        }

        abort_unless($teaching, 404);

        return view('frontend.teachings.show', compact('teaching'));
    }
}

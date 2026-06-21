<?php

namespace App\Http\Controllers;

use App\Repositories\GalleryImageRepository;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    protected $repo;

    public function __construct(GalleryImageRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        if ($request->has('image_gallery_id')) {
            $image_gallery = $this->repo->findGalleryImage($request->get('image_gallery_id'));
            $gallery_images = collect($image_gallery->prop('gallery_images', []));

            return view('frontend.library.image-gallery', compact('image_gallery', 'gallery_images'));
        }

        // Load list of image galleries
        $image_galleries = $this->repo->getGalleryImages($request);
        return view('frontend.library.image-gallery', compact('image_galleries'));
    }
}

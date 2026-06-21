<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\GalleryImageRepository;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    private $repo;

    public function __construct(GalleryImageRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $gallery_images = $this->repo->getGalleryImages($request);

        return view('backend.gallery-images.index', compact('gallery_images'));
    }

    public function create()
    {
        return view('backend.gallery-images.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->repo->storeGalleryImage($request);

        return redirect()->route('backend.gallery-images.index');
    }

    public function edit($id)
    {
        $gallery_image = $this->repo->findGalleryImage($id);

        return view('backend.gallery-images.edit', compact('gallery_image'));
    }

    public function update(Request $request, $id)
    {
        $this->repo->updateGalleryImage($id, $request);

        return redirect()->route('backend.gallery-images.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteGalleryImage($id);

        return redirect()->route('backend.gallery-images.index');
    }
}

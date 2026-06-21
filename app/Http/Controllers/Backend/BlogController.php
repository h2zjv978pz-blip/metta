<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(BlogRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $blogs = $this->repo->getBlogs($request);

        return view('backend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.blogs.create');
    }

    public function store(Request $request)
    {
        $this->repo->storeBlog($request);

        return redirect()->route('backend.blogs.index');
    }

    public function edit($id)
    {
        $blog = $this->repo->findBlog($id);

        return view('backend.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $this->repo->updateBlog($id, $request);

        return redirect()->route('backend.blogs.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteBlog($id);

        return redirect()->route('backend.blogs.index');
    }
}

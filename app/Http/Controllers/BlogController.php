<?php

namespace App\Http\Controllers;

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

        return view('frontend.blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = $this->repo->findBlog($id);
        $more_blogs = $this->repo->getOtherBlogs($blog->id);

        return view('frontend.blogs.show', compact('blog', 'more_blogs'));
    }
}

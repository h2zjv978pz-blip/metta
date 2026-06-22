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

    public function show($locale, $id)
    {
        if (ctype_digit((string) $id)) {
            $blog = $this->repo->findBlog($id);

            if ($blog && !empty($blog->props['title'])) {
                return redirect()->route('blogs.show', ['locale' => $locale, 'blog' => \Illuminate\Support\Str::slug($blog->props['title'])], 301);
            }
        } else {
            $blog = $this->repo->findBlogBySlug($id);
        }

        abort_unless($blog, 404);

        $more_blogs = $this->repo->getOtherBlogs($blog->id);

        return view('frontend.blogs.show', compact('blog', 'more_blogs'));
    }
}

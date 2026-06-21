<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $repo;

    public function __construct(BookRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $books = $this->repo->getBooks($request);

        return view('frontend.library.books', compact('books'));
    }
}

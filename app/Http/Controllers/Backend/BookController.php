<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        return view('backend.books.create');
    }

    public function store(Request $request)
    {
        $this->repo->storeBook($request);

        return redirect()->route('backend.books.index');
    }

    public function edit($id)
    {
        $book = $this->repo->findBook($id);

        return view('backend.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $this->repo->updateBook($id, $request);

        return redirect()->route('backend.books.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteBook($id);

        return redirect()->route('backend.books.index');
    }

    public function __construct(BookRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $books = $this->repo->getBooks($request);

        return view('backend.books.index', compact('books'));
    }
}

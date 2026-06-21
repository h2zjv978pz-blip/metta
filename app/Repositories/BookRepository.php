<?php

namespace App\Repositories;

use App\Helpers\Utils;
use App\Models\StorageItem;
use App\Traits\ImageHandler;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookRepository
{
    use ImageHandler;

    public static array $categories = ["General", "Children Books", "Spiritual"];

    public function findBook($id)
    {
        return StorageItem::ofType('books')
            ->whereId($id)
            ->first();
    }

    public function getBooks($request = null)
    {
        $books = StorageItem::ofType('books');

        if (!empty($request->category)) {
            $books->whereRaw("props->'$.category' = ?", [$request->category]);
        }

        return $books->orderByDesc('id')
            ->get();
    }

    public function storeBook($request)
    {
        $book = $this->createStorageItem('books');

        $feature_image = $this->saveImage($request, 'feature_image', "book_fi");

        if (!empty($request->book_url)) {
            $book_url = $request->book_url;
        }
        elseif (!empty($request->file('book_pdf'))) {
            $book_pdf = $this->saveDoc($request, 'book_pdf', 'book');
        }

        $book->setProps([
            'title'             => $request->title,
            'author'            => $request->author,
            'pub_year'          => $request->pub_year,
            'category'          => $request->category ?? null,
            'summary'           => $request->summary,
            'book_pdf'          => $book_pdf ?? null,
            'book_url'          => $book_url ?? null,
            'feature_image'     => $feature_image,
        ]);
        $book->save();
    }

    public function updateBook($id, $request)
    {
        $book = $this->findBook($id);

        if (!empty($request->file('feature_image'))) {
            $feature_image = $this->saveImage($request, 'feature_image', "book_fi");
            $this->deleteImageIfExists($book->prop('feature_image'));
        }

        if (!empty($request->book_url)) {
            $book_url = $request->book_url;
        }
        elseif (!empty($request->file('book_pdf'))) {
            $book_pdf = $this->saveDoc($request, 'book_pdf', "book");
            $this->deleteDocIfExists($book->prop('book_pdf'));
        }

        $book->setProps([
            'title'             => $request->title,
            'author'            => $request->author,
            'pub_year'          => $request->pub_year,
            'category'          => $request->category ?? null,
            'summary'           => $request->summary,
            'book_pdf'          => $book_pdf ?? $book->prop('book_pdf', null),
            'book_url'          => $book_url ?? $book->prop('book_url', null),
            'feature_image'     => $feature_image ?? $book->prop('feature_image', null),
        ]);
        $book->save();
    }

    public function deleteBook($id)
    {
        $book = $this->findBook($id);

        if (!empty($book)) {
            $this->deleteImageIfExists($book->prop('feature_image'));

            if ($book->prop('book_pdf')) {
                $this->deleteDocIfExists($book->prop('book_pdf'));
            }

            $book->delete();
        }
    }

    private function createStorageItem($type)
    {
        $si = new StorageItem();
        $si->type = $type;

        return $si;
    }
}

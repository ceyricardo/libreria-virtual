<?php

namespace App\Repositories;

use App\Interfaces\BookInterface;
use App\Models\Book;
use App\Models\Review;

class BookRepository implements BookInterface
{
    public function getAllBooks()
    {
        return Book::all();
    }
    public function getBookById($bookId)
    {
        return Book::findOrFail($bookId);
    }
    public function deleteBook($bookId)
    {
        Book::destroy($bookId);
    }
    public function createBook(array $bookDetails)
    {
        return Book::create($bookDetails);
    }
    public function updateBook($bookId, array $newDetails)
    {
        return Book::whereId($bookId)->update($newDetails);
    }
    public function calculateBookQualification($bookId)
    {
        return Review::where('book_id', $bookId)->avg('qualification');
    }
    public function getReviews($bookId)
    {
        return Review::where('book_id', $bookId)->select('qualification','comment')->get();
    }
}

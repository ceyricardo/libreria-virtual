<?php

namespace App\Repositories;

use App\Interfaces\AuthorInterface;
use App\Models\Author;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;

class AuthorRepository implements AuthorInterface
{
    public function getAllAuthors()
    {
        return Author::all();
    }
    public function getAuthorById($authorId)
    {
        return Author::findOrFail($authorId);
    }
    public function deleteAuthor($authorId)
    {
        Author::destroy($authorId);
    }
    public function createAuthor(array $authorDetails)
    {
        return Author::create($authorDetails);
    }
    public function updateAuthor($authorId, array $newDetails)
    {
        return Author::whereId($authorId)->update($newDetails);
    }
    public function getBooks($authorId)
    {
        return Book::where('author_id', $authorId)->select('title', 'editorial', 'isbn')->get();
    }
}

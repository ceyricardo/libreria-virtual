<?php

namespace App\Interfaces;

interface AuthorInterface
{
    public function getAllAuthors();
    public function getAuthorById($authorId);
    public function deleteAuthor($authorId);
    public function createAuthor(array $authorDetails);
    public function updateAuthor($authorId, array $newDetails);
    public function getBooks($authorId);
}

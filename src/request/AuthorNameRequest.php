<?php

namespace App\request;

class AuthorNameRequest
{
    function findBookByauthorName(array $books, ...$targetAuthorNames)
    {
        $foundBooks = [];

        foreach ($targetAuthorNames as $authorName) {
            foreach ($books as $book) {
                if ($book['authorName'] === $authorName) {
                    $foundBooks[] = $book;
                }
            }
        }

        return $foundBooks;
    }
}
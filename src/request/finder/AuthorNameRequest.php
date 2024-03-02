<?php

namespace App\request\finder;

class AuthorNameRequest
{

    function findBookByAuthorName(array $books, ...$targetAuthorNames)
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
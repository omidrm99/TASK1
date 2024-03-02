<?php

namespace App\request\finder;

class BookTitleRequest
{
    function findBookBookTitle(array $books, ...$targetBookTitles)
    {
        $foundBooks = [];

        foreach ($targetBookTitles as $bookTitle) {
            foreach ($books as $book) {
                if ($book['bookTitle'] === $bookTitle) {
                    $foundBooks[] = $book;
                }
            }
        }

        return $foundBooks;
    }
}
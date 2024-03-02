<?php

namespace App\request\finder;

class PublishDateRequest
{
    function findBookBypublishDate(array $books, ...$targetpublishDates)
    {
        $foundBooks = [];

        foreach ($targetpublishDates as $date) {
            foreach ($books as $book) {
                if ($book['publishDate'] === $date) {
                    $foundBooks[] = $book;
                }
            }
        }

        return $foundBooks;
    }
}
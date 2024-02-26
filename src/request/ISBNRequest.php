<?php

declare(strict_types=1);

namespace App\request;

use App\booksReader\Merger;

class ISBNRequest
{
    private array $ISBN = [];



//    private function extractISBN()
//    {
//        $mergerClass = new Merger();
//
//        $mergedData = $mergerClass->getMergedData();
//
//        foreach ($mergedData as $data) {
//            $this->ISBN = $data;
//        }
//    }

//    function findBookByISBN(...$targetISBN)
//    {
//        foreach ($targetISBN as $isbn){
//
//        }
//
//    }

    function findBookByISBN(array $books, ...$targetISBNs)
    {
        $foundBooks = [];

        foreach ($targetISBNs as $isbn) {
            foreach ($books as $book) {
                if ($book['ISBN'] === $isbn) {
                    $foundBooks[] = $book;
                }
            }
        }

        return $foundBooks;
    }

}
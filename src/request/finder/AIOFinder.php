<?php

namespace App\request\finder;

use App\dataBaseReader;
use App\dataBaseReader\Merger;

class AIOFinder
{

    private array $foundBooks = [];
    private array $sortedBooks = [];

    public function findBookByPublishDate(...$targetPublishDates): void
    {
        $this->findByCriteria('publishDate', $targetPublishDates);
    }

    public function findBookByISBN(...$targetISBNs): void
    {
        $this->findByCriteria('ISBN', $targetISBNs);
    }

    public function findBookByAuthorName(...$targetAuthorNames): void
    {
        $this->findByCriteria('authorName', $targetAuthorNames);
    }

    public function findBookByBookTitle(...$targetBookTitles): void
    {
        $this->findByCriteria('bookTitle', $targetBookTitles);
    }

    private function findByCriteria(string $criteria, array $targets): void
    {
        $merger = new Merger();
        $mergedData = $merger->getMergedData();

        foreach ($targets as $target) {
            foreach ($mergedData as $book) {
                if ($book[$criteria] === $target) {
                    $this->foundBooks[] = $book;
                }
            }
        }
    }

    private function publishDateSorter(): void
    {
        $sorter = new dataBaseReader\publishDateSorter($this->foundBooks);
        $this->sortedBooks = $sorter->getSortedData();
    }

    public function getSortedBooks(): array
    {
        // Sort books if not already sorted
        if (empty($this->sortedBooks)) {
            $this->publishDateSorter();
        }
        return $this->sortedBooks;
    }
}
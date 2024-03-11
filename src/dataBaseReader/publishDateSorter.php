<?php

namespace App\dataBaseReader;

class publishDateSorter
{

    private array $sorted = [];

    public function __construct(array $mergedData)
    {
        usort($mergedData, function ($a, $b) {
            return strtotime($a['publishDate']) - strtotime($b['publishDate']);
        });

        $this->sorted = $mergedData;
    }

    public function getSortedData(): array
    {
        return array_values($this->sorted);
    }

}
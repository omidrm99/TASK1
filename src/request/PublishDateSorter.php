<?php

namespace App\request;

use App\dataBaseReader\Merger;

class PublishDateSorter
{
    private array $sorted = [];

    public function __construct(array $mergedData)
    {


        usort($mergedData, function ($a, $b) {
            return strtotime($a['publishDate']) - strtotime($b['publishDate']);
        });

        $this->sorted= $mergedData;
    }

    public function getSortedData(): array
    {
        return array_values($this->sorted);
    }
}
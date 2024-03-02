<?php

namespace App\request;

use App\dataBaseReader\Merger;

class PublishDateSorter
{
    private array $sorted = [];

    public function sortDataByPublishDate(): array
    {
        $merger = new Merger();
        $mergedData = $merger->getMergedData();

        usort($mergedData, function ($a, $b) {
            return strtotime($a['publishDate']) - strtotime($b['publishDate']);
        });

        return $mergedData;
    }

    public function getSortedData(): array
    {
        return array_values($this->sorted);
    }
}
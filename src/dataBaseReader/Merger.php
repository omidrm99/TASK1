<?php

declare(strict_types=1);

namespace App\dataBaseReader;


class Merger
{


    private array $merged = [];
    private array $sortedData = [];

    public function __construct()
    {
        $jsonReader = new JsonReader(json_File_Path);
        $csvReader = new CsvReader(csv_File_Path);

        $json = $jsonReader->getData();
        $csv = $csvReader->getData();


        $this->merged = array_merge($json, $csv);
    }


    public function getMergedData(): array
    {
        return array_values($this->merged);
    }

    private function publishDateSorter(): void
    {
        $sorter = new publishDateSorter($this->merged);
        $this->sortedData = $sorter->getSortedData();
    }


    public function getSortedBooks(): array
    {
        if (empty($this->sortedData)) {
            $this->publishDateSorter();
        }
        return $this->sortedData;
    }
}
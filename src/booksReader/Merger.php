<?php
declare(strict_types=1);
namespace App\booksReader;




class Merger
{


    private array $merged = [];

    public function __construct()
    {
        $jsonReader = new JsonReader(json_File_Path);
        $csvReader = new CsvReader(csv_File_Path);

        $json = $jsonReader->getData();
        $csv = $csvReader->getData();


        $this->merged = array_merge($json, $csv);

        return $this->merged;
    }


    public function getMergedData(): array
    {
        return array_values($this->merged);
    }
}
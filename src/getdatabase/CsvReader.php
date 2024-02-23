<?php

namespace App\getdatabase;

class CsvReader
{
    private array $data = [];
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->readCsvFile();
    }

    private function readCsvFile()
    {
        $csvFile = fopen($this->path, 'r');

        if ($csvFile !== false) {
            fgetcsv($csvFile);
            $data = [];
            while (($row = fgetcsv($csvFile)) !== false) {
                $data[] = $row;
            }
            fclose($csvFile);
            $this->data = $data;
        } else {
            echo "Error: Unable to open csvFile.";
        }
    }

    public function getData(): array
    {
        return $this->data;
    }
}

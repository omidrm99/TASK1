<?php
declare(strict_types=1);
namespace App\dataBaseReader;

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
                $data[] = $this->extractBook($row);
            }
            fclose($csvFile);
            $this->data = $data;
        } else {
            echo "Error: Unable to open csvFile.";
        }
    }

    private function extractBook(array $bookRow): array
    {
        [$ISBN, $bookTitle, $authorName, $pagesCount, $publishDate] = $bookRow;

        return [
            'ISBN' => $ISBN,
            'bookTitle' => $bookTitle,
            'authorName' => $authorName,
            'pagesCount' => $pagesCount,
            'publishDate' => $publishDate,
        ];
    }


    public function getData(): array
    {
        return $this->data;
    }
}

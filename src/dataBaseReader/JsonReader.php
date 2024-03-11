<?php
declare(strict_types=1);
namespace App\dataBaseReader;

class JsonReader implements getData
{
    private array $data = [];
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->readJsonFile();
    }

    private function readJsonFile(): void
    {
        $jsonData = file_get_contents($this->path);
        if ($jsonData !== false) {
            $data = json_decode($jsonData, true);
            if ($data !== null && isset($data['books'])) {
                $this->data = $data['books'];
            } else {
                echo "Error: Unable to decode JSON or 'books' array not found.";
            }
        } else {
            echo "Error: Unable to open JSON file.";
        }
    }

    public function getData(): array
    {
        return $this->data;
    }
}

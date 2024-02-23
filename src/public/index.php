<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';


use App\booksReader\CsvReader;
use App\booksReader\JsonReader;





// csv fil reader section
const csv_File_Path = __DIR__ . '/../database/books.csv';
$csvReader = new CsvReader(csv_File_Path);


// json fil reader section
const json_File_Path = __DIR__ . '/../database/books.json';
$jsonReader = new JsonReader(json_File_Path);



$yes = $jsonReader->getData();
$yes1 = $csvReader->getData();
echo '<pre>';
print_r($yes);
echo '</pre>';



exit();

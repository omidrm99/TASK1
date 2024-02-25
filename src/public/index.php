<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';


use App\booksReader\CsvReader;
use App\booksReader\JsonReader;
use App\booksReader\Merger;




const csv_File_Path = __DIR__ . '/../database/books.csv';
const json_File_Path = __DIR__ . '/../database/books.json';



$merger = new Merger();
$mergedData = $merger->getMergedData();



echo '<pre>';
print_r($mergedData);
echo '</pre>';


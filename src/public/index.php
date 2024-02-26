<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';



use App\dataBaseReader\Merger;
use App\request\ISBNRequest;




const csv_File_Path = __DIR__ . '/../database/books.csv';
const json_File_Path = __DIR__ . '/../database/books.json';



$merger = new Merger();
$mergedData = $merger->getMergedData();



$find = new ISBNRequest();
$foundBooks = $find->findBookByISBN($mergedData, '978-1451635626', '978-0062316097');
echo '<pre>';
print_r($foundBooks);
echo '</pre>';




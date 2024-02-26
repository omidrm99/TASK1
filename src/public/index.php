<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';



use App\booksReader\Merger;
use App\request\ISBNRequest;
use App\request\authorNameRequest;
use App\request\bookTitleRequest;
use App\request\publishDateRequest;



const csv_File_Path = __DIR__ . '/../database/books.csv';
const json_File_Path = __DIR__ . '/../database/books.json';



$merger = new Merger();
$mergedData = $merger->getMergedData();



$find = new ISBNRequest();
$find1 = new authorNameRequest();
$find2 = new bookTitleRequest();
$find3 = new publishDateRequest();




$foundBooks = $find3->findBookBypublishDate($mergedData, '1978-11-02','2010-12-05');
echo '<pre>';
print_r($foundBooks);
echo '</pre>';




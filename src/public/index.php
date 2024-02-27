<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';


use App\dataBaseReader\Merger;
use App\request\finder\AuthorNameRequest;
use App\request\finder\BookTitleRequest;
use App\request\finder\ISBNRequest;
use App\request\finder\PublishDateRequest;


const csv_File_Path = __DIR__ . '/../database/books.csv';
const json_File_Path = __DIR__ . '/../database/books.json';



$merger = new Merger();
$mergedData = $merger->getMergedData();



$find = new ISBNRequest();
$find1 = new AuthorNameRequest();
$find2 = new BookTitleRequest();
$find3 = new PublishDateRequest();




$foundBooks = $find3->findBookBypublishDate($mergedData, '1978-11-02','2010-12-05');
echo '<pre>';
print_r($foundBooks);
echo '</pre>';




<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';



use App\dataBaseReader\Merger;
use App\request\ISBNRequest;
use App\request\AuthorNameRequest;
use App\request\BookTitleRequest;
use App\request\PublishDateRequest;
use App\request\PublishDateSorter;



const csv_File_Path = __DIR__ . '/../database/books.csv';
const json_File_Path = __DIR__ . '/../database/books.json';



$merger = new Merger();
$mergedData = $merger->getMergedData();


$omid = new ISBNRequest($mergedData,'978-0679413353');
$ali = $omid->sortByPublishDate();



echo '<pre>';
print_r($ali);
echo '</pre>';

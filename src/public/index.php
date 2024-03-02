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


$omid = new PublishDateSorter();
$ali = $omid->sortDataByPublishDate();



echo '<pre>';
print_r($ali);
echo '</pre>';




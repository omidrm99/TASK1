<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';


use App\dataBaseReader\Merger;
use App\request\finder\AuthorNameRequest;
use App\request\finder\BookTitleRequest;
use App\request\finder\ISBNRequest;
use App\request\finder\PublishDateRequest;
use App\request\CommandReader;


const csv_File_Path = __DIR__ . '/../database/books.csv';
const json_File_Path = __DIR__ . '/../database/books.json';
const command_File_Path =  'Command.json';


$merger = new Merger();
$mergedData = $merger->getMergedData();

try {
$commandReader = new CommandReader(command_File_Path);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

//echo '<pre>';
//print_r($test);
//echo '</pre>';

exit();
$find = new ISBNRequest();
$find1 = new AuthorNameRequest();
$find2 = new BookTitleRequest();
$find3 = new PublishDateRequest();


$find->findBookByISBN($mergedData, '978-0735619678','978-0062316097');
$foundBooks = $find->getSortedBooks();
echo '<pre>';
print_r($foundBooks);
echo '</pre>';




<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';


use App\getdatabase\CsvReader;
use App\getdatabase\JsonReader;





// csv fil reader section
const csv_File_Path = __DIR__ . '/../database/books.csv';
$csvReader = new CsvReader(csv_File_Path);


// json fil reader section
const json_File_Path = __DIR__ . '/../database/books.json';
$jsonReader = new JsonReader(json_File_Path);



$yes = $jsonReader->getData();
$yes1 = $csvReader->getData();
echo '<pre>';
print_r($yes1);
echo '</pre>';


exit();





































use app\BookTableGenerator;

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'book-files' . DIRECTORY_SEPARATOR);

require APP_PATH . "App.php";
require APP_PATH . "BookTableGenerator.php";

$data = getBooksFiles(FILES_PATH);

$books = [];
foreach ($data as $book) {
    $books = array_merge($books, getBooks($book));
}


$filters = isset($_GET['filter']) ? (array)$_GET['filter'] : [];
$filteredBooks = filterBooks($books, $filters);


$bookTableGenerator = new BookTableGenerator();
$bookTable = $bookTableGenerator->generate($filteredBooks);


echo $bookTable;


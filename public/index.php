<?php

declare(strict_types=1);

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


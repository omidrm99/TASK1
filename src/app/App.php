<?php

declare(strict_types=1);

namespace App\app;

function getBooksFiles(string $path): array
{
    $books = [];

    foreach (scandir($path) as $book) {
        if (is_dir($book)) {
            continue;
        }
        $books[] = $path . $book;
    }
    return $books;
}


function getBooks(string $fileName): array
{
    if (!file_exists($fileName)) {
        echo 'file not found';
    }

    $file = fopen($fileName, 'r');

    //to discard first line(headline) because it's not needed
    fgetcsv($file);

    $books = [];

    while (($book = fgetcsv($file)) !== false) {
        $books [] = extractTBook($book);
    }

    return $books;
}


function extractTBook(array $bookRow): array
{
    [$ISBN, $bookTitle, $authorName, $pagesCount, $publishDate] = $bookRow;



    return [
        'ISBN' => $ISBN,
        'bookTitle' => $bookTitle,
        'authorName' => $authorName,
        'pagesCount' => $pagesCount,
        'publishDate' => $publishDate,
    ];
}



function filterBooks(array $books, array $filters): array
{
    if (empty($filters)) {
        return $books;
    }

    $filtered = [];
    foreach ($books as $book) {
        $matches = false;
        foreach ($filters as $filter) {
            if (stripos($book['ISBN'], $filter) !== false ||
                stripos($book['bookTitle'], $filter) !== false ||
                stripos($book['authorName'], $filter) !== false) {
                $matches = true;
                break;
            }
        }
        if ($matches) {
            $filtered[] = $book;
        }
    }
    return $filtered;
}




function generateBookTable(array $books): string
{
    $html = '<style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th, table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th, tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
    <table>
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>bookTitle</th>
                        <th>authorName</th>
                        <th>pagesCount</th>
                        <th>publishDate</th>
                    </tr>
                </thead>
                <tbody>';

    foreach ($books as $book) {
        $html .= '<tr>
                    <td>' . $book['ISBN'] . '</td>
                    <td>' . $book['bookTitle'] . '</td>
                    <td>' . $book['authorName'] . '</td>
                    <td>' . $book['pagesCount'] . '</td>
                    <td>' . $book['publishDate'] . '</td>
                  </tr>';
    }

    $html .= '</tbody>
            </table>';

    return $html;
}


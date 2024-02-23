<?php

namespace app;

class BookTableGenerator
{
    public function generate(array $books): string
    {
        $html = '<form action="" method="GET">
                    <label for="filter">Enter Filter Value:</label>
                    <input type="text" id="filter" name="filter">
                    <button type="submit">Filter</button>
                </form>';

        $html .= '<style>
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
}

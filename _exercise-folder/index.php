<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Tic Tac Toe</title>
</head>
<body>
    <div class="game-container">
        <h1 class="page-title">Tic Tac Toe</h1>
        <?php
            include "./includes/tools.php";
            // We start here
            echo '
            <table>
                <tbody>
                    <tr>
                        <td>-</td><td>-</td><td>-</td>
                    </tr>
                    <tr>
                        <td>-</td><td>-</td><td>-</td>
                    </tr>
                    <tr>
                        <td>-</td><td>-</td><td>-</td>
                    </tr>
                <tbody>
            </table>
            ';
        ?>
    </div>
</body>
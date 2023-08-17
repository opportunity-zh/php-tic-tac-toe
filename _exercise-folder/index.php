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

            /*
                Goals:
                1. We need a session to store the board.
                2. Then we loop trough that multidimensional array with a nested loop to display the board.
                3. In that nested loop we display each field as a link to the same page "index.php",
                with the coordinates for the row and column that has been clicked and pass also the current palyer tag with it.
                4. We check in the index.php if the row, col and player tag are set in the URL and 
                update the board in the session.
                5. Now we need to switch the player after each move.
                6. Finally we need to check if there is a winner,
                for that we write a function that checks the board and display a message.
            
            */

            /*
                1. We need a session to store the board.
                   Also make sure, that the board is not overwritten on each page reload. 
                   Creat an if statement that checks if the session "board" is not set.
            */

            /*
                2. We need a check if if we have get parameters in the URL.
                   If we have, we update the board in the session with the coordinates and the player tag from the last move.
            */

            echo '
            <table>
                <tbody> <!-- We need a first loop going trough the rows from the Session -->
                    <tr> <!-- We display in each field, if not set, a link to the same page with the coordinates and the player tag. -->
                        <td>-</td><td>-</td><td>-</td> <!-- We need a second loop going trough the columns -->
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


            /*
                3. We need a function that checks if there is a winner.
                   We need to check if there is a row, column or diagonal with the same player tag.
                   If there is a winner, we display a message and a link to reset the game.
            */
        ?>
    </div>
</body>
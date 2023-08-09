<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            width: 150px;
            height: 150px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid black;
            font-size: 90px;
            font-weight: bold;
            cursor: pointer;
        }
        td a {
            display: flex;
            text-decoration: none;
            color: black;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;

        }
        td a:hover {
            background: grey;
        }
        .btn-reset {
            display: block;
            padding: 10px 30px;
            width: fit-content;
            height: fit-content;

            font-size: 24px;
            font-weight: bold;
            cursor: pointer;

            border-radius: 9px;
            text-decoration: none;
            color: white;
            background-color: grey;
        }
        .btn-reset:hover {
            background-color: red;
        }

        .game-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            gap: 30px;
        }
        .page-title {
            font-size: 60px;
        }
    </style>
</head>
<body>
    <div class="game-container">
        <h1 class="page-title">Tic Tac Toe</h1>
        <?php
            require './includes/tools.php';

            if(!isset($_SESSION['board'])) {
                $_SESSION['board'] = array(
                    array("-", "-", "-"),
                    array("-", "-", "-"),
                    array("-", "-", "-")
                );
            }
            
    
           // prettyPrint($_SESSION);
           $player = 'X';
            if(isset($_GET['row']) && isset($_GET['col']) && isset($_GET['player'])) {
                $newRow = $_GET['row'];
                $newCol = $_GET['col'];
                $player = $_GET['player'];

                $_SESSION['board'][$newRow][$newCol] = $player;
            }
            // wechsle Spieler bei einem Get request
            switch($player){
                case 'X':
                    $player = 'O';
                    break;
                case 'O':
                    $player = 'X';
                    break;
                default:
                    $player = 'X';
            }

            // Displays the board
            echo '<table>
                    <tbody>';
            for ($i=0; $i < 3; $i++){
                echo '<tr>';
                
                for ($j=0; $j < 3; $j++){
                    
                    $symbol = $_SESSION['board'][$i][$j];
                    if($symbol == '-'){
                        echo "<td><a href='index.php?row=$i&col=$j&player=$player'>$symbol</a></td>";
                    }else {
                        echo "<td>$symbol</td>";
                    }
                }
                echo'</tr>';
            }
            echo '</tbody>
            </table>';

            function checkWin($board, $player){
                // check rows
                for($i=0; $i < 3; $i++){
                    if($board[$i][0] == $player && $board[$i][1] == $player && $board[$i][2] == $player){
                        return true;
                    }
                }
                //check column
                for($j=0; $j < 3; $j++){
                    if($board[0][$j] == $player && $board[1][$j] == $player && $board[2][$j] == $player){
                        return true;
                    }
                }
                // check diagonal 
                if($board[0][0] == $player && $board[1][1] == $player && $board[2][2] == $player){
                    return true;
                }
                if($board[0][2] == $player && $board[1][1] == $player && $board[2][0] == $player){
                    return true;
                }
                return false;
            }

            if(checkWin($_SESSION['board'], 'X')){
                echo "<h2>X wins!</h2>";
            }else if(checkWin($_SESSION['board'], 'O')){
                echo "<h2>O wins!</h2>";
            }

        ?>
        <a href="reset.php" class="btn-reset">reset</a>
    </div>
</body>
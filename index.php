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
            require './includes/tools.php'; // needed for prettyPrint()

            // if the session "board" is not set, create a new one with 3x3 fields
            if(!isset($_SESSION['board'])) {
                $_SESSION['board'] = array(
                    array("-", "-", "-"),
                    array("-", "-", "-"),
                    array("-", "-", "-")
                );
            }
            
           // prettyPrint($_SESSION);
            $playerTag = 'X';
            if(isset($_GET['row']) && isset($_GET['col']) && isset($_GET['playertag'])) { // Grab the row, col and player from the URL
                $newRow = $_GET['row'];
                $newCol = $_GET['col'];
                $playerTag = $_GET['playertag'];

                $_SESSION['board'][$newRow][$newCol] = $playerTag; // update the board with coordinates and player tag from the last move
            }

            // switch the player after each move
            switch($playerTag){
                case 'X':
                    $playerTag = 'O';
                    break;
                case 'O':
                    $playerTag = 'X';
                    break;
                default:
                    $playerTag = 'X';
            }

            // Displays the board
            echo '<table>
                    <tbody>';
            for ($i=0; $i < 3; $i++){ // loop through the rows
                echo '<tr>';
                
                for ($j=0; $j < 3; $j++){ // loop through the columns
                    
                    $symbol = $_SESSION['board'][$i][$j];
                    if($symbol == '-'){ // check if the default symbol is still there
                        echo "<td><a href='index.php?row=$i&col=$j&playertag=$playerTag'>$symbol</a></td>"; // if the symbol is not the default symbol, then display it without the link, so it can't be clicked
                    }else {
                        echo "<td>$symbol</td>"; // if the symbol is not the default symbol, then display it without the link, so it can't be clicked
                    }
                }
                echo'</tr>';
            }
            echo '</tbody>
            </table>';

            function checkWin($board, $playerTag){ // check if the given player by the playerTag has won
                
                for($i=0; $i < 3; $i++){ // check rows
                    if($board[$i][0] == $playerTag && $board[$i][1] == $playerTag && $board[$i][2] == $playerTag){ 
                        return true;
                    }
                }
               
                for($j=0; $j < 3; $j++){  //check column
                    if($board[0][$j] == $playerTag && $board[1][$j] == $playerTag && $board[2][$j] == $playerTag){
                        return true;
                    }
                }

                 
                if($board[0][0] == $playerTag && $board[1][1] == $playerTag && $board[2][2] == $playerTag){ // check diagonal from top left to bottom right
                    return true;
                }
                if($board[0][2] == $playerTag && $board[1][1] == $playerTag && $board[2][0] == $playerTag){ // check diagonal from top right to bottom left
                    return true;
                }
                return false;
            }

            if(checkWin($_SESSION['board'], 'X')){ // check if player has won and display a message
                echo "<h2>X wins!</h2>";
            }else if(checkWin($_SESSION['board'], 'O')){
                echo "<h2>O wins!</h2>";
            }

        ?>
        <a href="reset.php" class="btn-reset">reset</a> <!-- deletes the current session -->
    </div>
</body>
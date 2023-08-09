<? session_start(); ?>
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
        // Initialize the game board if session is not set
        if(!isset($_SESSION['board'])) {
            $_SESSION['board'] = array(
                array('-', '-', '-'),
                array('-', '-', '-'),
                array('-', '-', '-')
            );
        }
     

        // Function to display the game board
        function display_board() {
            echo '<table>
                    <tbody>';
            
            if(isset($_GET['row']) && isset($_GET['col']) && isset($_GET['player'])) { // Check if we have all data in the url
                // Get the column and row from the url
                $newCol = $_GET['col'];
                $newRow = $_GET['row'];
               
                // update the board in the session storage
                $_SESSION['board'][$newCol][$newRow] = $_GET['player'];
        
                // switch the player after each move
                switch($_GET['player']) {
                    case 'X':
                        $player = 'O';
                        break;
                    case 'O':
                        $player = 'X';
                        break;
                    default:
                        $player = 'X';
                }    
            } else {
                $player = 'X';
            }
           
            // Display the board
            for ($i = 0; $i < 3; $i++) { // loop through the rows
                echo "<tr>";
                for ($j = 0; $j < 3; $j++) { // loop through the columns

                    // Get the current symbol from the session storage array
                    $symbol =  $_SESSION['board'][$i][$j];
                    
                    if($symbol == '-') { // check if the default symbol is still there
                        echo "<td><a href='index.php?row=$j&col=$i&player=$player'>$symbol</a></td>";
                    }
                    else { // if the symbol is not the default symbol, then display it without the link, so it can't be clicked
                        echo "<td>$symbol</td>";
                    }
                }
                echo "</tr>";
            }
            echo '<tbody>
            </table>';
        }

        // Display the board in the browser with  a function call
        display_board(); 

        ?>
        <a href="reset.php" class="btn-reset">Reset</a>
    </div>
</body>
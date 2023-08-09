<?php

function renderBoard() {
    // Initialize the game board if session is not set
    if(!isset($_SESSION['board'])) {
        $_SESSION['board'] = array(
            array('-', '-', '-'),
            array('-', '-', '-'),
            array('-', '-', '-')
        );
    }
    // Initialize the player if session is not set
    if(!isset($_SESSION['storedPlayer'])) {
        // Set the first player to X
        $_SESSION['storedPlayer'] = 'X';
    }

    // Display the board in the browser

    echo '<table>
    <tbody>';
    
    for ($i = 0; $i < 3; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 3; $j++) {
                $symbol =  $_SESSION['board'][$i][$j];
                $currentPlayer = $_SESSION['storedPlayer'];
                
                if($symbol == '-')
                {
                    echo "<td><a href='index.php?row=$j&col=$i&player=$currentPlayer'>$symbol</a></td>";
                }
                else
                {
                    echo "<td>$symbol</td>";
                }
            }
            echo "</tr>";
        }
    echo '<tbody>
    </table>';
}



function updateBoard() { 
    // Check if the player has made a move and update the board in the session
    if(isset($_GET['row']) && isset($_GET['col']) && isset($_session['board'])){
        $newCol = $_GET['col'];
        $newRow = $_GET['row'];
        
        $_SESSION['board'][$newCol][$newRow] = $_GET['playerFromGet'];
    }
}

function updatePlayer() {
    if(isset($_GET['playerFromGet']) && isset($_SESSION['storedPlayer'])) { // check if the player is set in the url

        // now we need to switch the player after each move
        switch($_GET['playerFromGet']) {
            case 'X':
                $_SESSION['storedPlayer'] = 'O';
                break;
            case 'O':
                $_SESSION['storedPlayer'] = 'X';
                break;
            default:
            $_SESSION['storedPlayer'] = 'X'; 
        }
    }
}

?>


<?php
    // other game engine functions

    function make_move($row, $col, $player) {
        $curP = 1 || $player;
        $board[$row][$col] = $player;
    }


    // Function to check if a player has won
    function check_win($board, $player) {
        // Check rows
        for ($i = 0; $i < 3; $i++) {
            if ($board[$i][0] == $player && $board[$i][1] == $player && $board[$i][2] == $player) {
                return true;
            }
        }
        // Check columns
        for ($j = 0; $j < 3; $j++) {
            if ($board[0][$j] == $player && $board[1][$j] == $player && $board[2][$j] == $player) {
                return true;
            }
        }
        // Check diagonals
        if ($board[0][0] == $player && $board[1][1] == $player && $board[2][2] == $player) {
            return true;
        }
        if ($board[0][2] == $player && $board[1][1] == $player && $board[2][0] == $player) {
            return true;
        }
        return false;
    }

    // Check if the game is over
    function check_game_over($board) {
        // Check if the game is a tie
        $tie = true;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($board[$i][$j] == '-') {
                    $tie = false;
                }
            }
        }
        if ($tie) {
            return true;
        }
        // Check if a player has won
        if (check_win($board, 'X') || check_win($board, 'O')) {
            return true;
        }
        return false;
    }
?>
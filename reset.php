<?php
    // Start the session if we want to use the $_SESSION variable
    session_start();

    // Destroy the session, so we have a clean sesssion
    session_destroy();

    // Redirect the user to the index.php
    header("Location: index.php");
?>
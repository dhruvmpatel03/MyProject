<?php
    include '../connection.php';
    session_start();

    // $_SESSION = [];
    
    session_unset();
    session_destroy();
    header("Location:../SHARED/HOME.PHP");

?>
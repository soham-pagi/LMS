<?php
    session_start();
    $_SESSION['loggedin'] = 0;
    $_SESSION['email'] = "";
    echo "<script>window.location.replace('home.php')</script>";
?>
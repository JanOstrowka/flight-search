<?php
    session_start();
    if (!isset($_SESSION['sLogin'])){
        header('Location: login.css');
        exit();
    }
?>
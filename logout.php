<?php
    session_start();

    unset($_SESSION['nome']); 
    unset($_SESSION['email']); 

    Header("Location:index.php"); 
?>
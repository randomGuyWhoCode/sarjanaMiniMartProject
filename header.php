<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sarjana Minimarket</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <meta name="referrer" content="no-referrer"/>
</head>
<body>
    
    <?php
    include "sidebar.php";

    if(isset($_SESSION["is_staff"]) && $_SESSION["is_staff"] ) {
        staffNav();
    }else {
        customerNav();
    }
    
    
    ?>
   
        
        
    


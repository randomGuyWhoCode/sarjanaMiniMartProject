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
    
    <nav class="top-bar">
        <a href="./index.php"><img class="top-bar-img" src="./img/sarjana.png" alt=""></a>
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Search...">
        </div>
        <div class="right-bar">
            <div>
                
            </div>
            <a href="./shopping_cart.php"><img class="top-bar-img" src="./img/cart.png" alt="shopping cart icon"></a>
            <a href="./profile.php"><img class="top-bar-img profile-img" src="<?php echo (isset($_SESSION['profile_pic'])?$_SESSION['profile_pic']:"img/default-profile.png") ?>" alt="profile image"></a>
            
        </div>
        
    </nav>


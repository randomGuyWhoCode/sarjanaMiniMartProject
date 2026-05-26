<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="referrer" content="no-referrer"/>
        <title>Sarjana Minimarket</title>

    </head>

    <body>
        <?php include "sidebar.php"; customerNav();?>
        <div class="side-margin profile-page">
            <div class="header">
                <h1 >Profile</h1>
                <p>Hello <?php 
                            $nameArr = explode(" " , $_SESSION['name']);
                            if(count($nameArr) <= 0) {
                                echo "Guest";
                            }else if(count($nameArr) == 1) {
                                echo $nameArr[0];
                            }else {
                                echo $nameArr[0] . " " . $nameArr[1];
                            }
                          ?></p>
            </div>
            <div class="profile container">
                
                <img src= "<?php echo (($_SESSION['profile_pic'])?$_SESSION['profile_pic']:'./img/default-profile.png'); ?>" alt="profile image">
                <div class="profile-information">
                    
                    <p><?php echo $_SESSION['name'] ?></p>
                    <p><?php echo $_SESSION['email'] ?></p>
                    <p><?php echo $_SESSION['programcode'] ?></p>
                    <a href="./profile.php">Edit Profile</a>
                </div>
                
            </div>
        </div>
        
        
        <script>
            const currentLocation = location.href;
            
        </script>
    </body>
</html>

<!-- <div style="padding-left: 145px;"><?php include "footer.php";?></div> -->

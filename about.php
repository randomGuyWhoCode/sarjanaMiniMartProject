<?php
session_start();
include_once "dbconn.php";

// ambil user session dari profile/login
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
} else {
    $customer_id = 1; // fallback (testing sahaja)
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Company</title>
    <link rel="stylesheet" href="styles.css">
 <style>
   body{
    font-family: Arial, sans-serif;
    background:#f5f7fb;
    margin:0;
}

/* PAGE TITLE */
.about-title{
    font-size:34px;
    color:#003366;
    border-bottom:2px solid #003366;
    padding-bottom:12px;
    margin:30px 20px;
    font-weight:bold;
}

/* CARD STYLE */
.about-card{
    background:#fff;
    padding:25px;
    margin:20px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,0.08);
}

/* HEADING INSIDE CARD */
.about-card h2{
    font-size:22px;
    margin-bottom:10px;
    color:#003366;
}

.about-card h3{
    font-size:18px;
    margin-bottom:10px;
    color:#003366;
}

/* TEXT */
.about-card p{
    font-size:15px;
    line-height:1.8;
    color:#444;
    margin-bottom:10px;
}

/* ORGANIZATION IMAGE */
.about-card img{
    border-radius:10px;
}

/* SPACING CONTROL */
.about-section{
    margin-top:10px;
}
</style>
</head>

<body>

<?php include "sidebar.php"; customerNav(); ?>

<div class="side-margin">

    <!-- HEADER (macam history kau) -->
    <div class="header">
        <h2>About Us</h2>
        <i class="fa-solid fa-circle-info"></i>
    </div>

<!-- ORGANIZATION CHART IMAGE -->
<div class="about-card">

    <h3>Organization Chart</h3>

    <div style="text-align:center; margin-top:15px;">
        <img src="img/chartOrganization.png" 
             alt="Organization Chart"
             style="max-width:100%; height:auto; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.2);">
    </div>

</div>
    <!-- CARD 1 -->
    <div class="about-card">
        <h2 style="color:#003366;">Sarjana Minimarket</h2>
        <p>
           We have developed an e-commerce system designed to solve students’ problems in obtaining daily essential items more easily, quickly, and efficiently.

This system provides a wide range of daily necessities such as food, beverages, stationery, and basic living products at affordable prices.

Through this system, students no longer need to travel far to purchase goods, as all necessities can be accessed and purchased online in a more convenient and organized manner.
        </p>
    </div>

    <!-- CARD 2 -->
    <div class="about-card about-section">
        <h3>History</h3>
        <p>
            Established in 2026 and operating exclusively for Universiti Teknologi MARA (UiTM) students, with services continuously expanding to meet the needs of the campus community.

        </p>
    </div>

    <!-- CARD 3 -->
    <div class="about-card about-section">
        <h3>Vision</h3>
        <p>
           To become the most trusted and convenient online platform exclusively for Universiti Teknologi MARA (UiTM) students in accessing daily essential goods.
    </div>

    <!-- CARD 4 -->
    <div class="about-card about-section">
        <h3>Mission</h3>
        <p>
           To provide UiTM students with an easy, fast, and reliable e-commerce system that offers a wide range of daily necessities at affordable prices.
           To enhance student convenience by delivering a seamless online shopping experience within the campus community
        </p>
    </div>

    <!-- OPTIONAL CONNECT USER (macam history connect session) -->
    <div class="about-card">
        <h3>Welcome User</h3>

        <p>
            Logged in as: 
            <b>
                <?php echo $_SESSION['name'] ?? "Guest"; ?>
            </b>
        </p>

        <p>
            Customer ID: 
            <b>
                <?php echo $customer_id; ?>
            </b>
        </p>
    </div>

</div>

</body>
</html>
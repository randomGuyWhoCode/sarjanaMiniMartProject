<?php 
// if($_SESSION["admin"]) {     //conditional check staff or customer
// }

?>
<!-- <div class="sidenav">
    <ul id="sidenav-option">
        <li><a href="./index.php">Sarjana</a></li>
        <li><a href="./profile.php">Profile</a></li>
        <li><a href="">History</a></li>
        <li><a href="">About</a></li>
    </ul>
    <a href="./loginPage.php" class="logout">Log Out</a>
</div> -->
<?php 
    function customerNav() {
        $img = isset($_SESSION["profile_pic"])?$_SESSION["profile_pic"]:"img/default-profile.png";
        echo '<div class="sidenav">
    <ul id="sidenav-option">
        <li><a href="./index.php"><img src="img/sarjanaWhite.png" alt="company logo" class="company-logo"></a></li>
        <hr>
        <li class="side-option" ><a href="./profile.php"><span class="side-text"><i class="fa-solid fa-user"></i> Profile</span></a></li>
        <li class="side-option" ><a href="./shopping_cart.php"><i class="fa-solid fa-cart-shopping"></i> <span class="side-text">Cart</span></a></li>
        <li class="side-option" ><a href="./history.php"><i  class="fa-solid fa-clock-rotate-left"></i>  <span class="side-text">History</span></a></li>
        <li class="side-option" ><a href="about.php"><i class="fa-solid fa-circle-info"></i>  <span class="side-text">About</span></a></li>
    </ul>
    
    <a href="./logout.php" class="logout side-option"><span class="side-text">Log Out </span><i class="fa-solid fa-right-from-bracket"></i></a>
</div>';
    }

    function staffNav() {
        echo '<div class="sidenav">
                <ul id="sidenav-option">
                    <li><a href="./staff_menu.php"><h2 class="side-text">Sarjana</h2></a></li>
                    <li><a href="./staff_menu.php"><i class="fas fa-th-large"></i> <span class="side-text">Dashboard</span></a></li>
                    <li><a href="./addProduct.php"> <i class="fas fa-box"></i> <span class="side-text">Add Product</span></a></li>
                    <li><a href="./manageData.php"><i class="fa-solid fa-database"></i> <span class="side-text">Manage Data</span></a></li>
                    <li><a href="./pendingPage.php"><i class="fa-regular fa-clock"></i> <span class="side-text">Pending</span></a></li>
                </ul>
                <a href="./logout.php" class="logout"><span class="side-text">Log Out</span>  <i class="fa-solid fa-right-from-bracket"></i></a>
              </div>';
    }
?>


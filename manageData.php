<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://googleapis.com" />
    <link rel="stylesheet" href="styles.css">
    <title>Sarjana Minimart</title>
</head>
<body>
    <?php include("sidebar.php"); staffNav();?>
    <div class="side-margin manage-page">
        <div class="header">
            <h1 >Manage Data</h1>
            <i class="fa-solid fa-folder fa-2x"></i>
        </div>
        <div class="data-filter container">

            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search...">
            </div>

            <select name="" id="">
                <option value="product">Product</option>
                <option value="customer">Customer</option>
                <option value="staff">Staff</option>
                <option value="sale">Sales</option>
            </select>
            
        </div>
        <div class="data-list container">
            <?php 
            $items = ["Farm fresh original 1l"=>"./img/fresh_milk_1L.png",
                            "Farm fresh chocolate 1l"=>"./img/chocolate_milk.png",
                            "Biscuit Tiger"=>"./img/biscuit_tiger.png",
                            "Vico"=>"./img/Vico.png",
                            "Colgate Toothbrush"=>"./img/Colgate_toothbrush.png",
                            "Indomie"=>"./img/indomie-mi.png"];

            foreach($items as $key => $value) {
                include_once("card.php");
                createDataCard($key);
            }
            foreach($items as $key => $value) {
                include_once("card.php");
                createDataCard($key);
            }
            ?>
        </div>
        
        
    </div>
</body>
</html>
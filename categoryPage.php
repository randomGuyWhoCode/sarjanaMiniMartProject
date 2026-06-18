<?php 
include "header.php";
include_once "dbconn.php"; ?>
<div class="side-margin">
    <a onclick="history.back()" class="back-arrow">&#129144; Back</a>
    <div class="header">
        <label class="category-header">
            <h2>Category: </h2>
            <select name="category" id="category">
                <?php 
                include_once("pdoconn.php");
                if(!isset($_GET["category"])) {
                    $categoryID = "1";
                }else {
                    $categoryID = (String)$_GET["category"];
                }
                $db = new Database();
                $sql = "SELECT * FROM category";

                $category = $db->query($sql)->fetchAll();

                foreach ($category as $c) {
                    echo '<option value="' . $c["category_id"] . '" '. ($categoryID==$c["category_id"]?"selected":" ") .' > ' . $c["category_name"] . ' </option>';
                }


                // $sql = "SELECT * FROM category";
                // $query = mysqli_query($dbconn, $sql);
                // while($row_rs = mysqli_fetch_assoc($query)) {
                //     echo '<option value="' . $row_rs["category_id"] . '" '. ($_GET["category"]==$row_rs["category_id"]?"selected":" ") .' > ' . $row_rs["category_name"] . ' </option>';
                // }
                ?>
            </select>
        </label>
        <i class="fa-solid fa-list fa-2x"></i>
    </div>

    <div class="container category-page">
        
        <div class="card-items" id="category_items">
                <?php 
                include_once("card.php");
                include_once("dbconn.php");
                $sql = "SELECT * FROM product WHERE category_id = {$categoryID} ORDER BY RAND()";
                $query = mysqli_query($dbconn, $sql);
                while($row_rs = mysqli_fetch_assoc($query)) {
                    createCard($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"], $row_rs["product_dir"]);
                }
                ?>
        </div>
        
    </div>

    <div id="cartModal" class="modal" >
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            
            <h3 id="modal-product-name">Product Name</h3>
            <img id="modal-product-image" class="modal-product-image" src="img/default-image.png" alt="product image" >
            <p>Price: RM<span id="modal-product-price">0.00</span></p>
            
            <form id="modal-cart-form">
                <input type="hidden" id="modal-product-id" name="product_id">
                <label for="quantity">Quantity:</label>
                <input type="number" id="modal-quantity" name="quantity" value="1" min="1">
                <br>
                <button class="modal-btn" type="submit">
                    Confirm Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    let category = document.getElementById("category");
    let itemContainer = document.getElementById("category_items");

    

    category.onchange = ()=>{
        // loading
        itemContainer.innerHTML = '<i class="fa-solid fa-spinner fa-spin fa-2x"></i>';

        fetch('categoryPage0.php?category=' + category.value)
        .then(response => response.text())
        .then(html => {
            
            itemContainer.innerHTML = html;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            container.innerHTML = '<p>Something went wrong. Please try again.</p>';
        });
        
    }
</script>

<?php include "footer.php"; ?>
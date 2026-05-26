<?php 
include "header.php";
include_once "dbconn.php"; ?>
<a onclick="history.back()" class="back-arrow">&#129144; Back</a>
<div class="container category-page">
    <label class="category-header">
        <h1>Category: </h1>
        <select name="category" id="category">
            <?php 
                $sql = "SELECT * FROM category";
                $query = mysqli_query($dbconn, $sql);
                while($row_rs = mysqli_fetch_assoc($query)) {
                    echo '<option value="' . $row_rs["category_id"] . '"> ' . $row_rs["category_name"] . ' </option>';
                }
            ?>
        </select>
    </label>
    <div class="card-items" id="category_items">
            <?php 
                include_once("card.php");
                include_once("dbconn.php");
                $sql = "SELECT * FROM product WHERE category_id = 1 ORDER BY RAND()";
                $query = mysqli_query($dbconn, $sql);
                while($row_rs = mysqli_fetch_assoc($query)) {
                    createCard($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"], $row_rs["product_dir"]);
                }
            ?>
    </div>
    
</div>

<script>
    let category = document.getElementById("category");
    let itemContainer = document.getElementById("category_items");

    category.onchange = ()=>{
        //Remove all element within div
        itemContainer.replaceChildren();

        // fetch('categoryPage.php?val=' + category.value)
        // .then(response => response.text())
        // .then(data => console.log('Response from PHP:', data));

        // fetch('get_data.php', {
        // method: 'POST',
        // headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        // body: 'id=' + val
        // })
        // .then(response => response.text()) // Use .json() if PHP returns JSON
        // .then(data => {
        //     // Update your element with the data received from PHP
        //     document.getElementById('resultDisplay').innerHTML = data;
        // })
        // .catch(error => console.error('Error:', error));
        
    }
</script>

<?php include "footer.php"; ?>
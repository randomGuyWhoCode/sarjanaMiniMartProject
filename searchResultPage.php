<?php include "header.php"; ?>
<a onclick="history.back()" class="back-arrow">&#129144; Back</a>
<div class="container  search-page">
    <div class="header">
        <h2 >Search Result</h2>
        <i class="fas fa-search fa-2x"></i>
    </div>
    <div class="card-items" id="card-items">
        <?php
        include_once("pdoconn.php");
        include_once("card.php");
        $db = new Database();
        $sql = "SELECT * FROM product WHERE product_name LIKE ? OR selling_price LIKE ?";
        $data = $db->query($sql, [("%".$_POST["search"]."%"), ("%".$_POST["search"]."%")])->fetchAll();
        if (count($data) != 0) {
            foreach($data as $product) {
                createCard($product["product_id"], $product["product_name"], $product["selling_price"], $product["product_dir"]);
            }
        }else {
            echo "There are no record found...";
        }      
        ?>
    </div>

</div>
<script>
    const searchInput = document.getElementById("search-input");
    const container = document.getElementById("card-items");
    searchInput.addEventListener("input", ()=>{
        // loading
        container.innerHTML = '<i class="fa-solid fa-spinner fa-spin fa-2x"></i>';

        const params = new URLSearchParams({ "search":searchBar.value });
        fetch(`searchData.php?${params.toString()}`)
        .then(response =>  response.text())
        .then(data => {
            container.innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    })
</script>
<?php include "footer.php"; ?>
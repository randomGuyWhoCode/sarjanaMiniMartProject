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
            <h2 >Manage Data</h2>

            <i class="fa-solid fa-folder fa-2x"></i>
        </div>
        <div class="data-filter container">

            <div class="search-bar" id="search-bar">
                <input type="text" id="search-input" class="search-input" placeholder="Search...">
            </div>

            <select name="type" id="type">
                <option value="product">Product</option>
                <option value="customer">Customer</option>
                <option value="employee">Staff</option>
                <option value="sales">Sales</option>
            </select>
            
        </div>
        <div class="data-list container" id="data-list">
            <?php 
            // include_once("dbconn.php");
            include_once("card.php");
            include_once("pdoconn.php");

            
            // if(isset($_GET["search"])) {
            //     $sql = "SELECT * FROM product WHERE product_name LIKE '%?%'";
            //     $data = $db->query($sql, [(String)$_GET["search"]]);
            // }else {
            //     $sql = "SELECT * FROM product ORDER BY RAND()";
            //     $data = $db->query($sql);
            // }
            $db = new Database();
            $sql = "SELECT * FROM product ORDER BY RAND()";
            $data = $db->query($sql);
            foreach($data as $d) {
                createProductSlip($d["product_id"], $d["product_name"], $d["selling_price"]);
            }

            
            
            
            
            // Version 1
            // $sql = "SELECT * FROM product ORDER BY RAND()";
            // $query = mysqli_query($dbconn, $sql);
            // while($row_rs = mysqli_fetch_assoc($query)) {
            //     createProductSlip($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"]);
            // }
            ?>
        </div>
        
        
    </div>
    <script>
        const category = document.getElementById("type");
        const container = document.getElementById('data-list');
        document.getElementById('type').addEventListener('change', function() {
            const selectedType = this.value;
            
            
            // loading
            container.innerHTML = '<i class="fa-solid fa-spinner fa-spin fa-2x"></i>';

            // Fetch data 
            fetch('manageData0.php?type=' + selectedType)
            .then(response => response.text())
            .then(html => {

                container.innerHTML = html;

            })
            .catch(error => {
                console.error('Error fetching data:', error);
                container.innerHTML = '<p>Something went wrong. Please try again.</p>';
            });
        });

        const searchBar = document.getElementById("search-input");
        searchBar.addEventListener("input", ()=>{
            // loading
            container.innerHTML = '<i class="fa-solid fa-spinner fa-spin fa-2x"></i>';

            const params = new URLSearchParams({ "search":searchBar.value, "type":category.value });
            console.log(`searchData.php?${params.toString()}`);
            fetch(`searchData.php?${params.toString()}`)
            .then(response =>  response.text())
            .then(data => {
                container.innerHTML = data;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });  
        })

        category.addEventListener("change", ()=>searchBar.value="");
    </script>
</body>
</html>
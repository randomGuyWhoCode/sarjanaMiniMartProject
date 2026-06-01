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

            <select name="type" id="type">
                <option value="product">Product</option>
                <option value="customer">Customer</option>
                <option value="staff">Staff</option>
                <option value="sale">Sales</option>
            </select>
            
        </div>
        <div class="data-list container" id="data-list">
            <?php 
            include_once("dbconn.php");
            include_once("card.php");

            $sql = "SELECT * FROM product ORDER BY RAND()";
            $query = mysqli_query($dbconn, $sql);
            while($row_rs = mysqli_fetch_assoc($query)) {
                createProductSlip($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"]);
            }
            ?>
        </div>
        
        
    </div>
    <script>
        document.getElementById('type').addEventListener('change', function() {
            const selectedType = this.value;
            const container = document.getElementById('data-list');
            
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
    </script>
</body>
</html>
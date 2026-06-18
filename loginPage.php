<?php
// We temporarily call the Google client settings just to generate the dynamic login URL
require_once 'google-api/google-api/vendor/autoload.php';
include_once "dbconn.php";
include_once "pdoconn.php";

$client = new Google\Client();


$client->setClientId('');
$client->setClientSecret('');

$host = $_SERVER['HTTP_HOST'];
if ($host === 'localhost') {
    $client->setRedirectUri('http://localhost/sarjanaMiniMartProject/loginPage.php');
}

$client->addScope('email');
$client->addScope('profile');
$client->setPrompt('select_account');

// Generate the secure URL to redirect to Google
$login_url = $client->createAuthUrl();

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    if (!isset($token["error"])) {
        $client->setAccessToken($token['access_token']);
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        session_start();

        // Get user info from email
        $email = mysqli_real_escape_string($dbconn, trim($google_account_info->email));
        $id = $google_account_info->id;
        $name = $google_account_info->name;
        $profile_pic = $google_account_info->picture;

        // $_SESSION["name"] = $name;
        // $_SESSION["id"] = $id;
        // $_SESSION["email"] = $email;
        // $_SESSION["profile_pic"] = $profile_pic;


        // Check staff
        // $sql = "SELECT * FROM employee WHERE email = '$email'";
        // $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
        // if (mysqli_num_rows($query) != 0) {
        //     $r = mysqli_fetch_assoc($query);
            
        //     $_SESSION["name"] = $name;
        //     $_SESSION["id"] = $id;
        //     $_SESSION["email"] = $email;
        //     $_SESSION["profile_pic"] = $profile_pic;
        //     $_SESSION["is_staff"] = true;

        //     echo "<script>console.log({$_SESSION['studentnumber']});</script>";
            
        //     // Redirect to staff menu
        //     header("Location: staff_menu.php");
        //     // header("Location: index.php");
        //     exit();
        // }


        // Search your database using only the email address
        $sql = "SELECT * FROM dbstudentsphg.students WHERE studentemailuitm = '$email'";
        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
        
        if (mysqli_num_rows($query) == 0) {
            // Unregistered email
            echo "<script>alert('Your Google account is not registered as a student!'); window.location='login.php';</script>";
            exit();
        } else {
            $r = mysqli_fetch_assoc($query);

            $_SESSION["name"] = $r['studentname'];
            $_SESSION["id"] = $r['studentno'];
            $_SESSION["email"] = $email;
            $_SESSION["programcode"] = $r['programcode'];
            $_SESSION["profile_pic"] = $profile_pic;
            $_SESSION["is_staff"] = false;

            $db = new Database();
            $sql = "SELECT * FROM shopping_cart WHERE studentno  = ? AND active = 1";
            $data = $db->query($sql, [$_SESSION["id"]])->fetch();
            if ($data) {
                $_SESSION["cart_id"] = $data["cart_id"];
            }


            // $sql = "SELECT * FROM shopping_cart WHERE studentno  = {$_SESSION["id"]} AND active = 1";
            // $query = mysqli_query($dbconn, $sql)  or die ("Error: " . mysqli_error($dbconn));
            // $row = mysqli_num_rows($query);
            // if($row === 0) {
            //     $_SESSION["cart"] = [];
            // }else {
            //     $items = [];
            //     //get cart id
            //     $cart = mysqli_fetch_assoc($query);
            //     $cart_id = $cart["cart_id"];

            //     //get all item in cart
            //     $sql = "SELECT * FROM cart_item WHERE cart_id = {$cart_id}";
            //     $query = mysqli_query($dbconn, $sql)  or die ("Error: " . mysqli_error($dbconn));
            //     while($row_rs = mysqli_fetch_assoc($query)) {
            //         $items[] = [$row_rs["product_id"]->$row_rs["quantity"]];
            //     }
            //     print_r($items);
            //     $_SESSION["cart"][] = $items;
            // }
            
            // Redirect to menu
            header("Location: index.php");
            exit();
        }
    } else {
        echo "Error fetching access token.";
        exit();
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarjana Minimarket</title>
</head>
<body class="login-background">
    <div class="login-page">
        
        <img src="./img/Sarjana-Logo.png" alt="Company logo">
        <div class="horizontal-line"></div>
            
        <div class="login-form">
            <h1><i class="fa fa-user" aria-hidden="true"></i> LOG IN </h1>

            <div class="button-container">
                <a href="<?php echo $login_url; ?>" class="google-login-button" style="text-decoration: none;">
                    <label><i class="fa fa-google google-icon" aria-hidden="true"></i> Log In with Google</label>
                </a>
                <div class="separator">Or</div>
                <a class="underline" href="./index.php">Continue as guest...</a>
            </div>

        </div>
        

    </div>
    <script>
        function handleCredentialResponse(response) {
        console.log("Encoded JWT ID token: " + response.credential);

        // Send to your PHP backend
        fetch("google-login.php", {
            method: "POST",
            headers: {
            "Content-Type": "application/json"
            },
            body: JSON.stringify({ token: response.credential })
        })
        .then(res => res.text())
        .then(data => {
            console.log(data);
            window.location.href = "index.php";
        });
        } 
    </script>
</body>
</html>


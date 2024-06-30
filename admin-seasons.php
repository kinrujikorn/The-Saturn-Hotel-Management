<?php
$servername = "127.0.0.1";  
$username = "root";   
$password = "";    
$dbname = "hotel_db"; 

// Create a connection to MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widp=device-widp, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Admin Seasons</title>
    <style>
        html {
            display: block;
            margin: auto;
        }

        h1 {
            text-align: start;
            font-size: 30px;
            padding: 20px;
            margin-left: 150px;
        }

        table {
            font-family: arial, sans-serif;
            text-align: start;
            border-collapse: collapse;
            width: 100%;
        }

        p {
            padding: 10px;
            padding-top: 20px;
            text-align: start;
        }

        /* p {
            border-bottom: 1px solid #dddddd;
            padding: 10px;
            padding-top: 20px;
            padding-bottom: 20px;
        } */

        /* p,
        p {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        } */

        /* tr:np-child(even) {
            background-color: #dddddd;
        } */

        .liststy {
            border-bottom: 1px solid rgb(222, 215, 215);
            border-radius: 10px; 
            display: flex;
            max-width: 80%;
            justify-content: center;
            align-items: center;
            margin: auto;
        }
        .numsty {
            text-align: center;
        }

        button {
      margin-left: 900px;
      padding: 10px 20px;
      background-color:  #dab894;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #F1DCC5;
    }

    </style>
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="menu-item" style="padding-top: 10px;padding-bottom: 10px;box-shadow: 0px 10px 10px rgba(36, 11, 12, 0.03);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                        <div class="logo">
                            <a href="./index.php">
                                <img widp="100px" src="./img/Logo the saturn hotel.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-11">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                   <li><a href="./adminIndex.php">Home</a></li>
                                   <li><a href="./admin-room-list.php">Rooms</a></li>
                                   <li><a href="./admin-booking.php">Booking</a></li>
                                   <li><a href="./admin-payment.php">Payment</a></li> 
                                   <li><a href="./admin-customer.php">Customer</a></li> 
                                   <li class="active"><a href="./admin-seasons.php">Seasons</a></li>  
                                   <li><a href="./admin-staff.php">Staff</a></li>
                                   <li><a href="./analysis-report.php">Analysis Report</a></li>   
                                   <li><a href="./login-staff.php">Logout</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    
    <div>
        <h1>Seasons  <a href="./season-form.php"><button>Season Form</button></a></h1>
        <?php
        $sql = "SELECT * FROM season_info";

        // Execute the query and get the result
        $result = mysqli_query($conn, $sql);

        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
        // Start creating the HTML output
        echo '<div class="row" style="border-radius: 10px; display: flex; background-color: #F3EEE8; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">';
        echo '<p class="col-lg-2">Season ID</p>';
        echo '<p class="col-lg-2">Season Name</p>';
        echo '<p class="col-lg-2">Start Date</p>';
        echo '<p class="col-lg-2">End Date</p>';
        echo '<p class="col-lg-2">Season Discount</p>';
        echo '</div>';
    // Loop through the rows and display the data
        while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="row" style="border-radius: 10px; display: flex; background-color: #FFFFFF; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">';
        echo '<p class="col-lg-2">' . $row["season_ID"] . '</p>';
        echo '<p class="col-lg-2">' . $row["season_name"] . '</p>';
        echo '<p class="col-lg-2">' . $row["start_date"] . '</p>';
        echo '<p class="col-lg-2">' . $row["end_date"] . '</p>';
        echo '<p class="col-lg-2">' . $row["season_discount"] . '</p>';
        echo '</div>';
        }
        } else {
        echo "No data found in the 'customers_info' table.";
        }
        ?>

    </div>
</body>

</html>
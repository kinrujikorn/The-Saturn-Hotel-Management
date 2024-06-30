
<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
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
    <title>Analysis Report</title>
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

        a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

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


    .previous {
    background-color: #f1f1f1;
    color: black;
    }

    .next {
    background-color: #E6BC8B;
    color: white;
    }

    .round {
    border-radius: 50%;
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
                                   <li><a href="./admin-seasons.php">Seasons</a></li>
                                   <li class="active"><a href="./analysis-report.php">Analysis Report</a></li>   
                                   <li><a href="./login-staff.php">Logout</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Header -->

    </header>
    <div>
       <h1>Analysis Report 1: The most popular room types are reserved during low season and high season.
       <a href="#" class="previous round">&#8249;</a>
       <a href="./analysis-report-2.php" class="next round">&#8250;</a>
        <p>The most popular room types are reserved during low season and high season.</p>
        </h1>
    <thead>
      
      <div class="row" style="border-radius:10px; display: flex; background-color: #F3EEE8; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">
        <p class="col-lg-2">Room Type</p>
        <p  class="col-lg-2">Season</p>
        <p class="col-lg-2">Usage Count</p>
        </div>
      
    </thead>
        
<?php
        $query = "
SELECT rt.room_type_name, si.season_name, COUNT(*) AS usage_count
FROM room_types_table rt
JOIN room_info r ON rt.room_type_ID = r.room_type_ID
JOIN room_reserved rr ON r.room_id = rr.room_id
JOIN reservation_table res ON rr.reserve_ID = res.reserve_ID
JOIN season_info si ON res.check_in_date BETWEEN si.start_date AND si.end_date
GROUP BY rt.room_type_name, si.season_name;
";

// Execute the query
$result = $con->query($query);

// Check if there are any results
if ($result->num_rows > 0) {
    // Start creating the HTML table
    echo "<table>";
    echo "<tbody>";

    // Fetch and display each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="row" style="border-radius: 10px; display: flex; background-color: #FFFFFF; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">';
        echo '<p class="col-lg-2">' . $row["room_type_name"] . "</p>";
        echo '<p class="col-lg-2">' . $row["season_name"] . "</p>";
        echo '<p class="col-lg-2">' . $row["usage_count"] . "</p>";
        echo "</div>";
    }

    // Close the table
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No results found.";
}

// Close the connection
$con->close();
?>
        
        </div>
    </div>
    <div style="margin-left:200px; margin-bottom: 120px;"> 
</div>
</body>
</html>
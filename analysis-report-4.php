<?php
$con = mysqli_connect("localhost", "root", "", "hotel_db");

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
    <title>Analysis 4</title>
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
                                   <li class="active"><a href="./analysis-report-4.php">Analysis Report</a></li>   
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
       <h1>Analysis Report 4: Monthly sale of each room type. 
       <a href="./analysis-report-3.php" class="previous round">&#8249;</a>
        <p>Monthly sale of each room type in the year. .</p>
        </h1>
        <div style="text-align: center;">
    <thead>
      
      <div class="row" style="border-radius:10px; display: flex; background-color: #F3EEE8; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">
        <p class="col-lg-2">Room Type</p>
        <p  class="col-lg-2">Month</p>
        <p class="col-lg-2">Month Sale</p>
        </div>
      
    </thead>
    <?php
    $sql = "
SELECT rt.room_type_name, MONTHNAME(res.check_in_date) AS month, COUNT(*) AS monthly_sale
FROM room_types_table rt
JOIN room_info r ON rt.room_type_ID = r.room_type_ID
JOIN room_reserved rr ON r.room_id = rr.room_id
JOIN reservation_table res ON rr.reserve_ID = res.reserve_ID
WHERE YEAR(res.check_in_date) = 2023
GROUP BY rt.room_type_name, MONTH(res.check_in_date)
ORDER BY MONTH(res.check_in_date), rt.room_type_name";

try {
    // Execute the query
    $result = mysqli_query($con, $sql);

    // Display the results
    echo '<table>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="row" style="border-radius: 10px; display: flex; background-color: #FFFFFF; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">';
        echo '<p class="col-lg-2">' . $row['room_type_name'] . '</p>';
        echo '<p class="col-lg-2">' . $row['month'] . '</p>';
        echo '<p class="col-lg-2">' . $row['monthly_sale'] . '</p>';
        echo '</div>';
    }
    echo '</table>';

    // Free the result set
    mysqli_free_result($result);

    // Close the connection
    mysqli_close($con);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
}
?>
</div>

        
        </div>
    </div>
    <div style="margin-left:145px; margin-bottom: 120px;"> 
</div>

</body>
</html>
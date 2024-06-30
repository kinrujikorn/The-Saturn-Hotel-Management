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
    <title>Analysis Report 2</title>
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
        

    .row p {
        flex: 1;
        text-align: center;
        margin: 0;
    }

    .liststy {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        max-width: 80%;
    }

    .liststy p {
        flex: 1;
        text-align: center;
        margin: 0;
    }
    
    a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
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
<h1>Analysis Report 2: Top 10 spender customers.
<a href="./analysis-report.php" class="previous round">&#8249;</a>
       <a href="./analysis-report-3.php" class="next round">&#8250;</a>
       <p>Top 10 spender customers who visited the hotel most.</p>
    </h1>
    <thead>
      
      <div class="row" style="border-radius:10px; display: flex; background-color: #F3EEE8; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">
        <p class="col-lg-2">Customer Name</p>
        <p  class="col-lg-2">Room Type Name</p>
        <p class="col-lg-2">Total Low Season Bookings</p>
        <p class="col-lg-2">Total High Season Bookings</p>
        <p class="col-lg-2">Customer Total Spending</p>
        </div>
      
    </thead>
    <div style="text-align: center;">

<?php
$sql = "
SELECT
    t.customer_fName,
    t.room_type_name,
    t.total_low_season_bookings,
    t.total_high_season_bookings,
    s.customer_total_spending
FROM (
    SELECT
        c.customer_fName,
        rt.room_type_name,
        SUM(CASE WHEN si.season_name = 'LowSeason' THEN 1 ELSE 0 END) AS total_low_season_bookings,
        SUM(CASE WHEN si.season_name = 'HighSeason' THEN 1 ELSE 0 END) AS total_high_season_bookings
    FROM
        customer_info c
        JOIN reservation_table r ON c.customer_id = r.customer_id
        JOIN invoicing_table i ON r.reserve_id = i.reserve_id
        JOIN season_info si ON r.check_in_date BETWEEN si.start_date AND si.end_date
        JOIN room_reserved rr ON r.reserve_id = rr.reserve_id
        JOIN room_info ri ON rr.room_id = ri.room_id
        JOIN room_types_table rt ON ri.room_type_ID = rt.room_type_ID
    GROUP BY
        c.customer_id,
        c.customer_fName,
        rt.room_type_name

) t
JOIN (
    SELECT
        c.customer_fName,
        SUM(i.net_total) AS customer_total_spending
    FROM
        customer_info c
        JOIN reservation_table r ON c.customer_id = r.customer_id
        JOIN invoicing_table i ON r.reserve_id = i.reserve_id
    GROUP BY
        c.customer_id,
        c.customer_fName
 
) s ON t.customer_fName = s.customer_fName
ORDER BY s.customer_total_spending DESC

LIMIT 10";

try {
    // Execute the query
    $result = mysqli_query($con, $sql);

    // Display the results
    echo '<table>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="row" style="border-radius: 10px; display: flex; background-color: #FFFFFF; color: black; max-width: 80%; justify-content: center; align-items: center; margin: auto;">';
        echo '<p class="col-lg-2">' . $row['customer_fName'] . '</p>';
        echo '<p class="col-lg-2">' . $row['room_type_name'] . '</p>';
        echo '<p class="col-lg-2">' . $row['total_low_season_bookings'] . '</p>';
        echo '<p class="col-lg-2">' . $row['total_high_season_bookings'] . '</p>';
        echo '<p class="col-lg-2">' . $row['customer_total_spending'] . '</p>';
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


    <div style="margin-left:145px; margin-bottom: 120px;"> 
</div>
</body>
</html>

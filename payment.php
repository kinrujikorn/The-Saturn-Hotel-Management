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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Css Styles -->
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
    <style>
    
        /* Bordered form */
form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #DFA974;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 15%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 14px 20px;
  margin: 8px 0;
  border-color: rgb(113, 112, 112) ;
  border: solid 0.4px;
  cursor: pointer;
  width: 15%;
  color:black;
  background-color: #ffffff;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}

/*
  Common invoice styles. These styles will work in a browser or using the HTML
  to PDF anvil endpoint.
*/

body {
  font-size: 16px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table tr td {
  padding: 0;
}

table tr td:last-child {
  text-align: right;
}

.bold {
  font-weight: bold;
}

.right {
  text-align: right;
}

.large {
  font-size: 1.75em;
}

.total {
  font-weight: bold;
  color: #fb7578;
}

.logo-container {
  margin: 20px 0 70px 0;
}

.invoice-info-container {
  font-size: 0.875em;
}
.invoice-info-container td {
  padding: 4px 0;
}

.client-name {
  font-size: 1.5em;
  vertical-align: top;
}

.line-items-container {
  margin: 70px 0;
  font-size: 0.875em;
}

.line-items-container th {
  text-align: left;
  color: #999;
  border-bottom: 2px solid #ddd;
  padding: 10px 0 15px 0;
  font-size: 0.75em;
  text-transform: uppercase;
}

.line-items-container th:last-child {
  text-align: right;
}

.line-items-container td {
  padding: 15px 0;
}

.line-items-container tbody tr:first-child td {
  padding-top: 25px;
}

.line-items-container.has-bottom-border tbody tr:last-child td {
  padding-bottom: 25px;
  border-bottom: 2px solid #ddd;
}

.line-items-container.has-bottom-border {
  margin-bottom: 0;
}

.line-items-container th.heading-quantity {
  width: 50px;
}
.line-items-container th.heading-price {
  text-align: right;
  width: 100px;
}
.line-items-container th.heading-subtotal {
  width: 100px;
}

.payment-info {
  width: 38%;
  font-size: 2.5em;
  line-height: 1.5;
}

.footer {
  margin-top: 100px;
}

.footer-thanks {
  font-size: 1.125em;
}

.footer-thanks img {
  display: inline-block;
  position: relative;
  top: 1px;
  width: 16px;
  margin-right: 4px;
}

.footer-info {
  float: right;
  margin-top: 5px;
  font-size: 0.75em;
  color: #ccc;
}

.footer-info span {
  padding: 0 5px;
  color: black;
}

.footer-info span:last-child {
  padding-right: 0;
}

.page-container {
  display: none;
}
    </style>
</head>
<body>

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
       <div class="menu-item">
           <div class="container">
               <div class="row">
                   <div class="col-lg-2">
                       <div class="logo">
                           <a href="./index.html">
                               <img width="100px" src="./img/Logo the saturn hotel.png" alt="">
                           </a>
                       </div>
                   </div>
                   <div class="col-lg-10">
                       <div class="nav-menu">
                           <nav class="mainmenu">
                               <ul>
                                   <li><a href="./index.php">Home</a></li>
                                   <li><a href="./rooms.php">Rooms</a></li>
                                   <li><a href="./about-us.php">About Us</a></li>
                                   <li class="active"><a href="./payment.php">Payment</a></li>
                               </ul>
                           </nav>
                           <div class="nav-right search-switch">
                               <i class="icon_search"></i>
                       </div>
                   </div>
               </div>
           </div>
       </div>

  <div>     
   </header>
   <!-- Header End -->
       <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
              <title></title>
              <meta name="description" content="">
              <meta name="viewport" content="width=device-width">

              <link rel="stylesheet" href="css/normalize.css">
              <link rel="stylesheet" href="css/main.css">
              <script src="js/vendor/modernizr-2.6.2.min.js"></script>
       </head>
    <body>

<form name="inpfrm" method="post" action="InsertInvoice.php", class="container">
       <div class="header">
    <div class="reserve_ID" style="font-weight: bold;">Reserve ID:</div>
    <?php
    $sql = "SELECT reserve_ID FROM reservation_table ORDER BY reserve_ID DESC LIMIT 1";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $reserveID = $row['reserve_ID'];
        echo $reserveID;
    } else {
        echo "No invoice found.";
    }
    ?>
</div>

<?php
  $nights_query = "SELECT res.check_in_date, res.check_out_date, DATEDIFF(res.check_out_date, res.check_in_date) as total_nights
    FROM reservation_table res
    WHERE res.reserve_ID = '$reserveID';";
  $nights_query_r = mysqli_query($con, $nights_query)
?>

<div class="header">
    <div class="reserve_ID " style="font-weight: bold;">Date informations:</div>
      <table>
      <?php while($nights_row = mysqli_fetch_array($nights_query_r)):;?>
        <tr>
          <td style="text-align:left">From: <?php echo $nights_row[0];?>&emsp;&emsp;To: <?php echo $nights_row[1];?>&emsp;&emsp;Nights: <?php echo $nights_row[2];?></td>
        </tr>
      <?php endwhile;?>
      </table>
</div>

<?php
    $rooms_reserved_q = "SELECT rr.room_ID, ri.room_floor, ri.room_number, rt.price
      FROM room_reserved rr
      JOIN room_info ri ON rr.room_ID = ri.room_ID
      JOIN room_types_table rt ON ri.room_type_ID = rt.room_type_ID
      WHERE rr.reserve_ID = '$reserveID';";
    $rooms_reserved_r = mysqli_query($con, $rooms_reserved_q);
?>

<div class="header">
    <div class="reserve_ID " style="font-weight: bold;">Room reserved:</div>
      <table>
      <?php while($rooms_row = mysqli_fetch_array($rooms_reserved_r)):;?>
        <tr>
          <td style="text-align:left">ROOM <?php echo $rooms_row[1];?>0<?php echo $rooms_row[2];?>................$<?php echo $rooms_row[3];?></td>
        </tr>
      <?php endwhile;?>
      </table>
</div>

<?php
    $sub_tot_q = "SELECT ROUND(SUM(rt.price * DATEDIFF(res.check_out_date, res.check_in_date)), 2) AS total_price
    FROM room_reserved rr
    JOIN room_info ri ON rr.room_ID = ri.room_ID
    JOIN room_types_table rt ON ri.room_type_ID = rt.room_type_ID
    JOIN reservation_table res ON res.reserve_ID = '$reserveID'
    WHERE rr.reserve_ID = '$reserveID';";
    $sub_tot_r = mysqli_query($con, $sub_tot_q);
?>

<div class="header">
    <div class="Sub total " style="font-weight: bold;">Sub Total:</div>
    <table>
      <?php $sub_row = mysqli_fetch_array($sub_tot_r);?>
        <tr>
          <td style="text-align:left">$<?php echo $sub_row[0];?></td>
        </tr>
    </table>
</div>

<?php
  $net_tot_q = "SELECT ROUND((total_price - (total_price * (si.season_discount/100))), 2) AS net_price
  FROM (
    SELECT ROUND(SUM(rt.price * DATEDIFF(res.check_out_date, res.check_in_date)), 2) AS total_price
    FROM room_reserved rr
    JOIN room_info ri ON rr.room_ID = ri.room_ID
    JOIN room_types_table rt ON ri.room_type_ID = rt.room_type_ID
    JOIN reservation_table res ON res.reserve_ID = '$reserveID'
    WHERE rr.reserve_ID = '$reserveID'
  ) AS t
  JOIN reservation_table res ON res.reserve_ID = '$reserveID'
  JOIN season_info si ON res.season_ID = si.season_ID;";
  $net_tot_r = mysqli_query($con, $net_tot_q);
?>

<div class="header">
    <div class="Net total " style="font-weight: bold;">Net Total:</div>
    <table>
      <?php $net_row = mysqli_fetch_array($net_tot_r);?>
        <tr>
          <td style="text-align:left">$<?php echo $net_row[0];?></td>
        </tr>
    </table>
</div>

</div>
            </div>
            <div class="clear"></div>
            </div>
            <label for="payment_method">Payment Method:</label>
           
            <div class="col-lg-6">
            <select name="paymentmethod" class="form-input" >
              <option value="">Please select one...</option>
              <option value="PAY001">Cash</option>
              <option value="PAY002">Credit Card</option>
            </select>
            </div>
            <div class="container">
              <input name="reserve_ID" type="hidden" value="<?php echo $reserveID; ?>">
              <input name="sub_total" type="hidden" value="<?php echo $sub_row[0]; ?>">
              <input name="net_total" type="hidden" value="<?php echo $net_row[0]; ?>">
            </div>
            <div class="submit clear right">
                <input name="CONFIRM" type="submit" id="INSERT" value="CONFIRM">
            </div>
        </form>

        

</div>    

<div style="margin-left:120px; margin-bottom: 500px;"> 
      </div>
</div>

</body>
</html>
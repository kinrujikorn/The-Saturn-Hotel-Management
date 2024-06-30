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
   </header>
   <!-- Header End -->
    
        <h1 style="text-align: center;">
            Payment
        </h1>
        <form name="inpfrm" method="post" action="InsertCreditInfo.php">
        <div class="container">
        <!--Payment begin-->
                          <div class="col-5">
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                              <i class="fa fa-cc-visa" style="color:navy;"></i>
                              <i class="fa fa-cc-amex" style="color:blue;"></i>
                              <i class="fa fa-cc-mastercard" style="color:red;"></i>
                              <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cfname">Card First Name</label>
                            <input type="text" id="cname" name="fname" placeholder="First Name">

                            <label for="clname">Card Last Name</label>
                            <input type="text" id="cname" name="lname" placeholder="Last Name">

                            <label for="cnum">Credit card number</label>
                            <input type="text" id="ccnum" name="card_num" placeholder="1111-2222-3333-4444">

                            <label for="expmonth">Card Expiration Date</label>
                            <input type="text" class="date-input" id="expdate" name="card_exp" placeholder="Please select the first day of the expiration month.">

                            <input name="CONFIRM" type="submit" id="INSERT" value="INSERT" />
                        </form>
                          </div>
                        </div>
                      </div>

                   
                  </div>
                </div>
          
      <!--Payment end-->
     
            <!--cart begin-->
             <div class="col-25">
                   <div class="container">
                     <!-- <h4>Your room -->
                       
                     <!-- </h4> -->
         
                     <!-- <p><a href="#">Room price (1room and 1 night)</a> <span class="price">$259.09</span></p> -->
                     <!-- <p><a href="#">Discount</a> <span class="price">$14.39</span></p> -->
                     <!-- <p><a href="#">Addional requirements</a> <span class="price">$20.15</span></p> -->
                     <!-- <hr> -->
                     <!-- <p>Final Price <span class="price" style="color:black"><b>$264.85</b></span></p> -->
                        <!-- <button type="submit">Confirm</button> -->

      </div>
      <div style="margin-left:120px; margin-bottom: 120px;"> 
       </a>
      </div>
    </div>
  </div>
<!--cart end-->
     
    
    
    <!-- Footer Section Begin -->
  <footer class="footer-section">
      <div class="container">
          <div class="footer-text">
              <div class="row">
                  <div class="col-lg-7">
                      <div class="ft-about">
                          <div class="logo">
                              <a href="#">
                                  <img src="./img/Logo the saturn hotel.png" alt="" width="200px">
                              </a>
                          </div>
                          <p>We inspire and reach millions of travelers<br /> across 90 local websites</p>
                      </div>
                  </div>
                  <div class="col-lg-3 offset-lg-1">
                      <div class="ft-contact">
                          <h6>Contact Us</h6>
                          <ul>
                              <li>(12) 345 67890</li>
                              <li>TheSaturnHotel@gmail.com</li>
                              <li>856 Cordia Extension Apt. 356, Lake, United State</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
  </footer>
  <!-- Footer Section End -->
  <!-- Js Plugins -->
  <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
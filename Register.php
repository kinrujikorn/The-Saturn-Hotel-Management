

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

 /* Add custom CSS styles for form inputs */
 .form-input {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-family: inherit;
        font-size: inherit;
    }
.error-message {
      color: red;
}
    </style>
</head>
<body>
    <div class="menu-item" style="box-shadow: 0px 12px 15px rgba(36, 11, 12, 0.05);">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="img/Logo the saturn hotel.png" alt="" width="200">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <!-- <div class="logo">
                            <a href="./index.html">
                                <img src="img/Logo the saturn hotel.png" alt="" width="200">
                            </a>
                        </div> -->
                        <nav class="mainmenu">
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <li><a href="./rooms.php">Rooms</a></li>
                               <li><a href="./about-us.php">About Us</a></li>
                                <!-- <li><a href="./pages.html">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="./room-details.html">Room Details</a></li>
                                        <li><a href="./blog-details.html">Blog Details</a></li>
                                        <li><a href="#">Family Room</a></li>
                                        <li><a href="#">Premium Room</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li><a href="./blog.html">News</a></li> -->
                                <li><a href="./contact.php">Contact</a></li> 
                                <li class="active"><a href="./login-register.php">Login/Register</a></li> 
                            </ul>
                        </nav>
                        <div class="nav-right search-switch">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form -->
        <form name="inpfrm" method="post" action="InsertRegister.php">
        <h1 style="text-align: center;">
            Register 
        </h1>
        <div class="container">
            <div class="col-lg-20 offset-lg-0">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Your Email" name="email" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Your Password" name="psw" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="fname"><b>First Name</b></label>
                        <input type="text" placeholder="Enter Your First Name" name="fname" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="lname"><b>Last Name</b></label>
                        <input type="text" placeholder="Enter Your Last Name" name="lname" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="pn"><b>Phone Number</b></label>
                        <input type="text" placeholder="Enter Your Phone Number" name="phonenumber" required>
                    </div>

            
                    <div class="col-lg-6">
                        <label for="gender"><b>Gender:</b></label>
                        <select name="gender" class="form-input">
                            <option value="">Please select one...</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="non-binary">Non-Binary</option>
                            <option value="other">Other</option>
                            <option value="Prefer not to answer">Prefer not to Answer</option>
                        </select>
                    </div>
                </div>
            </div>
            
         <div style="margin-left:190px; margin-bottom: 10px;"> 
        </a>
        </div>
        <!--<a href="./login-register.html"><button type="submit">Confirm</button></a>-->
        <tr>
		<td height="30" align="right" ></td>
	    <td width="100" align="right"><input name="INSERT" type="submit" id="INSERT" value="INSERT" /></td>
	    </tr>
        
        
        
        
        <a href="./index.php"><button type="button" class="cancelbtn">Cancel</button></a>
        </div>
        
        <div style="margin-left:120px; margin-bottom: 120px;"> 
        if you haven't registered yet <a href="./register.php">
            Register
        </a>
        </div>
        

        <div style="margin-left:190px; margin-bottom: 150px;"> 
        </a>
        </div>
      <!-- </form> -->
      
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
</body>
</html>
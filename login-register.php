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
    <title>Login (user)</title>
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
.error-message {
      color: red;
}
    </style>

<script>
    function displayAlert() {
      alert('Invalid username/email or password.');
    }
  </script>

</head>
<body>

<!-- Header Section Begin -->
<header class="menu-item" style="padding-top: 10px;padding-bottom: 10px;box-shadow: 0px 10px 10px rgba(36, 11, 12, 0.03);">
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="./index.php">
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
                                <li><a href="./contact.php">Contact</a></li>
                                <li class="active"><a href="./login-register.php">Login/Register</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
    
        <h1 style="text-align: center;">
            Login 
        </h1>
        <form action="login.php" method="POST">
        <div class="container">
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Your Email" name="email" required>

          <label for="psw"><b>Password</b></label>
          <?php
         if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo "<input type='password' placeholder='Enter Your Password' name='psw' required>
              <p class='error-message'>Invalid username/email or password.</p>";
         } else {
         echo "<input type='password' placeholder='Enter Your Password' name='psw' required>";
        }
        ?>

          <button type="submit">Login</button>

          <!-- <a href="./index.html"><button type="submit">Login</button></a> -->
           <a href="./index.php"><button type="button" class="cancelbtn">Cancel</button></a>  
        </div>
        
       

        <div style="margin-left:380px; margin-bottom: 120px;"> 
        if you haven't registered yet <a href="./Register.php">
            Register
        </a>
        </div>
        </form>

        <div style="margin-left:1300px; margin-bottom: 100px; margin-top: -100px"> 
        Staff Login here <a href="./login-staff.php">
            Login for staff 
        </a>
        </div>
      
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
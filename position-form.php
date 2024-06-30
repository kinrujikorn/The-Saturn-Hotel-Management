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
    <title>Staff Form</title>
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
                                <li><a href="./staff-form.php">Staff Form</a></li>
                                    <li class="active"><a href="./position-form.php">Position Form</a></li>
                                    <li><a href="./houseKeepingForm.php">Housekeeping Form</a></li>
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
        <h1>Position Form</h1>
        <div>
         <!-- form -->
         <form name="inpfrm" method="post" action="InsertPosition.php">
        <div class="container">
            <div class="col-lg-20 offset-lg-0">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="positionname"><b>Position Name</b></label>
                        <input type="text" placeholder="Enter Position Name" name="positionname" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="positiondetails"><b>Position Details</b></label>
                        <input type="text" placeholder="Enter Position Details" name="positiondetails" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="positioncount"><b>Position Count</b></label>
                        <input type="text" placeholder="Enter Position Count" name="positioncount" required>
                    </div>
            
                </div>
            </div>
            
            <div style="margin-left:200px; margin-bottom: 10px;"> 
            </a>
         </div>
        <!--<a href="./login-register.html"><button type="submit">Confirm</button></a>-->
        <tr>
		<td height="30" align="right" ></td>
	    <td width="100" align="right"><input name="INSERT" type="submit" id="INSERT" value="INSERT" /></td>
	    </tr>
        
        
        
        
        <a href="./admin-staff.php"><button type="button" class="cancelbtn">Back</button></a>
          <!-- <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label> -->
        </div>
        <div style="margin-left:190px; margin-bottom: 150px;"> 
        </a>
        </div>
      <!-- </form> -->
    </div>
</body>

</html>
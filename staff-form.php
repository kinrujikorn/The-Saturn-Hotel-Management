
<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$hotel_query = "SELECT * FROM `hotel_info`";
$position_query = "SELECT * FROM `position_info`";

$hotel_results = mysqli_query($con, $hotel_query);
$position_results = mysqli_query($con, $position_query);
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
                                <li class="active"><a href="./staff-form.php">Staff Form</a></li>
                                    <li><a href="./position-form.php">Position Form</a></li>
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
        <h1>Staff Form</h1> 
        <div>
        <!-- form -->
        <form name="inpfrm" method="post" action="InsertStaff.php">
        <div class="container">
            <div class="col-lg-20 offset-lg-0">
                <div class="row">
                    <div class="col-lg-6">
                    <label for="HotelID"><b>Hotel ID</b></label>
                    <select name = "hotel_ID" required>
                    <option value = "" >---Please select Hotel---</option>
                    <?php while($hotel_row = mysqli_fetch_array($hotel_results)):;?>
                    <option value="<?php echo $hotel_row[0];?>"> <?php echo $hotel_row[0];?> <?php echo $hotel_row[2];?> </option>
                    <?php endwhile;?>
                    </select>
                    </div>

                    <div class="col-lg-7">
                        <label for="StaffFullName"><b>Staff Full Name</b></label>
                        <input type="text" placeholder="Enter Staff Full Name" name="stafffullname" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="StaffLastName"><b>Staff Last Name</b></label>
                        <input type="text" placeholder="Enter Last Name" name="stafflastname" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="StaffAddress"><b>Staff Address</b></label>
                        <input type="text" placeholder="Enter Staff Address" name="staffaddress" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="StaffEmail"><b>Staff Email</b></label>
                        <input type="text" placeholder="Enter Staff Email" name="staffemail" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="StaffPhone"><b>Staff Phone</b></label>
                        <input type="text" placeholder="Enter Staff Phone" name="staffphone" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="gender"><b>Staff Gender:</b></label>
                        <select name="staffgender" class="form-input">
                            <option value="">Please select one...</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="other">Other</option>
                            <option value="Prefer not to answer">Prefer not to Answer</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="StaffSalary"><b>Staff Salary</b></label>
                        <input type="text" placeholder="Enter Staff Salary" name="staffsalary" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="Staffpassword"><b>Staff Password</b></label>
                        <input type="text" placeholder="Enter Staff Password" name="staffpassword" required>
                    </div>

                    
                    
                    <div class="col-lg-6">
                    <label for="PositionID"><b>Position ID</b></label>
                    <select name = "positionID" required>
                    <option value = "" >---Please select Position---</option>
                    <?php while($position_row = mysqli_fetch_array($position_results)):;?>
                    <option value="<?php echo $position_row[0];?>"> <?php echo $position_row[0];?> <?php echo $position_row[2];?> </option>
                    <?php endwhile;?>
                    </select>
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
        </div>
        <div style="margin-left:190px; margin-bottom: 150px;"> 
        </a>
        </div>
      <!-- </form> -->
    </div>
</body>

</html>
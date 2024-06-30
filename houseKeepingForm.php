<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "hotel_db";

$connect = mysqli_connect($hostname, $username, $password, $databasename);
$staff_query = "SELECT * FROM `staff_info`";
$rooms_query = "SELECT * FROM `room_info`";
$tasks_query = "SELECT * FROM `task_table`";

$staff_results = mysqli_query($connect, $staff_query);
$rooms_results = mysqli_query($connect, $rooms_query);
$tasks_results = mysqli_query($connect, $tasks_query);

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



form {
    text-align: center;
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
                                    <li><a href="./position-form.php">Position Form</a></li>
                                    <li  class="active"><a href="./houseKeepingForm.php">Housekeeping Form</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Header -->
<head>
    <meta charset = "UTF-8">
    <title>Housekeeping Entry</title>
</head>
<body>

    <h1>Housekeeping Form</h1>
    <form action = "action.php" method = "post">
        <label>Staff: </label>
        <select name = "Staff_ID" required>
            <option value = "" >---Please select staff---</option>
            <?php while($staff_row = mysqli_fetch_array($staff_results)):;?>
            <option value="<?php echo $staff_row[0];?>"> <?php echo $staff_row[0];?> <?php echo $staff_row[2];?> </option>
            <?php endwhile;?>
        </select>
        <br>
        <br>
        <label>Room: </label>
        <select name = "Room_ID" required>
            <option value = "" >---Please select room---</option>
            <?php while($rooms_row = mysqli_fetch_array($rooms_results)):;?>
            <option value="<?php echo $rooms_row[0];?>"><?php echo $rooms_row[0];?></option>
            <?php endwhile;?>
        </select>
        <br>
        <br>
        <label for="cars">Assign Task(s):</label>
        <div class = "task-form">
          <?php while($tasks_row = mysqli_fetch_array($tasks_results)):;?>
          <input type = "checkbox" name = "tasks[]" value = "<?php echo $tasks_row[0];?>"> <?php echo $tasks_row[0];?> <?php echo $tasks_row[1];?> <br>
          <?php endwhile;?>
        </div>
        <br>
        <button type = "submit" name = "form_submission"> DONE </button>
        <br>
        <br>
        <input type = "button" name = "go_search" value = "SEARCH" onclick = "location.href='searcher.php'">

        
        <a href="./admin-staff.php"><button type="button" class="cancelbtn">Back</button></a>

    </form>
    

    <?php
        if(isset($_SESSION['status']))
        {
            echo "<h4>".$_SESSION['status']."</h4>";
            //echo "New record created successfully. Last inserted ID is: " . $housekeep_ID["Housekeeping_ID"];
            unset($_SESSION['status']);
        }
    ?>

</body>
</html>
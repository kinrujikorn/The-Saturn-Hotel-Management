<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "hotel_db";

$connect = mysqli_connect($hostname, $username, $password, $databasename);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$branch = $_POST['HotelBranch'];
$datein = $_POST['date-in'];
$dateout = $_POST['date-out'];
$adult_quan = $_POST['adult'];
$child_quan = $_POST['child'];
$rooms_quan = $_POST['room'];

// echo "<h2>" . $datein . "</h2>";
// echo "<h2>" . $dateout . "</h2>";

$room_type_query = "SELECT * FROM room_types_table WHERE adults_capacity >= ($adult_quan / $rooms_quan)" or die("Error: " . mysqli_error($connect));
$room_type_result = mysqli_query($connect, $room_type_query);

if ($room_type_result) {
  $room_type_ids = array();

  while ($row = mysqli_fetch_assoc($room_type_result)) {
      $room_type_ids[] = "'" . $row['room_type_ID'] . "'";
  }
  
  if (!empty($room_type_ids)) {
      $room_type_ids_str = implode(', ', $room_type_ids);
      // echo "<h2>" . $room_type_ids_str . "</h2>";

      $room_query = "SELECT room_ID FROM room_info WHERE room_type_ID IN ($room_type_ids_str)";
      $room_result = mysqli_query($connect, $room_query);

      if ($room_result) {
        $room_ids = array();

        while ($row = mysqli_fetch_assoc($room_result)) {
            $room_ids[] = "'" . $row['room_ID'] . "'";
        }
        if (!empty($room_ids)) {
          $room_ids_str = implode(', ', $room_ids);
          // echo "<h2>" . $room_ids_str . "</h2>";
          $reserved_query = "SELECT reservation_table.reserve_ID FROM reservation_table WHERE (reservation_table.check_in_date <= '$datein' AND reservation_table.check_out_date >= '$datein') OR (reservation_table.check_in_date >= '$datein' AND reservation_table.check_out_date <= '$dateout') OR (reservation_table.check_in_date <= '$dateout' AND reservation_table.check_out_date >= '$dateout');";
          $reserved_result = mysqli_query($connect, $reserved_query);
          if ($reserved_result) {
            $reserved_ids = array();

            while ($row = mysqli_fetch_assoc($reserved_result)) {
              $reserved_ids[] = "'" . $row['reserve_ID'] . "'";
            }
            if (!empty($reserved_ids)) {
              $reserved_ids_str = implode(', ', $reserved_ids);
              // echo "<h2>" . $reserved_ids_str . "</h2>";
              $reserved_room_query = "SELECT room_reserved.room_ID FROM room_reserved WHERE room_reserved.reserve_ID IN ($reserved_ids_str)";
              $reserved_room_result = mysqli_query($connect, $reserved_room_query);
              if ($reserved_room_result) {
                $reserved_room_ids = array();
      
                while ($row = mysqli_fetch_assoc($reserved_room_result)) {
                  $reserved_room_ids[] = "'" . $row['room_ID'] . "'";
                }
                if (!empty($reserved_room_ids)) {
                  $reserved_room_ids_str = implode(', ', $reserved_room_ids);
                  // echo "<h2>" . $reserved_room_ids_str . "</h2>";
                  $display_query = "SELECT ri.room_ID, rt.room_type_name, rt.price, rt.adults_capacity, ri.description, ri.room_number, ri.room_floor FROM room_info ri JOIN room_types_table rt ON ri.room_type_ID = rt.room_type_ID WHERE ri.room_ID NOT IN ($reserved_room_ids_str)";
                  $display_result = mysqli_query($connect, $display_query);
                } else {
                  $display_query = "SELECT ri.room_ID, rt.room_type_name, rt.price, rt.adults_capacity, ri.description, ri.room_number, ri.room_floor FROM room_info ri JOIN room_types_table rt ON ri.room_type_ID = rt.room_type_ID";
                  $display_result = mysqli_query($connect, $display_query);
                }
              }
            } elseif (empty($reserved_ids)) {
              $display_query = "SELECT ri.room_ID, rt.room_type_name, rt.price, rt.adults_capacity, ri.description, ri.room_number, ri.room_floor FROM room_info ri JOIN room_types_table rt ON ri.room_type_ID = rt.room_type_ID";
              $display_result = mysqli_query($connect, $display_query);
          }
        }
      } else {
          echo "Second query failed: " . mysqli_error($connect);
      }
  } else {
      echo "No room available.";
  }
} else {
  echo "First query failed: " . mysqli_error($connect);
}
}
mysqli_close($connect);

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

/*---------------------
  Header
-----------------------*/

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

/* list room */
body {
      font-family: 'Open Sans', arial, sans-serif;
      color: #333;
      font-size: 14px;
    }
    .room-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50vh;
    }
    .room {
      margin: 20px;
      padding: 20px;
      text-align: center;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 1000px;
    }
    .room table {
      width: 100%;
    }
    .room table th,
    .room table td {
      padding: 10px;
    }
    .room table th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    .room table td {
      text-align: center;
    }
    .room button {
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .room button:hover {
      background-color: #45a049;
    }
    
    /* end list room */
    </style>
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
                                  <li class="active"><a href="./list-room.php">List Room</a></li>
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
  </header>
  <!-- Header End -->

      <form name="inpfrm" method="post" action="InsertBooking.php">
      <?php if(mysqli_num_rows($display_result) == 0) : ?>
        <div class="room-container">
          <div class="room">
            <h2>NO ROOM available</h2>
          </div>
        </div>
        <div class="container">
          <button type = "button" style = "position:relative; left:475px; top:-70px"  onclick = "location.href='./index.php'">HOMEPAGE</button>
      </div>
      <?php else : ?>
        <?php while($rooms_row = mysqli_fetch_array($display_result)):;?>
        <div class="room-container">
          <div class="room">
            <h2>ROOM <?php echo $rooms_row[6];?>0<?php echo $rooms_row[5];?></h2>
            <table>
              <tr>
                <th>Type</th>
                <td><?php echo $rooms_row[1];?></td>
              </tr>
              <tr>
                <th>Floor</th>
                <td><?php echo $rooms_row[6];?></td>
              </tr>
              <tr>
                <th>Price</th>
                <td>$<?php echo $rooms_row[2];?> per night</td>
              </tr>
              <tr>
                <th>Capacity</th>
                <td><?php echo $rooms_row[3];?> adults</td>
              </tr>
              <tr>
                <th>Description</th>
                <td><?php echo $rooms_row[4];?> </td>
              </tr>
            </table>
            <input type = "checkbox" name = "rooms[]" value = "<?php echo $rooms_row[0];?>" class="checkmark">
          </div>
        </div>
        <?php endwhile;?>
        <div class="container">
          <input name="HotelBranch" type="hidden" value="<?php echo $_POST['HotelBranch']; ?>">
          <input name="date-in" type="hidden" value="<?php echo $_POST['date-in']; ?>">
          <input name="date-out" type="hidden" value="<?php echo $_POST['date-out']; ?>">
          <input name="adult" type="hidden" value="<?php echo $_POST['adult']; ?>">
          <input name="child" type="hidden" value="<?php echo $_POST['child']; ?>">
          <input name="room" type="hidden" value="<?php echo $_POST['room']; ?>">
          <button type = "submit" style = "position:relative; left:475px; top:-70px">Book Now</button>
        </div>
      <?php endif; ?>
      </form>
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
                            <!-- <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="https://www.instagram.com/tweenty1n/" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div> -->
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
                    <!-- <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>New latest</h6>
                            <p>Get the latest updates and offers.</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        
    </footer>
    <!-- Footer Section End -->
</body>
</html>
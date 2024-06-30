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
$selected_rooms = $_POST['rooms'];

$sql = "SELECT customer_ID FROM customer_info ORDER BY customer_ID DESC LIMIT 1";
$result = mysqli_query($connect, $sql);

$sql1 = "SELECT season_ID FROM season_info WHERE season_info.start_date < '$datein' AND season_info.end_date > '$datein'";
$result1 = mysqli_query($connect, $sql1);

$sql2 = "SELECT staff_ID FROM staff_info ORDER BY staff_ID DESC LIMIT 1";
$result2 = mysqli_query($connect, $sql2);

if ($result && mysqli_num_rows($result) > 0) { 
    $customerID = array();
    $seasonID = array();
    $staffID = array();

    $row = mysqli_fetch_assoc($result);
    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);
    $customerID[] = $row['customer_ID'];
    $seasonID[] = $row1['season_ID'];
    $staffID[] = $row2['staff_ID'];
    
	$sql="INSERT INTO reservation_table (customer_ID,hotel_ID,season_ID,staff_ID,check_in_date,check_out_date,adult_quan,children_quan)
	VALUES ('$customerID[0]','$branch','$seasonID[0]','$staffID[0]','$datein',' $dateout','$adult_quan','$child_quan')";
    
	if (!mysqli_query($connect, $sql)) {
        die('Error: ' . mysqli_error($connect));
    } else {
        $new_reserve = "SELECT MAX(reserve_ID) FROM reservation_table";
        $new_reserve_result = mysqli_query($connect, $new_reserve);
        $new_reserve_row = mysqli_fetch_assoc($new_reserve_result);
        $reserveID = $new_reserve_row['MAX(reserve_ID)'];
        foreach($selected_rooms as $indi_room)
        {
            $room_insert = "INSERT INTO room_reserved (reserve_ID, room_ID) VALUES ('$reserveID', '$indi_room')";
            $room_insert_run = mysqli_query($connect, $room_insert);
        }
        echo "Success";
        header("Location: payment.php");
        exit();
    }
}
	
mysqli_close($connect);
?>
<form name="inpfrm" method="post" action="list-room.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>
<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "hotel_db";

$connect = mysqli_connect($hostname, $username, $password, $databasename);

if(isset($_POST['form_submission']))
{
    $chosen_staff = $_POST['Staff_ID'];
    $chosen_room = $_POST['Room_ID'];
    $selected_tasks = $_POST['tasks'];

    $housekeep_insert = "INSERT INTO housekeeping_table (Staff_ID, Room_ID, Timestamp) VALUES ('$chosen_staff', '$chosen_room', current_timestamp())";
    $housekeep_insert_run = mysqli_query($connect, $housekeep_insert);

}

if($housekeep_insert_run)
{
    $housekeep_ID_get = mysqli_fetch_assoc(mysqli_query($connect, "SELECT housekeeping_ID FROM housekeeping_table ORDER BY housekeeping_ID DESC LIMIT 1"));
    $housekeep_ID = $housekeep_ID_get["housekeeping_ID"];
    foreach($selected_tasks as $indi_task)
    {
        $task_insert = "INSERT INTO housekeeping_task_list (housekeeping_ID, task_ID) VALUES ('$housekeep_ID', '$indi_task')";
        $task_insert_run = mysqli_query($connect, $task_insert);
    }
    $_SESSION['status'] = "Success";
    header("Location: houseKeepingForm.php");
}
else
{
    $_SESSION['status'] = "Failed";
    header("Location: houseKeepingForm.php");
}

if(isset($_POST['searcher']))
{
    header("Location: searcher.php");
}

?>
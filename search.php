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

if(!empty($_POST['Housekeep_ID_inp'])){
	$housekeep_inp = $_POST['Housekeep_ID_inp'];
}

$task_query = "SELECT * FROM housekeeping_task_list where housekeeping_ID like '%$housekeep_inp%' ORDER BY housekeeping_ID asc" or die("Error:" . mysqli_error());
$housekeep_query = "SELECT * FROM housekeeping_table ORDER BY Housekeeping_ID asc" or die("Error:" . mysqli_error());

$task_result = mysqli_query($connect, $task_query);
$housekeep_result = mysqli_query($connect, $housekeep_query);

echo "<table border='1' align='center' class='table table-hover'>";
echo "<tr>";
echo "<td>"."ID"."</td> ";
echo "<td>"."Task"."</td> ";
echo "<td>"."Completeness"."</td> ";
echo "</tr>";

foreach($task_result as $task_row)
{
	echo "<tr>";
	echo "<td>" .$task_row["housekeeping_ID"]."</td> ";
	echo "<td>" .$task_row["task_ID"]."</td> ";
	echo "<td>" .$task_row["completeness"]."</td> ";
	echo "</tr>";
}
echo "</table>";

?>

<form name="inpfrm" method="post" action="searcher.php">
<table border='0' align='center' class='table table-hover'>
<tr>
    <td><input name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>

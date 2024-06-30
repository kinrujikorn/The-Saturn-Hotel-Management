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

$housekeep_query = "SELECT * FROM housekeeping_table ORDER BY housekeeping_ID asc" or die("Error:" . mysqli_error());
$housekeep_result = mysqli_query($connect, $housekeep_query);

echo "<table border='1' align='center' class='table table-hover'>";
echo "<tr>";
echo "<td>"."ID"."</td> ";
echo "<td>"."Staff"."</td> ";
echo "<td>"."Room"."</td> ";
echo "<td>"."Time"."</td> ";	
echo "</tr>";

foreach($housekeep_result as $house_row)
{
	echo "<tr>";
	echo "<td>" .$house_row["housekeeping_ID"] .  "</td> ";
	echo "<td>" .$house_row["staff_ID"] .  "</td> ";
	echo "<td>" .$house_row["room_ID"]."</td> ";
    echo "<td>" .$house_row["timestamp"]."</td> ";
	echo "</tr>";
}

echo "</table>";
echo "<br>";

?> 

  <form action="search.php" method="post">
	<table width="500" height="18" border="0" align="left" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" align="right"></td>
		<td width="105" align="center"> Get Details For Each Session </td>
	</tr>
	<tr>
		<td height="30" align="right" >Session ID : </td>
		<td width="105" align="left"><input name="Housekeep_ID_inp" type="text" id="FirstName" size="30" value="" maxlength="30"></td>
	</tr>
	<tr>
		<td height="30" align="right" ></td>
	    <td width="100" align="right"><input name="Search" type="submit" id="Search" value="Search" /></td>
	</tr>
    <tr>
        <td height="30" align="right" ></td>
        <td width="100" align="right"><input name="New_Session" type="button" id="New_Session" value="New Session" onclick = "location.href='houseKeepingForm.php'"/></td>
    </tr>
	</table>
</form>
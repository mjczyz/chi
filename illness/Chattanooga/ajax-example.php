<?php
$dbhost = "cmlnkwiki";
$dbuser = "intranet";
$dbpass = "password";
$dbname = "absentee_db";
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
	$name = $_GET['name'];
	$date = date("m/d/Y");
//$age = $_GET['age'];
//$sex = $_GET['sex'];
//$wpm = $_GET['wpm'];
	// Escape User Input to help prevent SQL Injection
	$name = mysql_real_escape_string($name);
//$age = mysql_real_escape_string($age);
//$sex = mysql_real_escape_string($sex);
//$wpm = mysql_real_escape_string($wpm);
	//build query
//$query = "SELECT * FROM ajax_example WHERE ae_sex = '$sex'";
$query = "SELECT * FROM illness_tbl WHERE Name = '$name' AND date = '$date'";
//if(is_numeric($age))
	//$query .= " AND ae_age <= $age";
//if(is_numeric($wpm))
	//$query .= " AND ae_wpm <= $wpm";
	//Execute query
$qry_result = mysql_query($query) or die(mysql_error());

	//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th></th>";
//$display_string .= "<th>Age</th>";
//$display_string .= "<th>Sex</th>";
//$display_string .= "<th>WPM</th>";
$display_string .= "</tr>";

	// Insert a new row in the table for each person returned
while($row = mysql_fetch_array($qry_result)){
	$display_string .= "<tr>";
	$display_string .= "<td><font color='#ff0000'>*ALERT Duplicate Entry:</font> ";
	$display_string .= "$row[Name]";
	$display_string .= " has already been entered today.</td>";
	
	//$display_string .= "<td>$row[ae_age]</td>";
	//$display_string .= "<td>$row[ae_sex]</td>";
	//$display_string .= "<td>$row[ae_wpm]</td>";
	$display_string .= "</tr>";
	
}
//echo "Query: " . $query . "<br />";
$display_string .= "</table>";
echo $display_string;
?>
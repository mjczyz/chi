<?php
header("Content-Type:  application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

//connect to and select database
if(!($dbconnect = mysql_pconnect("cmlnkwiki", "intranet", "password"))){
	print("Failed to connect to database!\n");
	exit();
	}
if(!mysql_select_db("absentee_db", $dbconnect)){
	print("Failed to select database!\n");
	exit();
	}

//query for toy list

//$qtoy = "SELECT DISTINCT Toy ";
//$qtoy .= "FROM tblProductToy ";
//$qtoy .= "ORDER BY Toy ";
$qtoy = "SELECT * FROM illness_tbl ORDER BY Department";

if(!($dbtoy = mysql_query($qtoy, $dbconnect))){
	print("MySQL reports: " . mysql_error() . "\n");
	exit();
	}
/*
//query for crosstab
$qx = "SELECT DateShipped ";
while($rowx = mysql_fetch_object($dbtoy)){
		$qx .= ", SUM(IF(Toy = '$rowx->Toy', NumberShipped, 0)) AS Toy ";
	}
$qx .= ", SUM(NumberShipped) AS \"Total Shipped\" ";
$qx .= "FROM tblProductToy ";
$qx .= "GROUP BY DateShipped ";

//print($qx);

if(!($dbx = mysql_query($qx, $dbconnect))){
	print("MySQL reports: " . mysql_error() . "\n");
	exit();
	}
*/
?>
<table border="1">
<tr>
<td bgcolor="#FFFFCC"></td>
<?php
mysql_data_seek($dbtoy, 0);
	while($rowx = mysql_fetch_object($dbtoy)){
		print("<td bgcolor=\"#FFFFCC\">");
		print("$Department");
		print("</td>");
		print("<td bgcolor=\"#FFFFCC\">");
		print("$Date");
		print("</td>");
		print("<td bgcolor=\"#FFFFCC\">");
		print("$Name");
		print("</td>");
		}
?>
<td bgcolor="#00FFFF"><strong>Total By Date</strong></td>
</tr>
<?php
while($dbrow = mysql_fetch_row($dbx)){
	print("<tr>");
	$col_num = 0;
	foreach($dbrow as $key=>$value){
		if($dbrow[$col_num] > 0){
			print("<td>$dbrow[$col_num]</td>");
			}
		else {
			print("<td> </td>");
			}
		$col_num++;
		}
	print("</tr>\n");
	}
//total the columns
print("<tr bgcolor=\"#CCCCCC\">");
print("<td><strong>Total By Record</strong></td>");
	$alpha = b;
	$numeric = 2;
	$rows = mysql_num_rows($dbx)+1;
	for($i=1; $i < mysql_num_fields($dbx); $i++){
		print("<td><strong>=sum($alpha$numeric:$alpha$rows)</strong></td>");
		$alpha++;
		}
print("</tr>\n");
?>
</table>

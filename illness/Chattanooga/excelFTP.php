<?php 
header("Content-Type:  application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

//http://www.phpfreaks.com/tutorials/114/0.php
define(db_host, "cmlnkwiki"); 
define(db_user, "intranet"); 
define(db_pass, "password"); 
define(db_link, mysql_connect(db_host,db_user,db_pass)); 
define(db_name, "absentee_db"); 
mysql_select_db(db_name); 


$yesterday = date("m/d/Y", strtotime("24 hours ago"));
$select = "SELECT COUNT(Date) FROM illness_tbl WHERE Date='$yesterday'"; 
//$select = "SELECT * FROM registrant";                 
$export = mysql_query($select); 
//$fields = mysql_num_fields($export); 
echo "<table border=1>";
			   echo "<tr><th><b><font face=arial size=1>SERMC_ABSENT</font></b></th></tr>";
        while($myrow = mysql_fetch_array($export))
             {//begin of loop
			   echo "<tr><td><font face=arial size=2>";
               echo $myrow['COUNT(Date)'];
			   echo "</font></td></tr>";
			   //$row_count++;
             }//end of loop
			 echo "</table>"; 
			 
			 
$ftp_server = "ftp://czyzdesign.com";
$ftp_user = "mczyz";
$ftp_pass = "Patrick1975";
// set up a connection or die
$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 
// try to login
if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {   echo "Connected as $ftp_user@$ftp_server\n";} 
else {   
echo "Couldn't connect as $ftp_user\n";
}

/*
$remote_file = $_FILES['userfile']['name'];;
//I used these for debugging
echo $_FILES['userfile']['name'];
echo "<br>";
echo $_FILES['userfile']['type'];
echo "<br>";
echo $_FILES['userfile']['size'];
echo "<br>";
echo $_FILES['userfile']['tmp_name'];
echo "<br>";
echo $_FILES['userfile']['error'];
echo "<br>";
//v important this one as you have to use the tmp_file created for the actual upload
$file = $_FILES['userfile']['tmp_name'];
*/

//if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) 
if (ftp_put($conn_id, "excelFTP.xls", "excelFTP.xls", FTP_ASCII)) 
{ 
echo "successfully uploaded $file\n";
} else { echo "There was a problem while uploading $file\n";
}
// close the connection
ftp_close($conn_id);			 
			 
?>
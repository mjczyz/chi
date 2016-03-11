<?
// Connect to Database 
require('config/mssql_connect.php');
require('config/variables.php');
$conn = db_connect();
//echo "cookie".$_COOKIE[login];
if ($_COOKIE[login] != "")
{
//$q = mysql_query("select * from users WHERE id = '$_COOKIE[login]';");

$q = mssql_query("SELECT tid FROM listdb.dbo.vwwebaccess where tid = '$_COOKIE[login]';");
while($f=mssql_fetch_array($q))
{
if ($f[tid] != $_COOKIE[login])

 {
include ('login.php');
die;
}
}
} else {
include ('login.php');
die;
}
?>
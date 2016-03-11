<?
$database="listdb";
$host="cmlnksql03";
$db_user="intranetuser";
$db_pass="1Pet_1_25";

function Login($database, $host, $db_user, $db_pass, $uid, $upass) { //attempt to login false if invalid true if correct
$auth = false;
//$user = Encrypt($user);

$linkID = mssql_connect($host, $db_user, $db_pass);
mssql_select_db("$database", $linkID);
$result = mssql_query("SELECT * FROM listdb.dbo.vwuser where uid='$_POST[uid]' AND upass='$_POST[upass]'", $linkID);
$pass = mssql_fetch_row($result);
mssql_close($linkID);

if ($pass[0] === ($upass)) {
     $auth = true;
}
return $auth;
}
?> 
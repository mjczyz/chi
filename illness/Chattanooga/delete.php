<?PHP
$hostName = "cmlnklamp01";
$userName = "stez_user";
$password = "stez_1889";
$dbName = "absentee_chat_db";

//echo $id;

if ($_POST['Yes']) {
$id = $_POST['id'];
mysql_connect($hostName,$userName,$password) or die("Unable to connect to host $hostName");
mysql_select_db($dbName) or die("Unable to select database $dbName");

$result = mysql_query("DELETE FROM illness_tbl WHERE id = '$id'"); 
		  //http://www.webmasterworld.com/forum88/5028.htm

		  //echo "<meta http-equiv=Refresh content=0;url=illness_form_admin.php>";
?>
<script language="javascript"> 
<!-- 
setTimeout("self.close();",0) 
//--> 
</script> 
		 
<?
} else {
echo "Are you sure you want to delete?";
}
?>

<form name="form1" action="<?PHP echo $PHP_SELF ?>" method="post">
<input name="Yes" type="submit" value="Yes" />
<input type="hidden" name="id" value="<?PHP echo $_GET['id'] ?>" />
<input type="button" name="No" value="No" onClick="javascript:window.opener='x';window.close();">
</form>

</body>
</html>



	
  
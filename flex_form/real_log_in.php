<?php

// Connects to your Database 
require('config/mssql_connect.php');
require('config/variables.php');
$conn = db_connect();



//Checks if there is a login cookie
/*
if(isset($_COOKIE['login_uid']))


//if there is, it logs you in and directes you to the members page
{ 
	$uid = $_COOKIE['login_uid']; 
	$pass = $_COOKIE['login_upass'];
	
	$check = mssql_query("SELECT * FROM listdb.dbo.vwuser where uid='$uid'")or die(mysql_error());

	while($info = mssql_fetch_array( $check )) 	
		{

		if ($pass != $info['upass']) 
			{
			
			}

		else
			{
			header("Location: step1.php");

			}

		}

}

*/
//if the login form is submitted

if (isset($_POST['submit'])) { // if form has been submitted
$_POST['pass'] = strtoupper($_POST['pass']);



// makes sure they filled it in

	if(!$_POST['uid'] | !$_POST['pass']) {
		die('You did not fill in a required field.');
	}

	// checks it against the database

	//if (!get_magic_quotes_gpc()) {
		//$_POST['email'] = addslashes($_POST['email']);
	//}


	$check = mssql_query("SELECT * FROM listdb.dbo.vwuser where uid='".$_POST['uid']."'")or die(mysql_error());

//Gives error if user dosen't exist

$check2 = mssql_num_rows($check);
if ($check2 == 0) {
		die('That user does not exist in our database. <a href=add.php>Click Here to Register</a>');
				}


while($info = mssql_fetch_array( $check )) 	
{

$_POST['pass'] = stripslashes($_POST['pass']);
	$info['upass'] = stripslashes($info['upass']);
	//$_POST['pass'] = md5($_POST['pass']);
	
	
	


//gives error if the password is wrong

	if ($_POST['pass'] != $info['upass']) {
		die('Incorrect password, please try again.');
	}

else
{
// if login is ok then we add a cookie 
	
$_POST['uid'] = stripslashes($_POST['uid']);
	

$hour = time() + 3600; 
//$hour = 60 * 60 * 24 * 60 + time();
setcookie(login_uid, $_POST['uid'], $hour);
setcookie(login_upass, $_POST['pass'], $hour);	

//then redirect them to the members area
header("Location: step1.php");
}

}

} else {	

// if they are not logged in
?>
<style type="text/css">
<!--
.style1 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style2 {font-family: Geneva, Arial, Helvetica, sans-serif; font-weight: bold; }
.style3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-style: italic; }
-->
</style>


<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table border="0" align="center" bgcolor="#CCCCCC">
<tr><td colspan=2><h1 align="center" class="style1"><?PHP echo $title; ?>  
</h1>
    <p align="center"><span class="style2"><?PHP echo $description; ?></span></p>
    </td></tr>
<tr>
  <td><div align="right"><span class="style1">Meditech Username:</span></div></td>
<td>
  
    <div align="left">
      <input name="uid" type="text" maxlength="40">
      </div></td>
</tr>
<tr>
  <td><div align="right"><span class="style1">Meditech Password:</span></div></td>
<td>
  
    <div align="left">
      <input name="pass" type="password" maxlength="50">
      </div></td>
</tr>
<tr><td colspan="2" align="right">
  <div align="center">
    <input name="submit" type="submit" value="Register">
  </div></td>
</tr>
</table>
<div align="center"></div>
</form>
<?php
}


?>


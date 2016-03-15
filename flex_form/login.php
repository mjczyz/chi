<title>Login</title>
<?
 
session_start();
$_SESSION["Assoc_name"] = $_POST['uid'];  
$_SESSION["Assoc_pass"] = $_POST['upass']; 

if ($_POST[loginaccount])
{
include ('config.php');
$result = mssql_query("SELECT * FROM ### where uid='$_POST[uid]' AND upass='$_POST[upass]'");
//$q = mssql_query("SELECT [tid] FROM ### where [uid]='user' and [upass]='pass' and [dept]='ortho'");
//$q = mysql_query("select * from users WHERE username = '$_POST[user]';");
while($f=mssql_fetch_array($result))
{

// login ID (set in cookie)
//$c = "$f[tid]";
// verify password
//echo "$f[upass]";
	if (strtoupper($_POST[upass]) == $f[upass])
	{
//setcookie("login",$c);
echo "Redirecting (PLEASE WAIT...If you are not automatically redirected, click <a href=step1.php>here</a>.)";
echo "<meta http-equiv=refresh content=0;url=step1.php>";
// reference cookie by $_COOKIE[login] 
	} 

	else
	{
	$error = "Bad username and password combination.  Try again.";
	include ('login_form.php');
	}
die;
   }
$error = "Bad username and password combination.  Try again.";
include ('login_form.php');
}
else
{
include ('login_form.php');
}
?>

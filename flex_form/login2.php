<html>
<head>
<style type="text/css">
<!--
.style5 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.style6 {font-family: Arial, Helvetica, sans-serif}
.style7 {color: #999999}
.style9 {
	font-family: Arial, Helvetica, sans-serif;
	font-style: italic;
	font-size: 12px;
}
.style11 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style12 {font-size: 16px}
.green {
background-color:#009900;}
.yellow {
background-color:#FFFF00;}
.red {
background-color:#FF0000;}
.closed {
background-color:#0066FF;}
-->
</style>


<title>Login</title>
</head>
<?

if (submit) {
include ('config.php');
$result = mssql_query("SELECT * FROM listdb.dbo.vwuser where uid='$_POST[uid]' AND upass='$_POST[upass]'");
//$q = mssql_query("SELECT [tid] FROM [listdb].[dbo].[vwwebaccess] where [uid]='user' and [upass]='pass' and [dept]='ortho'");
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
//echo "Redirecting (PLEASE WAIT...If you are not automatically redirected, click <a href=http://cmlnkwiki/intranet/registration/bmv/step1.php>here</a>.)";
//echo "<meta http-equiv=refresh content=0;url=http://cmlnkwiki/intranet/registration/bmv/step1.php>";
// reference cookie by $_COOKIE[login] 
?>


<body>

<br>
<h3 align="center" class="style6">&nbsp;</h3>
<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td><span class="style11"><span class="style12">::</span>REGISTER <span class="style7">For Class</span></span></td>
  </tr>
</table>

<form name="addreg" method="post" action="step2.php">
  <table width="700" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr align="left" valign="top">
      <td width="150"><span class="style5">
        
Name: </span></td>
      <td width="425"><input name="name" size="40" maxlength="255" value=""></td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">Department:</span></td>
      <td><select name="dept">
	  <option value="Information Services">Information Services</option>
	  <option value="Human Resources">Human Resources</option>
	</select></td>
    </tr>
	<!--<tr align="left" valign="top">
      <td><span class="style5">Class:</span></td>
      <td><input name="class" size="40" maxlength="255"></td>
    </tr> -->
	
  </table>
  <p align="center"><br>
    <input type="submit" name="submit" value="Continue">
  </p>
</form>
<?
}
else {
//
?>
<form name="form1" id="form1" method="post" action="<?php echo $PHP_SELF; ?>">
  <table width="100%"  border="0">
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><div align="center"><font color=red>
     
	  <? echo "$error"; ?></font></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="13%">&nbsp;</td>
      <td width="34%"><div align="right">Meditech Username: </div></td>
      <td width="28%"><input name="uid" type="text" id="uid" /></td>
      <td width="25%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="right"></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="right">Meditech Password: </div></td>
      <td><input name="upass" type="password" id="upass" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="right"></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="right"></div></td>
      <td><input name="submit" type="submit" id="submit" value="Sign In" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<?
              }//end if
	 }
	 
?>
<html>
<head><title>Training Registration</title>
<style type="text/css">
<!--
.style5 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.style6 {font-family: Arial, Helvetica, sans-serif}
.style7 {color: #999999}
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
.style14 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; }
-->
</style>


<?
//include 'config2.php';
//$hostName = "cmlnkwiki";
//$userName = "intranet";
//$password = "password";
//$dbName = "bmvtraining_db";

if ($submit) {

//mysql_connect($hostName,$userName,$password) or die("Unable to connect to host $hostName");
//mysql_select_db($dbName) or die("Unable to select database $dbName");

// Connect to Database 
require('config/mysql_connect.php');
require('config/variables.php');
$conn2 = mysql_db_connect();

	  $date = $date3."/".$date1."/".$date2;
	  $begin = str_replace("'","''",$begin);
	  $end = str_replace("'","''",$end);
	  $location = str_replace("'","''",$location);
	  $max = str_replace("'","''",$max);
	  
	  

$sql = "INSERT INTO classes (date,begin,end,location,max) VALUES ('$date', '$begin', '$end', '$location', '$max')";

$result = mysql_query($sql);

  //echo "<b>Thank you! Your class was entered SUCCESSFULLY!<br><br>You'll be redirected back to the Admin Area in (3) Seconds";
          echo "<meta http-equiv=Refresh content=0;url=admin.php>";
  
  //echo "Thank you! Information entered.\n";

} else{

  // display form
  
?>
</head>
<body>

<br>
<h3 align="center" class="style6">&nbsp;</h3>
<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td><span class="style11"><span class="style12">::</span>ADD <span class="style7">Class</span></span></td>
  </tr>
</table>
<form name="addclass" method="post" action="<?php echo $PHP_SELF ?>">
  <table width="700" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr align="left" valign="top">
      <td width="150"><span class="style5">
        
Date: </span></td>
      <td width="425"><select name="date1">
	  <option value="mm" selected>mm
          <option value="01">01
          <option value="02">02
          <option value="03">03
          <option value="04">04
          <option value="05">05
          <option value="06">06
          <option value="07">07
          <option value="08">08
          <option value="09">09
          <option value="10">10
          <option value="11">11
          <option value="12">12
        </select>
/
<select name="date2">
<option value="dd" selected>dd
  <option value="01">01
      <option value="02">02
      <option value="03">03
      <option value="04">04
      <option value="05">05
      <option value="06">06
      <option value="07">07
      <option value="08">08
      <option value="09">09
      <option value="10">10
      <option value="11">11
      <option value="12">12
      <option value="13">13
      <option value="14">14
      <option value="15">15
      <option value="16">16
      <option value="17">17
      <option value="18">18
      <option value="19">19
      <option value="20">20
      <option value="21">21
      <option value="22">22
      <option value="23">23
      <option value="24">24
      <option value="25">25
      <option value="26">26
      <option value="27">27
      <option value="28">28
      <option value="29">29
      <option value="30">30
      <option value="31">31
    </select>
/
<select name="date3">
  <option value="yyyy" selected>yyyy
      <option value="2007">2007
	  <option value="2008">2008
    </select></td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">Begin:</span></td>
      <td><input name="begin" size="40" maxlength="255"> 
      <span class="style14">ex: 09:00 or 13:00 </span></td>
    </tr>
	<tr align="left" valign="top">
      <td><span class="style5">End:</span></td>
      <td><input name="end" size="40" maxlength="255">
      <span class="style14">ex: 09:00 or 13:00</span> </td>
    </tr>
	<tr align="left" valign="top">
      <td><span class="style5">Location:</span></td>
      <td><select name="location">
	  <option value="" selected="selected">Select Location</option>
	  <option value="Bonacum">Bonacum Room</option>
        <option value="Franciscan">Franciscan Room</option>
        <option value="Friendship">Friendship Room</option>
		<option value="Rose">Rose Room</option>
		<option value="Tapestry">Tapestry Room</option>
		
	  </select></td>
    </tr>
	<tr align="left" valign="top">
      <td><span class="style5">Class Size:</span></td>
      <td><input name="max" size="40" maxlength="255">
       </td>
    </tr>
	
  </table>
  <p align="center"><br>
    <input type="submit" name="submit" value="Add Class">
  </p>
</form>

			
<?
              }//end if


?>


</body>
</html>
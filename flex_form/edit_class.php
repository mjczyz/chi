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
// Connect to Database 
require('config/mysql_connect.php');
require('config/variables.php');
$conn2 = mysql_db_connect();

if ($submit) {

$date = $date3."/".$date1."/".$date2;
$begin = $_POST['begin'];
$end = $_POST['end'];
$location = $_POST['location'];
$max = $_POST['max'];

	  //$date = $date3."/".$date1."/".$date2;
	  $begin = str_replace("'","''",$begin);
	  $end = str_replace("'","''",$end);
	  $location = str_replace("'","''",$location);
	  $max = str_replace("'","''",$max);
	  
	  
$result = mysql_query("UPDATE classes SET date='$date',begin='$begin',end='$end',location='$location',max='$max' WHERE id='$id'");




  //echo "<b>Thank you! Your class was entered SUCCESSFULLY!<br><br>You'll be redirected back to the Admin Area in (3) Seconds";
          echo "<meta http-equiv=Refresh content=0;url=admin.php>";
  
  //echo "Thank you! Information entered.\n";

}
elseif($id)
{

$result = mysql_query("SELECT * FROM classes WHERE id='$id' ");
        while($myrow = mysql_fetch_assoc($result))
             {
			if ($myrow['date']) {
   $date2 = substr(($myrow['date']), 8);
   $date1 = substr(($myrow['date']), 5, -3);
   $date3 = substr(($myrow['date']), 0, 4);
   
   //$date = $month1."-".$day1."-".$year1;
} 
			 
			 
//$date = $myrow["date"];
$begin = $myrow["begin"];
$end = $myrow["end"];
$location = $myrow["location"];
$max = $myrow["max"];



	  
  // display form
  
?>
</head>
<body>

<br>
<h3 align="center" class="style6">&nbsp;</h3>
<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td><span class="style11"><span class="style12">::</span>EDIT <span class="style7">Class</span></span></td>
  </tr>
</table>
<form name="addclass" method="post" action="<?php echo $PHP_SELF ?>">
  <table width="700" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr align="left" valign="top">
      <td width="150"><span class="style5"><input type="hidden" name="id" value="<? echo $myrow['id']?>">
        
Date: </span></td>
      <td width="425"><select name="date1">
	  <option value="<? echo $date1; ?>" selected><? echo $date1; ?></option>
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
<option value="<? echo $date2; ?>" selected><? echo $date2; ?></option>
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
  <option value="<? echo $date3; ?>" selected><? echo $date3; ?></option>
      <option value="2006">2006
	  <option value="2007">2007
    </select></td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">Begin:</span></td>
      <td><input name="begin" size="40" maxlength="255" value="<? echo $myrow['begin']; ?>"> 
      <span class="style14">ex: 09:00 or 13:00 </span></td>
    </tr>
	<tr align="left" valign="top">
      <td><span class="style5">End:</span></td>
      <td><input name="end" size="40" maxlength="255" value="<? echo $myrow['end']; ?>">
      <span class="style14">ex: 09:00 or 13:00</span> </td>
    </tr>
	<tr align="left" valign="top">
      <td><span class="style5">Location:</span></td>
      <td><select name="location">
        <option value="<? echo $myrow['location']; ?>"><? echo $myrow['location']; ?>;</option>
        <option value="Bonacum">Bonacum Room</option>
        <option value="Franciscan">Franciscan Room</option>
        <option value="Friendship">Friendship Room</option>
		<option value="Rose">Rose Room</option>
		<option value="Tapestry">Tapestry Room</option>
	  </select></td>
    </tr>
	<tr align="left" valign="top">
      <td><span class="style5">Class Size:</span></td>
      <td><input name="max" size="40" maxlength="255" value="<? echo $myrow['max']; ?>">
       </td>
    </tr>
	
  </table>
  <p align="center"><br>
    <input type="submit" name="submit" value="Edit Class">
  </p>
</form>

			
<?
              }//end if

}
?>


</body>
</html>
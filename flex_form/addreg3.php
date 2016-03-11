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
.style13 {
	color: #000000;
	font-style: italic;
}
-->
</style>


<?





if ($submit) {

// Connect to Database 
require('config/mysql_connect.php');
require('config/variables.php');
$conn2 = mysql_db_connect();


//check for duplicate entry
$check = mysql_query("SELECT * FROM registrant where name='".$_POST['name']."'")or die(mysql_error());

//Gives error if user dosen't exist

$check2 = mysql_num_rows($check);
if ($check2 == 1) {
		die($contact2);
				}
//end check



	  $name = str_replace("'","''",$name);
	  $dept = str_replace("'","''",$dept);
	  $class = str_replace("'","''",$class);
	  //$class = $myrow['id'];
	  
	  //$HTTP_SESSION_VARS ["name"] = $name; // Set name = form variable $name 
//$HTTP_SESSION_VARS ["dept"] = $dept;
	  

$sql = "INSERT INTO registrant (name,dept,class) VALUES ('$name', '$dept', '$class')";
$result = mysql_query($sql);

  //echo "<b>Thank you! Your have registered SUCCESSFULLY!<br><br>You'll be redirected back to the Admin area in (3) Seconds";
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
    <td><span class="style11"><span class="style12">::</span>REGISTER <span class="style7">For Class - <span class="style13">Final Step</span> </span></span></td>
  </tr>
</table>
<form name="addreg" method="post" action="<?php echo $PHP_SELF ?>">
<input type="hidden" name="id" value="<? echo $myrow['id']?>">
  <table width="700" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr align="left" valign="top">
      <td width="150"><span class="style5">
        
Name: </span></td>
      <td width="425"><input name="name" size="40" maxlength="255" value="<? echo $name; ?>"></td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">Department:</span></td>
      <td><input name="dept" size="40" maxlength="255" value="<? echo $dept; ?>"></td>
    </tr>
	<tr align="left" valign="top">
      <td><span class="style5">Class:</span></td>
      <td><input name="class" size="40" maxlength="255" value="<? echo $id; ?>">
	 <? 
// Connect to Database 
require('config/mysql_connect.php');
require('config/variables.php');
$conn2 = mysql_db_connect();

//WHERE DATE_SUB(CURDATE(),INTERVAL 60 DAY) <= date
$query = "SELECT * FROM classes WHERE id='$id'";

$result = mysql_query($query);

while($myrow = mysql_fetch_array($result))
             {//begin of loop
               //now print the results:

	  if ($myrow['date']) {
   			   $day1 = substr(($myrow['date']), 8);
               $month1 = substr(($myrow['date']), 5, -3);
               $year1 = substr(($myrow['date']), 0, 4);
   
               $date = $month1."-".$day1."-".$year1;
			   }
	  
	  //echo "<input name='class' size='40' maxlength='25' value='$id'><br>";
	  echo "<br>DATE:&nbsp;";
	  echo $date;
	  echo "<br>";
	  echo "BEGIN:&nbsp;";
	  echo $myrow['begin'];
	  echo "<br>";
	  echo "END:&nbsp;";
	  echo $myrow['end'];
	  echo "<br>";
	  echo "LOCATION:&nbsp;";
	  echo $myrow['location'];
	  echo "<br>";
	  echo "</td>";
	  }
	  ?>
    </tr> 
	<tr bgcolor="#FFFF00" class="style5">
	  <td colspan="2"><?PHP echo $contact; ?> </td>
	</tr>
  </table>
  <p align="center"><span class="style11">If everything above looks correct, click &quot;Finish!&quot; </span><br>
    <input type="submit" name="submit" value="Finish">
  </p>
</form>
			
<?
              }//end if


?>


</body>
</html>
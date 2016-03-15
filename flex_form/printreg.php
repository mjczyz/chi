<?
// Connect to Database 
require('config/mysql_connect.php');
require('config/variables.php');
$conn2 = mysql_db_connect();

$result = mysql_query("SELECT * FROM registrant WHERE id='$id' ");
        while($myrow = mysql_fetch_assoc($result))
             {
	  $name = $myrow["name"];
      $dept = $myrow["dept"];
	  $class = $myrow["class"];
	  
?>
<html>
<head><title>Print Registration</title>
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

</head>
<body>
<br>
<h3 align="center" class="style6">&nbsp;</h3>
<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td><span class="style11"><span class="style12">::</span>PRINT <span class="style7">Registration</span></span></td>
  </tr>
</table>
<form name="addproject" method="post" action="<?php echo $PHP_SELF ?>">
  <table width="700" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr align="left" valign="top">
      <td width="150"><span class="style5">
        <input type="hidden" name="id" value="<? echo $myrow['id']?>">
Name: </span></td>
      <td width="425"><? echo $name; ?></td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">Department:</span></td>
      <td>
	<? echo $dept; ?>
	  </td>
    </tr>
	<tr align="left" valign="top">
      <td><span class="style5">Class:</span></td>
      <td><? echo $class; ?>
	  
	  
	  
	  
	  
	  
	  
	  <?
	  $result2 = mysql_query("SELECT * FROM classes WHERE id='$class' ");
        while($myrow2 = mysql_fetch_assoc($result2))
             {
			 if ($myrow2['date']) {
   			   $day1 = substr(($myrow2['date']), 8);
               $month1 = substr(($myrow2['date']), 5, -3);
               $year1 = substr(($myrow2['date']), 0, 4);
   
               $date = $month1."-".$day1."-".$year1;
			   }
	  echo "<br>DATE:&nbsp;";
	  echo $date;
	  echo "<br>";
	  echo "BEGIN:&nbsp;";
	  echo $myrow2['begin'];
	  echo "<br>";
	  echo "END:&nbsp;";
	  echo $myrow2['end'];
	  echo "<br>";
	  echo "LOCATION:&nbsp;";
	  echo $myrow2['location'];
	  }
	  //$query2 = "SELECT *, R.TOT FROM classes C LEFT JOIN (SELECT class, COUNT(*) AS TOT FROM registrant GROUP BY class) R ON C.id = R.class WHERE R.TOT < C.max OR R.class IS NULL";
	  


/*
	  
	  $query2 = "SELECT registrant.class, classes.date ".
 "FROM registrant, classes ".
	"WHERE registrant.class = classes.id"; 
	  $result2 = mysql_query($query2);

	  while($myrow2 = mysql_fetch_array($result2))
             {//begin of loop
			 echo $myrow2['date'];
			 }
	  
	  
	  
	  
	  echo "<select name=\"class\">\n";?>
	  <option value="<? echo $class; ?>" selected><? echo $class; ?></option>
	  <?
      while($myrow2 = mysql_fetch_array($result2))
             {//begin of loop
			 
			 if ($myrow2['date']) {
   			   $day1 = substr(($myrow2['date']), 8);
               $month1 = substr(($myrow2['date']), 5, -3);
               $year1 = substr(($myrow2['date']), 0, 4);
   
               $date = $month1."-".$day1."-".$year1;
			   }
			   
			 ?>
               <option value="<?php echo $myrow2['id']; ?>"><?php echo $myrow2['id'];echo "&nbsp;&nbsp;";echo $date;?></option>
			   <? $row_count++;
             }//end of loop
			  
	  ?>
</select>
*/
?>

	  </td>
    </tr><tr><td>
	<? 
/*


mysql_connect($hostName,$userName,$password) or die("Unable to connect to host $hostName");
mysql_select_db($dbName) or die("Unable to select database $dbName");


$query3 = "SELECT * FROM classes WHERE id='$id'";
$result3 = mysql_query($query3);

while($myrow3 = mysql_fetch_array($result3))
             {//begin of loop
               //now print the results:
if ($myrow3['date']) {
   			   $day1 = substr(($myrow3['date']), 8);
               $month1 = substr(($myrow3['date']), 5, -3);
               $year1 = substr(($myrow3['date']), 0, 4);
   
               $date = $month1."-".$day1."-".$year1;
			   }
	  
	  
	  //echo "<input name='class' size='40' maxlength='25' value='$id'><br>";
	  echo "<br>DATE:&nbsp;";
	  echo $date;
	  echo "<br>";
	  echo "BEGIN:&nbsp;";
	  echo $myrow3['begin'];
	  echo "<br>";
	  echo "END:&nbsp;";
	  echo $myrow3['end'];
	  echo "<br>";
	  echo "LOCATION:&nbsp;";
	  echo $myrow3['location'];
	  echo "<br>";
	  echo "</td>";
	  }
	  */
	  ?>
    </td></tr>
	<tr bgcolor="#FFFF00" class="style5">
	  <td><?PHP echo $contact; ?></td>
	</tr>
  </table>
  <p align="center"><br>
    <script language="Javascript1.2">
<!--
// please keep these lines on when you copy the source
// made by: Nicolas - http://www.javascript-page.com

var message = "Print this Page";

function printpage() {
window.print();  
}

document.write("<form><input type=button "+"value=\""+message+"\" onClick=\"printpage()\"></form>");

//-->
</script>


  </p>
</form>
			
<?
              }//end if
//}

?>

</body>
</html>

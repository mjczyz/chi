<html>
<head><title>Training Registration</title>
<style type="text/css">
<!--
a:link {text-decoration: none; color: white}
a:visited {text-decoration: none; color: white}
a:active {text-decoration: none; color: white}
a:hover {text-decoration: underline; color: yellow;}
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
}
.style3 {
font-family: Arial, Helvetica, sans-serif;
font-size:12px;}
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

<script language="JavaScript" type="text/javascript">
<!--

function CngCol(obj,col){
if (obj.getAttribute('bgcolor')){ obj.bg=obj.getAttribute('bgcolor'); }
else { obj.bg=''; }
obj.style.backgroundColor=col;
obj.onmouseout=function(){ this.style.backgroundColor=this.bg; }
}
//-->
</script>
</head>
<body>

<br>
<h3 align="center" class="style6">&nbsp;</h3>
<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td><span class="style11"><span class="style12">::</span>REGISTER <span class="style7">For Class</span></span></td>
  </tr>
</table>

<form name="addreg" method="post" action="step3.php">
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
      <td>
	  <? 
	  
// Connect to Database 
require('config/mysql_connect.php');
require('config/variables.php');
$conn2 = mysql_db_connect();


//$query = "SELECT * FROM classes";
$query = "SELECT *, R.TOT FROM classes C LEFT JOIN (SELECT class, COUNT(*) AS TOT FROM registrant GROUP BY class) R ON C.id = R.class WHERE R.TOT < C.max OR R.class IS NULL ORDER BY date, begin ASC";


$result = mysql_query($query);

// Define your colors for the alternating rows<br> 

	  
	  echo "<table border=0 width=860px align=center>";
			   echo "<tr bgcolor=#003366><th width=10px><font face=arial color=white size=1><b><a href=\"?order=id\">ID</a></b></font></th>";
			   echo "<th width=200px><font face=arial color=white size=1><b><a href=\"?order=date\">DATE</a></b></font></th>";
			   echo "<th width=200px><font face=arial color=white size=1><b><a href=\"?order=begin\">BEGIN</a></b></font></th>";
			   echo "<th width=150px><font face=arial color=white size=1><b><a href=\"?order=end\">END</a></b></font></th>";
			    echo "<th width=150px><font face=arial color=white size=1><b><a href=\"?order=location\">LOCATION</a></b></font></th>";
				echo "<th width=150px><font face=arial color=white size=1><b>SELECT</b></font></th></tr>";
        while($myrow = mysql_fetch_array($result))
             {//begin of loop
               //now print the results:
			   $row_color = ($row_count % 2) ? $color1 : $color2;
			   if ($myrow['date']) {
   			   $day1 = substr(($myrow['date']), 8);
               $month1 = substr(($myrow['date']), 5, -3);
               $year1 = substr(($myrow['date']), 0, 4);
   
               $date = $month1."-".$day1."-".$year1;
			   }
			   echo "<tr bgcolor='$row_color' onmouseover=\"CngCol(this,'#fbf4a1');\"><td width=10px align=center valign=top><font face=arial size=2>";
               echo $myrow['id'];
			   echo "</font></td><td width=200px align=center valign=top><font face=arial size=2>";
               echo $date;
               echo "</font></td><td width=200px align=center valign=top><font face=arial size=2>";
               echo $myrow['begin'];
			   echo "</font></td><td bgcolor='$td_color' width=150px align=center valign=top><font face=arial size=2>";
               echo $myrow['end'];
			   echo "</font></td><td bgcolor='$td_color' width=150px align=center valign=top><font face=arial size=2><b>";
			   echo $myrow['location'];
			   echo "<b></font></td>";
			   echo "<td width=150px align=center valign=top><font face=arial size=2>";
			   echo "<a href=\"step3.php?id=$myrow[id]&name=$name&dept=$dept\"><font color=#0000ff>Select</font></a>";
			   echo "</td></tr>";
			   $row_count++;
             }//end of loop
			 echo "<tr bgcolor='#FFFF00' class='style5'><td colspan='6'>If there are no classes listed above, the maximum # of registrants has been reached.</td></tr>";
			 echo "</table>"; 
?></td>
    </tr> 
	
  </table>
  <p align="center"><br>
    <!--<input type="submit" name="submit" value="Continue">-->
  </p>
</form>
			
<?
              //}//end if


?>


</body>
</html>
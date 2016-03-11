<?PHP
// Connect to Database 
require('config/mysql_connect.php');
require('config/variables.php');
$conn2 = mysql_db_connect();
?>


<html>
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
-->
</style>
<head>
<title>Training Registration</title>
<SCRIPT LANGUAGE="Javascript">
<!---
function decision(message, url)
{
if(confirm(message)) location.href = url;
//if(confirm(message)) window.open(href = url);

}

// --->
</SCRIPT>

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
<body bgcolor="#cccccc">
<div align="center">
  <p><span class="style1"><?PHP echo $admin_title; ?></span></p>
  <p><img src="img/people.gif">&nbsp;<span class="style1"><a href="addreg.php"><font color="#0000FF">Add Registrant</font></a></span>
  
  &nbsp; | &nbsp;<img src="img/add.gif">&nbsp;<span class="style1"><a href="addclass.php"><font color="#0000FF">Add Class</font></a></span>
  
  &nbsp; | &nbsp;<img src="img/class.gif">&nbsp;<span class="style1"><a href="class_list.php"><font color="#0000FF">View Class List</font></a></span></p>
</div>
<?



//$query = "SELECT * FROM discounts ORDER BY company";
$query = "SELECT * FROM classes"; //WHERE DATE_SUB(CURDATE(),INTERVAL 60 DAY) <= a_start";

//start of sorting columns
if (!isset($_GET['order'])) 
 $_GET['order'] = FALSE;
 // Use a conditional switch to determine the order 
switch ($_GET['order']) { 
//default:
   
   case 'id': 
   // Add to the $sql string 
   $query .= " ORDER BY id"; 
   break; 
   case 'begin': 
   // Add to the $sql string 
   $query .= " ORDER BY begin"; 
   break; 
    case 'end': 
   // Add to the $sql string 
   $query .= " ORDER BY end"; 
   break; 
    case 'location': 
   // Add to the $sql string 
   $query .= " ORDER BY location"; 
   break; 
    case 'max': 
   // Add to the $sql string 
   $query .= " ORDER BY max"; 
   break; 
   case 'date': 
   // Add to the $sql string 
   $query .= " ORDER BY date"; 
   break; 
   		 default:
   // Add to the $sql string 
   $query .= " ORDER BY date, begin ASC"; 
   break; 
} 
//usually underneath $query above
$result = mysql_query($query);

// Define your colors for the alternating rows<br> 


        //lets make a loop and get all news from the database
		//the href tags work with sorting above
		       echo "<table border=0 width=850px align=center>";
			   echo "<tr bgcolor=#003366><th width=50px><font face=arial color=white size=1><b><a href=\"?order=id\">ID</a></b></font></th>";
			   echo "<th width=150px><font face=arial color=white size=1><b><a href=\"?order=date\">DATE</a></b></font></th>";
			   echo "<th width=150px><font face=arial color=white size=1><b><a href=\"?order=begin\">BEGIN</a></b></font></th>";
			   echo "<th width=150px><font face=arial color=white size=1><b><a href=\"?order=end\">END</a></b></font></th>";
			   echo "<th width=200px><font face=arial color=white size=1><b><a href=\"?order=location\">LOCATION</a></b></font></th>";
			   echo "<th width=50px><font face=arial color=white size=1><b><a href=\"?order=max\">MAX</a></b></font></th>";
			   echo "<th width=50px><font face=arial color=white size=1><b>EDIT</b></font></th>";
			   echo "<th width=50px><font face=arial color=white size=1><b>DELETE</b></font></th></tr>";
        while($myrow = mysql_fetch_array($result))
             {//begin of loop
			 if ($myrow['date']) {
   			   $day1 = substr(($myrow['date']), 8);
               $month1 = substr(($myrow['date']), 5, -3);
               $year1 = substr(($myrow['date']), 0, 4);
   
               $date = $month1."-".$day1."-".$year1;
			   }
               //now print the results:
			   $row_color = ($row_count % 2) ? $color1 : $color2;
			   echo "<tr bgcolor='$row_color' onmouseover=\"CngCol(this,'#fbf4a1');\"><td width=50px align=center valign=top><font face=arial size=2><b>";
               echo $myrow['id'];
			   echo "</font></td><td width=150px align=center valign=top><font face=arial size=2><b>";
               echo $date;
               echo "</font></td><td width=150px align=center valign=top><font face=arial size=2>";
               echo $myrow['begin'];
			   echo "</font></td><td bgcolor='$td_color' width=150px align=center valign=top><font face=arial size=2>";
               echo $myrow['end'];
			   echo "</font></td><td bgcolor='$td_color' width=200px align=center valign=top><font face=arial size=2>";
               echo $myrow['location'];
			   echo "</font></td><td bgcolor='$td_color' width=50px align=center valign=top><font face=arial size=2>";
               echo $myrow['max'];
			   echo "<b></font></td>";
			   echo "<td width=50px align=center valign=top><font face=arial size=2>";
			   //echo "</td><td>";
               // Now print the options to (Read,Edit & Delete the news)
               //echo "<br><a href=\"edit_roster.php?id=$myrow[id]\">Edit</a><hr>";
			   echo "<a href=\"edit_class.php?id=$myrow[id]\"><font color=#0000ff><img align=center src='img/edit.png' border='0'></font></a>";
			   echo "</font></td><td width=50px align=center valign=top><font face=arial size=2>";
			   //echo "<a href=\"delete_reg.php?id=$myrow[id]\"><font color=#0000ff><img align=center src='img/drop.png' border='0'></font></a>";
			  echo "<a HREF='javascript:decision(\"Are you sure you want to delete?\",\"delete_class.php?id=$myrow[id]\")'><font color=#0000ff><img align=center src='img/drop.png' border='0'></font></a>";
			  
			  
			   //echo "</font></td><td width=75px align=center valign=top><font face=arial size=2>";
			   //echo "<a href=\"live_gsale.php?id=$myrow[id]\"><font color=#0000ff>Publish</font></a>";
			   echo "</td></tr>";
			   $row_count++;
             }//end of loop
			 echo "</table>"; 
?><p>
<div align="center">
<img src="img/back.gif">&nbsp;<span class="style1"><a href="admin.php"><font color="#0000FF">Return to the ADMIN page</font></a></span>
</div></p>
</body>
</html>

<?php 
header("Content-Type:  application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//http://www.phpfreaks.com/tutorials/114/0.php
define(db_host, "cmlnkwiki"); 
define(db_user, "intranet"); 
define(db_pass, "password"); 
define(db_link, mysql_connect(db_host,db_user,db_pass)); 
define(db_name, "absentee_db"); 
mysql_select_db(db_name); 
?> 


<?php 
//"SELECT h.*, m.* FROM health_history h, medication m WHERE h.id='$id' AND m.id='$id' "
$select = "SELECT * FROM illness_tbl ORDER BY Department"; 
//$select = "SELECT * FROM registrant";                 
$export = mysql_query($select); 
//$fields = mysql_num_fields($export); 
echo "<table border=1>";
			   echo "<tr><th><b><font face=arial size=1>DEPARTMENT</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>DATE</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>EMPLOYEE</font></a></b></th>";
			   echo "<th bgcolor=#ffff99><b><font face=arial size=1>NON MEDICAL</font></a></b></th>";
			   echo "<th bgcolor=#ffff99><b><font face=arial size=1>NON MEDICAL OTHER</font></a></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>MEDICAL</font></a></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>MEDICAL OTHER</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>NAME TAKING MSG</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>DETAILS</font></a></b></th></tr>";
        while($myrow = mysql_fetch_array($export))
             {//begin of loop
               //now print the results:
			   //$row_color = ($row_count % 2) ? $color1 : $color2;
			   //$class = $myrow["class"];
			   
			   $Medical = $myrow['Diarrhea'].", ".$myrow['NV'].", ".$myrow['Headache'].", ".$myrow['Respiratory'].", ".$myrow['Injury'].", ".$myrow['PregnancyRelated'].", ".$myrow['UnknownSS']; 
			   echo "<tr><td><font face=arial size=2>";
               echo $myrow['Department'];
               echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Date'];
               echo "</font></td><td><font face=arial size=2>";
               echo $myrow['Name'];
			   echo "</font></td><td bgcolor=#ffff99><font face=arial size=2>";
			   echo $myrow['NonMedical'];
			   echo "</font></td><td bgcolor=#ffff99><font face=arial size=2>";
			   echo $myrow['NonMedicalOther'];
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $Medical;
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $myrow['MedicalOther'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['NameTakingMsg'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Details'];
			   echo "</font></td></tr>";
			   //$row_count++;
             }//end of loop
			 echo "</table>"; 
?>
<?php 
header("Content-Type:  application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//http://www.phpfreaks.com/tutorials/114/0.php
define(db_host, "cmlnklamp01"); 

define(db_link, mysql_connect(db_host,db_user,db_pass)); 
define(db_name, "banquet"); 
mysql_select_db(db_name); 
?> 


<?php 
//"SELECT h.*, m.* FROM health_history h, medication m WHERE h.id='$id' AND m.id='$id' "
$select = "SELECT * FROM invite_list ORDER BY Dept_Descr"; 
//$select = "SELECT * FROM registrant";                 
$export = mysql_query($select); 
//$fields = mysql_num_fields($export); 
echo "<table border=1>";
			   echo "<tr><th><b><font face=arial size=1>RSVP Yes</a></b></th>";
			   echo "<th><b><font face=arial size=1>RSVP No</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Honoree</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Guest</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Guest Name</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Empl ID</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Last Name</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>First Name</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Middle Initial</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Hire Date</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Adjusted Hire Date</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Yrs of Svc</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Director</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Dept Descr</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Mailing Address Line 1</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Mailing Address Line 2</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Mailing Address City</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Mailing Address State</font></a></b></th>";
			   echo "<th><b><font face=arial size=1>Mailing Address Zip Code</font></a></b></th></tr>";
        while($myrow = mysql_fetch_array($export))
             {//begin of loop
               //now print the results:
			   //$row_color = ($row_count % 2) ? $color1 : $color2;
			   //$class = $myrow["class"];
			   
			    
			   echo "<tr><td><font face=arial size=2>";
               echo $myrow['RSVP_Yes'];
               echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['RSVP_No'];
               echo "</font></td><td><font face=arial size=2>";
               echo $myrow['Honoree'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Guest'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Guest_Name'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['EMPL_ID'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Last_Name'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['First_Name'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Middle_Initial'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Hire_Date'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Adjusted_Hire_Date'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Yrs_of_Svc'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Director'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Dept_Descr'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Mailing_Address_Line_1'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Mailing_Address_Line_2'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Mailing_Address_City'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Mailing_Address_State'];
			   echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['Mailing_Address_Zip_Code'];
			   echo "</font></td></tr>";
			   //$row_count++;
             }//end of loop
			 echo "</table>"; 
?>

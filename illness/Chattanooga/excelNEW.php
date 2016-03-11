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





//$from = $_GET['fromMonth']."/".$_GET['fromDay']."/".$_GET['fromYear'];
//$to = $_GET['toMonth']."/".$_GET['toDay']."/".$_GET['toYear'];
$from = $_GET['fromYear']."-".$_GET['fromMonth']."-".$_GET['fromDay'];
$to = $_GET['toYear']."-".$_GET['toMonth']."-".$_GET['toDay'];
$filter = $_GET['filter'];
if ($filter == 'view_all') {
//$query = "SELECT * FROM illness_tbl WHERE Date BETWEEN '$from' AND '$to'";
$select = "SELECT * FROM illness_tbl WHERE thedate BETWEEN '$from' AND '$to' ORDER BY thedate ASC";
}
elseif ($filter == 'RADIOLOGY ALL'){
//$query = "SELECT * FROM illness_tbl WHERE (Date BETWEEN '$from' AND '$to') AND (Department = '$filter')";
$select = "SELECT * FROM illness_tbl WHERE (thedate BETWEEN '$from' AND '$to') AND ((Department = '7020-RADIOLOGY(RMC)') OR (Department = '7021-RAD-OFF STAFF(RMC)') OR (Department = '7023-RAD-SPECIAL PROC(RMC)') OR (Department = '7380-RAD THERAPY CTR(RMC)') OR (Department = '7024-RADIOLOGY-MRI(RMC)')) ORDER BY thedate ASC";
}else {
//$select = "SELECT * FROM illness_tbl ORDER BY Department"; 
$select = "SELECT * FROM illness_tbl WHERE (thedate BETWEEN '$from' AND '$to') AND (Department = '$filter') ORDER BY thedate ASC";
}
//$select = "SELECT * FROM registrant";                 
$export = mysql_query($select); 
//$fields = mysql_num_fields($export); 
echo "<table border=1>";
			   echo "<tr><th><b><font face=arial size=1>DEPARTMENT</font></b></th>";
			   echo "<th><b><font face=arial size=1>DATE</font></b></th>";
			   echo "<th><b><font face=arial size=1>EMPLOYEE</font></b></th>";
			   echo "<th bgcolor=#ffff99><b><font face=arial size=1>NON MEDICAL</font></b></th>";
			   echo "<th bgcolor=#ffff99><b><font face=arial size=1>NON MEDICAL OTHER</font></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>DIARRHEA</font></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>NV</font></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>HEADACHE</font></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>RESPIRATORY</font></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>INJURY</font></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>PREGNANCY RELATED</font></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>UNKNOWN S/S</font></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>FEVER/ACHINESS</font></b></th>";
			   echo "<th bgcolor=#ffcc66><b><font face=arial size=1>MEDICAL OTHER</font></b></th>";
			   echo "<th><b><font face=arial size=1>NAME TAKING MSG</font></b></th>";
			   echo "<th><b><font face=arial size=1>DETAILS</font></b></th></tr>";
        while($myrow = mysql_fetch_array($export))
             {//begin of loop
               //now print the results:
			   //$row_color = ($row_count % 2) ? $color1 : $color2;
			   //$class = $myrow["class"];
			   
			   //$Medical = $myrow['Diarrhea'].", ".$myrow['NV'].", ".$myrow['Headache'].", ".$myrow['Respiratory'].", ".$myrow['Injury'].", ".$myrow['PregnancyRelated'].", ".$myrow['UnknownSS']; 






$Diarrhea= "";
$NV= "";
$Headache= "";
$Respiratory= "";
$Injury= "";
$PregnancyRelated= "";
$UnknownSS= "";

	   
if ( $myrow['Diarrhea'] =='Diarrhea') { 
$Diarrhea= "X";
} 

if ($myrow['NV'] == 'NV') { 
$NV= "X";
}

if ($myrow['Headache'] == 'Headache') { 
$Headache= "X";
}

if ($myrow['Respiratory'] == 'Respiratory') { 
$Respiratory= "X";
}

if ($myrow['Injury'] == 'Injury') { 
$Injury= "X";
}

if ($myrow['PregnancyRelated'] == 'PregnancyRelated') { 
$PregnancyRelated= "X";
}

if ($myrow['UnknownSS'] == 'UnknownSS') { 
$UnknownSS= "X";
}

if ($myrow['Fever_Achiness'] == 'Fever_Achiness') { 
$UnknownSS= "X";
}


/* This way works but changed it to the above for lori
	$Medical = "";		   
if ( $myrow['Diarrhea'] =='Diarrhea') { 
$Medical= $myrow['Diarrhea'];
$Medical .=", ";
} 

if ($myrow['NV'] == 'NV') { 
$Medical .= $myrow['NV'];
$Medical .=", ";
}

if ($myrow['Headache'] == 'Headache') { 
$Medical .= $myrow['Headache'];
$Medical .=", ";
}

if ($myrow['Respiratory'] == 'Respiratory') { 
$Medical .= $myrow['Respiratory'];
$Medical .=", ";
}

if ($myrow['Injury'] == 'Injury') { 
$Medical .= $myrow['Injury'];
$Medical .=", ";
}

if ($myrow['PregnancyRelated'] == 'PregnancyRelated') { 
$Medical .= $myrow['PregnancyRelated'];
$Medical .=", ";
}

if ($myrow['UnknownSS'] == 'UnknownSS') { 
$Medical .= $myrow['UnknownSS'];
}
*/
			   
			   
			   echo "<tr><td><font face=arial size=2>";
               echo $myrow['Department'];
               echo "</font></td><td><font face=arial size=2>";
			   echo $myrow['thedate'];
               echo "</font></td><td><font face=arial size=2>";
               echo $myrow['Name'];
			   echo "</font></td><td bgcolor=#ffff99><font face=arial size=2>";
			   echo $myrow['NonMedical'];
			   echo "</font></td><td bgcolor=#ffff99><font face=arial size=2>";
			   echo $myrow['NonMedicalOther'];
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $Diarrhea;
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $NV;
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $Headache;
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $Respiratory;
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $Injury;
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $PregnancyRelated;
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $UnknownSS;
			   echo "</font></td><td bgcolor=#ffcc66><font face=arial size=2>";
			   echo $Fever_Achiness;
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
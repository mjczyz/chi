<?php 
header("Content-type: application/x-msdownload"); 
header("Content-Disposition: attachment; filename=flex_form.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
//print "$header\n$data";  
?>
<?php 
//http://www.phpfreaks.com/tutorials/114/0.php
define(db_host, "cmlnklamp01"); 
define(db_user, "stez_user"); 
define(db_pass, "stez_1889"); 
define(db_link, mysql_connect(db_host,db_user,db_pass)); 
define(db_name, "ccupcu"); 
mysql_select_db(db_name); 


?> 

<?PHP
$from = $_GET['from'];
$to = $_GET['to'];
$thename = $_GET['thename'];
$thedept = $_GET['thedept'];

/*if ($thedept == 'ALL') {
	$select = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND ((dept = 'CRITICAL CARE NURSING') OR (dept REGEXP '^PROGRESSIVE'))";
} 
else if ($thedept == 'CRITICAL CARE NURSING') {
	$select = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'CRITICAL CARE NURSING')";
} 
else if ($thedept == 'PROGRESSIVE/MOD ICU NURSING') {
	$select = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^PROGRESSIVE')";
}
else {
$select = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (employee = '$empid')";
}*/

if ($thedept == 'ALL') {
	$query = "SELECT * FROM flex_form WHERE date BETWEEN '$from' AND '$to'";
}
else if ($thedept == 'CRITICAL CARE NURSING') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'CRITICAL CARE NURSING')";
} 
else if ($thedept == 'PROGRESSIVE/MOD ICU NURSING') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^PROGRESSIVE')";
}
else if ($thedept == 'CM/SW') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^CM')";
}
else if ($thedept == 'Nurse Triage') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Nurse Triage')";
}
else if ($thedept == 'Burn') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Burn')";
}
else if ($thedept == 'Diabetes') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Diabetes')";
}
else if ($thedept == 'Endo') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Endo')";
}
else if ($thedept == 'Respiratory Care') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Respiratory')";
}
else if ($thedept == 'Rural Health') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Rural')";
}
else if ($thedept == 'Wound Care Center') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Wound')";
}

else if ($thedept == 'Cardiac One') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Cardiac')";
}
else if ($thedept == 'Cath Lab') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Cath')";
}
else if ($thedept == 'CV Diagnostics') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^CV')";
}
else if ($thedept == 'ED') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'ED')";
}
else if ($thedept == 'Labor and Delivery') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Labor')";
}
else if ($thedept == 'HR') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'HR')";
}
else if ($thedept == 'Lab') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Lab')";
}
else if ($thedept == 'Pharmacy') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Pharmacy')";
}
else if ($thedept == 'MedOnc') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'MedOnc')";
}
else if ($thedept == 'NICU') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'NICU')";
}
else if ($thedept == 'Nursery') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Nursery')";
}
else if ($thedept == 'Nursing Service') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Nursing')";
}
else if ($thedept == 'OBGYN') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'OBGYN')";
}
else if ($thedept == 'Ortho') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Ortho')";
}
else if ($thedept == 'PEDS') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'PEDS')";
}
else if ($thedept == 'Short Stay') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Short')";
}
else if ($thedept == 'Surgical') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Surgical')";
}
else if ($thedept == 'Infusion Center') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Infusion')";
}
else if ($thedept == 'OR-Scheduling') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'OR-Scheduling')";
}
else if ($thedept == 'OR-Surgery') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'OR-Surgery')";
}
else if ($thedept == 'Anesthesia') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Anesthesia')";
}
else if ($thedept == 'Processing') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Processing')";
}
else if ($thedept == 'PACU') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'PACU')";
}
else if ($thedept == 'Switchboard') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Switchboard')";
}
else if ($thedept == 'Care MGMT') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Care')";
}

else if ($thedept == 'CardPulmonary Rehab') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^CardPulmonary')";
}
else if ($thedept == 'Health Connect') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Health')";
}
else if ($thedept == 'Distribution') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Distribution')";
}
else if ($thedept == 'Linen') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Linen')";
}

else if ($thedept == 'Cancer') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Cancer')";
}
else if ($thedept == 'Cafeteria') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Cafeteria')";
}
else if ($thedept == 'Volunteer Services') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^Volunteer')";
}
else if ($thedept == 'DME') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'DME')";
}

//radiology
else if ($thedept == 'Radiology Inpatient') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Radiology Inpatient')";
}
else if ($thedept == 'Radiology Aides') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Radiology Aides')";
}
else if ($thedept == 'Radiology Clerical') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Radiology Clerical')";
}
else if ($thedept == 'Radiology-Mammography') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Radiology-Mammography')";
}
else if ($thedept == 'Radiology Special Procedures') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Radiology Special Procedures')";
}
else if ($thedept == 'Radiology Nursing') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Radiology Nursing')";
}
else if ($thedept == 'Radiology MRI') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Radiology MRI')";
}
else if ($thedept == 'Nuclear Medicine') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Nuclear Medicine')";
}
else if ($thedept == 'SENMDS-Ultrasound') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'SENMDS-Ultrasound')";
}
else if ($thedept == 'CT Scan') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'CT Scan')";
}
else if ($thedept == 'Radiation Therapy') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Radiation Therapy')";
}
else if ($thedept == 'PT/OT/Speech') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'PT/OT/Speech')";
}

//start addl depts
else if ($thedept == 'Asthma') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Asthma')";
}
else if ($thedept == 'Clinical IT') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Clinical IT')";
}
else if ($thedept == 'Diagnostics Lab') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Diagnostics Lab')";
}
else if ($thedept == 'Ed Case Mgmt Grant') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Ed Case Mgmt Grant')";
}
else if ($thedept == 'Education Svcs') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Education Svcs')";
}
else if ($thedept == 'Environmental Svcs') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Environmental Svcs')";
}
else if ($thedept == 'Food Nutrition') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Food Nutrition')";
}
else if ($thedept == 'Foundation/Gift Shop') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Foundation/Gift Shop')";
}
else if ($thedept == 'Infant Apnea') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Infant Apnea')";
}
else if ($thedept == 'Medical Library') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Medical Library')";
}
else if ($thedept == 'Outpatient Clinics') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Outpatient Clinics')";
}
else if ($thedept == 'Pallative Care') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Pallative Care')";
}
else if ($thedept == 'Pastoral Care') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Pastoral Care')";
}
else if ($thedept == 'Performance Imp') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Performance Imp')";
}
else if ($thedept == 'Perinatal') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Perinatal')";
}
else if ($thedept == 'Perinatal Education') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Perinatal Education')";
}
else if ($thedept == 'Perinatal Outreach') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Perinatal Outreach')";
}
else if ($thedept == 'Plant/Maint') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Plant/Maint')";
}
else if ($thedept == 'Purchasing') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Purchasing')";
}
else if ($thedept == 'Radiology Ultrasound') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Radiology Ultrasound')";
}
else if ($thedept == 'Recovery') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Recovery')";
}
else if ($thedept == 'Sleep Lab') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Sleep Lab')";
}
else if ($thedept == 'Clinical Desicion Unit') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Clinical Desicion Unit')";
}
else if ($thedept == 'Adult Inpatient Unit') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Adult Inpatient Unit')";
}

//end addl depts

else {
$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (employee = '$empid')";
}





$result = mysql_query($query);

		       echo "<table border=1 width=2400px align=center id=countit>";
			   echo "<tr bgcolor=#cccccc><th width=200px><b><a href=\"?order=Department\"><font face=arial color=white size=1>EMPLOYEE ID</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>FIRST NAME</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>LAST NAME</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>DEPARTMENT</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>DATE</font></a></b></th>";
			   //echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>EXTRA SHIFT</font></a></b></th>";
			   //echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>EXTRA SHIFT POINTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>WEEKDAY SHIFT</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>WEEKDAY SHIFT POINTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>WEEKEND SHIFT</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>WEEKEND SHIFT POINTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>PREMIUM SHIFT</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>PREMIUM SHIFT POINTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>FLOAT</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>FLOAT POINTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>RTO</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>RTO POINTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>SCHED CHANGE</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>SCHED CHANGE POINTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>SHORT NOTICE</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>SHORT NOTICE POINTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>OUTSIDE PARAMS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>COMMENTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>TOTAL</font></a></b></th></tr>";
			   
			   //echo "<th width=300px><b><a href=\"?order=Details\"><font face=arial color=white size=1>DETAILS</font></a></b></th>";
			   //echo "<th width=50px><font face=arial color=white size=1><b>VIEW/EDIT</b></font></th>";
			   //echo "<th width=50px><font face=arial color=white size=1><b>DELETE</b></font></th></tr>";
        while($myrow = mysql_fetch_array($result))
             {//begin of loop
               //now print the results:
			   //$color1 = "#f3f3f3"; 
				//$color2 = "white"; 
				$row_count = 0;
			   $row_color = ($row_count % 2) ? 'white' : 'grey';
			   $total_points = ($myrow['weekday_points'] + $myrow['weekend_points'] + $myrow['premium_points'] + $myrow['float_points'] + $myrow['rto_points'] + $myrow['sched_change_points'] + $myrow['short_notice_points'] + $myrow['outside_params']);
			   //$class = $myrow["class"];
			   echo "<tr bgcolor='$row_color' onmouseover=\"CngCol(this,'#fbf4a1');\"><td width=200px align=left valign=top><font face=arial size=2>";
               echo $myrow['employee'];
               echo "</font></td><td width=200px align=left valign=top bgcolor='#e5f3af'><font face=arial size=2>";
			   echo $myrow['first_name'];
               echo "</font></td><td width=200px align=left valign=top bgcolor='#e5f3af'><font face=arial size=2>";
			   echo $myrow['last_name'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['dept'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['date'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   //echo $myrow['extra_shift'];
               //echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   //echo $myrow['extra_shift_points'];
               //echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['weekday'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['weekday_points'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['weekend'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['weekend_points'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['premium'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['premium_points'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['the_float'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['float_points'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['rto'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['rto_points'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['sched_change'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['sched_change_points'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['short_notice'];
               echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['short_notice_points'];
			   echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['outside_params'];
			   echo "</font></td><td width=200px align=left valign=top><font face=arial size=2>";
			   echo $myrow['comments'];
               echo "</font></td><td width=200px align=left valign=top bgcolor='#e5f3af'><font face=arial size=2>";
			   echo $total_points;
               echo "</font></td>";
			   //<td bgcolor='$td_color' width=50px align=center valign=top>";
               //echo "<a target=_blank href=\"view.php?id=$myrow[id]\"><font face=arial color=#0000ff size=1>VIEW/EDIT</font></a></td>";
			   //echo "<td bgcolor='$td_color' width=50px align=center valign=top>";
			   //echo "<a target=_blank href=\"delete.php?id=$myrow[id]\"><font face=arial color=#0000ff size=1>DELETE</font></a></td></tr>";
			   $row_count++;
			   $grand_total += $total_points;
             }//end of loop
			 
			 echo "<tr bgcolor=#cccccc>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor='#f9d455'><font face=arial size=2>$grand_total</td></tr>";
			 echo "</table>";  	
/*               
$export = mysql_query($select); 
$fields = mysql_num_fields($export); 
?> 


<?php 
for ($i = 0; $i < $fields; $i++) { 
    $header .= mysql_field_name($export, $i) . "\t"; 
} 
?>


<?php 
while($row = mysql_fetch_row($export)) { 
    $line = ''; 
    foreach($row as $value) {                                             
        if ((!isset($value)) OR ($value == "")) { 
            $value = "\t"; 
        } else { 
            $value = str_replace('"', '""', $value); 
            $value = '"' . $value . '"' . "\t"; 
        } 
        $line .= $value; 
    } 
    $data .= trim($line)."\n"; 
} 
$data = str_replace("\r","",$data); 
?> 


<?php 
if ($data == "") { 
    $data = "\n(0) Records Found!\n";                         
} 
*/
?> 
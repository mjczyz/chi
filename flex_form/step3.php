<html>
<head><title>Flexibility Payment Program</title>
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


<?PHP
//$employee=$_POST['employee'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$dept=$_POST['department'];
$date=$_POST['date'];
//list($month, $day, $year) = split("-", $date);
list($month, $day, $year) = preg_split('/-/', $date);
$the_date = $year."-".$month."-".$day;
//$extra_shift=$_POST['extra_shift'];
$weekday=$_POST['weekday'];
$weekend=$_POST['weekend'];
$premium=$_POST['premium'];
//$extra_shift_points=substr($extra_shift, -1);

//mod b/c of 12 hr day
$weekday_points=substr($weekday, -3);
$weekend_points=substr($weekend, -3);
$premium_points=substr($premium, -4);
$float=$_POST['float'];
$float_points=substr($float, -1);
$rto=$_POST['rto'];
$rto_points=substr($rto, -1);
$sched_change=$_POST['sched_change'];
$sched_change_points=substr($sched_change, -1);
$short_notice=$_POST['short_notice'];
$short_notice_points=substr($short_notice, -1);
$outside_params=$_POST['outside_params'];
$comments=$_POST['comments'];
$comments = str_replace("'","",$comments);
//$total=$_POST['total'];

/*if ($extra_shift_points == 0){
$extra_shift_points = 10;
}*/

/*
if ($weekday_points == 5){
	$weekday_points = 1.5;
}
*/
if ($weekday_points == "- 2"){
	$weekday_points = 2;
} else if ($weekday_points == "- 3"){
	$weekday_points = 3;
} else if ($weekday_points == "- 4"){
	$weekday_points = 4;
} else if ($weekday_points == "- 1"){
	$weekday_points = 1;
} else if ($weekday_points == "1.5"){
	$weekday_points = 1.5;
} else if ($weekday_points == "3.5"){
	$weekday_points = 3.5;
} else if ($weekday_points == "5.5"){
	$weekday_points = 5.5;
}


if ($weekend_points == "2.5"){
	$weekend_points = 2.5;
} else if ($weekend_points == "3.5"){
	$weekend_points = 3.5;
} else if ($weekend_points == "- 3"){
	$weekend_points = 3;
} else if ($weekend_points == "- 5"){
	$weekend_points = 5;
} else if ($weekend_points == "- 6"){
	$weekend_points = 6;
} else if ($weekend_points == "- 7"){
	$weekend_points = 7;
} else if ($weekend_points == "- 8"){
	$weekend_points = 8;
} else if ($weekend_points == " 10"){
	$weekend_points = 10;
}

if ($premium_points == " - 8"){
	$premium_points = 8;
} else if ($premium_points == " - 9"){
	$premium_points = 9;
} else if ($premium_points == "- 10"){
	$premium_points = 10;
} else if ($premium_points == " - 4"){
	$premium_points = 4;
} else if ($premium_points == " 4.5"){
	$premium_points = 4.5;
} else if ($premium_points == " - 5"){
	$premium_points = 5;
} else if ($premium_points == "12.5"){
	$premium_points = 12.5;
} else if ($premium_points == "14.5"){
	$premium_points = 14.5;
}

/*
if ($premium_points == 5){
	$premium_points = 4.5;
}

if ($premium_points == 't'){
$premium_points = 0;
} else if ($premium_points == 0){
$premium_points = 10;
}
*/


if ($float_points == 5){
$float_points = 1.5;
}
if ($rto_points == 5){
$rto_points = 1.5;
}

// Make a MySQL Connection
//mysql_connect("localhost", "stez_user", "stez_1889") or die(mysql_error());
//mysql_select_db("ccupcu") or die(mysql_error());
$mysqli = new mysqli("localhost", "stez_user", "stez_1889", "ccupcu");
mysqli_connect("localhost", "stez_user", "stez_1889", "ccupcu");


$sql="INSERT INTO flex_form (first_name,last_name,dept,date,weekday,weekday_points,weekend,weekend_points,premium,premium_points,the_float,float_points,rto,rto_points,sched_change,sched_change_points,short_notice,short_notice_points,comments,outside_params) VALUES('$first_name','$last_name','$dept','$the_date','$weekday','$weekday_points','$weekend','$weekend_points','$premium','$premium_points','$float','$float_points','$rto','$rto_points','$sched_change','$sched_change_points','$short_notice','$short_notice_points','$comments','$outside_params')";

$result = mysqli_query($mysqli, $sql);

//$result = mysql_query("INSERT INTO flex_form (first_name,last_name,dept,date,weekday,weekday_points,weekend,weekend_points,premium,premium_points,the_float,float_points,rto,rto_points,sched_change,sched_change_points,short_notice,short_notice_points,comments,outside_params) VALUES('$first_name','$last_name','$dept','$the_date','$weekday','$weekday_points','$weekend','$weekend_points','$premium','$premium_points','$float','$float_points','$rto','$rto_points','$sched_change','$sched_change_points','$short_notice','$short_notice_points','$comments','$outside_params')") or die(mysql_error());


//$to = "$email";
$to = "mczyz@stez.org";
$subject = "Flex Form Submission";
$message = "$first_name&nbsp;$last_name<br>$dept<br>$the_date<br><br>Weekday<br>$weekday_points<br><br>Weekend<br>$weekend_points<br><br>Premium<br>$premium_points<br><br>Float<br>$float_points points<br><br>RTO<br>$rto_points points<br><br>Schedule Change<br>$sched_change_points points<br><br>Short Notice<br>$short_notice_points points<br><br>Comments<br>$comments<br><br>Outside Parameters<br>$outside_params";
//$from = "noreply@stez.org";
// Always set content-type when sending HTML email
$headers = "From: intranet@stez.org\n";
if ($dept=="CRITICAL CARE NURSING"){
	$headers .= "Cc: prandall@stez.org, jearl@stez.org \n";
}
elseif ($dept=="Burn"){
	$headers .= "Cc:cchaves@stez.org, eearley@stez.org\n";
}
elseif ($dept=="Diabetes"){
	$headers .= "Cc:cchaves@stez.org, EEarley@stez.org\n";
}
elseif ($dept=="Endo"){
	$headers .= "Cc: SGregoryWitherspoon@stez.org, CBartholomew@stez.org, cchaves@stez.org, eearley@stez.org\n";
}
elseif ($dept=="PROGRESSIVE/MOD ICU NURSING"){
	$headers .= "Cc: prandall@stez.org, jearl@stez.org \n";
}
elseif ($dept=="Respiratory Care"){
	$headers .= "Cc: pkelley@stez.org, jfuller@stez.org, knelson@stez.org \n";
}
elseif ($dept=="Rural Health"){
	$headers .= "Cc: Rodney.Triplett@alegent.org \n";
}
elseif ($dept=="Wound Care Center"){
	$headers .= "Cc: cchaves@stez.org, jroberts@stez.org, EEarley@stez.org\n";
}
elseif ($dept=="Cardiac One"){
	$headers .= "Cc: Clivingston@neheart.com, Jmccarville@neheart.com\n";
}
elseif ($dept=="Cath Lab"){
	$headers .= "Cc: jdunn@neheart.com\n";
}
elseif ($dept=="CM/SW"){
	$headers .= "Cc: athygesen@stez.org\n";
}
elseif ($dept=="Nurse Triage"){
	$headers .= "Cc: pfritz@stez.org\n";
}
elseif ($dept=="CV Diagnostics"){
	$headers .= "Cc: ckimes@stez.org, chanson@neheart.com\n";
}
elseif ($dept=="Ortho"){
	$headers .= "Cc: mczyz@stez.org\n";
}
elseif ($dept=="ED"){
	$headers .= "Cc: prandall@stez.org, CKlaasmeyer@stez.org\n";
}
elseif ($dept=="NICU"){
	$headers .= "Cc: LDuffield@stez.org, GReinke@stez.org\n";
}
elseif ($dept=="Nursery"){
	$headers .= "Cc: LDuffield@stez.org, GReinke@stez.org\n";
}
elseif ($dept=="PEDS"){
	$headers .= "Cc: LDuffield@stez.org, GReinke@stez.org\n";
}
elseif ($dept=="MedOnc"){
	$headers .= "Cc: KHutchins@stez.org\n";
}
elseif ($dept=="OBGYN"){
	$headers .= "Cc: greinke@stez.org\n";
}
elseif ($dept=="Labor and Delivery"){
	$headers .= "Cc: greinke@stez.org \n";
}
elseif ($dept=="Lab"){
	$headers .= "Cc: bcroner@stez.org\n";
}
elseif ($dept=="Nursing Service"){
	$headers .= "Cc: jvandegriend@stez.org, lrmiller@stez.org\n";
}
elseif ($dept=="Short Stay"){
	$headers .= "Cc: VSchroeder@stez.org, NGondringer@stez.org, avandenberg@stez.org\n";
}
elseif ($dept=="Surgical"){
	$headers .= "Cc: DCallies@stez.org\n";
}
elseif ($dept=="Infusion Center"){
	$headers .= "Cc: KHutchins@stez.org, lrmiller@stez.org\n";
}
elseif ($dept=="OR-Scheduling"){
	$headers .= "Cc: rweber@stez.org, NGondringer@stez.org\n";
}
elseif ($dept=="OR-Surgery"){
	$headers .= "Cc: VSchroeder@stez.org, NGondringer@stez.org, jegr@stez.org, avandenberg@stez.org\n";
}

elseif ($dept=="Anesthesia"){
	$headers .= "Cc: VSchroeder@stez.org, NGondringer@stez.org\n";
}
elseif ($dept=="Processing"){
	$headers .= "Cc: VSchroeder@stez.org, NGondringer@stez.org, abreunig@stez.org, avandenberg@stez.org\n";
}
elseif ($dept=="PACU"){
	$headers .= "Cc: VSchroeder@stez.org, NGondringer@stez.org, KJohnson@stez.org, KKumwenda@stez.org, jhupp@stez.org\n";
}
elseif ($dept=="Switchboard"){
	$headers .= "Cc: syaskevich@stez.org, LRMiller@stez.org\n";
}
//elseif ($dept=="Care MGMT"){
//	$headers .= "Cc: jvandegriend@stez.org\n";
//}
elseif ($dept=="CardPulmonary Rehab"){
	$headers .= "Cc: scerio@neheart.com, jstachura@stez.org\n";
}
elseif ($dept=="Health Connect"){
	$headers .= "Cc: JSorensen1@stez.org\n";
}
elseif ($dept=="Distribution"){
	$headers .= "Cc: CMorales@stez.org\n";
}
elseif ($dept=="Linen"){
	$headers .= "Cc: CMorales@stez.org\n";
}
elseif ($dept=="Cancer"){
	$headers .= "Cc: mhopkins@stez.org, rbrinkman@stez.org \n";
}
elseif ($dept=="Cafeteria"){
	$headers .= "Cc: JBehrens@stez.org, dsorensen@stez.org\n";
}
elseif ($dept=="Volunteer Services"){
	$headers .= "Cc: JKreifels@stez.org\n";
}
elseif ($dept=="DME"){
	$headers .= "Cc: jsnyder@stez.org, DDipaolo@stez.org\n";
}
elseif ($dept=="PT/OT/Speech"){
	$headers .= "Cc: jsnyder@stez.org, JStoltenberg@stez.org, pubben@stez.org, CLanguein@stez.org, knelson@stez.org\n";
}

elseif ($dept=="Asthma"){
	$headers .= "Cc: jsnyder@stez.org	\n";
}
elseif ($dept=="Clinical IT"){
	$headers .= "Cc: dchambers@stez.org	\n";
}
elseif ($dept=="Diagnostics Lab"){
	$headers .= "Cc: pkelley@stez.org, jfuller@stez.org, knelson@stez.org\n";
}
elseif ($dept=="Ed Case Mgmt Grant"){
	$headers .= "Cc: prandall@stez.org, CKlaasmeyer@stez.org\n";
}
elseif ($dept=="Education Svcs"){
	$headers .= "Cc: schuelke@stez.org	\n";
}
elseif ($dept=="Environmental Svcs"){
	$headers .= "Cc: plivingston@stez.org, kondrak@stez.org, sfield@stez.org, tlmeduna@stez.org\n";
}
elseif ($dept=="Food Nutrition"){
	$headers .= "Cc: dsorensen@stez.org, mklinzman@neheart.com, Tpeet@stez.org \n";
}
elseif ($dept=="Foundation/Gift Shop"){
	$headers .= "Cc: dhammack@stez.org	\n";
}
elseif ($dept=="HR/Recruit"){
	$headers .= "Cc: CKOCH@STEZ.ORG	\n";
}
elseif ($dept=="Infant Apnea"){
	$headers .= "Cc: swalsh@stez.org, jvandegriend@stez.org\n";
}
elseif ($dept=="Medical Library"){
	$headers .= "Cc: sschuelke@stez.org	\n";
}
elseif ($dept=="OR Scheduling"){
	$headers .= "Cc: rweber@stez.org, NGondringer@stez.org\n";
}
elseif ($dept=="OR Surgery"){
	$headers .= "Cc: jegr@stez.org, VSchroeder@stez.org, NGondringer@stez.org,  avandenberg@stez.org\n";
}
elseif ($dept=="Outpatient Clinics"){
	$headers .= "Cc: cchaves@stez.org, eearley@stez.org\n";
}
elseif ($dept=="Pallative Care"){
	$headers .= "Cc: MTrauernicht@stez.org, KSmith@stez.org\n";
}
elseif ($dept=="Pastoral Care"){
	$headers .= "Cc: srmimig@stez.org\n";
}
elseif ($dept=="Performance Imp"){
	$headers .= "Cc: lparker@stez.org\n";
}
elseif ($dept=="Perinatal"){
	$headers .= "Cc: cmiles@stez.org, greinke@stez.org\n";
}
elseif ($dept=="Perinatal Education"){
	$headers .= "Cc: jmadsen@stez.org, greinke@stez.org\n";
}
elseif ($dept=="Perinatal Outreach"){
	$headers .= "Cc: swalsh@stez.org, jvandegriend@stez.org\n";
}
elseif ($dept=="Pharmacy"){
	$headers .= "Cc: lmorris@stez.org, AMEdgington@stez.org\n";
}
elseif ($dept=="Plant/Maint"){
	$headers .= "Cc: fschaffert@stez.org, rlehn@stez.org\n";
}
elseif ($dept=="Purchasing"){
	$headers .= "Cc: mliebentritt@stez.org\n";
}
elseif ($dept=="Radiology Ultrasound"){
	$headers .= "Cc: ajurgens@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="Recovery"){
	$headers .= "Cc: VSchroeder@stez.org, KJohnson@stez.org, KKumwenda@stez.org, NGondringer@stez.org\n";
}
elseif ($dept=="Sleep Lab"){
	$headers .= "Cc: jsnyder@stez.org, cakers2@stez.org\n";
}

//radiology
elseif ($dept=="Radiology Inpatient"){
	$headers .= "Cc: kbetancur@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="Radiology Aides"){
	$headers .= "Cc: kbetancur@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="Radiology Clerical"){
	$headers .= "Cc: abode@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="Radiology-Mammography"){
	$headers .= "Cc: mmalcom@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="Radiology Special Procedures"){
	$headers .= "Cc: sschultz@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="Radiology Nursing"){
	$headers .= "Cc: jemken@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="Radiology MRI"){
	$headers .= "Cc: lkohmetscher@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="Nuclear Medicine"){
	$headers .= "Cc: rgoings@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="SENMDS-Ultrasound"){
	$headers .= "Cc: athimm@stez.org\n";
}
elseif ($dept=="CT Scan"){
	$headers .= "Cc: grehm@stez.org, rbrinkman@stez.org\n";
}
elseif ($dept=="Radiation Therapy"){
	$headers .= "Cc: nlafleur@stez.org, rbrinkman@stez.org\n";
}

elseif ($dept=="Pharmacy"){
	$headers .= "Cc: mgerman@stez.org, plauder@stez.org\n";
}
elseif ($dept=="Clinical Desicion Unit"){
	$headers .= "Cc: asaathoff@stez.org, cking@stez.org, CKlaasmeyer@stez.org, PRandall@stez.org\n";
}
elseif ($dept=="Adult Inpatient Unit"){
	$headers .= "Cc: bnelsen@stez.org, khutchins@stez.org,\n";
}
else {
	$headers .= "Cc: lvifquain@stez.org\n";
}
//$headers .= "Cc: gjesionowicz@stez.org, lvifquain@stez.org\n";

$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=UTF-8\n";
//$headers .= 'From: intranet@stez.org' . "\r\n";
//$headers .= 'Cc: csteele@stez.org';
mail($to,$subject,$message,$headers,'-f intranet@stez.org');
//echo "Mail Sent.";


echo "<b>Thank you! You have Submitted the form SUCCESSFULLY!<br>
  Please call your director if there are any issues<br><br><hr>";
  echo "$first_name&nbsp;$last_name<br>$dept<br>$the_date<br><br>Weekday<br>$weekday_points<br><br>Weekend<br>$weekend_points<br><br>Premium<br>$premium_points<br><br>Float<br>$float_points points<br><br>RTO<br>$rto_points points<br><br>Schedule Change<br>$sched_change_points points<br><br>Short Notice<br>$short_notice_points points<br><br>Comments<br>$comments<br><br>Outside Parameters<br>$outside_params";

	?>
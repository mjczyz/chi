<?php session_start(); 
//echo $_SESSION['empno'];

//if(isset($_SESSION['empno'])) {
    //$empno2 = $_SESSION['empno'];
//}
//else {
    //$empno2 = '00000';
	//echo "empno is not set";
//}
//2/3/2015 - cmlnkprd01 shut down
/*require('config/mysql_connect.php');
require('config/variables.php');
$conn = db_connect();*/

/*if(isset($_COOKIE['login_uid'])) 
{ 
$flex_uid = $_COOKIE['login_uid']; 
$flex_upass = $_COOKIE['login_upass']; 
$flex_empno = $_COOKIE['login_empno'];
*/
?>
<html>
<head><title>Flexibility (point) Payment Program Form</title>
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
<script type="text/javascript">
<!--//

function formValidation(form){
if(notEmpty(form.first_name)){
if(notEmpty(form.last_name)){
if(notEmpty(form.email)){
if(notEmpty(form.department)){
if(notEmpty(form.date)){

return true;

}
}
}
}
}
return false;
}
function notEmpty(elem){
var str = elem.value;
if(str.length == 0){
alert("You must fill in all fields (*)");
return false;
} else {
return true;
}
}

//-->

</script>
<link href="CalendarControl.css" rel="stylesheet" type="text/css">
<script src="CalendarControl.js" language="javascript"></script>
</head>
<body>

<br>
<h3 align="center" class="style6">&nbsp;</h3>
<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td><span class="style11"><span class="style12">::</span>Flexibility (point) Payment Program Form<span class="style7"></span></span></td>
  </tr>
</table>

<form name="addreg" method="post" action="step3.php" onSubmit="return formValidation(this)" language="JavaScript">
<input name="var" type="hidden" value="2">
<input name="logged_in" type="hidden" value="y">
  <table width="800" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr align="left" valign="top">
      <td width="300"><span class="style5">
        
Associate First Name*: </span></td>
      <td width="320"><input name="first_name" size="40" maxlength="255" value=""></td>
    </tr>
    <tr align="left" valign="top">
      <td width="300"><span class="style5">
        
Associate Last Name*: </span></td>
      <td width="320"><input name="last_name" size="40" maxlength="255" value=""></td>
    </tr>
    <tr align="left" valign="top">
      <td width="300"><span class="style5">
        
Associate email*: </span></td>
      <td width="320"><input name="email" size="40" maxlength="255" value=""></td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">
      
Department Name*:</span></td>
      <td><select name="department">
          <option value="" selected="selected"></option>
          
          <option value="Adult Inpatient Unit">Adult Inpatient Unit</option>
          <option value="Anesthesia">Anesthesia</option>
         <option value="Asthma">Asthma</option>
          <option value="Burn">Burn</option>
          <option value="Cafeteria">Cafeteria</option>
          <option value="Cancer">Cancer</option>
          <option value="Cardiac One">Cardiac One</option>
          <option value="CardPulmonary Rehab">Cardiac/Pulmonary Rehab</option>
          <!--<option value="Care MGMT">Care MGMT</option>-->
          <option value="Cath Lab">Cath Lab</option>
          <option value="Cerner/One Care">Cerner/One Care</option>
          <option value="Clinical Desicion Unit">Clinical Desicion Unit</option>
          <option value="Clinical IT">Clinical IT</option>
          <option value="CM/SW">CM/SW</option>
          <option value="CRITICAL CARE NURSING">CRITICAL CARE NURSING</option>
          <option value="CT Scan">CT Scan</option>
          <option value="CV Diagnostics">CV Diagnostics</option>
          <option value="Diabetes">Diabetes</option>
          <option value="Diagnostics Lab">Diagnostics Lab</option>
          <option value="Distribution">Distribution</option>
          <option value="DME">DME</option>
          <option value="ED">ED</option>
          <option value="Ed Case Mgmt Grant">Ed Case Mgmt Grant</option>
          <option value="Education Svcs">Education Svcs</option>
          <option value="Endo">Endo</option>
          <option value="Environmental Svcs">Environmental Svcs</option>
          <option value="Food Nutrition">Food Nutrition</option>
          <option value="Foundation/Gift Shop">Foundation/Gift Shop</option>
          <option value="Health Connect">Health Connect</option>
          <option value="HR">HR/Recruiting</option>
          <option value="Infant Apnea">Infant Apnea</option>
          <option value="Infusion Center">Infusion Center</option>
          <option value="Lab">Lab</option>
          <option value="Labor and Delivery">Labor and Delivery</option>
          <option value="Linen">Linen</option>
          <option value="Medical Library">Medical Library</option>
          <option value="MedOnc">MedOnc</option>
          <option value="NICU">NICU</option>
          <option value="Nuclear Medicine">Nuclear Medicine</option>
          <option value="Nursery">Nursery</option>
          <option value="Nurse Triage">Nurse Triage</option>
          <option value="Nursing Service">Nursing Service</option>
          <option value="OBGYN">OBGYN</option>
          <option value="Ortho">Ortho</option>
          <option value="OR-Scheduling">OR-Scheduling</option>
          <option value="OR-Surgery">OR-Surgery</option>
          <option value="Outpatient Clinics">Outpatient Clinics</option>
          <option value="PACU">PACU</option>
          <option value="Pallative Care">Pallative Care</option>
          <option value="Pastoral Care">Pastoral Care</option>
          <option value="PEDS">PEDS</option>
          <option value="Performance Imp">Performance Imp</option>
          <option value="Perinatal">Perinatal</option>
		  <option value="Perinatal Education">Perinatal Education</option>
		  <option value="Perinatal Outreach">Perinatal Outreach</option>
          <option value="Pharmacy">Pharmacy</option>
          <option value="Plant/Maint">Plant/Maint</option>
          <option value="Processing">Processing</option>
          <option value="PROGRESSIVE/MOD ICU NURSING">PROGRESSIVE/MOD ICU NURSING</option>
          <option value="PT/OT/Speech">PT/OT/Speech</option>
          <option value="Purchasing">Purchasing</option>
          <option value="Radiology Aides">Radiology Aides</option>
          <option value="Radiology Clerical">Radiology Clerical</option>
          <option value="Radiology Inpatient">Radiology Inpatient</option>
          <option value="Radiology-Mammography">Radiology-Mammography</option>
          <option value="Radiology MRI">Radiology MRI</option>
          <option value="Radiology Nursing">Radiology Nursing</option>
          <option value="Radiology Special Procedures">Radiology Special Procedures</option>
          <option value="Radiology Ultrasound">Radiology Ultrasound</option>
          <option value="Radiation Therapy">Radiation Therapy</option>
          <option value="Recovery">Recovery</option>
          <option value="Respiratory Care">Respiratory Care</option>
          <option value="Rural Health">Rural Health</option>
          <option value="SENMDS-Ultrasound">SENMDS-Ultrasound</option>
          <option value="Short Stay">Short Stay</option>
          <option value="Sleep Lab">Sleep Lab</option>
          <option value="Surgical">Surgical</option>
          <option value="Switchboard">Switchboard</option>
          <option value="Volunteer Services">Volunteer Services</option>
          <option value="Wound Care Center">Wound Care Center</option>
          </select></td>
    </tr>
    
	<tr align="left" valign="top">
      <td width="300"><span class="style5">

Date Points Awarded*: 
    <br /><br />


</span></td>
      <td width="320"><span class="style5">
        <input type="text" name="date" size="16" onFocus="showCalendarControl(this);">
      </span></td>
    </tr>
    <!--<tr align="left" valign="top">
      <td><span class="style5"><strong>Additional Points</strong></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">Float: </span></td>
      <td><span class="style5">
        <select name="float">
          <option value="" selected="selected">-- Select an option --</option>
          <option value="2-8 hr shift - 1">1 pt for 2-8 hr shift</option>
          <option value="8+ hr shift - 1.5">1.5 pts for 8+ hr shift</option>
        </select>
      </span></td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">RTO:
        <br />
<br />
      </span></td>
      <td><span class="style5">
        <select name="rto">
          <option value="" selected="selected">-- Select an option --</option>
          <option value="2-8 hr shift - 1">1 pt for 2-8 hr shift</option>
          <option value="8+ hr shift - 1.5">1.5 pts for 8+ hr shift</option>
        </select>
      </span></td>
    </tr>-->
    <tr align="left" valign="top" >
      <td><span class="style5"><strong>Extra Shifts</strong></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr align="left" valign="top" bgcolor="#CCCCCC">
      <td width="300"><span class="style5">Section A: Weekday</span></td>
      <td width="320"><span class="style5">
        <select name="weekday">
          <option value="" selected="selected">-- Select an option --</option>
          <option value="Weekday - 8 hour day shift - 2">8 hour day shift - 2pt</option>
          <option value="Weekday - 8 hour evening shift - 3">8 hour evening shift - 3pt</option>
          <option value="Weekday - 8 hour night shift - 4">8 hour night shift - 4pt</option>
          <option value="Weekday - 4 hour day shift - 1">4 hour day shift - 1pt</option>
          <option value="Weekday - 4 hour evening shift - 1.5">4 hour evening shift - 1.5pt</option>
          <option value="Weekday - 4 hour night shift - 2">4 hour night shift - 2pt</option>
          <option value="Weekday - 12 hour day shift - 3.5">12 hour day shift - 3.5pt</option>
          <option value="Weekday - 12 hour night shift - 5.5">12 hour night shift - 5.5pt</option>
          </select>
      </span><br /><br /></td>
    </tr>
    <tr align="left" valign="top" bgcolor="#EFEFEF">
      <td width="300"><span class="style5">Section B: Weekend <br />(Friday 3 pm – Monday 7 am)</span></td>
      <td width="320"><span class="style5">
        <select name="weekend">
          <option value="" selected="selected">-- Select an option --</option>
          <option value="Weekend - 8 hour day shift - 5">8 hour day shift - 5pt</option>
          <option value="Weekend - 8 hour evening shift - 6">8 hour evening shift - 6pt</option>
          <option value="Weekend - 8 hour night shift - 7">8 hour night shift - 7pt</option>
          <option value="Weekend - 4 hour day shift - 2.5">4 hour day shift - 2.5pt</option>
          <option value="Weekend - 4 hour evening shift - 3">4 hour evening shift - 3pt</option>
          <option value="Weekend - 4 hour night shift - 3.5">4 hour night shift - 3.5pt</option>
          <option value="Weekend - 12 hour day shift - 8">12 hour day shift - 8pt</option>
          <option value="Weekend - 12 hour night shift - 10">12 hour night shift - 10pt</option>
          
        </select>
      </span><br /><br /></td>
    </tr>
    
    <tr align="left" valign="top" bgcolor="#CCCCCC">
      <td width="300"><span class="style5">Section C: Premium<br>
      <strong>Eligible Holidays:</strong> <br>
        <i>- Thanksgiving 7am-11 pm<br>
- Christmas Eve 3 pm thru 11 pm Christmas Day<br>
- New Years 11 pm(eve)-11 pm (day)<br>
- July 4th 7am-11pm<br>
- Easter 7am-11pm<br>
- Mother's Day 7am-11pm<br>
- Father's Day 7am-11 pm<br>
- Halloween 5pm-11pm<br></i></span><br /></td>
      <td width="320"><span class="style5">
        <select name="premium">
          <option value="select" selected="selected">-- Select an option --</option>
          <option value="Premium - 8 hour day shift - 8">8 hour day shift - 8pt</option>
          <option value="Premium - 8 hour evening shift - 9">8 hour evening shift - 9pt</option>
          <option value="Premium - 8 hour night shift - 10">8 hour night shift - 10pt</option>
          <option value="Premium - 4 hour day shift - 4">4 hour day shift - 4pt</option>
          <option value="Premium - 4 hour evening shift - 4.5">4 hour evening shift - 4.5pt</option>
          <option value="Premium - 4 hour night shift - 5">4 hour night shift - 5pt</option>
          <option value="Premium - 12 hour day shift - 12.5">12 hour day shift - 12.5pt</option>
          <option value="Premium - 12 hour night shift - 14.5">12 hour night shift - 14.5pt</option>
          
        </select>
      </span></td>
    </tr>
    
    <tr align="left" valign="top">
      <td colspan="2"><span class="style5">
        <input name="sched_change" type="checkbox" value="Change in Schedule - 1" /> 
        Change in Schedule (1 point)<br />
        <em>Notified 2+ hours before shift (Director Approval)</em></span></td>
    </tr>
    <tr align="left" valign="top">
      <td colspan="2"><span class="style5">
        <input name="short_notice" type="checkbox" value="Short Notice - 5" /> 
        Short Notice (5 points)<br />
      <em>Within 2 hours</em></span></td>
    </tr>
    
    
    <tr align="left" valign="top">
      <td width="800"><span class="style5">
        <br>
If extra points were approved how many? <br>
(also in comments explain why extra points were rewarded): </span><br>

<select name="outside_params">
          <option value="" selected="selected">-- Select an option --</option>
          <option value=".5">.5pt</option>
          <option value="1">1pt</option>
          <option value="1.5">1.5pt</option>
          <option value="2">2pt</option>
          <option value="2.5">2.5pt</option>
          <option value="3">3pt</option>
          <option value="3.5">3.5pt</option>
          <option value="4">4pt</option>
          <option value="4.5">4.5pt</option>
          <option value="5">5pt</option>
          <option value="5.5">5.5pt</option>
          <option value="6">6pt</option>
          <option value="6.5">6.5pt</option>
          <option value="7">7pt</option>
          <option value="7.5">7.5pt</option>
          <option value="8">8pt</option>
          <option value="8.5">8.5pt</option>
          <option value="9">9pt</option>
          <option value="9.5">9.5pt</option>
          <option value="10">10pt</option>
          <option value="10.5">10.5pt</option>
          <option value="11">11pt</option>
          <option value="11.5">11.5pt</option>
          <option value="12">12pt</option>
          <option value="12.5">12.5pt</option>
          <option value="13">13pt</option>
          <option value="13.5">13.5pt</option>
          <option value="14">14pt</option>
          <option value="14.5">14.5pt</option>
          <option value="15">15pt</option>
          <option value="15.5">15.5pt</option>
          <option value="16">16pt</option>
          <option value="16.5">16.5pt</option>
          <option value="17">17pt</option>
          <option value="17.5">17.5pt</option>
          <option value="18">18pt</option>
          <option value="18.5">18.5pt</option>
          <option value="19">19pt</option>
          <option value="19.5">19.5pt</option>
          <option value="20">20pt</option>
          <option value="20.5">20.5pt</option>
          <option value="21">21pt</option>
          <option value="21.5">21.5pt</option>
          <option value="22">22pt</option>
          <option value="22.5">22.5pt</option>
          <option value="23">23pt</option>
          <option value="23.5">23.5pt</option>
          <option value="24">24pt</option>
          <option value="24.5">24.5pt</option>
          <option value="25">25pt</option>
          <option value="25.5">25.5pt</option>
          <option value="26">26pt</option>
          <option value="26.5">26.5pt</option>
          <option value="27">27pt</option>
          <option value="27.5">27.5pt</option>
          <option value="28">28pt</option>
          <option value="28.5">28.5pt</option>
          <option value="29">29pt</option>
          <option value="29.5">29.5pt</option>
          <option value="30">30pt</option>
          
        </select>







<br><br></td>
      <td width="1">&nbsp;</td>
    </tr>
    
    
    
    <tr align="left" valign="top" bgcolor="#EFEFEF">
    <td><span class="style5">Comments: </span><br><br>
    <textarea cols="40" rows="5" name="comments"></textarea></td>
      <td colspan="2"><span class="style5"><br><br>
        </span></td>
    </tr>
  </table>
  <p align="center"><br>
    <input type="submit" name="submit" value="Submit">
  </p>
</form>
</body>
</html>
<?PHP 
$hostName = "cmlnkwiki";
$userName = "intranet";
$password = "password";
$dbName = "absentee_db";

//$Date = date("Y-m-d");

if ($Submit) {

mysql_connect($hostName,$userName,$password) or die("Unable to connect to host $hostName");
mysql_select_db($dbName) or die("Unable to select database $dbName");

$Date = str_replace("'","''",$Date);
$TimeOfCall = str_replace("'","''",$TimeOfCall);
$Name = str_replace("'","''",$Name);
$Department = str_replace("'","''",$Department);
$NonMedical = str_replace("'","''",$NonMedical);
$NonMedicalOther = str_replace("'","''",$NonMedicalOther);

$Diarrhea = str_replace("'","''",$Diarrhea);
$NV = str_replace("'","''",$NV);
$Headache = str_replace("'","''",$Headache);
$Respiratory = str_replace("'","''",$Respiratory);
$Injury = str_replace("'","''",$Injury);
$PregnancyRelated = str_replace("'","''",$PregnancyRelated);
$UnknownSS = str_replace("'","''",$UnknownSS);
$MedicalOtherBox = str_replace("'","''",$MedicalOtherBox);

//$Medical = str_replace("'","''",$Medical);
$MedicalOther = str_replace("'","''",$MedicalOther);
$NameTakingMsg = str_replace("'","''",$NameTakingMsg);
$Details = str_replace("'","''",$Details);
$FMLA = str_replace("'","''",$FMLA);

//name all fields Medical[]	  

//$Medical = implode(', ', $_POST['Medical']);

$sql = "INSERT INTO illness_tbl (Date, TimeOfCall, Name, NonMedical, NonMedicalOther, Diarrhea, NV, Headache, Respiratory, Injury, PregnancyRelated, UnknownSS, MedicalOtherBox, MedicalOther, NameTakingMsg, Details, Department, FMLA) VALUES ('$Date', '$TimeOfCall', '$Name', '$NonMedical', '$NonMedicalOther', '$Diarrhea', '$NV', '$Headache', '$Respiratory', '$Injury', '$PregnancyRelated', '$UnknownSS', '$MedicalOtherBox', '$MedicalOther', '$NameTakingMsg', '$Details', '$Department', '$FMLA')";





$result = mysql_query($sql);

  echo "<b>Thank you! Your request has been sent Successfully!<br><br>You'll be redirected back to the Home Page after (3) Seconds";
          echo "<meta http-equiv=Refresh content=3;url=http://stentint/>";
  
  //echo "Thank you! Information entered.\n";

} else{

  // display form
  
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Absentee Form</title>
<link rel="stylesheet" type="text/css" href="cssform.css" />
<script language="JavaScript" type="text/javascript" src="cssform.js"></script>

<script type="text/javascript">
<!--

function formValidation(form){
if(notEmpty(form.TimeOfCall)){
if(notEmpty(form.Name)){
if(notEmpty(form.Department)){
//if(notEmpty(form.Reason)){
if(notEmpty(form.NameTakingMsg)){
//if(notEmpty(form.Details)){
if(validateRadio(form.FMLA)){
return true;
}
}
}
//}
}
//}
}
return false;
}
function notEmpty(elem){
var str = elem.value;
if(str.length == 0){
alert("You must fill in all required fields (*)");
return false;
} else {
return true;
}
}


function validateRadio(radio)
{
    if ((radio[0].checked)||(radio[1].checked))
        return true;
    else
        alert("You must fill in all required fields (*)")
}

//-->
</script>

<script language="JavaScript" type="text/JavaScript">
<!--
menu_status = new Array(); 
function showHide(theid){
    if (document.getElementById) {
    var switch_id = document.getElementById(theid);

        if(menu_status[theid] != 'show') {
           switch_id.className = 'show';
           menu_status[theid] = 'show';
        }else{
           switch_id.className = 'hide';
           menu_status[theid] = 'hide';
        }
    }
}

//-->
</script>





</head>
<body>
<h3>Associate Absentee Log</h3>
<div id="container">
  <!-- p id="fm-intro" required for 'hide optional fields' function -->Fields in <strong>bold</strong> are required.
  
  <!--<br />Fields in <strong>bold</strong> are required.-->
<form id="fm-form" method="post" action="<?php echo $PHP_SELF ?>" onSubmit="return formValidation(this)" language="JavaScript">
    <fieldset>
    <legend>General information</legend>
    <div class="fm-req">
      <label for="fm-Date">Date:</label>
      <input name="Date" id="fm-Date" type="text" value="<?PHP echo date("m/d/Y"); ?>"/>
    </div>
    <div class="fm-req">
      <label for="fm-TimeOfCall">Time of Call:</label>
      <input id="fm-TimeOfCall" name="TimeOfCall" type="text" />
    </div>
    <div class="fm-req">
      <label for="fm-Name">Name:</label>
      <input name="Name" id="fm-Name" type="text" />
    </div>
	<div class="fm-req">
      <label for="fm-Department">Department:</label>
      <!--<input name="Department" id="fm-Department" type="text" />-->
	  <br /><br /><select name="Department">
	  <option value="" selected>Please select your department</option>
	  <option value="5350-ACF(PHY)">5350-ACF(PHY)</option>
	<option value="5000-ADM-ADMIN(PHY)">5000-ADM-ADMIN(PHY)</option>
	<option value="4500-ADMIN-FOUNDATION(RMC)">4500-ADMIN-FOUNDATION(RMC)</option>
	<option value="9060-ADMITTING(RMC)">9060-ADMITTING(RMC)</option>
	<option value="7050-ANESTHESIA(RMC)">7050-ANESTHESIA(RMC)</option>
	<option value="4501-ANNUAL GIVING(RMC)">4501-ANNUAL GIVING(RMC)</option>
	<option value="5550-APC(PHY)">5550-APC(PHY)</option>
	<option value="5600-ARC(PHY)">5600-ARC(PHY)</option>
	<option value="8700-ASTHMA ED-SCMINISTRY(RMC)">8700-ASTHMA ED-SCMINISTRY(RMC)</option>
	<option value="8710-ASTHMA INIT-GEN(RMC)">8710-ASTHMA INIT - GEN(RMC)</option>
	<option value="6090-BURN CENTER NURSING(RMC)">6090-BURN CENTER NURSING(RMC)</option>
	<option value="4601-CAH LINK(RMC)">4601-CAH LINK(RMC)</option>
	<option value="9050-CALL CENTER(RMC)">9050-CALL CENTER(RMC)</option>
	<option value="6240-CARDIAC ONE(RMC)">6240-CARDIAC ONE(RMC)</option>
	<option value="7260-CARDIO REHAB(RMC)">7260-CARDIO REHAB(RMC)</option>
	<option value="7150-CARDIOVASCULAR DIAGN(RMC)">7150-CARDIOVASCULAR DIAGN(RMC)</option>
	<option value="9070-CARE(RMC)">9070-CARE(RMC)</option>
	<option value="7540-CARE MANAGEMENT(RMC)">7540-CARE MANAGEMENT(RMC)</option>
	<option value="7350-CAT SCANNER(RMC)">7350-CAT SCANNER(RMC)</option>
	<option value="7370-CATH LAB(RMC)">7370-CATH LAB(RMC)</option>
	<option value="5970-CC-OCC NURSING(PHY)">5970-CC-OCC NURSING(PHY)</option>
	<option value="8060-CLINICAL ENGINEERING(RMC)">8060-CLINICAL ENGINEERING(RMC)</option>
	<option value="4506-COFFEE CART(RMC)">4506-COFFEE CART(RMC)</option>
	<option value="9090-COM HLTH INITIA(RMC)">9090-COM HLTH INITIA(RMC)</option>
	<option value="9040-COMMUNICATIONS(RMC)">9040-COMMUNICATIONS(RMC)</option>
	<option value="9080-COMMUNITY BENEFITS(RMC)">9080-COMMUNITY BENEFITS(RMC)</option>
	<option value="6180-COMMUNITY ED(RMC)">6180-COMMUNITY ED(RMC)</option>
	<option value="6020-CRITICAL CARE(RMC)">6020-CRITICAL CARE(RMC)</option>
	<option value="5830-CVC(PHY)">5830-CVC(PHY)</option>
	<option value="6460-DIABETIC EDUCATION(RMC)">6460-DIABETIC EDUCATION(RMC)</option>
	<option value="7100-DIAGNOSTICS LAB(RMC)">7100-DIAGNOSTICS LAB(RMC)</option>
	<option value="7170-DIETARY CONSULTATION(RMC)">7170-DIETARY CONSULTATION(RMC)</option>
	<option value="8240-DISTRIBUTION(RMC)">8240-DISTRIBUTION(RMC)</option>
	<option value="6350-DME(RMC)">6350-DME(RMC)</option>
	<option value="6550-DONT USE-WOMEN(RMC)">6550-DONT USE-WOMEN(RMC)</option>
	<option value="9580-EDUCATIONAL SVCS(RMC)">9580-EDUCATIONAL SVCS(RMC)</option>
	<option value="5200-ELM(PHY)">5200-ELM(PHY)</option>
	<option value="6130-EMERGENCY DEPT(RMC)">6130-EMERGENCY DEPT(RMC)</option>
	<option value="6170-EMERGENCY PHYSICIANS(RMC)">6170-EMERGENCY PHYSICIANS(RMC)</option>
	<option value="7220-EMPLOYEE HEALTH(RMC)">7220-EMPLOYEE HEALTH(RMC)</option>
	<option value="7190-ENDOSCOPIC DIAG(RMC)">7190-ENDOSCOPIC DIAG(RMC)</option>
	<option value="8050-ENVIRONMENTAL SVCS(RMC)">8050-ENVIRONMENTAL SVCS(RMC)</option>
	<option value="5990-EPN-HOME(PHY)">5990-EPN-HOME(PHY)</option>
	<option value="5700-EPS(PHY)">5700-EPS(PHY)</option>
	<option value="5100-FHP(PHY)">5100-FHP(PHY)</option>
	<option value="9010-FINANCE(RMC)">9010-FINANCE(RMC)</option>
	<option value="8210-FOOD NUTRITION SVCS(RMC)">8210-FOOD/NUTRITION SVCS(RMC)</option>
	<option value="4508-GIFT SHOP(RMC)">4508-GIFT SHOP(RMC)</option>
	<option value="4505-GRANTS(RMC)">4505-GRANTS(RMC)</option>
	<option value="7200-HEALTH INFO MGMT(RMC)">7200-HEALTH INFO MGMT(RMC)</option>
	<option value="9610-HEALTH WELLNESS RES(RMC)">9610-HEALTH/WELLNESS RES(RMC)</option>
	<option value="5650-HFM(PHY)">5650-HFM(PHY)</option>
	<option value="6250-HOME HEALTH(RMC)">6250-HOME HEALTH(RMC)</option>
	<option value="6300-HOSPICE(RMC)">6300-HOSPICE(RMC)</option>
	<option value="9530-HUMAN RESOURCES(RMC)">9530-HUMAN RESOURCES(RMC)</option>
	<option value="5020-IMS(PHY)">5020-IMS(PHY)</option>
	<option value="9570-INFORMATION SERVICES(RMC)">9570-INFORMATION SERVICES(RMC)</option>
	<option value="6490-INFUSION CENTER(RMC)">6490-INFUSION CENTER(RMC)</option>
	<option value="6061-JOINT CENTER(RMC)">6061-JOINT CENTER(RMC)</option>
	<option value="7120-LABORATORY(RMC)">7120-LABORATORY(RMC)</option>
	<option value="5980-LC(PHY)">5980-LC(PHY)</option>
	<option value="5050-LCC(PHY)">5050-LCC(PHY)</option>
	<option value="4703-LIFELINE(RMC)">4703-LIFELINE(RMC)</option>
	<option value="8230-LINEN SERVICES(RMC)">8230-LINEN SERVICES(RMC)</option>
	<option value="4604-LITZENBERG ADM(RMC)">4604-LITZENBERG ADM(RMC)</option>
	<option value="4502-MAJOR PLANNING(RMC)">4502-MAJOR PLANNING(RMC)</option>
	<option value="7022-MAMMOGRAPHY(RMC)">7022-MAMMOGRAPHY(RMC)</option>
	<option value="9001-MANAGED CARE(RMC)">9001-MANAGED CARE(RMC)</option>
	<option value="6432-MATERNAL FETAL(RMC)">6432-MATERNAL FETAL(RMC)</option>
	<option value="7210-MEDICAL LIBRARY(RMC)">7210-MEDICAL LIBRARY(RMC)</option>
	<option value="9520-MEDICAL STAFF(RMC)">9520-MEDICAL STAFF(RMC)</option>
	<option value="6030-MEDICAL ONCOLOGY(RMC)">6030-MEDICAL/ONCOLOGY(RMC)</option>
	<option value="5820-MFM(PHY)">5820-MFM(PHY)</option>
	<option value="6470-MOB WOUND CARE(RMC)">6470-MOB WOUND CARE(RMC)</option>
	<option value="7151-MOBILE CARD SVCS(RMC)">7151-MOBILE CARD SVCS(RMC)</option>
	<option value="5750-NCM(PHY)">5750-NCM(PHY)</option>
	<option value="5400-NEW IM(PHY)">5400-NEW IM(PHY)</option>
	<option value="6380-NICU(RMC)">6380-NICU(RMC)</option>
	<option value="6310-NRG INTRN EXTRN(RMC)">6310-NRG INTRN/EXTRN(RMC)</option>
	<option value="7130-NUCLEAR MEDICINE(RMC)">7130-NUCLEAR MEDICINE(RMC)</option>
	<option value="6080-NURSERY NURSING(RMC)">6080-NURSERY NURSING(RMC)</option>
	<option value="6230-NURSING OPERATIONS(RMC)">6230-NURSING OPERATIONS(RMC)</option>
	<option value="6070-OB GYN NURSING(RMC)">6070-OB/GYN NURSING(RMC)</option>
	
	<option value="9500-OFF OF PRESIDENT(RMC)">9500-OFF OF PRESIDENT(RMC)</option>
	<option value="7240-OPER IMPROVEMENT(RMC)">7240-OPER IMPROVEMENT(RMC)</option>
	<option value="6100-OPERATING ROOM(RMC)">6100-OPERATING ROOM(RMC)</option>
	<option value="6060-ORTHOPEDIC NURSING(RMC)">6060-ORTHOPEDIC NURSING(RMC)</option>
	<option value="5956-OT-Medical Center">5956-OT-MEDICAL CENTER</option>
	<option value="6260-OUTPATIENT CLINICS(RMC)">6260-OUTPATIENT CLINICS(RMC)</option>
	<option value="9540-PARISH NURSE(RMC)">9540-PARISH NURSE(RMC)</option>
	<option value="9550-PASTORAL CARE(RMC)">9550-PASTORAL CARE(RMC)</option>
	<option value="9030-PATIENT FIN SVCS(RMC)">9030-PATIENT FIN SVCS(RMC)</option>
	<option value="8070-PATIENT SUPPORT SVCS(RMC)">8070-PATIENT SUPPORT SVCS(RMC)</option>
	<option value="4603-PAWNEE ADMIN(RMC)">4603-PAWNEE ADMIN(RMC)</option>
	<option value="7080-PEDIATRIC CARD(RMC)">7080-PEDIATRIC CARD(RMC)</option>
	<option value="6040-PEDIATRIC NURSING(RMC)">6040-PEDIATRIC NURSING(RMC)</option>
	<option value="6480-PERFUSION(RMC)">6480-PERFUSION(RMC)</option>
	<option value="6120-PERINATAL NURSING(RMC)">6120-PERINATAL NURSING(RMC)</option>
	<option value="7040-PHARMACY(RMC)">7040-PHARMACY(RMC)</option>
	
	<option value="8000-PLANT SERVICES(RMC)">8000-PLANT SERVICES(RMC)</option>
	<option value="5080-PPP(PHY)">5080-PPP(PHY)</option>
	<option value="6210-PRE-OPERATIVE CARE(RMC)">6210-PRE-OPERATIVE CARE(RMC)</option>
	<option value="6320-PRIVATE DUTY(RMC)">6320-PRIVATE DUTY(RMC)</option>
	<option value="8250-PROCESSING(RMC)">8250-PROCESSING(RMC)</option>
	<option value="6290-PROGRESSIVE MOD ICU(RMC)">6290-PROGRESSIVE/MOD ICU(RMC)</option>
	<option value="4504-PROTECT-OFFSET(RMC)">4504-PROTECT -OFFSET(RMC)</option>
	<option value="4503-PROTECTOURCHILD(RMC)">4503-PROTECTOURCHILD(RMC)</option>
	<option value="5010-PS(PHY)">5010-PS(PHY)</option>
	<option value="5951-PT-Antelope Creek">5951-PT-ANTELOPE CREEK</option>
	<option value="5952-PT-Holdredge">5952-PT-HOLDREDGE</option>
	<option value="5955-PT-Medical Center">5955-PT-MEDICAL CENTER</option>
	<option value="5454-PT-Southwest">5454-PT-SOUTHWEST</option>
	<option value="5953-PT-West">5953-PT-WEST</option>
	<option value="5010-PS(PHY)">5010-PS(PHY)</option>

	<option value="8200-PURCHASING(RMC)">8200-PURCHASING(RMC)</option>
	<option value="7021-RAD-OFF STAFF(RMC)">7021-RAD-OFF STAFF(RMC)</option>
	<option value="7023-RAD-SPECIAL PROC(RMC)">7023-RAD-SPECIAL PROC(RMC)</option>
	<option value="7380-RAD THERAPY CTR(RMC)">7380-RAD THERAPY CTR(RMC)</option>
	<option value="7020-RADIOLOGY(RMC)">7020-RADIOLOGY(RMC)</option>
	<option value="7024-RADIOLOGY-MRI(RMC)">7024-RADIOLOGY-MRI(RMC)</option>
	<option value="6110-RECOVERY ROOM(RMC)">6110-RECOVERY ROOM(RMC)</option>
	<option value="6600-RESEARCH(RMC)">6600-RESEARCH(RMC)</option>
	<option value="7060-RESPIRATORY CARE(RMC)">7060-RESPIRATORY CARE(RMC)</option>
	<option value="5860-SE NE NEONATOLOGY GROUP(PHY)">5860-SE NE NEONATOLOGY GROUP(PHY)</option>
	<option value="8040-SECURITY(RMC)">8040-SECURITY(RMC)</option>
	<option value="4600-SEHS-ADMIN(RMC)">4600-SEHS-ADMIN(RMC)</option>
	<option value="4701-SENMDS-MAMMO(RMC)">4701-SENMDS-MAMMO(RMC)</option>
	<option value="4702-SENMDS-ULTRA(RMC)">4702-SENMDS-ULTRA(RMC)</option>
	<option value="5300-SFH(PHY)">5300-SFH(PHY)</option>
	<option value="6150-SHORT STAY CENTER(RMC)">6150-SHORT STAY CENTER(RMC)</option>
	<option value="5850-SLH(PHY)">5850-SLH(PHY)</option>
	<option value="5500-SMS(PHY)">5500-SMS(PHY)</option>
	<option value="7600-SPEECH THERAPY(RMC)">7600-SPEECH THERAPY(RMC)</option>
	<option value="9020-STRATEGIC PLANNING(RMC)">9020-STRATEGIC PLANNING(RMC)</option>
	<option value="6010-SURGICAL NURSING(RMC)">6010-SURGICAL NURSING(RMC)</option>
	<option value="5290-SWN(PHY)">5290-SWN(PHY)</option>
	<option value="9611-TELE LINE TO CARE(RMC)">9611-TELE LINE TO CARE(RMC)</option>
	<option value="5730-TFH(PHY)">5730-TFH(PHY)</option>
	<option value="4606-THAYER ADMIN(RMC)">4606-THAYER ADMIN(RMC)</option>
	<option value="8530-TRANSPORTATION(RMC)">8530-TRANSPORTATION(RMC)</option>
	<option value="7290-TRANSRP SVS-HIM(RMC)">7290-TRANSRP SVS-HIM(RMC)</option>
	<option value="5670-TWP(PHY)">5670-TWP(PHY)</option>
	<option value="7180-ULTRASOUND(RMC)">7180-ULTRASOUND(RMC)</option>
	<option value="9600-VOLUTEER SVCS(RMC)">9600-VOLUTEER SVCS(RMC)</option>
	<option value="7000-VP-CLIN/SUPP SVCS(RMC)">7000-VP-CLIN/SUPP SVCS(RMC)</option>
	<option value="9000-VP-FINANCE(RMC)">9000-VP-FINANCE(RMC)</option>
	<option value="6000-VP-NURSING(RMC)">6000-VP-NURSING(RMC)</option>
	<option value="7250-WELLNESS BLDG(RMC)">7250-WELLNESS BLDG(RMC)</option>
	<option value="6450-WOUND CARE CENTER(RMC)">6450-WOUND CARE CENTER(RMC)</option>
	
	    </select>
    </div>
    </fieldset>
	<fieldset>
    <legend>Reason for absence - Non Medical</legend>
    <div class="fm-opt">
	<!--<a class="menu1" onclick="showHide('mymenu1')"><u>Expand/Contract</u></a>
	<div id="mymenu1" class="hide">-->
      <label for="fm-IllChild">Ill Child</label>
	  <input name="NonMedical" id="fm-IllChild" type="radio" value="IllChild"/><br />
      <label for="fm-FamilyEmergency">Family emergency</label>
	  <input name="NonMedical" id="fm-FamilyEmergency" type="radio" value="FamilyEmergency"/><br />
	  <label for="fm-FuneralLeave">Funeral Leave</label>
	  <input name="NonMedical" id="fm-FuneralLeave" type="radio" value="FuneralLeave"/><br />
	  <label for="fm-MedicalLeave">Medical Leave</label>
	  <input name="NonMedical" id="fm-MedicalLeave" type="radio" value="MedicalLeave"/><br />
	  <label for="fm-WeatherTransportation">Weather/Transportation</label>
	  <input name="NonMedical" id="fm-WeatherTransportation" type="radio" value="WeatherTransportation"/><br />
	  <label for="fm-NonMedicalOtherBox">Other</label>
	  <input name="NonMedical" id="fm-NonMedicalOtherBox" type="radio" value="NonMedicalOtherBox"/> 
	  <input type="text" name="NonMedicalOther" />
    </div></fieldset>
    
	<fieldset>
    <legend>Reason for absence - Medical</legend>
	
    <div class="fm-opt">
	<!--<a class="menu1" onclick="showHide('mymenu2')"><u>Expand/Contract</u></a>
	<div id="mymenu2" class="hide">-->
	  <label for="fm-Diarrhea">Diarrhea</label>
	  <input name="Diarrhea" type="checkbox" value="Diarrhea" id="fm-Diarrhea" /><br />
      <label for="fm-N_V">N/V</label>
	  <input name="NV" type="checkbox" value="NV" id="fm-N_V" /><br />
      <label for="fm-Headache">Headache</label>
	  <input name="Headache" type="checkbox" value="Headache" id="fm-Headache" /><br />
      <label for="fm-Respiratory">Respiratory</label>
	  <input name="Respiratory" type="checkbox" value="Respiratory" id="fm-Respiratory" /><br />
      <label for="fm-Injury">Injury</label>
	  <input name="Injury" type="checkbox" value="Injury" id="fm-Injury" /><br />
      <label for="fm-PregnancyRelated">Pregnancy-related</label>
	  <input name="PregnancyRelated" type="checkbox" value="PregnancyRelated" id="fm-PregnancyRelated" /><br />
      <label for="fm-UnknownSS">Unknown s/s</label>
	  <input name="UnknownSS" type="checkbox" value="UnknownSS" id="fm-UnknownSS" /><br />
      <label for="fm-MedicalOther">Other</label>
	  <input name="MedicalOtherBox" type="checkbox" value="MedicalOtherBox" id="fm-Other" /> 
	  <input type="text" name="MedicalOther" id="fm-MedicalOther" />
	</div>
	
    </fieldset>
    
	<!--<fieldset>
    <legend>Address </legend>
    <div class="fm-opt">
      <label for="fm-addr">Address:</label>
      <input id="fm-addr" name="fm-addr" type="text" />
    </div>
    <div class="fm-opt">
      <label for="fm-city">City or Town:</label>
      <input id="fm-city" name="fm-city" type="text" />
    </div>
    <div class="fm-opt">
      <label for="fm-state">State:</label>
      <select id="fm-state" name="fm-state">
        <option value="" selected="selected">Choose a State</option>
        <option value="UNK">Outside US / Canada</option>
        <option value="AL">Alabama</option>
        <option value="AK">Alaska</option>
        <option value="AB">Alberta</option>
        <option value="AS">American Samoa</option>
        <option value="AZ">Arizona</option>
        <option value="AR">Arkansas</option>
        <option value="AA">Armed Forces Americas</option>
        <option value="AE">Armed Forces Europe</option>
        <option value="AP">Armed Forces Pacific</option>
        <option value="BC">British Columbia</option>
        <option value="CA">California</option>
        <option value="CO">Colorado</option>
        <option value="CT">Connecticut</option>
        <option value="DE">Delaware</option>
        <option value="DC">District Of Columbia</option>
        <option value="FL">Florida</option>
        <option value="GA">Georgia</option>
        <option value="GU">Guam</option>
        <option value="HI">Hawaii</option>
        <option value="ID">Idaho</option>
        <option value="IL">Illinois</option>
        <option value="IN">Indiana</option>
        <option value="IA">Iowa</option>
        <option value="KS">Kansas</option>
        <option value="KY">Kentucky</option>
        <option value="LA">Louisiana</option>
        <option value="ME">Maine</option>
        <option value="MB">Manitoba</option>
        <option value="MD">Maryland</option>
        <option value="MA">Massachusetts</option>
        <option value="MI">Michigan</option>
        <option value="MN">Minnesota</option>
        <option value="MS">Mississippi</option>
        <option value="MO">Missouri</option>
        <option value="MT">Montana</option>
        <option value="NE">Nebraska</option>
        <option value="NV">Nevada</option>
        <option value="NB">New Brunswick</option>
        <option value="NH">New Hampshire</option>
        <option value="NJ">New Jersey</option>
        <option value="NM">New Mexico</option>
        <option value="NY">New York</option>
        <option value="NF">Newfoundland</option>
        <option value="NC">North Carolina</option>
        <option value="ND">North Dakota</option>
        <option value="MP">Northern Mariana Is</option>
        <option value="NT">Northwest Territories</option>
        <option value="NS">Nova Scotia</option>
        <option value="OH">Ohio</option>
        <option value="OK">Oklahoma</option>
        <option value="ON">Ontario</option>
        <option value="OR">Oregon</option>
        <option value="PW">Palau</option>
        <option value="PA">Pennsylvania</option>
        <option value="PE">Prince Edward Island</option>
        <option value="PQ">Province du Quebec</option>
        <option value="PR">Puerto Rico</option>
        <option value="RI">Rhode Island</option>
        <option value="SK">Saskatchewan</option>
        <option value="SC">South Carolina</option>
        <option value="SD">South Dakota</option>
        <option value="TN">Tennessee</option>
        <option value="TX">Texas</option>
        <option value="UT">Utah</option>
        <option value="VT">Vermont</option>
        <option value="VI">Virgin Islands</option>
        <option value="VA">Virginia</option>
        <option value="WA">Washington</option>
        <option value="WV">West Virginia</option>
        <option value="WI">Wisconsin</option>
        <option value="WY">Wyoming</option>
        <option value="YT">Yukon Territory</option>
      </select>
    </div>
    <div class="fm-req">
      <label for="fm-zipcode">Zip code:</label>
      <input id="fm-zipcode" name="fm-zipcode" type="text" />
    </div>
    </fieldset>
    <fieldset>
    <legend>Contact information</legend>
    <div class="fm-req">
      <label for="fm-telephone">Telephone:</label>
      <input id="fm-telephone" name="fm-telephone" type="text" title="Enter Phone Number in xxx-xxx-xxxx format" />
    </div>
    <div class="fm-opt">
      <label for="fm-fax">Fax:</label>
      <input id="fm-fax" name="fm-fax" type="text" title="Enter Fax Number in xxx-xxx-xxxx format" />
    </div>
    <div class="fm-opt">
      <label for="fm-mobile">Mobile:</label>
      <input id="fm-mobile" name="fm-mobile" type="text" />
    </div>
    <div class="fm-req">
      <label for="fm-email">Email:</label>
      <input id="fm-email" name="fm-email" type="text" tabindex="" />
    </div>-->
	
	<fieldset>
    <legend>Additional information</legend>
    <div class="fm-req">
      <label for="fm-NameTakingMsg">Name of staff taking message:</label>
      <input id="fm-NameTakingMsg" name="NameTakingMsg" type="text" />
    </div>
    <div class="fm-opt">
      <label for="fm-Details">Details:</label>
      <textarea name="Details" cols="20" rows="5" id="fm-Details"></textarea>
    </div>
	<div class="fm-req">
      <label for="fm-FMLA">Is this FMLA?</label>
      
	  <br />
	  <label for="fm-FMLA-y">Yes</label>
	  <input name="FMLA" id="fm-FMLA-y" type="radio" value="Yes"/><br />
      <label for="fm-FamilyEmergency">No</label>
	  <input name="FMLA" id="fm-FMLA-n" type="radio" value="No"/>
	</div>
    </fieldset>
    <div id="fm-submit" class="fm-req">
      <input name="Submit" value="Submit" type="submit" />
      &nbsp;&nbsp;&nbsp;&nbsp;| <img src="printer.jpg" width="22" height="18" />&nbsp;<A HREF="javascript:window.print()"><font color="#000000">Print A Copy</font></A>
    </div>
    
    
  </form>
</div>
<?
}
?>
</body>
</html>



	
  
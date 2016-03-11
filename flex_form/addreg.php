<html>
<head><title>Training Registration</title>
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


<?
//session_start(); // This connects to the existing session 
//session_register ("name"); // Create a session variable called name 
//session_register ("dept"); // Create a session variable called job 
//session_register ("class");
//$HTTP_SESSION_VARS ["name"] = $name; // Set name = form variable $name 
//$HTTP_SESSION_VARS ["dept"] = $dept; 
//$HTTP_SESSION_VARS ["class"] = $class; 

/*$hostName = "cmlnkwiki";
$userName = "intranet";
$password = "password";
$dbName = "bmvtraining_db";

if ($submit) {

mysql_connect($hostName,$userName,$password) or die("Unable to connect to host $hostName");
mysql_select_db($dbName) or die("Unable to select database $dbName");
*/
	  $name = str_replace("'","''",$name);
	  $dept = str_replace("'","''",$dept);
	  //$class = str_replace("'","''",$class);
	  
	  $HTTP_SESSION_VARS ["name"] = $name; // Set name = form variable $name 
	  $HTTP_SESSION_VARS ["dept"] = $dept; 
	  

//$sql = "INSERT INTO registrant (name,dept) VALUES ('$name', '$dept')";

//$result = mysql_query($sql);

  //echo "<b>Thank you! Your have registered SUCCESSFULLY!<br><br>You'll be redirected back to the Saint Elizabeth Intranet in (3) Seconds";
          //echo "<meta http-equiv=Refresh content=3;url=http://stentint>";
  
  

//} else{

  // display form
  
?>
<SCRIPT LANGUAGE="JavaScript" SRC="autocomplete.js"></SCRIPT>
</head>
<body>

<br>
<h3 align="center" class="style6">&nbsp;</h3>
<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td><span class="style11"><span class="style12">::</span>REGISTER <span class="style7">For Class</span></span><br> <span class="style5">Start typing name in box.  As you type matches will appear.</span></td>
  </tr>
</table>




<form name="addreg" method="post" action="addreg2.php">
  <table width="700" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr align="left" valign="top">
      <td width="150"><span class="style5">
        
Name: </span></td>
      <td width="425"><INPUT TYPE="text" NAME="name" VALUE="" ONKEYUP="autoComplete(this,this.form.namelist,'value',true)">&nbsp;
	  <?
//include ('config.php');
// Connect to Database 
require('config/mssql_connect.php');
require('config/variables.php');
$conn = db_connect();

$query = "SELECT uname FROM listdb.dbo.vwuser ORDER BY uname ASC";
$result = mssql_query($query);

	  //echo "<select name=\"name\">\n";?>
	  <SELECT NAME="namelist" onChange="this.form.name.value=this.options[this.selectedIndex].value">
	  <option value="Not Entered" selected>Select Name</option>
<?
while($myrow = mssql_fetch_array($result))
             {//begin of loop
			 ?>
               <option value="<?php echo $myrow['uname']; ?>"><?php echo $myrow['uname'];?></option>
			   <? $row_count++;
             }//end of loop
			  
	  ?>
</select>
</td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">Department:</span></td>
      <td><select name="dept">
	  <option value="0" selected>Select Department</option>
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
	<option value="7670-OCCUP THERAPY(RMC)">7670-OCCUP THERAPY(RMC)</option>
	<option value="9500-OFF OF PRESIDENT(RMC)">9500-OFF OF PRESIDENT(RMC)</option>
	<option value="7240-OPER IMPROVEMENT(RMC)">7240-OPER IMPROVEMENT(RMC)</option>
	<option value="6100-OPERATING ROOM(RMC)">6100-OPERATING ROOM(RMC)</option>
	<option value="6060-ORTHOPEDIC NURSING(RMC)">6060-ORTHOPEDIC NURSING(RMC)</option>
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
	<option value="7580-PHY THER SW(RMC)">7580-PHY THER SW(RMC)</option>
	<option value="7070-PHYS THERAPY(RMC)">7070-PHYS THERAPY(RMC)</option>
	<option value="8000-PLANT SERVICES(RMC)">8000-PLANT SERVICES(RMC)</option>
	<option value="5080-PPP(PHY)">5080-PPP(PHY)</option>
	<option value="6210-PRE-OPERATIVE CARE(RMC)">6210-PRE-OPERATIVE CARE(RMC)</option>
	<option value="6320-PRIVATE DUTY(RMC)">6320-PRIVATE DUTY(RMC)</option>
	<option value="8250-PROCESSING(RMC)">8250-PROCESSING(RMC)</option>
	<option value="6290-PROGRESSIVE MOD ICU(RMC)">6290-PROGRESSIVE/MOD ICU(RMC)</option>
	<option value="4504-PROTECT-OFFSET(RMC)">4504-PROTECT -OFFSET(RMC)</option>
	<option value="4503-PROTECTOURCHILD(RMC)">4503-PROTECTOURCHILD(RMC)</option>
	<option value="5010-PS(PHY)">5010-PS(PHY)</option>
	<option value="7571-PT-WAVERLY(RMC)">7571-PT - WAVERLY(RMC)</option>
	<option value="7570-PT REHAB W O(RMC)">7570-PT/REHAB W &quot;O&quot;(RMC)</option>
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
	</select></td>
    </tr>
	<!--<tr align="left" valign="top">
      <td><span class="style5">Class:</span></td>
      <td><input name="class" size="40" maxlength="255"></td>
    </tr> -->
	
  </table>
  <p align="center"><br>
    <input type="submit" name="submit" value="Continue">
  </p>
</form>
			
<?
              //}//end if


?>


</body>
</html>
<?php session_start(); ?>
<? 
//checks cookies to make sure they are logged in 
//include ('config.php');
// Connect to Database 

require('config/mssql_connect.php');
require('config/variables.php');
$conn = db_connect();

if(isset($_COOKIE['login_uid'])) 
{ 
$cook_uid = $_COOKIE['login_uid']; 
$cook_upass = $_COOKIE['login_upass']; 

$check = mssql_query("SELECT * FROM listdb.dbo.vwuser where uid='$cook_uid'")or die(mysql_error()); 

while($info = mssql_fetch_array( $check )) 
{ 

//if the cookie has the wrong password, they are taken to the login page 
if ($cook_upass != $info['upass']) 
{ header("Location: index.php"); 
} 
//otherwise they are shown the admin area 
else
{				
?>
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


// Connect to Database 
require('config/mssql_connect.php');
require('config/variables.php');
$conn = db_connect();

$query = "SELECT uname FROM listdb.dbo.vwuser where uid='$cook_uid' AND upass='$cook_upass';";
$result = mssql_query($query);

while($myrow = mssql_fetch_array($result))
             {//begin of loop
               

// Connect to Database 
require('config/mysql_connect.php');
require('config/variables.php');
$conn2 = mysql_db_connect();
//mysql_connect("cmlnkwiki","intranet","password") or die("Unable to connect to host $hostName");
//mysql_select_db("bmvtraining_db") or die("Unable to select database $dbName");
			   
$query2 = "SELECT * FROM registrant";
$result2 = mysql_query($query2);
while($myrow2 = mysql_fetch_array($result2))
             {//begin of loop
			 
			 
if ( $myrow['uname'] == $myrow2['name'] ) {
	echo "<meta http-equiv=Refresh content=0;url=printreg.php?id=$myrow2[id]>";
	break;
} 

}
//}
	

			 
			  

?>
</head>
<body>

<br>
<h3 align="center" class="style6">&nbsp;</h3>
<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td><span class="style11"><span class="style12">::</span>REGISTER <span class="style7">For Class</span></span></td>
  </tr>
</table>

<form name="addreg" method="post" action="step2.php">
  <table width="700" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr align="left" valign="top">
      <td width="150"><span class="style5">
        
Name: </span></td>
      <td width="425"><input name="name" size="40" maxlength="255" value="<? echo $myrow['uname'];?>"></td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">Department:</span></td>
      <td><select name="dept">
	  <option value="0" selected>Select Department</option>
	  <option value="5350">5350-ACF(PHY)</option>
	<option value="5000">5000-ADM-ADMIN(PHY)</option>
	<option value="4500">4500-ADMIN - FOUNDATION(RMC)</option>
	<option value="9060">9060-ADMITTING(RMC)</option>
	<option value="7050">7050-ANESTHESIA(RMC)</option>
	<option value="4501">4501-ANNUAL GIVING(RMC)</option>
	<option value="5550">5550-APC(PHY)</option>
	<option value="5600">5600-ARC(PHY)</option>
	<option value="8700">8700-ASTHMA ED-SCMINISTRY(RMC)</option>
	<option value="8710">8710-ASTHMA INIT - GEN(RMC)</option>
	<option value="6090">6090-BURN CENTER NURSING(RMC)</option>
	<option value="4601">4601-CAH LINK(RMC)</option>
	<option value="9050">9050-CALL CENTER(RMC)</option>
	<option value="6240">6240-CARDIAC ONE(RMC)</option>
	<option value="7260">7260-CARDIO REHAB(RMC)</option>
	<option value="7150">7150-CARDIOVASCULAR DIAGN(RMC)</option>
	<option value="9070">9070-CARE(RMC)</option>
	<option value="7540">7540-CARE MANAGEMENT(RMC)</option>
	<option value="7350">7350-CAT SCANNER(RMC)</option>
	<option value="7370">7370-CATH LAB(RMC)</option>
	<option value="5970">5970-CC-OCC NURSING(PHY)</option>
	<option value="8060">8060-CLINICAL ENGINEERING(RMC)</option>
	<option value="4506">4506-COFFEE CART(RMC)</option>
	<option value="9090">9090-COM HLTH INITIA(RMC)</option>
	<option value="9040">9040-COMMUNICATIONS(RMC)</option>
	<option value="9080">9080-COMMUNITY BENEFITS(RMC)</option>
	<option value="6180">6180-COMMUNITY ED(RMC)</option>
	<option value="6020">6020-CRITICAL CARE(RMC)</option>
	<option value="5830">5830-CVC(PHY)</option>
	<option value="6460">6460-DIABETIC EDUCATION(RMC)</option>
	<option value="7100">7100-DIAGNOSTICS LAB(RMC)</option>
	<option value="7170">7170-DIETARY CONSULTATION(RMC)</option>
	<option value="8240">8240-DISTRIBUTION(RMC)</option>
	<option value="6350">6350-DME(RMC)</option>
	<option value="6550">6550-DON'T USE-WOMEN(RMC)</option>
	<option value="9580">9580-EDUCATIONAL SVCS(RMC)</option>
	<option value="5200">5200-ELM(PHY)</option>
	<option value="6130">6130-EMERGENCY DEPT(RMC)</option>
	<option value="6170">6170-EMERGENCY PHYSICIANS(RMC)</option>
	<option value="7220">7220-EMPLOYEE HEALTH(RMC)</option>
	<option value="7190">7190-ENDOSCOPIC DIAG(RMC)</option>
	<option value="8050">8050-ENVIRONMENTAL SVCS(RMC)</option>
	<option value="5990">5990-EPN-HOME(PHY)</option>
	<option value="5700">5700-EPS(PHY)</option>
	<option value="5100">5100-FHP(PHY)</option>
	<option value="9010">9010-FINANCE(RMC)</option>
	<option value="8210">8210-FOOD/NUTRITION SVCS(RMC)</option>
	<option value="4508">4508-GIFT SHOP(RMC)</option>
	<option value="4505">4505-GRANTS(RMC)</option>
	<option value="7200">7200-HEALTH INFO MGMT(RMC)</option>
	<option value="9610">9610-HEALTH/WELLNESS RES(RMC)</option>
	<option value="5650">5650-HFM(PHY)</option>
	<option value="6250">6250-HOME HEALTH(RMC)</option>
	<option value="6300">6300-HOSPICE(RMC)</option>
	<option value="9530">9530-HUMAN RESOURCES(RMC)</option>
	<option value="5020">5020-IMS(PHY)</option>
	<option value="9570">9570-INFORMATION SERVICES(RMC)</option>
	<option value="6490">6490-INFUSION CENTER(RMC)</option>
	<option value="6061">6061-JOINT CENTER(RMC)</option>
	<option value="7120">7120-LABORATORY(RMC)</option>
	<option value="5980">5980-LC(PHY)</option>
	<option value="5050">5050-LCC(PHY)</option>
	<option value="4703">4703-LIFELINE(RMC)</option>
	<option value="8230">8230-LINEN SERVICES(RMC)</option>
	<option value="4604">4604-LITZENBERG ADM(RMC)</option>
	<option value="4502">4502-MAJOR PLANNING(RMC)</option>
	<option value="7022">7022-MAMMOGRAPHY(RMC)</option>
	<option value="9001">9001-MANAGED CARE(RMC)</option>
	<option value="6432">6432-MATERNAL FETAL(RMC)</option>
	<option value="7210">7210-MEDICAL LIBRARY(RMC)</option>
	<option value="9520">9520-MEDICAL STAFF(RMC)</option>
	<option value="6030">6030-MEDICAL/ONCOLOGY(RMC)</option>
	<option value="5820">5820-MFM(PHY)</option>
	<option value="6470">6470-MOB WOUND CARE(RMC)</option>
	<option value="7151">7151-MOBILE CARD SVCS(RMC)</option>
	<option value="5750">5750-NCM(PHY)</option>
	<option value="5400">5400-NEW IM(PHY)</option>
	<option value="6380">6380-NICU(RMC)</option>
	<option value="6310">6310-NRG INTRN/EXTRN(RMC)</option>
	<option value="7130">7130-NUCLEAR MEDICINE(RMC)</option>
	<option value="6080">6080-NURSERY NURSING(RMC)</option>
	<option value="6230">6230-NURSING OPERATIONS(RMC)</option>
	<option value="6070">6070-OB/GYN NURSING(RMC)</option>
	<option value="7670">7670-OCCUP THERAPY(RMC)</option>
	<option value="9500">9500-OFF OF PRESIDENT(RMC)</option>
	<option value="7240">7240-OPER IMPROVEMENT(RMC)</option>
	<option value="6100">6100-OPERATING ROOM(RMC)</option>
	<option value="6060">6060-ORTHOPEDIC NURSING(RMC)</option>
	<option value="6260">6260-OUTPATIENT CLINICS(RMC)</option>
	<option value="9540">9540-PARISH NURSE(RMC)</option>
	<option value="9550">9550-PASTORAL CARE(RMC)</option>
	<option value="9030">9030-PATIENT FIN SVCS(RMC)</option>
	<option value="8070">8070-PATIENT SUPPORT SVCS(RMC)</option>
	<option value="4603">4603-PAWNEE ADMIN(RMC)</option>
	<option value="7080">7080-PEDIATRIC CARD(RMC)</option>
	<option value="6040">6040-PEDIATRIC NURSING(RMC)</option>
	<option value="6480">6480-PERFUSION(RMC)</option>
	<option value="6120">6120-PERINATAL NURSING(RMC)</option>
	<option value="7040">7040-PHARMACY(RMC)</option>
	<option value="7580">7580-PHY THER SW(RMC)</option>
	<option value="7070">7070-PHYS THERAPY(RMC)</option>
	<option value="8000">8000-PLANT SERVICES(RMC)</option>
	<option value="5080">5080-PPP(PHY)</option>
	<option value="6210">6210-PRE-OPERATIVE CARE(RMC)</option>
	<option value="6320">6320-PRIVATE DUTY(RMC)</option>
	<option value="8250">8250-PROCESSING(RMC)</option>
	<option value="6290">6290-PROGRESSIVE/MOD ICU(RMC)</option>
	<option value="4504">4504-PROTECT -OFFSET(RMC)</option>
	<option value="4503">4503-PROTECTOURCHILD(RMC)</option>
	<option value="5010">5010-PS(PHY)</option>
	<option value="7571">7571-PT - WAVERLY(RMC)</option>
	<option value="7570">7570-PT/REHAB W &quot;O&quot;(RMC)</option>
	<option value="8200">8200-PURCHASING(RMC)</option>
	<option value="7021">7021-RAD - OFF STAFF(RMC)</option>
	<option value="7023">7023-RAD - SPECIAL PROC(RMC)</option>
	<option value="7380">7380-RAD THERAPY CTR(RMC)</option>
	<option value="7020">7020-RADIOLOGY(RMC)</option>
	<option value="7024">7024-RADIOLOGY - MRI(RMC)</option>
	<option value="6110">6110-RECOVERY ROOM(RMC)</option>
	<option value="6600">6600-RESEARCH(RMC)</option>
	<option value="7060">7060-RESPIRATORY CARE(RMC)</option>
	<option value="5860">5860-SE NE NEONATOLOGY GROUP(PHY)</option>
	<option value="8040">8040-SECURITY(RMC)</option>
	<option value="4600">4600-SEHS - ADMIN(RMC)</option>
	<option value="4701">4701-SENMDS - MAMMO(RMC)</option>
	<option value="4702">4702-SENMDS - ULTRA(RMC)</option>
	<option value="5300">5300-SFH(PHY)</option>
	<option value="6150">6150-SHORT STAY CENTER(RMC)</option>
	<option value="5850">5850-SLH(PHY)</option>
	<option value="5500">5500-SMS(PHY)</option>
	<option value="7600">7600-SPEECH THERAPY(RMC)</option>
	<option value="9020">9020-STRATEGIC PLANNING(RMC)</option>
	<option value="6010">6010-SURGICAL NURSING(RMC)</option>
	<option value="5290">5290-SWN(PHY)</option>
	<option value="9611">9611-TELE LINE TO CARE(RMC)</option>
	<option value="5730">5730-TFH(PHY)</option>
	<option value="4606">4606-THAYER ADMIN(RMC)</option>
	<option value="8530">8530-TRANSPORTATION(RMC)</option>
	<option value="7290">7290-TRANSRP SVS-HIM(RMC)</option>
	<option value="5670">5670-TWP(PHY)</option>
	<option value="7180">7180-ULTRASOUND(RMC)</option>
	<option value="9600">9600-VOLUTEER SVCS(RMC)</option>
	<option value="7000">7000-VP - CLIN/SUPP SVCS(RMC)</option>
	<option value="9000">9000-VP - FINANCE(RMC)</option>
	<option value="6000">6000-VP - NURSING(RMC)</option>
	<option value="7250">7250-WELLNESS BLDG(RMC)</option>
	<option value="6450">6450-WOUND CARE CENTER(RMC)</option>
	
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
//$row_count++;
             }//end of loop

?>


</body>
</html>
<?
}
}
}
else 

//if the cookie does not exist, they are taken to the login screen 
{ 
header("Location: index.php"); 
} 
?> 
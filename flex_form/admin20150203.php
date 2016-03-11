<?php 
//if(!isset($_COOKIE['flex_pw'])) 
session_start();
if($_SESSION['views'] != 1)
{ 
header("Location: ldap_login2.php"); 
//echo "no access";
}
else 
{ 

$hn = "cmlnkprd01";
$un = "mikec";
$pw = "dudeitold";
$dbn = "chi";

mysql_connect($hn,$un,$pw) or die("Unable to connect to host $hostName");
mysql_select_db($dbn) or die("Unable to select database $dbName");

$q = "SELECT * FROM employees WHERE (department_id='379' OR department_id='305' OR department_id='304' OR department_id='307' OR department_id='326' OR department_id='350' OR department_id='342' OR department_id='352' OR department_id='351' OR department_id='320' OR department_id='296' OR department_id='325' OR department_id='322')";
//$q = "SELECT FirstName,lastName FROM employees";
$r = mysql_query($q);

$namearray = array();
//$deptarray = array();
//$lnamearray = array();
        $i=0;
while ($myrow2 = mysql_fetch_array($r)) {
             //{//begin of loop
//$fname = $myrow2['FirstName'];
//$lname = $myrow2['lastName'];
$namearray[$i] =addslashes($myrow2['FirstName']." ".$myrow2['lastName']."---".$myrow2['Employee']);
//$deptarray[$i] =$myrow2['Employee'];
//$lnamearray[$i] =$myrow2['lastName'];
$i++; 
}


$descript = implode("','", $namearray);
//$descript2 = implode("','", $deptarray);

//echo $descript;
//echo $descript2;
?>
  <script type='text/javascript'>
function list()
        {            
		    
var names = ['<?php echo $descript; ?>'];
var complete = new BComplete('requestor');
complete.setData(names);

};
</script>

<html>
<head>
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

</SCRIPT>
<title>Admin Area</title>
<style type="text/css">
<!--
.style1 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style2 {font-family: Geneva, Arial, Helvetica, sans-serif;
color: #FF0000}
-->
</style>
<!-- Required for BComplete -->
    <link rel="stylesheet" type="text/css" href="bcomplete/bcomplete.css" />
    <script type="text/javascript" src="bcomplete/prototype.js"></script>
    <script type="text/javascript" src="bcomplete/bcomplete.js"></script>
    <script type="text/javascript" src="util-functions.js"></script>
<script type="text/javascript" src="clear-default-text.js"></script>
</head>
<body OnLoad="list();">
<p align="center" class="style1">Flex Form - <strong>Admin Area</strong><br><br>
<?
if ($_POST['range']) {
	//echo $_POST['requestor'];
	$parts = explode("---",$_POST['requestor']); 
	//break the string up around the "/" character in $mystring 
	$empid = $parts['1']; 
	//grab the first part 
	//echo $empid;
$hostName = "localhost";
$userName = "stez_user";
$password = "stez_1889";
$dbName = "ccupcu";
mysql_connect($hostName,$userName,$password) or die("Unable to connect to host $hostName");
mysql_select_db($dbName) or die("Unable to select database $dbName");
$color1 = "#f3f3f3"; 
$color2 = "white"; 
$row_count = 0;
  
//$range = $_POST['range'];
//if($range) {
//$from = $_POST['fromMonth']."/".$_POST['fromDay']."/".$_POST['fromYear'];
//$to = $_POST['toMonth']."/".$_POST['toDay']."/".$_POST['toYear'];
$from = $_POST['fromYear']."-".$_POST['fromMonth']."-".$_POST['fromDay'];
$to = $_POST['toYear']."-".$_POST['toMonth']."-".$_POST['toDay'];
$thename = $_POST['requestor'];
$thedept = $_POST['thedept'];
echo $thedept;
	//echo $from;
	//echo $to;
	//$employee = $_POST['requestor'];
//$filter = $_POST['filter'];
//if ($filter == 'view_all') {
//$query = "SELECT * FROM illness_tbl WHERE Date BETWEEN '$from' AND '$to'";

/*if ($thedept == 'ALL') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND ((dept = 'CRITICAL CARE NURSING') OR (dept REGEXP '^PROGRESSIVE'))";
} */
if ($thedept == 'ALL') {
	$query = "SELECT * FROM flex_form WHERE date BETWEEN '$from' AND '$to'";
}
else if ($thedept == 'CRITICAL CARE NURSING') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'CRITICAL CARE NURSING')";
} 
else if ($thedept == 'PROGRESSIVE/MOD ICU NURSING') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^PROGRESSIVE')";
}
else if ($thedept == 'Burn') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Burn')";
}
else if ($thedept == 'CM/SW') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept REGEXP '^CM')";
}
else if ($thedept == 'Diabetes') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Diabetes')";
}
else if ($thedept == 'Endo') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Endo')";
}
else if ($thedept == 'Nurse Triage') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Nurse Triage')";
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
else if ($thedept == 'Lab') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Lab')";
}
else if ($thedept == 'HR') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'HR')";
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
elseif ($thedept=='Switchboard'){
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
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = Linen')";
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
else if ($thedept == 'Pharmacy') {
	$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (dept = 'Pharmacy')";
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
//}

//else {
	//$employee = '13277';
	//echo "here";
	//echo $from;
	//echo $to;
//$query = "SELECT * FROM illness_tbl WHERE (Date BETWEEN '$from' AND '$to') AND (Department = '$filter')";
//$query = "SELECT * FROM flex_form WHERE date BETWEEN '$from' AND '$to'";
//} 
//}
//else {

//$from = $_GET['fromMonth']."/".$_GET['fromDay']."/".$_GET['fromYear'];
//$to = $_GET['toMonth']."/".$_GET['toDay']."/".$_GET['toYear'];

//$from = $_GET['fromYear']."-".$_GET['fromMonth']."-".$_GET['fromDay'];
//$to = $_GET['toYear']."-".$_GET['toMonth']."-".$_GET['toDay'];
//$filter = $_GET['filter'];
//if ($filter == 'view_all') {
//$query = "SELECT * FROM illness_tbl WHERE Date BETWEEN '$from' AND '$to'";
//$query = "SELECT * FROM flex_form WHERE date BETWEEN '$from' AND '$to'";
//}else {
//$query = "SELECT * FROM illness_tbl WHERE (Date BETWEEN '$from' AND '$to') AND (Department = '$filter')";
//$query = "SELECT * FROM flex_form WHERE (date BETWEEN '$from' AND '$to') AND (employee = '$employee')";
//}
//}
//start of sorting columns
?>
<form name="form1" action="<?PHP echo $PHP_SELF ?>" method="post">
                <div align="center" class="style1"><strong>From</strong> 
                    <select name="fromMonth">

                                  <option value="<? echo $_POST['fromMonth']; ?>" selected="selected"><? echo $_POST['fromMonth']; ?></option>
								  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>
                  </select>
                    <select name="fromDay">
                      <option value='<? echo $_POST['fromDay']; ?>'><? echo $_POST['fromDay']; ?></option>
					  <option value='01'>1</option>
                      <option value='02'>2</option>
                      <option value='03'>3</option>
                      <option value='04'>4</option>
                      <option value='05'>5</option>
                      <option value='06'>6</option>
                      <option value='07'>7</option>
                      <option value='08'>8</option>
                      <option value='09'>9</option>
                      <option value='10'>10</option>
                      <option value='11'>11</option>
                      <option value='12'>12</option>
                      <option value='13'>13</option>
                      <option value='14'>14</option>
                      <option value='15'>15</option>
                      <option value='16'>16</option>
                      <option value='17'>17</option>
                      <option value='18'>18</option>
                      <option value='19'>19</option>
                      <option value='20'>20</option>
                      <option value='21'>21</option>
                      <option value='22'>22</option>
                      <option value='23'>23</option>
                      <option value='24'>24</option>
                      <option value='25'>25</option>
                      <option value='26'>26</option>
                      <option value='27'>27</option>
                      <option value='28'>28</option>
                      <option value='29'>29</option>
                      <option value='30'>30</option>
                      <option value='31'>31</option>
                    </select>
                    <select name="fromYear">
                      <option value='<? echo $_POST['fromYear']; ?>' selected="selected"><? echo $_POST['fromYear']; ?></option>
					  <option value='2011'>2011</option>
                      <option value='2012'>2012</option>
                      <option value='2013'>2013</option>
                      <option value='2014'>2014</option>
                      <option value='2015'>2015</option>
                    </select>
                  
                    <strong> To</strong>
                    <select name="toMonth">
                                  <option value="<? echo $_POST['toMonth']; ?>" selected="selected"><? echo $_POST['toMonth']; ?></option>
								  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>
                  </select>
                    <select name="toDay">
                      <option value='<? echo $_POST['toDay']; ?>' selected="selected"><? echo $_POST['toDay']; ?></option>
					  <option value='01'>1</option>
                      <option value='02'>2</option>
                      <option value='03'>3</option>
                      <option value='04'>4</option>
                      <option value='05'>5</option>
                      <option value='06'>6</option>
                      <option value='07'>7</option>
                      <option value='08'>8</option>
                      <option value='09'>9</option>
                      <option value='10'>10</option>
                      <option value='11'>11</option>
                      <option value='12'>12</option>
                      <option value='13'>13</option>
                      <option value='14'>14</option>
                      <option value='15'>15</option>
                      <option value='16'>16</option>
                      <option value='17'>17</option>
                      <option value='18'>18</option>
                      <option value='19'>19</option>
                      <option value='20'>20</option>
                      <option value='21'>21</option>
                      <option value='22'>22</option>
                      <option value='23'>23</option>
                      <option value='24'>24</option>
                      <option value='25'>25</option>
                      <option value='26'>26</option>
                      <option value='27'>27</option>
                      <option value='28'>28</option>
                      <option value='29'>29</option>
                      <option value='30'>30</option>
                      <option value='31'>31</option>
                    </select>
                    <select name="toYear">
                      <option value='<? echo $_POST['toYear']; ?>' selected="selected"><? echo $_POST['toYear']; ?></option>
					  <option value='2011'>2011</option>
                      <option value='2012'>2012</option>
                      <option value='2013'>2013</option>
                      <option value='2014'>2014</option>
                      <option value='2015'>2015</option>
                    </select>
					<br><br>
                    Start typing users first name: <input type="text" name="requestor" id="requestor" size="26" value='<? echo $_POST['requestor']; ?>'>
                    <br><br>
                    Dedpartment: <select name="thedept">
                      <option value='<? echo $_POST['thedept']; ?>' selected="selected"><? echo $_POST['thedept']; ?></option>
					  <option value='ALL'>ALL</option>
 
          <option value="Adult Inpatient Unit">Adult Inpatient Unit</option>
          <option value="Anesthesia">Anesthesia</option>
         <option value="Asthma">Asthma</option>
          <option value="Burn">Burn</option>
          <option value="Cafeteria">Cafeteria</option>
          <option value="Cancer">Cancer</option>
          <option value="Cardiac One">Cardiac One</option>
          <option value="CardPulmonary Rehab">Cardiac/Pulmonary Rehab</option>
          <option value="Care MGMT">Care MGMT</option>
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
                    </select>
                    <br><br>
                    <input type="submit" name="range" value="View This Range">
                </div>
   </form>

<?
$result = mysql_query($query);

		       echo "<table border=0 width=2400px align=center id=countit>";
			   echo "<tr bgcolor=#003366><th width=200px><b><a href=\"?order=Department\"><font face=arial color=white size=1>EMPLOYEE ID</font></a></b></th>";
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
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>OUTSIDE PARAMETERS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>COMMENTS</font></a></b></th>";
			   echo "<th width=200px><b><a href=\"#\"><font face=arial color=white size=1>TOTAL</font></a></b></th></tr>";
			   
			   //echo "<th width=300px><b><a href=\"?order=Details\"><font face=arial color=white size=1>DETAILS</font></a></b></th>";
			   //echo "<th width=50px><font face=arial color=white size=1><b>VIEW/EDIT</b></font></th>";
			   //echo "<th width=50px><font face=arial color=white size=1><b>DELETE</b></font></th></tr>";
        while($myrow = mysql_fetch_array($result))
             {//begin of loop
               //now print the results:
			   $row_color = ($row_count % 2) ? $color1 : $color2;
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
			 
			 echo "<tr>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor=#003366><font face=arial size=2></td>
			 <td width=200px align=left valign=top bgcolor='#f9d455'><font face=arial size=2>$grand_total</td></tr>";
			 echo "</table>";  		
			 
			 echo "<p><a href='excel.php?from=$from&to=$to&thename=$thename&thedept=$thedept'>Click here to export all records to excel.</a></p>";

    
} else {
?>
<form name="form1" action="<?PHP echo $PHP_SELF ?>" method="post">
                <div align="center" class="style1"><strong>From</strong> 
                    <select name="fromMonth">

                                  <option value="<? echo $_POST['fromMonth']; ?>" selected="selected"><? echo $_POST['fromMonth']; ?></option>
								  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>
                  </select>
                    <select name="fromDay">
                      <option value='<? echo $_POST['fromDay']; ?>'><? echo $_POST['fromDay']; ?></option>
					  <option value='01'>1</option>
                      <option value='02'>2</option>
                      <option value='03'>3</option>
                      <option value='04'>4</option>
                      <option value='05'>5</option>
                      <option value='06'>6</option>
                      <option value='07'>7</option>
                      <option value='08'>8</option>
                      <option value='09'>9</option>
                      <option value='10'>10</option>
                      <option value='11'>11</option>
                      <option value='12'>12</option>
                      <option value='13'>13</option>
                      <option value='14'>14</option>
                      <option value='15'>15</option>
                      <option value='16'>16</option>
                      <option value='17'>17</option>
                      <option value='18'>18</option>
                      <option value='19'>19</option>
                      <option value='20'>20</option>
                      <option value='21'>21</option>
                      <option value='22'>22</option>
                      <option value='23'>23</option>
                      <option value='24'>24</option>
                      <option value='25'>25</option>
                      <option value='26'>26</option>
                      <option value='27'>27</option>
                      <option value='28'>28</option>
                      <option value='29'>29</option>
                      <option value='30'>30</option>
                      <option value='31'>31</option>
                    </select>
                    <select name="fromYear">
                      <option value='<? echo $_POST['fromYear']; ?>' selected="selected"><? echo $_POST['fromYear']; ?></option>
					  <option value='2011'>2011</option>
                      <option value='2012'>2012</option>
                      <option value='2013'>2013</option>
                      <option value='2014'>2014</option>
                      <option value='2015'>2015</option>
                    </select>
                  
                    <strong> To</strong>
                    <select name="toMonth">
                                  <option value="<? echo $_POST['toMonth']; ?>" selected="selected"><? echo $_POST['toMonth']; ?></option>
								  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>
                  </select>
                    <select name="toDay">
                      <option value='<? echo $_POST['toDay']; ?>' selected="selected"><? echo $_POST['toDay']; ?></option>
					  <option value='01'>1</option>
                      <option value='02'>2</option>
                      <option value='03'>3</option>
                      <option value='04'>4</option>
                      <option value='05'>5</option>
                      <option value='06'>6</option>
                      <option value='07'>7</option>
                      <option value='08'>8</option>
                      <option value='09'>9</option>
                      <option value='10'>10</option>
                      <option value='11'>11</option>
                      <option value='12'>12</option>
                      <option value='13'>13</option>
                      <option value='14'>14</option>
                      <option value='15'>15</option>
                      <option value='16'>16</option>
                      <option value='17'>17</option>
                      <option value='18'>18</option>
                      <option value='19'>19</option>
                      <option value='20'>20</option>
                      <option value='21'>21</option>
                      <option value='22'>22</option>
                      <option value='23'>23</option>
                      <option value='24'>24</option>
                      <option value='25'>25</option>
                      <option value='26'>26</option>
                      <option value='27'>27</option>
                      <option value='28'>28</option>
                      <option value='29'>29</option>
                      <option value='30'>30</option>
                      <option value='31'>31</option>
                    </select>
                    <select name="toYear">
                      <option value='<? echo $_POST['toYear']; ?>' selected="selected"><? echo $_POST['toYear']; ?></option>
					  <option value='2011'>2011</option>
                      <option value='2012'>2012</option>
                      <option value='2013'>2013</option>
                      <option value='2014'>2014</option>
                      <option value='2015'>2015</option>
                    </select>
					<br><br>
                    Start typing users first name: <input type="text" name="requestor" id="requestor" size="26">
                    <br><br>
                    Dedpartment: <select name="thedept">
                      <option value='<? echo $_POST['thedept']; ?>' selected="selected"><? echo $_POST['thedept']; ?></option>
					  <option value='ALL'>ALL</option>
          <option value="Adult Inpatient Unit">Adult Inpatient Unit</option>
          <option value="Anesthesia">Anesthesia</option>
         <option value="Asthma">Asthma</option>
          <option value="Burn">Burn</option>
          <option value="Cafeteria">Cafeteria</option>
          <option value="Cancer">Cancer</option>
          <option value="Cardiac One">Cardiac One</option>
          <option value="CardPulmonary Rehab">Cardiac/Pulmonary Rehab</option>
          <option value="Care MGMT">Care MGMT</option>
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
                    </select>
                    <br><br>
                    <input type="submit" name="range" value="View This Range">
                </div>
   </form>
   <p>	 
   <p align="center"><strong><u>To export to Excel</u>:</strong> <br />Choose from the options above and click 'View this Range.' <br />Then <a href='excel.php'>click here</a> to export these records to excel.</p>
   
<?		 
}
?>

</p>
</body>
</html>
<?
} 
?> 
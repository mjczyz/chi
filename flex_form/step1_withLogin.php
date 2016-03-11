<?php session_start(); 
//echo $_SESSION['empno'];

//if(isset($_SESSION['empno'])) {
    //$empno2 = $_SESSION['empno'];
//}
//else {
    //$empno2 = '00000';
	//echo "empno is not set";
//}

require('config/mysql_connect.php');
require('config/variables.php');
$conn = db_connect();

if(isset($_COOKIE['login_uid'])) 
{ 
$flex_uid = $_COOKIE['login_uid']; 
$flex_upass = $_COOKIE['login_upass']; 
$flex_empno = $_COOKIE['login_empno'];

?>
<html>
<head><title>Flexibility Payment Program</title>
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
if(notEmpty(form.employee)){
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
    <td><span class="style11"><span class="style12">::</span>Flexibility Payment Program<span class="style7"></span></span></td>
  </tr>
</table>


<? 

mysql_connect("cmlnkprd01", "mikec", "dudeitold") or die(mysql_error());
mysql_select_db("chi") or die(mysql_error());
$check2 = mysql_query("SELECT * FROM employees WHERE Employee='".$flex_empno."'")or die(mysql_error()); 

while($info2 = mysql_fetch_array( $check2 )) 
{ 

$dept_id=$info2['department_id'];
$check3 = mysql_query("SELECT * FROM departments WHERE id='".$dept_id."'")or die(mysql_error());
while($info3 = mysql_fetch_array( $check3 )) 
{ 
$dept_desc=$info3['Description'];
}

?>
<form name="addreg" method="post" action="step3.php" onSubmit="return formValidation(this)" language="JavaScript">
<input name="var" type="hidden" value="2">
<input name="logged_in" type="hidden" value="y">
  <table width="800" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr align="left" valign="top">
      <td width="300"><span class="style5">
        
Employee ID*: </span></td>
      <td width="320"><input name="employee" size="40" maxlength="255" value="<? echo $info2['Employee'];?>"></td>
    </tr>
    <tr align="left" valign="top">
      <td width="300"><span class="style5">
        
Associate First Name*: </span></td>
      <td width="320"><input name="first_name" size="40" maxlength="255" value="<? echo $info2['FirstName'];?>"></td>
    </tr>
    <tr align="left" valign="top">
      <td width="300"><span class="style5">
        
Associate Last Name*: </span></td>
      <td width="320"><input name="last_name" size="40" maxlength="255" value="<? echo $info2['lastName'];?>"></td>
    </tr>
    <tr align="left" valign="top">
      <td width="300"><span class="style5">
        
Associate email*: </span></td>
      <td width="320"><input name="email" size="40" maxlength="255" value="<? echo $info2['email'];?>"></td>
    </tr>
    <tr align="left" valign="top">
      <td><span class="style5">
      
Department Name*:</span></td>
      <td><input name="department" size="40" maxlength="255" value="<? echo $dept_desc;?>"></td>
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
    
    <tr align="left" valign="top" >
      <td><span class="style5"><strong>Extra Shifts</strong></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr align="left" valign="top" bgcolor="#CCCCCC">
      <td width="300"><span class="style5">Section A: Weekday</span></td>
      <td width="320"><span class="style5">
        <select name="weekday">
          <option value="" selected="selected">-- Select an option --</option>
          <option value="Weekday - 8 hour day shift - 2">8 hour day shift</option>
          <option value="Weekday - 8 hour evening shift - 3">8 hour evening shift</option>
          <option value="Weekday - 8 hour night shift - 4">8 hour night shift</option>
          <option value="Weekday - 4 hour day shift - 1">4 hour day shift</option>
          <option value="Weekday - 4 hour evening shift - 1.5">4 hour evening shift</option>
          <option value="Weekday - 4 hour night shift - 2">4 hour night shift</option>
          </select>
      </span><br /><br /></td>
    </tr>
    <tr align="left" valign="top" bgcolor="#EFEFEF">
      <td width="300"><span class="style5">Section B: Weekend <br />(Friday 3 pm – Monday 7 am)</span></td>
      <td width="320"><span class="style5">
        <select name="weekend">
          <option value="" selected="selected">-- Select an option --</option>
          <option value="Weekend - 8 hour day shift - 5">8 hour day shift</option>
          <option value="Weekend - 8 hour evening shift - 6">8 hour evening shift</option>
          <option value="Weekend - 8 hour night shift - 7">8 hour night shift</option>
          <option value="Weekend - 4 hour day shift - 2.5">4 hour day shift</option>
          <option value="Weekend - 4 hour evening shift - 3">4 hour evening shift</option>
          <option value="Weekend - 4 hour night shift - 3.5">4 hour night shift</option>
          
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
          <option value="Premium - 8 hour day shift - 8">8 hour day shift</option>
          <option value="Premium - 8 hour evening shift - 9">8 hour evening shift</option>
          <option value="Premium - 8 hour night shift - 10">8 hour night shift</option>
          <option value="Premium - 4 hour day shift - 4">4 hour day shift</option>
          <option value="Premium - 4 hour evening shift - 4.5">4 hour evening shift</option>
          <option value="Premium - 4 hour night shift - 5">4 hour night shift</option>
          
        </select>
      </span></td>
    </tr>
    <tr align="left" valign="top">
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
    </tr>
    <tr align="left" valign="top">
      <td colspan="2"><span class="style5">
        <input name="sched_change" type="checkbox" value="Change in Schedule - 1" /> 
        Change in Schedule<br />
        <em>Notified 2+ hours before shift (Director Approval)</em></span></td>
    </tr>
    <tr align="left" valign="top">
      <td colspan="2"><span class="style5">
        <input name="short_notice" type="checkbox" value="Short Notice - 5" /> 
        Short Notice<br />
      <em>Within 2 hours</em></span></td>
    </tr>
    
    <tr align="left" valign="top" bgcolor="#EFEFEF"><br>
    <td><span class="style5">Comments: </span></td>
      <td colspan="2"><span class="style5">
        <textarea cols="40" rows="5" name="comments"></textarea></span></td>
    </tr>
    
   
  </table>
  <p align="center"><br>
    <input type="submit" name="submit" value="Submit">
  </p>
</form>
			
<?
}


?>


</body>
</html>
<?

}

else 
//if the cookie does not exist, they are taken to the login screen 
{ 
header("Location: main_login.php"); 
} 
?> 
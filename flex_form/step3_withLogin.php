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


<?
$employee=$_POST['employee'];
$first_name=$_POST['first_name']; 
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$dept=$_POST['department'];
$date=$_POST['date'];
list($month, $day, $year) = split("-", $date);
$the_date = $year."-".$month."-".$day;
//$extra_shift=$_POST['extra_shift'];
$weekday=$_POST['weekday'];
$weekend=$_POST['weekend'];
$premium=$_POST['premium'];
//$extra_shift_points=substr($extra_shift, -1);
$weekday_points=substr($weekday, -1);
$weekend_points=substr($weekend, -1);
$premium_points=substr($premium, -1);
$float=$_POST['float'];
$float_points=substr($float, -1);
$rto=$_POST['rto'];
$rto_points=substr($rto, -1);
$sched_change=$_POST['sched_change'];
$sched_change_points=substr($sched_change, -1);
$short_notice=$_POST['short_notice'];
$short_notice_points=substr($short_notice, -1);
$comments=$_POST['comments'];
//$total=$_POST['total'];

/*if ($extra_shift_points == 0){
$extra_shift_points = 10;
}*/

if ($premium_points == 't'){
$premium_points = 0;
} else if ($premium_points == 0){
$premium_points = 10;
}
if ($float_points == 5){
$float_points = 1.5;
}

if ($rto_points == 5){
$rto_points = 1.5;
}

// Make a MySQL Connection
mysql_connect("localhost", "stez_user", "stez_1889") or die(mysql_error());
mysql_select_db("ccupcu") or die(mysql_error());

$result = mysql_query("INSERT INTO flex_form (employee,first_name,last_name,dept,date,weekday,weekday_points,weekend,weekend_points,premium,premium_points,the_float,float_points,rto,rto_points,sched_change,sched_change_points,short_notice,short_notice_points,comments) VALUES('$employee','$first_name','$last_name','$dept','$the_date','$weekday','$weekday_points','$weekend','$weekend_points','$premium','$premium_points','$float','$float_points','$rto','$rto_points','$sched_change','$sched_change_points','$short_notice','$short_notice_points','$comments')") or die(mysql_error()); 

$to = "$email";
$subject = "Flex Form Submission";
$message = "$first_name&nbsp;$last_name<br>$dept<br>$the_date<br><br>Weekday<br>$weekday_points<br><br>Weekend<br>$weekend_points<br><br>Premium<br>$premium_points<br><br>Float<br>$float_points points<br><br>RTO<br>$rto_points points<br><br>Schedule Change<br>$sched_change_points points<br><br>Short Notice<br>$short_notice_points points<br><br>Comments<br>$comments";
//$from = "noreply@stez.org";
// Always set content-type when sending HTML email
$headers = "From: intranet@stez.org\n"; 
$headers .= "Cc: gjesionowicz@stez.org\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=UTF-8\n"; 
//$headers .= 'From: intranet@stez.org' . "\r\n";
//$headers .= 'Cc: csteele@stez.org';
mail($to,$subject,$message,$headers,'-f intranet@stez.org');
//echo "Mail Sent.";


echo "<b>Thank you! You have Submitted the form SUCCESSFULLY!<br>
  Please call Corinne Steele at 7599 if there are any issues<br><br><hr>";
  echo "$employee<br>$first_name&nbsp;$last_name<br>$dept<br>$the_date<br><br>Weekday<br>$weekday_points<br><br>Weekend<br>$weekend_points<br><br>Premium<br>$premium_points<br><br>Float<br>$float_points points<br><br>RTO<br>$rto_points points<br><br>Schedule Change<br>$sched_change_points points<br><br>Short Notice<br>$short_notice_points points<br><br>Comments<br>$comments";
          
	?>
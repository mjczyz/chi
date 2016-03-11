<?php 
//http://www.phpfreaks.com/tutorials/114/0.php
define(db_host, "cmlnkwiki"); 
define(db_user, "intranet"); 
define(db_pass, "password"); 
define(db_link, mysql_connect(db_host,db_user,db_pass)); 
define(db_name, "absentee_db"); 
mysql_select_db(db_name); 
?> 


<?php 
//"SELECT h.*, m.* FROM health_history h, medication m WHERE h.id='$id' AND m.id='$id' "
$select = "SELECT * FROM illness_tbl ORDER BY Department"; 
//$select = "SELECT * FROM registrant";                 
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
?> 


<?php 
header("Content-type: application/x-msdownload"); 
header("Content-Disposition: attachment; filename=absentee_log.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
print "$header\n$data";  
?>
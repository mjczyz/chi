<?
// Connect to Database 
require('config/mysql_connect.php');
require('config/variables.php');
$conn2 = mysql_db_connect();

$result = mysql_query("DELETE FROM registrant WHERE id='$id'");
         

          //echo "<b>Thank you! The Registrant has been DELETED Successfully!<br><br>You'll be redirected back to the Admin Area after (3) Seconds";
          echo "<meta http-equiv=Refresh content=0;url=admin.php>";

?>



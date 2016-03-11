<?
/*
function db_connect() {
 //$result = mysql_connect("host", "username", "password");
   $result = mysql_connect("cmlnkwiki", "childbirth", "password");
   if (!$result)
      return false;
 //if (!mysql_select_db("database name"))
   if (!mysql_select_db("childbirth"))
      return false;
   return $result;
}
*/
?>

<?

function db_connect() {
 //$result = mysql_connect("host", "username", "password");
   $result = mssql_connect("cmlnksql03", "intranetuser", "1Pet_1_25");
   if (!$result)
      return false;
 //if (!mysql_select_db("database name"))
   if (!mssql_select_db("listdb"))
      return false;
   return $result;
}

?>
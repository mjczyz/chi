
<?

function db_connect() {
 //$result = mysql_connect("host", "username", "password");
   $result = mysql_connect("cmlnkprd01", "mike", "golf9c");
   if (!$result)
      return false;
 //if (!mysql_select_db("database name"))
   if (!mysql_select_db("chi"))
      return false;
   return $result;
}

?>
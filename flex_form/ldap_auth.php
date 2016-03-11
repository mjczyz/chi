<html>
<head>
<title>
LDAP Authentication report
</title>
</head>
<body>
<p>
<?PHP
//(&(objectClass=user)(samAccountName=" + searchFor + "))
//$ldaprdn  = 'CN=ldap user,ou=special,ou=User Accounts,dc=lincoln-ne,dc=catholichealth,dc=net';
$ldaprdn  = 'lincoln-ne\\ldapuser';
$ldappass = 'ldappass';

$userid = $_POST['userid'];
$pw = $_POST['password'];
print "<h1>LDAP Authentication for " . $userid . " </h1><p>";
	
$ldapserver = ldap_connect("ldap://lincoln-ne.catholichealth.net:389");

//Set protocol version
ldap_set_option($ldapserver, LDAP_OPT_PROTOCOL_VERSION, 3)
or die ("Could not set ldap protocol");

// Set this option for AD on Windows Server 2003 per PHP manual
ldap_set_option($ldapserver, LDAP_OPT_REFERRALS, 0)
or die ("Could not set option referrals");

	if(!$ldapserver)
	{
		print "<br>connection error";
		exit(0);
	}
	$bind = ldap_bind($ldapserver,$ldaprdn,$ldappass);
	if(!$bind)
	{
		print "<br>bind error";
		exit(0);
	}
	//$base_dn = "ou=SERMC IT Staff,DC=lincoln-ne,DC=catholichealth,DC=net";
	$base_dn = "DC=lincoln-ne,DC=catholichealth,DC=net";
	
	//$filter = "samaccountname=" . $userid;
	$filter = "(&(objectClass=user)(samAccountName=".$userid."))";
	
	
	//$inforequired = array("employeeType","department","employeeID","mail","givenName","sn");

	$result = ldap_search($ldapserver,$base_dn,$filter);
	$info = ldap_get_entries($ldapserver,$result);

	if(!$result)
	{
		print "<br>anonymous search failed";
		exit(0);
	}
	if($info["count"] == 0)
	{
		print "<br>User unknown";
		exit(0);
	}
	if($info["count"] > 1)
	{
		print "<br>More than one such user - report to 219-7411";
		exit(0);
	}
	//added code for blank pw
	if($pw == '')
	{
		print "<br>You did not enter a password";
		exit(0);
	}
	////////////////////////
	$user_dn = $info[0]["dn"];
	$bind = @ldap_bind($ldapserver,$user_dn,$_POST['password']);
	if(!$bind)
	{
		print "<br>bind failed";
		print "<br>user not authenticated";
		exit(0);
	}
	
	
	

//check employee dept
$hostName = "cmlnkprd01";
$userName = "mikec";
$password = "dudeitold";
$dbName = "chi";

mysql_connect($hostName,$userName,$password) or die("Unable to connect to host $hostName");
mysql_select_db($dbName) or die("Unable to select database $dbName");

$query = "SELECT * FROM employees WHERE ldap_login='".$userid."'";
$result = mysql_query($query);
while($myrow = mysql_fetch_array($result))
             {//begin of loop
			 //was Department(6700), but had to change to department_id(379) which is a key joining two tables
			 $dept=$myrow['department_id'];
			 $emp=$myrow['Employee'];
			 //echo $myrow['Department'];
			 }
			   
//if ($dept == 379 || $dept == 383) {
//if ($dept == "379") {
	if ($emp == 13277 || $emp == 83025 || $emp == 12558) {
//set cookie
$hour = time() + 3600;
setcookie(flex_user, $_POST['userid'], $hour, "/");
setcookie(flex_pw, $_POST['password'], $hour, "/");
	header("Location:http://cmlnklamp01/ccupcu/flex_form/admin.php");
	}else{
	echo "You are not authorized to proceed.";
	
	}
	ldap_close($ldapserver);
?>
</body>
</html>
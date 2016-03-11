<?php 
if (isset($_GET['link'])) { 
session_start(); 
$_session['myvariable'] = 'Hello World'; 
header('Location: page2.php'); 
exit; 
} 
?> 
<a href="<?php print $_SERVER['REQUEST_URI'] . '?link=yes';?>">Click Here</a>

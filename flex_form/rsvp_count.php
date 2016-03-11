<?php 

$link = mysql_connect("localhost", "stez_user", "stez_1889");
mysql_select_db("banquet", $link);

$result = mysql_query("SELECT * FROM invite_list where RSVP_Yes='Yes'", $link);
$num_rows = mysql_num_rows($result);

$result2 = mysql_query("SELECT * FROM invite_list where Guest='Yes'", $link);
$num_rows2 = mysql_num_rows($result2);

$result3 = mysql_query("SELECT * FROM invite_list where RSVP_No='No'", $link);
$num_rows3 = mysql_num_rows($result3);

$total_coming = $num_rows + $num_rows2;

echo "$num_rows Associates Coming <br /><br />";
echo "$num_rows2 Guests Coming <br /><br />";
echo "<strong>Total people coming = $total_coming<br /><br /></strong>";
echo "$num_rows3 Not Coming <br /><br />";

?>

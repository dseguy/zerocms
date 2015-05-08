<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
require_once '../includes/db.kate.php';
require_once '../includes/config.kate.php';
include '../includes/header.kate.php';
include '../includes/wrapper-start.php';
include '../includes/menu.kate.php';
?>
<div class="content_bottom">

			<div class="grid_1_of_2 box">
<?php
$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD)
	or die('Fuck!, unable to connect.');

mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

if(!isset($_SESSION['user_id'])){ //if not logged in
echo '<a href="zero_login.php"><h3 align="center">Click Here To Login</h3></a>';
} elseif(isset($_SESSION['user_id']) && ($_SESSION['access_level'] >2)) {

$sql = 'SELECT
		access_level, access_name
	FROM
		zero_access_levels
	ORDER BY
		access_name ASC';
$result = mysql_query($sql, $dbx) or die(mysql_error($dbx));
$privileges = array();
while ($row = mysql_fetch_assoc($result)){
	$privileges[$row['access_level']] = $row['access_name'];
}
mysql_free_result($result);
echo '<h3>Admin Panel</h3>';
$limit = count($privileges);
for($i = 1; $i <= $limit; $i++){
	echo '<h5>' , $privileges[$i] , '</h5>';
	$sql = 'SELECT
			user_id, name
		FROM
			zero_users
		WHERE
			access_level = ' . $i . '
		ORDER BY
			name ASC';
	$result = mysql_query($sql, $dbx) or die(mysql_error($dbx));
	if(mysql_num_rows($result) == 0){
		echo '<p><strong>There are no ' , $privileges[$i] , ' accounts' , ' registered</strong></p>';
	}else{
		echo '<ul>';
		while ($row = mysql_fetch_assoc($result)){
			if($_SESSION['user_id'] == $row['user_id']){
				echo '<li>' , htmlspecialchars($row['name']) , '</li>';
				}else{
					echo '<li><a href="',$site,'/views/zero_user_account.php?user_id=' , $row['user_id'] , '">' , htmlspecialchars($row['name']) , 
					'</a></li>';
					}
				}
		echo '</ul>';
	}
	mysql_free_result($result);
}
} else {
echo '<h3 align="center">hmm...</h3><meta http-equiv="refresh" content="1;url=zero_cpanel.php" />';
}
?>
</div>
	</div>
<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>
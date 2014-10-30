<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
require '../includes/db.kate.php';
include '../includes/header.kate.php';

$dbx = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD)
	or die('Fuck!, unable to connect.');

mysqli_select_db(MYSQL_DB, $dbx) or die(mysqli_error($dbx));

$sql = 'SELECT
		access_level, access_name
	FROM
		zero_access_levels
	ORDER BY
		access_name ASC';
$result = mysqli_query($sql, $dbx) or die(mysqli_error($dbx));
$privileges = array();
while ($row = mysqli_fetch_assoc($result)){
	$privileges[$row['access_level']] = $row['access_name'];
}
mysqli_free_result($result);
echo '<h2>Admin Panel</h2>';
$limit = count($privileges);
for($i = 1; $i <= $limit; $i++){
	echo '<h3>' . $privileges[$i] . '</h3>';
	$sql = 'SELECT
			user_id, name
		FROM
			zero_users
		WHERE
			access_level = ' . $i . '
		ORDER BY
			name ASC';
	$result = mysqli_query($sql, $dbx) or die(mysqli_error($dbx));
	if(mysqli_num_rows($result) == 0){
		echo '<p><strong>There are no ' . $privileges[$i] . 'accounts' . 'registered</strong></p>';
	}else{
		echo '<ul>';
		while ($row = mysqli_fetch_assoc($result)){
			if($_SESSION['user_id'] == $row['user_id']){
				echo '<li>' . htmlspecialchars($row['name']) . '</li>';
				}else{
					echo '<li><a href="'.$site.'/views/zero_user_account.php?user_id=' . $row['user_id'] . '">' . htmlspecialchars($row['name']) . 
					'</a></li>';
					}
				}
		echo '</ul>';
	}
	mysqli_free_result($result);
}
require '../includes/footer.kate.php';
?>

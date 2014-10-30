
<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
require 'includes/db.kate.php';
require 'includes/functions.kate.php';

$dbx = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) 
	or die('Fuck!, Unable to connect.');
	
mysqli_select_db(MYSQL_DB, $dbx) or die(mysqli_error($dbx));
include 'includes/header.kate.php';

$sql = 'SELECT
		article_id
	FROM
		zero_articles
	WHERE
		is_published = TRUE
	ORDER BY
		publish_date DESC';
$result = mysqli_query($sql, $dbx);

if(mysqli_num_rows($result) == 0){
	echo '<p><strong>No Articles.</strong></p>';
} else {
		while ($row = mysqli_fetch_array($result)) {
		output_story($dbx, $row['article_id'], TRUE);
	}
}
mysqli_free_result($result);
include 'includes/footer.kate.php';
?>

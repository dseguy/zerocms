<?php
$title = 'abc';
include '../includes/config.kate.php';
include '../includes/header.kate.php';
include '../includes/wrapper-start.php';
require '../includes/db.kate.php';
require '../includes/functions.kate.php';
//start
?>

<?php
//menu
include '../includes/menu.kate.php';
?>

<?php

$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) 
	or die('Fuck!, Unable to connect.');
	
mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

$sql = 'SELECT
		article_id
	FROM
		zero_articles
	WHERE
		is_published = TRUE
	ORDER BY
		publish_date DESC';
$result = mysql_query($sql, $dbx);

echo '<div class="content_bottom">';
echo '<div class="grid_1_of_2 box">';
echo '<br>';
echo '<div class="span_1_of_3_text2">';

if(mysql_num_rows($result) == 0){
	echo '<p><strong>No Articles.</strong></p>';
} else {
		while ($row = mysql_fetch_array($result)) {
		output_story($dbx, $row['article_id'], TRUE);
	}
}
mysql_free_result($result);

echo '</div>';
echo '</div>';
echo '</div>';
?>

<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>
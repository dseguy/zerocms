<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
require '../includes/db.kate.php';
require '../includes/functions.kate.php';

$dbx = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD)
	or die('Fuck!, Unable To Connect.');
	
mysqli_select_db(MYSQL_DB, $dbx) or die(mysqli_error($dbx));
include '../header.kate.php';

$search = (isset($_GET['search'])) ? $_GET['search'] : '';

$sql = 'SELECT
		article_id
	FROM
		zero_articles
	WHERE
		MATCH(title, article_text) AGAINST ("' . 
			mysqli_real_escape_string($search, $dbx) . '" IN BOOLEAN MODE)
	ORDER BY
		MATCH(title, article_text) AGAINST ("' . 
			mysqli_real_escape_string($search, $dbx) . '" IN BOOLEAN MODE)
	
	DESC';
$result = mysqli_query($sql, $dbx) or die(mysqli_error($dbx));

if(mysqli_num_rows($result) == 0){
	echo '<p><strong>No Articles Found.</strong></p>';
}else{
	while($row = mysqli_fetch_array($result)){
		output_story($dbx, $row['article_id'], TRUE);
	}
}
mysqli_free_result($result);
include '../includes/footer.kate.php';
?>

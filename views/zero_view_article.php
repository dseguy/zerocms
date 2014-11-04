<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014

//start
require '../includes/db.kate.php';
require '../includes/functions.kate.php';
include '../includes/config.kate.php';
include '../includes/header.kate.php';
include '../includes/wrapper-start.php';
include '../includes/menu.kate.php';
?>

<?php
$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD)
	or die('Fuck!,Unable To Connect.');
mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

echo '<div class="content_bottom">';
echo '<div class="grid_1_of_2 box">';
echo '<div class="span_1_of_3_text2">';
echo '<br>';

if(isset($_GET['article_id'])){
output_story($dbx, $_GET['article_id']);
show_comments($dbx, $_GET['article_id'], TRUE);

} else {
echo '<h3>Error</h3>';
}


echo '<br>';
echo '</div>';
echo '</div>';
echo '</div>';

?>

<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>


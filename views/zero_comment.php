<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014

//start
require '../includes/db.kate.php';
require '../includes/config.kate.php';
require '../includes/functions.kate.php';
include '../includes/header.kate.php';
include '../includes/wrapper-start.php';
include '../includes/menu.kate.php';
?>

<?php
$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD)
	or die('Fuck!, Unable To Connect.');

mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

echo '<div class="content_bottom">';
echo '<div class="grid_1_of_2 box">';
echo '<br>';

//check if request is empty or not set
if(!isset($_GET['article_id'])){ echo '<h3>Error</h3>';}
//if not empty or is set
else
{

$article_id = (isset($_GET['article_id']) && ctype_digit($_GET['article_id'])) ? $_GET['article_id'] : '';
output_story($dbx, $article_id);
?>
				<br>
				<h3>Add A Comment(250 characters max):</h3>
				<div class="searh_form">
	<form method="post" action="zero_transact_article.php">
		<textarea id="comment_text" name="comment_text" rows="10" cols="60" maxlength="250"></textarea><br/>
		<input type="submit" name="action" value="Submit Comment" />
		<input type="hidden" name="article_id" value="<?php echo $article_id; ?>" />
	</form>
			</div>
			<br>
<?php show_comments($dbx, $article_id, FALSE);
}
?>

	</div>
	</div>
	

<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>
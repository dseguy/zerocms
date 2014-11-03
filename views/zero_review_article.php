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
<div class="content_bottom">

			<div class="grid_1_of_2 box">
<?php

$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD)
	or die('Fuck!, Unable To Connect.');
	
mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

if(!isset($_SESSION['user_id'])){ //if not logged in
echo '<a href="zero_login.php"><h3 align="center">Click Here To Login</h3></a>';
} elseif(isset($_SESSION['user_id']) && ($_SESSION['access_level'] >1)) {

$article_id = (isset($_GET['article_id']) && ctype_digit($_GET['article_id'])) ? $_GET['article_id'] : '';
echo '<h3>Article Review</h3>';
output_story_review($dbx, $article_id);

$sql = 'SELECT
		is_published, UNIX_TIMESTAMP(publish_date) AS publish_date,access_level
	FROM
		zero_articles a INNER JOIN zero_users u ON a.user_id = u.user_id
	WHERE
		article_id = ' . $article_id;
$result = mysql_query($sql, $dbx) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

if(!empty($date_published) and $is_published){
	echo '<h4>Published: ' . date('l F j, Y H:i', $date_published) . '</h4>';
}

echo'<br><div class="searh_form"><form method="post" action="zero_transact_article.php"><div><input type="submit" name="action" value="Edit"/>';

if($access_level > 1 || $_SESSION['access_level'] > 1){
	if($is_published){
		echo '<input type="submit" name="action" value="Retract"/>';
	}else{
		echo'<input type="submit" name="action" value="Publish"/>';
		echo'<input type="submit" name="action" value="Delete"/>';
		}
	}
}
?>
<input type="hidden" name="article_id" value="<?php echo $article_id; ?>"/>
</div>
</div>
</form>
</div>
	</div>

<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>

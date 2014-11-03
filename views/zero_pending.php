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

$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
    die ('Unable to connect. Check your connection parameters.');

mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

if(!isset($_SESSION['user_id'])){ //if not logged in
echo '<a href="zero_login.php"><h3 align="center">Click Here To Login</h3></a>';
} elseif(isset($_SESSION['user_id']) && ($_SESSION['access_level'] >2)) {
//continue if logged in & access_level >2

echo '<h3>Article Availability</h3>';

echo '<h5>Pending Articles</h5>';
$sql = 'SELECT
        article_id, title, UNIX_TIMESTAMP(submit_date) AS submit_date
    FROM
        zero_articles
    WHERE
        is_published = FALSE
    ORDER BY
        title ASC';
$result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

if (mysql_num_rows($result) == 0) {
    echo '<p><strong>No pending articles available.</strong></p>';
} else {
    echo '<ul>';
    while ($row = mysql_fetch_array($result)) {
        echo '<li><a href="'.$site.'/views/zero_review_article.php?article_id=' .
            $row['article_id'] . '">' . htmlspecialchars($row['title']) .
            '</a> (' . date('F j, Y', $row['submit_date']) . ')</li>';
    }
    echo '</ul>';
}
mysql_free_result($result);

echo '<h5>Published Articles</h5>';
$sql = 'SELECT
        article_id, title, UNIX_TIMESTAMP(publish_date) AS publish_date
    FROM
        zero_articles
    WHERE
        is_published = TRUE
    ORDER BY
        title ASC';
$result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

if (mysql_num_rows($result) == 0) {
    echo '<p><strong>No published articles available.</strong></p>';
} else {
    echo '<ul>';
    while ($row = mysql_fetch_array($result)) {
        echo '<li><a href="'.$site.'/views/zero_review_article.php?article_id=' .
            $row['article_id'] . '">' . htmlspecialchars($row['title']) .
            '</a> (' . date('F j, Y', $row['publish_date']) . ')</li>';
    }
    echo '</ul>';
}
mysql_free_result($result);
}
?>
</div>
	</div>
<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>
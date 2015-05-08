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
} elseif(isset($_SESSION['user_id']) && ($_SESSION['access_level'] >=1)) {

$sql = 'SELECT
        email, name
    FROM
        zero_users
    WHERE
        user_id=' . $_SESSION['user_id'];
$result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

echo '<h3>User Info</h3>';
echo '<div class="searh_form"><form method="post" action="zero_transact_user.php">';
echo '<input type="text" id="name" name="name" maxlength="100" value="',$name,'"/></td>';
echo '<input type="text" id="email" name="email" maxlength="100" value="',$email,'"/></td>';
echo '<input type="submit" name="action" value="Change my info"/>';
echo '</form></div>';

echo '<br><h4>Pending Articles</h4>';

$sql = 'SELECT
        article_id, UNIX_TIMESTAMP(submit_date) AS submit_date, title
    FROM
        zero_articles
    WHERE
        is_published = FALSE AND
        user_id = ' . $_SESSION['user_id'] . '
    ORDER BY
        submit_date ASC';
$result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

if (mysql_num_rows($result) == 0) {
    echo '<p><strong>There are currently no pending articles.</strong></p>';
} else {
    echo '<ul>';
    while ($row = mysql_fetch_array($result)) {
        echo '<li><a href="',$site,'/views/zero_review_article.php?article_id=' ,
            $row['article_id'] , '">' , htmlspecialchars($row['title']) ,
            '</a> (submitted ' . date('F j, Y', $row['submit_date']) .
            ')</li>';
    }
    echo '</ul>';
}
mysql_free_result($result);

echo '<h4>Published Articles</h4>';

$sql = 'SELECT
        article_id, UNIX_TIMESTAMP(publish_date) AS publish_date, title
    FROM
        zero_articles
    WHERE
        is_published = TRUE AND
        user_id = ' . $_SESSION['user_id'] . '
    ORDER BY
        publish_date ASC';
$result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

if (mysql_num_rows($result) == 0) {
    echo '<p><strong>There are currently no published articles.</strong></p>';
} else {
    echo '<ul>';
    while ($row = mysql_fetch_array($result)) {
        echo '<li><a href="',$site,'/views/zero_review_article.php?article_id=' ,
            $row['article_id'] , '">' , htmlspecialchars($row['title']) ,
            '</a> (published ' . date('F j, Y', $row['publish_date']) .
            ')</li>';
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
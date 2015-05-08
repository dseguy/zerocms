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
<br>
<?php
$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
    die ('Unable to connect. Check your connection parameters.');

mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

if(!isset($_SESSION['user_id'])){ //if not logged in
echo '<a href="zero_login.php"><h3 align="center">Click Here To Login</h3></a>';
} elseif(isset($_SESSION['user_id']) && ($_SESSION['access_level'] >=1)) {


$action = (isset($_GET['action'])) ? $_GET['action'] : '';
$article_id = (isset($_GET['article_id']) && ctype_digit($_GET['article_id'])) ?
    $_GET['article_id'] : '' ;

$title = (isset($_POST['title'])) ? $_POST['title'] : '' ;
$article_text = (isset($_POST['article_text'])) ? $_POST['article_text'] : '' ;
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '' ;

if ($action == 'edit' && !empty($article_id)) {
    $sql = 'SELECT
            title, article_text, user_id
        FROM
            zero_articles
        WHERE
            article_id = ' . $article_id;
    $result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

    $row = mysql_fetch_array($result);
    extract($row);
    mysql_free_result($result);
}

//start table, if logged in
echo '<div class="searh_form">';
echo '<h3>Compose Article</h3>';
echo '<form method="post" action="zero_transact_article.php">';
echo '<input type="text" id="title" name="title" placeholder="Title" class="active" maxlength="250"/>';
echo '<textarea id="article_text" name="article_text" placeholder="Text" rows="20" cols="60">',$article_text,'</textarea><br/>';

if(empty($article_id)){
echo '<input type="hidden" name="user_id" value="' , $_SESSION['user_id'] , '"/>'; 
    echo '<input type="submit" name="action" value="Submit New Article"/>';}
else{	
echo '<input type="hidden" name="article_id" value="',$article_id,'"/>';
    echo '<input type="submit" name="action" "value="Save Changes"/>';
}

//end table
echo '</td></tr></table></form><br></div>';
}
?>

</div></div>
<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>

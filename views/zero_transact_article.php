<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
require_once '../includes/db.kate.php';
require_once '../includes/config.kate.php';
require_once '../includes/zero_http_functions.kate.php';
session_start();   
  $dbx = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD) or
      die ('Fuck! Unable to connect.');
   mysql_select_db(MYSQL_DB,$dbx) or die(mysql_error($dbx));
  if (isset($_REQUEST['action']))
  {
  	switch ($_REQUEST['action'])
  	{
	//submit article
  		case 'Submit New Article':
  		     $title = (isset($_POST['title'])) ? $_POST['title'] : '';
             $article_text = (isset($_POST['article_text'])) ? $_POST['article_text']: '';
        if (isset($_SESSION['user_id']) && !empty($title) &&
            !empty($article_text)) {
            $sql = 'INSERT INTO zero_articles
                    (user_id, submit_date, title, article_text)
                VALUES
                    (' . $_SESSION['user_id'] . ',
                    "' . date('Y-m-d H:i:s') . '",
                    "' . mysql_real_escape_string($title, $dbx) . '",
                    "' . mysql_real_escape_string($article_text, $dbx) . '")';
            mysql_query($sql, $dbx) or die(mysql_error($dbx));
        }
        redirect('../index.php');
        break; 
		
		
	//edit article
    case 'Edit':
        redirect(''.$site.'/views/zero_compose.php?action=edit&article_id=' . $_POST['article_id']);
        break;
		
	//save article
    case 'Save Changes':
        $article_id = (isset($_POST['article_id'])) ? $_POST['article_id'] : '';
        $user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
        $title = (isset($_POST['title'])) ? $_POST['title'] : '';
        $article_text = (isset($_POST['article_text'])) ? $_POST['article_text'] : '';
        if (!empty($article_id) && !empty($title) && !empty($article_text)) {
            $sql = 'UPDATE zero_articles SET 
                    title = "' . mysql_real_escape_string($title, $dbx) . '",
                    article_text = "' . mysql_real_escape_string($article_text, $dbx) . '",
                    submit_date = "' . date('Y-m-d H:i:s') . '"
                WHERE
                    article_id = ' . $article_id;
            if (!empty($user_id)) {
                $sql .= ' AND user_id = ' . $user_id;
            }
            mysql_query($sql, $dbx) or die(mysql_error($dbx));
        }
        if (empty($user_id)) {
            redirect(''.$site.'/views/zero_pending.php');
        } else {
            redirect(''.$site.'/views/zero_cpanel.php');
        }
        break;
	
	//publish article
    case 'Publish':
        $article_id = (isset($_POST['article_id'])) ? $_POST['article_id'] : '';
        if (!empty($article_id)) {
            $sql = 'UPDATE zero_articles SET 
                    is_published = TRUE,
                    publish_date = "' . date('Y-m-d H:i:s') . '"
                WHERE
                    article_id = ' . $article_id;
            mysql_query($sql, $dbx) or die(mysql_error($dbx));
        }
        redirect(''.$site.'/views/zero_pending.php');
        break;
	
	//retract article
    case 'Retract':
        $article_id = (isset($_POST['article_id'])) ? $_POST['article_id'] : '';
        if (!empty($article_id)) {
            $sql = 'UPDATE zero_articles SET 
                    is_published = FALSE,
                    publish_date = "0000-00-00 00:00:00"
                WHERE
                    article_id = ' . $article_id;
            mysql_query($sql, $dbx) or die(mysql_error($dbx));
        }
        redirect(''.$site.'/views/zero_pending.php');
        break;

	//delete article
    case 'Delete':
        $article_id = (isset($_POST['article_id'])) ? $_POST['article_id'] : '';
        if (!empty($article_id)) {
            $sql = 'DELETE FROM
                    zero_articles
					article_id
                WHERE
                    a.article_id = ' . $article_id . ' AND
                    is_published = FALSE';
            mysql_query($sql, $dbx) or die(mysql_error($dbx));
        }
        redirect(''.$site.'/views/zero_pending.php');
        break;
		
    default:
        redirect('../index.php');
    }
} else {
    redirect('../index.php');
}
?>

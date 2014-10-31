<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
require '../includes/db.kate.php';
require '../includes/functions.kate.php';

$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD)
	or die('Fuck!,Unable To Connect.');
mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

include '../includes/header.kate.php';
output_story($dbx, $_GET['article_id']);
show_comments($dbx, $_GET['article_id'], TRUE);

include '../includes/footer.kate.php';
?>

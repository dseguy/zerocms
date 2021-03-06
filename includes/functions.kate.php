<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014

include 'config.kate.php';
//function to trim text
function trim_body($text, $max_length = 430, $tail = '...') {
    $tail_len = strlen($tail);
    if (strlen($text) > $max_length) {
        $tmp_text = substr($text, 0, $max_length - $tail_len);
        if (substr($text, $max_length - $tail_len, 1) == ' ') {
            $text = $tmp_text;
        }
        else {
            $pos = strrpos($tmp_text, ' ');
            $text = substr($text, 0, $pos);
        }
        $text = $text . $tail;
    }
    return $text;
}

//function to view article
function output_story($dbx, $article_id, $preview_only = FALSE) {
    if (empty($article_id)) {
        return;
    }
    $sql = 'SELECT
            name, is_published, title, article_text,
            UNIX_TIMESTAMP(submit_date) AS submit_date,
            UNIX_TIMESTAMP(publish_date) AS publish_date
        FROM
            zero_articles a JOIN zero_users u ON a.user_id = u.user_id
        WHERE
            article_id = ' . $article_id;
    $result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

    if ($row = mysql_fetch_assoc($result)) {
        extract($row);
        echo '<br><h3>' . htmlspecialchars($title) . '</h3>';
        echo '<p>By: ' . htmlspecialchars($name) . '</p>';
        echo '<p>';
        if ($row['is_published']) {
            echo date('F j, Y', $publish_date);
        } 
		else {
            echo 'Article is not yet published.';
        }
        echo '</p>';
        if ($preview_only) {
        echo '<p>' . nl2br(htmlspecialchars(trim_body($article_text))) . '</p>';
		echo '<p>';
        echo '<a href="zero_view_article.php?article_id='.$article_id.'">Read Full Story</a>';
		echo '</p>';
        } else {
            echo '<p>' . nl2br(htmlspecialchars($article_text)) . '</p>';
        }
    }
    mysql_free_result($result);
}


//function to view article on index(zero_home-load.php)
function output_story_index($dbx, $article_id, $preview_only = FALSE) {
    if (empty($article_id)) {
        return;
    }
    $sql = 'SELECT
            name, is_published, title, article_text,
            UNIX_TIMESTAMP(submit_date) AS submit_date,
            UNIX_TIMESTAMP(publish_date) AS publish_date
        FROM
            zero_articles a JOIN zero_users u ON a.user_id = u.user_id
        WHERE
            article_id = ' . $article_id;
    $result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

    if ($row = mysql_fetch_assoc($result)) {
        extract($row);
        echo '<br><h3>' . htmlspecialchars($title) . '</h3>';
        echo '<p>By: ' . htmlspecialchars($name) . '</p>';
        echo '<p>';
        if ($row['is_published']) {
            echo date('F j, Y', $publish_date);
        } 
		else {
            echo 'Article is not yet published.';
        }
        echo '</p>';
        if ($preview_only) {
        echo '<p>' . nl2br(htmlspecialchars(trim_body($article_text))) . '</p>';
		echo '<p>';
        echo '<a href="views/zero_view_article.php?article_id='.$article_id.'">Read Full Story</a>';
		echo '</p>';
        } else {
            echo '<p>' . nl2br(htmlspecialchars($article_text)) . '</p>';
        }
    }
    mysql_free_result($result);
}



//function to review article
function output_story_review($dbx, $article_id, $preview_only = FALSE) {
    if (empty($article_id)) {
        return;
    }
    $sql = 'SELECT
            name, is_published, title, article_text,
            UNIX_TIMESTAMP(submit_date) AS submit_date,
            UNIX_TIMESTAMP(publish_date) AS publish_date
        FROM
            zero_articles a JOIN zero_users u ON a.user_id = u.user_id
        WHERE
            article_id = ' . $article_id;
    $result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

    if ($row = mysql_fetch_assoc($result)) {
        extract($row);
        echo '<br><h4>' . htmlspecialchars($title) . '</h4>';
        echo '<p>By: ' . htmlspecialchars($name) . '</p>';
        echo '<p>';
        if ($row['is_published']) {
            echo date('F j, Y', $publish_date);
        } 
		else {
            echo 'Article is not yet published.';
        }
        echo '</p>';
        if ($preview_only) {
        echo '<p>' . nl2br(htmlspecialchars(trim_body($article_text))) . '</p>';
		echo '<p>';
        echo '<a href="zero_view_article.php?article_id='.$article_id.'">Read Full Story</a>';
		echo '</p>';
        } else {
            echo '<p>' . nl2br(htmlspecialchars($article_text)) . '</p>';
        }
    }
    mysql_free_result($result);
}
?>

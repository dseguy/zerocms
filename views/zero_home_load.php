<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
?>



<div class="main">
<div class="clear">
	</div>
		<div class="content_btm">
				<div class="content_btm_grid" align="center">
				<h2>Hello Everyone,</h2>
				<h2>Welcome To <?php echo $site_name;?></h2>
				
			</div>
		
		</div>
		
<?php
require 'includes/db.kate.php';
$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) 
	or die('Fuck!, Unable to connect.');
	
mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

$sql = 'SELECT
		article_id
	FROM
		zero_articles
	WHERE
		is_published = TRUE
	ORDER BY
		publish_date DESC';
$result = mysql_query($sql, $dbx);

echo '<div class="content_bottom">';
echo '<div class="grid_1_of_2 box">';
echo '<br>';
echo '<div class="span_1_of_3_text2">';

if(mysql_num_rows($result) == 0){
	echo '<p><strong>No Articles.</strong></p>';
} else {
		while ($row = mysql_fetch_array($result)) {
		output_story_index($dbx, $row['article_id'], TRUE);
	}
}
mysql_free_result($result);

echo '</div>';
echo '</div>';
echo '</div>';
?>

</div>


<?php
//end
?>
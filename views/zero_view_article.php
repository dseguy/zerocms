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

} else {
echo '<h3>Error</h3>';
}


echo '<br>';
echo '</div>';
echo '</div>';
echo '</div>';

?>
<div class="content_bottom">
<div class="grid_1_of_2 box">
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = '<?php echo $disqus_comments_name ;?>'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	</div>
	</div>
<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>


<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site http://www.aas9.in/zerocms
// Github http://github.com/pcx1256/zerocms
// Created March 2014

require '../includes/db.kate.php';
include '../includes/header.kate.php';
include '../includes/wrapper-start.php';
include '../includes/menu.kate.php';
?>
<div class="content_bottom">
<div class="grid_1_of_2 box">
<?php
echo '<h3 align="center">How To Install ZeroCMS ?</h3>';
echo '<h5>1.Enter Database Details In \'includes/db.kate.php\'</h5>';
echo '<h5>2.Open \'includes/config.kate.php\' and enter your domain name or subdirectory where you want to install it</h5>';
echo '<h5>3.Enter your sitename on \'includes/config.kate.php\' also enter your disqus shortname if you want to use disqus comment system</h5>';
echo '<a href="init.php"><h5 style="color:#EA6060;">4.Click Here To Complete Installation</h5></a>';
?>
</div>
</div>
<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>
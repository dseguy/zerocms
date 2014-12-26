<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
?>

<!DOCTYPE html>
<html class=" js "><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ZeroCMS</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- google font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!-- style -->
<link href="installer_static/style.css" rel="stylesheet" type="text/css" media="all">

	<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
	</script>
</head>
<body>


<div class="wrap">
<div class="wrapper">		
	
	</div><div class="content_bottom">
<div class="grid_1_of_2 box">
<h3 align="center">How To Install ZeroCMS ?</h3>
<h5>1.Enter Database Details In 'includes/db.kate.php'</h5>
<h5>2.Open 'includes/config.kate.php' and enter your domain name or subdirectory where you want to install it</h5>
<h5>3.Enter your sitename on 'includes/config.kate.php' also enter your disqus shortname if you want to use disqus comment system</h5>
<a href="init.php"><h5 style="color:#EA6060;">4.Click Here To Complete Installation</h5></a>
</div>
</div>
</div>
<div class="copy-right">
			<div class="wrap">
			
							
				<p> Powered By <a href="http://aas9.in/zerocms" target="_blank">zeroCMS</a> </p>
	 	    </div>
	 	 </div>



</body></html>
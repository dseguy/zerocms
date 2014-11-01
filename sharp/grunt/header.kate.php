<?php
//header start
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- google font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!-- style -->
<link href="<?php echo $site;?>static/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $site;?>static/css/search.css" rel="stylesheet" type="text/css" media="all" />
<!-- start nav -->
<link href="<?php echo $site;?>static/css/nav.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?php echo $site;?>static/js/jquery.min.js"></script>
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
<!-- end nav -->
<script src="<?php echo $site;?>static/js/login.js"></script>
<script src="<?php echo $site;?>static/js/modernizr.custom.js"></script>
<link href="<?php echo $site;?>static/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo $site;?>static/js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
 <!----Calender -------->
  <link rel="stylesheet" href="<?php echo $site;?>static/css/clndr.css" type="text/css" />
  <script src="<?php echo $site;?>static/js/underscore-min.js"></script>
  <script src= "<?php echo $site;?>static/js/moment-2.2.1.js"></script>
  <script src="<?php echo $site;?>static/js/clndr.js"></script>
  <script src="<?php echo $site;?>static/js/site.js"></script>
  <!----End Calender -------->
 <script src="<?php echo $site;?>js/easyResponsiveTabs.js" type="text/javascript"></script>
</head>
<body>


<?php
//header end

<div class="copy-right">
			<div class="wrap">
			
			<?php //if logged in, show name on footer
			if(isset($_SESSION['name'])){ echo '<p>You are currently logged in as: ' . $_SESSION['name'] . ' </p>'; } ?>
				
				<p> Powered By <a href="http://aas9.in/zerocms" target="_blank">zeroCMS</a> </p>
	 	    </div>
	 	 </div>
</body>
</html>

<?php
//end footer
?>
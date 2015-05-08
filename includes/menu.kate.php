	<?php 
	require_once 'functions.kate.php';
	require_once 'config.kate.php';
	?>
	
	<!-- start menu-->
	<div class="header">
		<div class="menu1">
		<!-- start left navigation-->
		<nav class="clearfix">
			<ul class="clearfix">
				<li><a href="<?php echo $site; ?>">Home</a></li>
				<li><a href="<?php echo $site; ?>/views/zero_list_articles.php">Articles</a></li>
				<?php //compose
						if(isset($_SESSION['user_id'])){
							echo '<li><a href=" ',$site,'/views/zero_compose.php">Compose</a></li>';
								
					    //review, if access level>1
					   if($_SESSION['access_level'] > 1){
							echo '<li><a href=" ',$site,'/views/zero_pending.php">Review</a></li>';} 
							
					    //admin, if access level>2
						if($_SESSION['access_level'] > 2){
							echo '<li><a href=" ',$site,'/views/zero_admin.php">Admin</a></li>';}
							
						//cpanel , if access level>2
						echo '<li><a href=" ',$site,'/views/zero_cpanel.php">Kontrol Panel</a></li>';} 
			?>
			</ul>
			<a href="#" id="pull"><img alt="nav icon" src="<?php echo $site;?>/static/images/nav-icon.png" /></a>
		</nav>
		<!-- end left  navigation-->
		 </div>
		 <div class="header_right">
		 <div class="menu">
		 	<!-- start top-nav-->
			<div class="cssmenu">
					<ul>
					   <li><a href="<?php echo $site; ?>"><span>Home</span></a></li>
					   <li class="last"><a href="<?php echo $site; ?>/views/zero_list_articles.php"><span>Articles</span></a></li>
					   

					   
						<?php //compose if logged in
						if(isset($_SESSION['user_id'])){
							echo '<li class="last"><a href=" ',$site,'/views/zero_compose.php"><span>Compose</span></a></li>';
								
					    //review, if access level>1
					   if($_SESSION['access_level'] > 1){
							echo '<li class="last"><a href=" ',$site,'/views/zero_pending.php"><span>Review</span></a></li>';} 
							
					    //admin, if access level>2
						if($_SESSION['access_level'] > 2){
							echo '<li class="last"><a href=" ',$site,'/views/zero_admin.php"><span>Admin</span></a></li>';}
							
						//cpanel , if access level>2
						echo '<li class="last"><a href=" ',$site,'/views/zero_cpanel.php"><span>Kontrol Panel</span></a></li>';} 
						?>
							
							
					   <li><div class="clear"></div></li>
					</ul>
				</div>
			<div class="clear"></div>
		</div>
    <div class="header_top_right">
		<!-- start search-->
		<div class="web_search">
		 <div class="search">
	        <form method="get" action="<?php echo $site;?>/views/zero_search.php">
	           <input id="search" name="search" type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
	    <?php
		
	if(isset($_GET['keywords'])){echo ' value="' , htmlspecialchars($_GET['keywords']) , '" ';}
		
		?>
				<input type="submit" value=""/>
	        </form>
	        <div class="close"><img alt="close icon" src="<?php echo $site;?>/static/images/cross.png" /></div>
	    </div>
	    <div class="srch"><button></button></div>
		<script type="text/javascript">
	         $('.search').hide();
	        $('button').click(function (){
	            $('.search').show();
	            $('.text').focus();
	        }
	        );
	        $('.close').click(function(){
	            $('.search').hide();
	        });
	    </script>
	    </div>
		<!-- start social icons -->
		<div class="social-icons">
	   		  	<ul>
				
				<!--optional
			      <li class="icon_1"><a href="http://facebook.com/pcx1256" target="_blank"> </a></li>
			      <li class="icon_2"><a href="http://twitter.com/perezkarjee" target="_blank"> </a></li>
			      <li class="icon_3"><a href="https://plus.google.com/+PerezKarjee" target="_blank"> </a></li>
			      -->
				  
				  <li><div class="clear"></div></li>
		     </ul>
	   	 </div>
	   	 <!-- start login_box -->
			<div class="login_box">
	    		   <div id="loginContainer">
	                  <a id="loginButton" class=""><span></span></a>               
	                <div id="loginBox">                
	                    <?php
if(isset($_SESSION['user_id'])){
//logout form on menu
echo '<form id="loginForm"><span>';
echo '<a href="',$site,'/views/zero_transact_user.php?action=Logout">Logout</a>';
echo '</span></form>';
}
else {
	
	//login form on menu
	echo '<form id="loginForm" method="post" action="',$site,'/views/zero_transact_user.php">';
	echo '<fieldset id="body"><fieldset>';
	echo '<label for="email">Email Address</label>';
	echo '<input type="text" name="email" id="email" maxlength="120">';
	echo '</fieldset><fieldset>';
	echo '<label for="password">Password</label>';
	echo '<input type="password" name="password" id="password" maxlength="32">';
	echo '</fieldset>';
	echo '<input type="submit" name="action" id="login" value="Login">';
	echo '</fieldset>';
	echo '<span><a href="',$site,'/views/zero_forgot_password.php">Forgot your password?</a></span>';
	echo '<span><a href="',$site,'/views/zero_user_account.php">Register</a></span>';
	echo '</form>';
	
	
	
}
?>
	                </div>
	              </div>
	           </div>
	         <div class="clear"></div>
	         </div>
	    </div>	
	   <div class="clear"></div>
	  <!-- end top-nav-->
	</div>
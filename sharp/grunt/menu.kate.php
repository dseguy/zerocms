	<!-- start menu-->
	<div class="header">
		<div class="menu1">
		<!-- start navigation-->
		<nav class="clearfix">
			<ul class="clearfix">
				<li><a href="#">Home</a></li>
				<li><a href="#">How-to</a></li>
				<li><a href="#">Icons</a></li>
				<li><a href="#">Design</a></li>
				<li><a href="#">Web 2.0</a></li>
				<li><a href="#">Tools</a></li>	
			</ul>
			<a href="#" id="pull"><img alt="nav icon" src="<?php echo $site;?>/static/images/nav-icon.png" /></a>
		</nav>
		<!-- end   navigation-->
		 </div>
		 <div class="header_right">
		 <div class="menu">
		 	<!-- start top-nav-->
			<div class="cssmenu">
					<ul>
					   <li><a href="#"><span>Home</span></a></li>
					   <li class="has-sub"><a href="#"><span>Store</span></a>
					   </li>
					   <li class="active"><a href="#"><span>Blog</span></a></li>
					   <li class="last"><a href="#"><span>Contact</span></a></li>
					   <li><div class="clear"></div></li>
					</ul>
				</div>
			<div class="clear"></div>
		</div>
    <div class="header_top_right">
		<!-- start search-->
		<div class="web_search">
		 <div class="search">
	        <form action="<?php echo $site;?>/search.php">
	           <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
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
			      <li class="icon_1"><a href="#" target="_blank"> </a></li>
			      <li class="icon_2"><a href="#" target="_blank"> </a></li>
			      <li class="icon_3"><a href="#" target="_blank"> </a></li>
			      <li><div class="clear"></div></li>
		     </ul>
	   	 </div>
	   	 <!-- start login_box -->
			<div class="login_box">
	    		   <div id="loginContainer">
	                  <a id="loginButton" class=""><span></span></a>               
	                <div id="loginBox">                
	                    <form id="loginForm">
	                        <fieldset id="body">
	                            <fieldset>
	                                <label for="email">Email Address</label>
	                                <input type="text" name="email" id="email">
	                            </fieldset>
	                            <fieldset>
	                                <label for="password">Password</label>
	                                <input type="password" name="password" id="password">
	                            </fieldset>
	                            <input type="submit" id="login" value="Sign in">
	                            <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
	                        </fieldset>
	                        <span><a href="#">Forgot your password?</a></span>
	                    </form>
	                </div>
	              </div>
	           </div>
	         <div class="clear"></div>
	         </div>
	    </div>	
	   <div class="clear"></div>
	</div>
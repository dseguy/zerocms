<?php
if(isset($_SESSION['user_id'])){
echo '<form id="loginForm">';
echo '<span>';
echo '<a href="'.$site.'/views/zero_transact_user.php?action=Logout">Logout</a>';
echo '</span>';
echo '</form>';
}
else {
	
	
	echo '<form id="loginForm" method="post" action="'.$site.'/views/zero_transact_user.php">';
	echo '<fieldset id="body">';
	echo '<fieldset>';
	echo '<label for="email">Email Address</label>';
	echo '<input type="text" name="email" id="email" maxlength="120">';
	echo '</fieldset><fieldset>';
	echo '<label for="password">Password</label>';
	echo '<input type="password" name="password" id="password" maxlength="32">';
	echo '</fieldset>';
	echo '<input type="submit" id="login" value="Sign in">';
	echo '<label for="checkbox">';
	echo '<input type="checkbox" id="checkbox"> <i>Remember me</i></label>';
	echo '</fieldset>';
	echo '<span><a href="#">Forgot your password?</a></span>';
	echo '<span><a href="#">Register</a></span>';
	echo '</form>';
	
	
	
}
?>

				<form id="loginForm" method="" action="">
	                        
	                        <span><a href="#">Forgot your password?</a></span>
							<span><a href="#">Register</a></span>
	                    </form>
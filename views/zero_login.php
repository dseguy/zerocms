<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
require_once '../includes/config.kate.php';
include '../includes/header.kate.php';
include '../includes/wrapper-start.php';
include '../includes/menu.kate.php';
?>

<div class="content_bottom">
<div class="grid_1_of_2 box">

<?php

if(isset($_SESSION['user_id'])){ //if logged in
echo '<h3 align="center">Already Logged In</h3><meta http-equiv="refresh" content="1;url=zero_cpanel.php" />';
} else{

		echo '<h3>Login</h3>
				<div class="searh_form">
					<form method="post" action="zero_transact_user.php">
						<input type="text" id="email" name="email" placeholder="hello@yourmail.com" class="active" maxlength="120"/>
						<input type="password" id="password" name="password" placeholder="password" class="active" >
						<input type="submit" name="action" value="Login" />
					</form>
				</div>
				<br>
				<p>Not A Member Yet ? <a href="zero_user_account.php">Create A New Account</a></p>
				<p><a href="zero_forgot_password.php">Forgot Your Password ?</a></p>
			</div>
	</div>';
		}

?>

<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>
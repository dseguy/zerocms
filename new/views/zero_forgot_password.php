<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
include '../includes/config.kate.php';
include '../includes/header.kate.php';
include '../includes/wrapper-start.php';
include '../includes/menu.kate.php';
//start
?>

<div class="content_bottom">
<div class="grid_1_of_2 box">

<?php
if(isset($_SESSION['user_id'])){ //if logged in
echo '<h3 align="center">Already Logged In</h3><meta http-equiv="refresh" content="1;url=zero_cpanel.php" />';
} else{

echo '<h3>Recover Password</h3>';
echo '<h5>Forgot Password ? Enter Your Email Here, we will send you a new one</h5>
<div class="searh_form">
<form method="post" action="zero_transact_user.php">
		<input class="active" type="text"  id="email" name="email" placeholder="Email" maxlength="120"/>
		<input type="submit" name="action" value="Recover Password"/>
</form>
</div>';
}

?>
	</div>
	</div>
<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>

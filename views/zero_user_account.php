<?php
// (c)Perez Karjee(www.aas9.in)
// Project Site www.aas9.in/zerocms
// Created March 2014
require_once '../includes/db.kate.php';
require_once '../includes/config.kate.php';
include '../includes/header.kate.php';
include '../includes/wrapper-start.php';
include '../includes/menu.kate.php';
?>

<div class="content_bottom">
<div class="grid_1_of_2 box">

<?php


$dbx = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
    die ('Fuck! Unable to connect.');

mysql_select_db(MYSQL_DB, $dbx) or die(mysql_error($dbx));

//if not logged in or if access level >2
if(!isset($_SESSION['user_id']) || ($_SESSION['access_level'] >=2 )) {

$user_id = (isset($_GET['user_id']) && ctype_digit($_GET['user_id'])) ?
    $_GET['user_id'] : '';

if (empty($user_id)) {
    $name = '';
    $email = '';
    $access_level = '';
} else {
    $sql = 'SELECT
            name, email, access_level
        FROM
            zero_users
        WHERE
            user_id=' . $user_id;
    $result = mysql_query($sql, $dbx) or die(mysql_error($dbx));
    $row = mysql_fetch_array($result);
    extract($row);
    mysql_free_result($result);
}

if (empty($user_id)) {
    echo '<h3>Create Account</h3>';
} else {
    echo '<h3>Modify Account</h3>';
}


echo '<div class="searh_form">
<form method="post" action="zero_transact_user.php">
<input class="active" type="text" id="name" name="name" placeholder="Full Name" maxlength="120" value="',$name,'"/>
<input class="active" type="text" id="email" name="email" maxlength="100" placeholder="Email" value="',$email,'"/>';


if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == 3)
{
    echo '<h4>Access Level</h4>';

    $sql = 'SELECT
            access_level, access_name
        FROM
            zero_access_levels
        ORDER BY
            access_level DESC';
    $result = mysql_query($sql, $dbx) or die(mysql_error($dbx));

    while ($row = mysql_fetch_array($result)) {
        echo '<input type="radio" id="acl_' , $row['access_level'] ,
            '" name="access_level" value="' , $row['access_level'] , '"';

        if ($row['access_level'] == $access_level) {
            echo ' checked="checked"';
        }
        echo '/> <label for="acl_' , $row['access_level'] , '">' ,
            $row['access_name'] , '</label><br/>';
    }
    mysql_free_result($result);
    echo '';
}

if (empty($user_id)) {


echo '<input class="active" type="password" id="password_1" name="password_1" placeholder="Password:(6-32 Characters)" maxlength="32"/>';
   
echo '<input class="active" type="password" id="password_2" name="password_2" placeholder="Confirm Password" maxlength="32"/>';
echo  '<input type="submit" name="action" value="Create Account"/>';

} else {
    echo '<input type="hidden" name="user_id" value="',$user_id,'"/>';
	echo '<br>';
    echo '<input type="submit" name="action" value="Modify Account"/>';
}


echo '</form></div>';
} else {
echo '<h3 align="center">Already Logged In</h3><meta http-equiv="refresh" content="1;url=zero_cpanel.php" />';
}
?>

</div>
</div>
<?php
//end
include '../includes/wrapper-end.php';
include '../includes/footer.kate.php';
?>
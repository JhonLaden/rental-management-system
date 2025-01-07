<?php
session_start();

include_once('../includes/adminhead.php');
$accounts = "active";
if (isset($_SESSION['loggeduser']) && $_SESSION['loggeduser']['type'] == 'admin') {
    $logged_user = $_SESSION['loggeduser'];
} else {
    header('location: ../../');
}

?>

<div class="d-flex h-100">
    <?php include_once('../includes/sidebar.php'); ?>
    <div class="w-100 bg-light m-5 p-4 rounded-5 overflow-y-scroll">

        <?php
        include('../../backend/classes/users.class.php');
        $users = new Users();

        ?>
        <?php include_once('../includes/edit_user.php'); ?>
    </div>


</div>

<?php
include_once('../includes/scripts.php');
?>
<?php

include_once('../manage/manage_script.php');
?>
<?php

include_once('../includes/footer.php');

?>
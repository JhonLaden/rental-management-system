<?php
$title = 'browse';
require '../includes/head.php';
require '../includes/header.php';


?>

<?php
include('../includes/edit_user.php')
?>


<?php
include_once('../includes/scripts.php');
?>
<script>
    new DataTable('#example');
</script>
</div>


<?php
include_once('../manage/manage_script.php');
?>

<?php
require '../includes/footer.php'
?>
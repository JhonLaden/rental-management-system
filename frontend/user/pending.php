<?php
$title = 'browse';
require '../includes/head.php';
require '../includes/header.php';


?>
<?php
if (isset($_SESSION['loggeduser'])) {
    $logged_user = $_SESSION['loggeduser'];
} else {
    header('location: ../../');
}
?>



<?php
include('../includes/pendings.php');
?>




<?php
include('../includes/scripts.php');


?>

<script>
    new DataTable('#example');
</script>

<?php
include '../includes/footer.php'
?>
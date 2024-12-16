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
include('../includes/manage_schedules.php');
?>


</div>
<?php
include('../includes/scripts.php');
?>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    <?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);

        if (isset($message['cancel'])) {
    ?>
            Swal.fire({
                title: "<?php echo $message['title'] ?>",
                text: "<?php echo $message['success'] ?>",
                icon: "success"
            });
    <?php
        }
    }
    ?>

    // Attach click event to the delete button
    $(document).on('click', '.cancel-btn', function(e) {

        e.preventDefault(); // Prevent the form from submitting immediately

        // Show SweetAlert2 confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Confirm!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: "crimson",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                $('#update_form').submit();
            }
        });
    });
</script>




<?php
include '../includes/footer.php'
?>
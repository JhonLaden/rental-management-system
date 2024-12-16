<?php


$title = 'browse';
require '../includes/head.php';
require '../includes/header.php';

require_once '../../backend/classes/item.class.php';

if (isset($_SESSION['loggeduser'])) {
    $logged_user = $_SESSION['loggeduser'];
}

$item = new Item();

if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
    $item->id = $item_id;
    $selected_item = $item->search_item()[0];

    $_SESSION['item_id'] = $item_id;
}

?>

<div class="container mt-5">
    <div class="row">
        <!-- Image and Item Info Section -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="text-center" style="height:550px">
                    <img src="../assets/uploads/<?php echo $selected_item['photo'] ?>" class="img-fluid h-100 w-100" alt="Gown" style=" object-fit: cover;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-capitalize"><?php echo $selected_item['name']; ?></h5>
                    <p class="card-text">
                        Availability:
                        <span class="badge <?php echo ($selected_item['in_stock']) ? 'bg-success' : 'bg-danger'; ?>">
                            <?php echo ($selected_item['in_stock']) ? 'In Stock' : 'Not Available'; ?>
                        </span>
                    </p>
                    <p class="text-muted"><?php echo $selected_item['description'] ?></p>
                </div>
            </div>
        </div>

        <!-- User and Pricing Section -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-3">
                <div class="card-body text-center">
                    <img class="rounded-circle mb-3" src="../assets/images/user_profile.jpeg" alt="User Profile" style="width: 100px; height: 100px; object-fit: cover;">
                    <h6><?php echo $selected_item['username']; ?></h6>
                    <p class="text-muted"><?php echo $selected_item['successful_lends']; ?> Successful Lends</p>
                </div>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-body text-center">
                    <p class="fw-bold text-success mb-2">
                        Deposit Fee: ₱ <?php echo number_format($selected_item['deposit_cost'], 2); ?>
                    </p>
                    <p class="fw-bold text-primary">
                        Rental Fee: ₱ <?php echo number_format($selected_item['rental_cost'], 2); ?>
                    </p>
                </div>
            </div>

            <?php if ($selected_item['in_stock'] && isset($logged_user) && $logged_user['type'] == 'client') { ?>
                <div class="d-grid">
                    <a href="../user/add_schedule_form.php?item_id=<?php echo $selected_item['item_id'] . "&lender_id=" . $selected_item['owner_id']; ?>" class="btn btn-primary btn-lg">
                        Rent Item
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    <?php if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
        Swal.fire({
            title: "<?php echo $message['title']; ?>",
            text: "<?php echo $message['success']; ?>",
            icon: "success"
        });
    <?php } ?>
</script>


<?php

include('../includes/scripts.php');
?>
<script>
    <?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);

        if (isset($message['add_schedule'])) {
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
</script>

<?php
require '../includes/footer.php';
?>
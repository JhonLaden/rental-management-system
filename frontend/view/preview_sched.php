<?php
    $title = 'Browse';
    require '../includes/head.php';
    require '../includes/header.php';

    if(isset($_SESSION['loggeduser'])){
        $logged_user = $_SESSION['loggeduser'];
    } else {
        header('location: frontend/');
    }

    // Make sure the class definition is loaded before accessing the session
    require_once('../../backend/classes/schedule.class.php');

    if(isset($_SESSION['sched'])){
        echo $_SESSION['sched']->borrower_id;
        // Retrieve the session data
        $sched = $_SESSION['sched'];
        
        // Check if the object is correctly loaded
        if ($sched instanceof Schedule) {
            // Now you can safely access the properties of the Schedule object
            echo "Borrower ID: " . $sched->borrower_id;
        } else {
            echo "The Schedule object is incomplete.";
        }
    }
?>


        <section class="container mt-5">
    <?php if (isset($sched)): ?>
        <h3 class="text-center mb-4">Schedule Confirmation</h3>
        <div class="card">
            <div class="card-header">
                <h5>Rental Details</h5>
            </div>
            <div class="card-body">
                <p><strong>Item Name:</strong> <?php echo htmlspecialchars($sched->lender_id); ?></p>
                <p><strong>Rental Start Date:</strong> <?php echo htmlspecialchars($sched['start_date']); ?></p>
                <p><strong>Return Date:</strong> <?php echo htmlspecialchars($sched['return_date']); ?></p>
                <p><strong>Method of Delivery:</strong> <?php echo htmlspecialchars($sched['method']); ?></p>
                <?php if($sched['method'] == 'delivery'): ?>
                    <p><strong>Delivery Address:</strong> <?php echo htmlspecialchars($sched['delivery_address']); ?></p>
                    <p class="text-muted"><strong>Additional Charge:</strong> ₱50.00</p>
                <?php endif; ?>
                <p><strong>Total Rental Fee:</strong> ₱<?php echo number_format($sched['total_cost'], 2); ?></p>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="user_dashboard.php" class="btn btn-primary">Go to Dashboard</a>
        </div>

    <?php else: ?>
        <p class="text-center">No schedule found. Please try again.</p>
    <?php endif; ?>
</section>

        
</div>
<?php 
    include('../includes/scripts.php');
?>


<?php
    include '../includes/footer.php'
?>

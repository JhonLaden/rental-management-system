<!-- navigation bar -->

<?php
require_once '../../backend/classes/users.class.php';

session_start();

$users = new Users();
if (isset($_SESSION['loggeduser'])) {
    $logged_user = $_SESSION['loggeduser'];
    if ($logged_user['type'] == 'admin') {
        header('location: ../admin/dashboard.php');
    }
}

$accounts = $users->show();


?>


<nav class="navbar navbar-expand-lg navbar-transparent">
    <div class="container">
        <a class="navbar-brand" href="#">Suit&Gown</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- nav items -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link fw-bolder " aria-current="page" href="../user/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bolder" href="../user/browse.php">Browse</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active fw-bolder" aria-current="page" href="../contact/contact.php">Contact</a>
                </li>

                <?php
                if (isset($logged_user)) {
                ?>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bolder" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $logged_user['username'];   ?>
                        </a>
                        <ul class="dropdown-menu bg">
                            <li><a class="dropdown-item" href="#">Profile</a></li>

                            <?php if (isset($logged_user) && ($logged_user['type'] === 'admin' || $logged_user['type'] === 'lender')): ?>
                                <li><a class="dropdown-item" href="../manage/manage.php">Manage Items</a></li>
                            <?php endif; ?>

                            <li><a class="dropdown-item" href="../view/view.php">View Schedules</a></li>


                            <li><a class="dropdown-item" href="#">Settings</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../backend/tools/logout_tool.php">Log out</a></li>
                        </ul>
                    </li>
                    <?php if (isset($logged_user) && ($logged_user['type'] === 'admin' || $logged_user['type'] === 'lender')):

                        require_once '../../backend/classes/schedule.class.php';

                        $schedule = new Schedule();
                        $schedule->logged_user_id = $logged_user['user_id'];

                        // Fetch records based on user ID
                        $results = $schedule->show();
                        $numberOfPendings = 0;

                        foreach ($results as $value) {
                            if ($value['status'] == 'pending') {
                                $numberOfPendings++;
                            }
                        }
                        if ($numberOfPendings != 0) { ?>
                            <a href="../user/pending.php" class="bg-danger rounded-circle d-flex justify-content-center align-items-center " style="height: 20px; width: 20px;">


                                <div class=" rounded-circle d-flex justify-content-center">
                                    <span class="text-light"><?php echo $numberOfPendings ?></span>
                                </div>
                            <?php

                        }
                            ?>



                            </a>
                        <?php endif; ?>
                    <?php
                }
                    ?>
            </ul>
        </div>
    </div>
</nav>
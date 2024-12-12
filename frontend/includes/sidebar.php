<div class="d-flex h-100 ">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark h-100" style="width: 250px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4 text-light">Menu</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="../admin/dashboard.php" class="nav-link <?php echo $dashboard ?> text-light" aria-current="page">
            Dashboard
          </a>
        </li>
        <li>
          <a href="../admin/manage.php" class="<?php echo $items ?> nav-link text-light hover-bg">
            Manage Items
          </a>
        </li>
        <li>
          <a href="../admin/manage_accounts.php" class="<?php echo $accounts ?> nav-link text-light">
            Manage Accounts
          </a>
        </li>
        <li>
          <a href="../admin/manage_schedules.php" class="<?php echo $schedules; ?> nav-link text-light">
            Manage Schedules
          </a>
        </li>
       
      </ul>
      <hr>
      <div>
        <a href="../../backend/tools/logout_tool.php" class="nav-link text-light">
          Logout
        </a>
      </div>
    </div>

</div>
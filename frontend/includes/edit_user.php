<!-- Edit User Form -->
<div class="container mt-4">
    <?php 
        include('../../backend/classes/users.class.php'); 
        $user = new Users();
        $userData = [];
        if(isset($_SESSION['user_id'])){
            $_POST['user_id'] = $_SESSION['user_id'];
            unset($_SESSION['user_id']);
        }
        if(isset($_POST['user_id'])){
            $user->id = $_POST['user_id'];
            $userData = $user->get_user_by_id();
        }else{
            echo 'Page not found';
        }
    ?>
    
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5>Edit User</h5>
        </div>
        <div class="card-body">
            <form action="../../backend/tools/edituser_tool.php" id="editUserForm" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $userData['user_id']; ?>">
                <input type="hidden" name="link" value="<?php echo ($logged_user['type'] == 'admin') ? '../../frontend/admin/edit_user.php' : '../../frontend/manage/edit_user.php'; ?>">

                <!-- First Name -->
                <div class="mb-3">
                    <label for="editFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="editFirstName" name="first_name" placeholder="Enter first name" value="<?php echo $userData['first_name']; ?>" required>
                </div>

                <!-- Middle Name -->
                <div class="mb-3">
                    <label for="editMiddleName" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="editMiddleName" name="middle_name" placeholder="Enter middle name" value="<?php echo $userData['middle_name']; ?>">
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label for="editLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="editLastName" name="last_name" placeholder="Enter last name" value="<?php echo $userData['last_name']; ?>" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="editEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="editEmail" name="email" placeholder="Enter email address" value="<?php echo $userData['email']; ?>" required>
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label for="editUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="editUsername" name="username" placeholder="Enter username" value="<?php echo $userData['username']; ?>" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="editPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="editPassword" name="password" placeholder="Enter new password">
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-between">
                    <a href = "../admin/manage_accounts.php" type="button" class="btn btn-secondary" name="edit-user-submit">Cancel</a>
                    <button type="submit" class="btn btn-primary" name="edit-user-submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

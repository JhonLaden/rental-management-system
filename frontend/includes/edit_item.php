<!-- Edit Item Form -->
<div class="container mt-4">
    <?php 
        include('../../backend/classes/item.class.php'); 
        $item = new Item();
        $value = [];
        if(isset($_SESSION['item_id'])){
            $_POST['item_id'] = $_SESSION['item_id'];
            unset($_SESSION['item_id']);
        }
        if(isset($_POST['item_id'])){
            $item->id = $_POST['item_id'];
            $value = $item->select_item_by_id();
        }else{
            echo 'page not found';
        }
    ?>
    
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5>Edit Item</h5>
        </div>
        <div class="card-body">
            <form action="../../backend/tools/edititem_tool.php" id="editItemForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                <input type="hidden" name="link" value="<?php echo ($logged_user['type'] == 'admin') ? '../../frontend/admin/edit_item.php' : '../../frontend/manage/edit_item.php'; ?>">

                <!-- Item Name -->
                <div class="mb-3">
                    <label for="editName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="editName" name="name" placeholder="Enter item name" value="<?php echo $value['name']; ?>" required>
                </div>

                <!-- Item Type -->
                <div class="mb-3">
                    <label for="editType" class="form-label">Type</label>
                    <select class="form-select" id="editType" name="type" required>
                        <option value="" disabled>Select type</option>
                        <option value="gown" <?php echo $value['type'] == 'gown' ? 'selected' : ''; ?>>Gown</option>
                        <option value="suit" <?php echo $value['type'] == 'suit' ? 'selected' : ''; ?>>Suit</option>
                    </select>
                </div>

                <!-- Item Photo -->
                <div class="mb-3">
                    <label for="editPhoto" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="editPhoto" name="photo" accept="image/*">
                    <input type="hidden" class="form-control" name="imgurl" value="<?php echo $value['photo']; ?>">

 
                    <?php if (!empty($value['photo'])): ?>
                        <img src="../assets/uploads/<?php echo $value['photo']; ?>" alt="Item Photo" class="img-fluid mt-2" style="max-width: 150px;">
                    <?php endif; ?>
                </div>

                <!-- Item Description -->
                <div class="mb-3">
                    <label for="editDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="editDescription" name="description" placeholder="Enter item description" rows="3" required><?php echo $value['description']; ?></textarea>
                </div>

                <!-- Deposit Cost -->
                <div class="mb-3">
                    <label for="editDepositCost" class="form-label">Deposit Cost</label>
                    <input type="number" class="form-control" id="editDepositCost" name="deposit_cost" placeholder="Enter deposit cost" value="<?php echo $value['deposit_cost']; ?>" required>
                </div>

                <!-- Rental Cost -->
                <div class="mb-3">
                    <label for="editRentalCost" class="form-label">Rental Cost</label>
                    <input type="number" class="form-control" id="editRentalCost" name="rental_cost" placeholder="Enter rental cost" value="<?php echo $value['rental_cost']; ?>" required>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="edit-item-submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

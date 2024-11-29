<?php


    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';

    require_once '../../backend/classes/item.class.php';


    $item = new Item();

    if(isset($_GET['item_id'])){
        $item_id = $_GET['item_id'];
        $item->id = $item_id;
        $selected_item = $item->search_item()[0];

        $_SESSION['item_id'] = $item_id;
    }
?>
        
    <div class = 'container d-flex mt-5 '>
        <!-- 1st container -->
        <div class = "col-8 ">
            <div class="text-center" style = "height:550px">
                <img src="../assets/images/gown1.jpeg" class="img-fluid h-100 w-100"  alt="Gown" style = " object-fit: cover;" >
            </div>
            <div class = "d-flex flex-column justify-content-center">
                <p class = "m-0" >Name: <?php echo $selected_item['name'] ?></p>
                <p class = "m-0">Size: <?php echo number_format($selected_item['size']); ?></p>
                <p class = "m-0">Availability: <?php echo ($selected_item['in_stock']) ? 'In stock' : 'not available'; ?></p>
            </div>
        </div>
        <!-- 2nd container -->
        <div class = "col-4 bg-light">
            <div class = "text-center container p-4">
                <p>Elevate your elegance with this Classic White Gown, designed for timeless beauty. Crafted from flowing chiffon, it features a fitted bodice with a sweetheart neckline and delicate embroidery.</p>
            </div>
            <div class = "text-center w-100  " style = "height: 200px; width: 150px"><img class = "h-100 rounded-3" src="../assets/images/user_profile.jpeg" alt="" style= "object-fit: cover;"></div>
            <div class = "text-center pt-2">
                <div>
                    <p><?php echo $selected_item['username']?></p>
                </div>
                <div class = "fw-bold">
                    <span class = " opacity-50"><?php echo $selected_item['successful_lends'] ?> successful lends</span>
                </div>
                <div class = "my-4 fw-bold text-success">
                    <p class = "m-0">deposit fee: ₱ <?php echo number_format($selected_item['deposit_cost'],2);?></p>
                    <p class = "m-0">Rental fee: ₱ <?php echo number_format($selected_item['rental_cost'],2);?></p>
                </div>
                <div class = "mb-3">
                    <i class="bi bi-circle-fill text-primary"></i>
                    <i class="bi bi-circle-fill text-success"></i>
                    <i class="bi bi-circle-fill text-warning"></i>
                    <i class="bi bi-circle-fill text-dark"></i>

                </div>
            </div>
            <div class = "text-center">
                <a href="../user/add_schedule_form.php?item_id=<?php echo $selected_item['item_id']. "&lender_id=".$selected_item['owner_id']; ?>">
                    <button type="submit" class="btn btn-primary">
                        Rent Item
                    </button>
                </a>
            </div>


        </div>
    </div>

      <?php

        include('../includes/scripts.php');
      ?>
    <script>
        <?php 
                if(isset($_SESSION['message'])){
                    $message = $_SESSION['message'];
                    unset($_SESSION['message']);

                    if(isset($message['add_schedule']) ){
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
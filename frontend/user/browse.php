<?php
    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';


    if(isset($_SESSION['user_id'])){
        if($_SESSION['user_id'] == 6){
            header('location: ../admin/dashboard.php');
        }
    }
?>
        
        <div class="container mt-5 d-flex align-items-center">      
            <input class=" w-50 rounded-1 me-2" type="search" placeholder="Search...">  
            <button type="submit" class="btn btn-primary">  
                <i class="bi bi-search"></i>  
            </button>  
        </div>

        <!-- browse items -->
       <section>
            <div class="container w-full bg-dark rounded-5 opacity-25 my-5" style="height: 2px"></div>

            

            <div class="container">
                <div class="row">

                <?php
                require_once '../../backend/classes/item.class.php';

                $item = new Item();

                // Loop for each record found in the array
                foreach ($item->show_items() as $value) { // Start of loop
                    // Determine the image based on the item type
                    $image = $value['type'] === 'gown' ? "../assets/images/gown1.jpeg" : "../assets/images/suit2.jpeg";
                ?>
                    <a class="col-md-3 text-decoration-none" href="item_details.php?item_id=<?php echo $value['item_id']; ?>">

                        <div class="card mb-3">
                            <div style="height: 300px; width: 100%;">
                                <img src="<?php echo $image; ?>" class="card-img-top img-fluid h-100" alt="<?php echo $value['name']; ?> Image" style="object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $value['name']; ?></h5>
                                <p class="card-text">Type: <?php echo $value['type']; ?></p>
                                <p class="card-text">Rental Price: ₱ <?php echo number_format($value['rental_cost'], 2); ?></p>
                            </div>
                        </div>
                    </a>

                    <?php } // End of loop ?>
                </div>
            </div>
        </section>

<?php
    require '../includes/footer.php';
?>
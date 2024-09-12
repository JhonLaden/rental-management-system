
        <?php
            require '../includes/head.php';
            require '../includes/header.php';


            

        ?>
        
        

        <div class="position-absolute top-0 h-100 w-100 overflow-hidden " style = "z-index: -1 ;">
            <img src="../assets/images/suitandgown.jpeg" alt="" class="img-fluid cover">
        </div>

        <div class="position-absolute bottom-0 w-100 d-flex flex-column align-items-center mb-4">
            <div class=" d-flex justify-content-around " style="height: 75px; width: 100%; max-width: 400px; min-width: 200px">
                <button class="btn btn-light w-25 h-50 text-center" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-dark w-25 h-50" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>

            </div>

            <div class="bg-dark w-100 rounded-5" style = "height: 5px; max-width: 400px; min-width: 200px"></div>
        </div>

        <!-- login modal -->
        <div class="modal fade login-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- login -->
                    <form method = "POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name = "email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name = "password" placeholder="Password">
                    </div>

                    <p class = "error-text text-center text-danger"></p>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" name = "login-submit" value = "Login"></input>
                </div>
                    </form>
                </div>
                
                </div>
            </div>

        </div>

        <!-- Register modal -->
        <div class="modal fade signup-modal" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Registration Form Here -->
                    <form method = "POST">
                    <div class="mb-3">
                        <label for="firstName" class="form-label" >First Name</label>
                        <input type="text" class="form-control" id="firstName" name = "firstname" placeholder="John" >
                    </div>
                    <div class="mb-3">
                        <label for="middleName" class="form-label">Middle Name (optional)</label>
                        <input type="text" class="form-control" id="middleName " name = "middlename" placeholder="M">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name = "lastname"  placeholder="Doe" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name = "email" placeholder="name@example.com" >
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name = "username"  placeholder="Username" >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name = "password"  placeholder="Password" >
                    </div>

                    <p class = "error-text text-center text-danger"></p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-dark" name = "signup-submit" value = "sign up"></input>
                    </div>
                    </form>
                </div>
                
                </div>
            </div>
            <script src = "../js/signup.js"></script>

        </div>

        <script src = "../js/login.js"></script>



        
<?php 
    include '../includes/footer.php';
?>
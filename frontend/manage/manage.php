<?php
    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';
?>
        <section class = "container mt-5">
            <h1> Manage Items </h1>
            <div class = "d-flex justify-content-end gap-2 mb-2">
                <input type="text" placeholder = "Search..."> <button class = "btn btn-primary"><i class="bi bi-search"></i> </button>
            </div>

            <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Rental Price</th>
                    <th>Deposit Cost</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>$100</td>
                    <td>$50</td>
                    <td>4</td>
                    <td class ="text-center d-flex justify-content-center gap-2">
                        <button class="btn btn-primary btn-sm-danger"><i class="bi bi-pencil-square"></i> </button>
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>$150</td>
                    <td>$75</td>
                    <td>3</td>
                    <td class ="text-center d-flex justify-content-center gap-2">
                        <button class="btn btn-primary btn-sm-danger"><i class="bi bi-pencil-square"></i> </button>
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        </section>

<?php
    require '../includes/footer.php';
?>

<?php
include '../../backend/config/connection.php';
include "../layouts/nav-bar-config.php";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $stmt = "SELECT * FROM products_details WHERE pdt_name LIKE '%{$search}%'";
    $response = mysqli_query($connect, $stmt);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStop</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/searchbar.css?v=1">
</head>

<body>
    <div class="border-container">
        <h1 style="color: #FFFFFF;margin-left:140px;">Result</h1>
    </div>
    <div class="container" id="card-container">
        <div class="row">
            <?php if (mysqli_num_rows($response) > 0) {
                while ($row = mysqli_fetch_assoc($response)) { ?>
            <!-- image Container -->

            <div class="col-lg-3 col-md-6" id="card">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" id="img">
                        <img src="../assets/images/<?php echo $row['product_image']; ?>" class="img-fluid " />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href=""><?php echo $row["pdt_name"]; ?></a></h5>
                        <p class="card-text"> <a href=""><?php echo "Rs." . " " . $row["pdt_price"]; ?></a></p>
                        <a href="./productview.php?id=<?php echo $row['id']; ?>" class="btn btn-primary "
                            style="align-items: center;" id="btn-view">View</a>
                    </div>
                </div>
            </div>
            <?php }
            } else { ?>
            <h1 style="color: #111111;">No Products Found !</h1>
            <?php } ?>

        </div>
    </div>


</body>

</html>
<?php include '../layouts/footer.php'; ?>
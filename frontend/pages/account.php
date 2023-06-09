<?php
include "../layouts/nav-bar.php";
include '../../backend/config/connection.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/account.css">
</head>

<body>
    <?php
    $stmt = "SELECT * FROM  user_info where id='{$_SESSION['id']}'";
    $response = mysqli_query($connect, $stmt);
    $row = mysqli_fetch_assoc($response);



    ?>
    <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 ">
                <h3 class="font-weight-bold">Account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name <?php echo $row['name']; ?></p>
                    <p>Email <?php echo $row['email']; ?></p>
                    <p><a href="#" id="order-btn">Your Orders</a></p>
                    <p><a href="./logout.php" id="logout-btn">Log Out</a></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 my-4 py-4">
                <form action="account.php" method="post">

                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group ">
                        <label>Password</label>
                        <input type="password" name="password" id="" class="form-control" id="account-password" placeholder="Password" required>
                    </div>
                    <div class="form-group ">
                        <label>Confirm Password</label>
                        <input type="password" name="password" id="" class="form-control" id="account-password-confirm" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" name="" class="btn" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>

    </section>
</body>

</html>
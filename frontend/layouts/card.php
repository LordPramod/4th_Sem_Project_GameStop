<?php
include "../../backend/config/connection.php";

?>
<?php
$stmt = "SELECT * FROM products_details";
$result = mysqli_query($connect, $stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/card.css?v=1">
</head>

<body>



    <div class="product-container">

        <div class="product-heading">
            <h2>Product Category</h2>
        </div>
        <div class="products-container">
            <?php while ($row = mysqli_fetch_assoc($GLOBALS['result'])) { ?>
                <!-- image Container -->
                <div class="image-container">
                    <a href="../pages/googlegiftcards.php">
                        <img src="../assets/images/google=giftcard_100$.jpg" alt="" srcset="">
                    </a>
                    <div class="product-title-container">
                        <!-- <a href="/frontend/pages/googlegiftcard.php">Google Gift Card</a> -->
                        <a href="../pages/googlegiftcards.php"><?php echo $row['pdt_name']; ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>

</body>

</html>
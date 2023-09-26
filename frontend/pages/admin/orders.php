<?php
include "dashboard.php";
?>
<?php
include "../../../backend/config/connection.php";
$stmt = "SELECT * FROM orders";
$response = mysqli_query($connect, $stmt);
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .main-container {
        width: auto;
        margin-top: 40px;
        margin-left: 195px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 10px;
    }

    table {
        border-collapse: collapse;
    }

    table thead {

        margin-right: 40px;
        background-color: #F6F9FC;
    }

    table thead th {
        padding: 5px 10px;
        text-align: center;
        vertical-align: middle;
        font-family: sans-serif;
        font-weight: lighter;
        font-size: 1.3rem;
        color: #212529;
    }

    table tbody td {
        font-size: 1rem;
    }

    tbody tr td {
        text-align: center;
        vertical-align: middle;
    }

    table td {
        padding: 10px 40px;
    }

    table tbody tr:hover {
        background-color: #dcf0fa;
    }

    .order_status {
        color: #FFFFFF;
        border-radius: 5px;

    }

    table .order_id {
        text-align: center;
        vertical-align: middle;
        padding: 0px 100px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main-container">
        <table>
            <tr>
                <thead>
                    <th class="order_id">Order No</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Payment Gateway</th>
                    <th>OrderStatus</th>
                    <th>Order Date</th>
                    <th>Action</th>

                </thead>
            </tr>



            <?php if (mysqli_num_rows($response) > 0) { ?>

                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($response)) { ?>

                        <tr>



                            <td><?php echo $oderid = '#' . 6000 . $row['order_id']; ?></td>
                            <td><?php echo $row['purchase_date']; ?></td>
                            <td><?php echo  $row['total']; ?></td>
                            <td><?php echo  $row['payment_method']; ?></td>
                            <td><?php echo  $row['purchase_date']; ?></td>
                            <td><span class="order_status"><?php $status = $row['order_status'];
                                                            if ($status == "pending") {
                                                                echo '<span style="background-color: #f7cb73;font-size: 1rem; padding: 5px;"> Pending </span>';
                                                            } elseif ($status == "Completed") {
                                                                echo '<span style="background-color:green; padding: 5px;"> Completed </span>';
                                                            } else {
                                                                echo '<span style="background-color:red; padding: 5px; "> Cancelled </span>';
                                                            }
                                                            ?></span></td>
                            <td><a href="viewSingleProduct.php?id=<?php echo $row['order_id']; ?>">View</a></td>
                        </tr>
                <?php }
                } else {
                    echo "NO ORDER YET MAKE YOU FIRST ORDER";
                } ?>
                </tbody>

        </table>
    </div>

</body>

</html>
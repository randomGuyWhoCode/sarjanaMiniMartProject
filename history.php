<?php
$conn = new mysqli("localhost", "root", "", "minimart");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$customer_id = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase History</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include "sidebar.php"; customerNav();?>

    <div class="side-margin">
        <h1 style="font-size:40px;">Purchase History</h1>

        <?php if (empty($history)): ?>
            <p>You haven't made any purchases yet.</p>
        <?php else: ?>

            <?php foreach ($history as $sales_id => $data): ?>

                <div class="transaction-card">

                    <div class="header-transaksi">
                        <span>Receipt No: #<?php echo $sales_id; ?></span>
                        <span>Date: <?php echo date('d-m-Y', strtotime($data['date'])); ?></span>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Amount (RM)</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['items'] as $item): ?>
                                <tr>
                                    <td><?php echo $item['name']; ?></td>
                                    <td>RM <?php echo number_format($item['price'],2); ?></td>
                                    <td><?php echo $item['qty']; ?></td>
                                    <td>RM <?php echo number_format($item['subtotal'],2); ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr>
                                <td colspan="3" style="text-align:right;">
                                    <strong>Total:</strong>
                                </td>
                                <td>
                                    <strong>
                                        RM <?php echo number_format($data['total'],2); ?>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</body>
</html>

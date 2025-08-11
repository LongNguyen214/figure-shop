<?php
session_start();
require 'config/db.php';

$cart = $_SESSION['cart'] ?? [];

$products = [];

if (!empty($cart)) {
    $ids = implode(',', array_keys($cart));
    $result = $conn->query("SELECT * FROM products WHERE id IN ($ids)");

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h2>Your Order Detail</h2>

    <?php if (empty($products)): ?>
        <div class="alert alert-warning">Your cart is empty.</div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Figure</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($products as $product):
                    $qty = $cart[$product['id']];
                    $subtotal = $product['price'] * $qty;
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td>$<?php echo number_format($product['price'], 2); ?></td>
                    <td><?php echo $qty; ?></td>
                    <td>$<?php echo number_format($subtotal, 2); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php if (!empty($products)): ?>
    <form action="checkout.php" method="post" class="text-end mt-3">
        <button type="submit" class="btn btn-success">
            <i class="bi bi-credit-card"></i> Proceed to Checkout
        </button>
    </form>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>

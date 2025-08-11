<?php
session_start();
require 'config/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM products WHERE id = $id");

if ($result->num_rows === 0) {
    echo "<div class='container mt-5'><h3>Product not found.</h3></div>";
    include 'includes/footer.php';
    exit;
}

$product = $result->fetch_assoc();
$image = "product{$product['id']}.png";
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <?php if (file_exists("assets/images/$image")): ?>
                <img src="assets/images/<?= $image ?>" class="img-fluid rounded">
            <?php else: ?>
                <img src="assets/images/default.png" class="img-fluid rounded" alt="No image">
            <?php endif; ?>
        </div>
        <div class="col-md-7">
            <h3><?= htmlspecialchars($product['name']) ?></h3>
            <p class="text-muted">$<?= number_format($product['price'], 2) ?></p>
            <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>

            <?php if (isset($_SESSION['user'])): ?>
                <a href="add_to_cart.php?id=<?= $product['id'] ?>" class="btn btn-warning">
                    <i class="bi bi-cart-plus"></i> Add to Cart
                </a>
            <?php else: ?>
                <div class="alert alert-info">
                    Please <a href="login.php" class="text-primary">login</a> to add this product to your cart.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

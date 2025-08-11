<?php include 'config/db.php'; include 'includes/header.php';
if (!isset($_SESSION['user'])) header("Location: login.php");
$user_id = $_SESSION['user']['id'];
$sql = "SELECT cart.quantity, products.name, products.price
        FROM cart JOIN products ON cart.product_id = products.id
        WHERE cart.user_id = $user_id";
$result = $conn->query($sql);
?>
<h3>Your Cart</h3>
<table class="table">
  <tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th></tr>
  <?php $total = 0; while ($row = $result->fetch_assoc()): 
  $sub = $row['price'] * $row['quantity']; $total += $sub; ?>
  <tr>
    <td><?= $row['name'] ?></td>
    <td>$<?= $row['price'] ?></td>
    <td><?= $row['quantity'] ?></td>
    <td>$<?= $sub ?></td>
  </tr>
  <?php endwhile; ?>
  <tr><th colspan="3">Total</th><th>$<?= $total ?></th></tr>
</table>
<?php include 'includes/footer.php'; ?>


<?php
session_start();
require 'config/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$product_id = intval($_GET['id']);
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]++;
} else {
    $_SESSION['cart'][$product_id] = 1;
}
header("Location: order_detail.php");
exit;

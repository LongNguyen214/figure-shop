<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Figure Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="bi bi-shop me-1"></i>Figure House</a>
        <form class="d-flex me-auto ms-3" role="search" method="GET" action="search.php">
            <input class="form-control me-2" type="search" name="query" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <?php if (!isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php"><i class="bi bi-person-plus-fill"></i> Register</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php"><i class="bi bi-person-circle"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="bi bi-cart4"></i> Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php"><i class="bi bi-envelope"></i> Contact</a>
            </li>
        </ul>
    </div>
</nav>

<main class="flex-grow-1 container py-4">

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h2>Contact Us</h2>
    <form method="POST" action="send_contact.php">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea class="form-control" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>

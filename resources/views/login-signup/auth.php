<?php
// Define the default mode (login)
$mode = 'login'; 

// Check if an 'action' is set in the URL (e.g., from ?action=signup)
if (isset($_GET['action'])) {
    $mode = $_GET['action'];
}
?>

<div class="auth">
    <?php 
    if ($mode === 'login') {
        // Include the login form
        include __DIR__ . "\login.php"; 
    } elseif ($mode === 'signup') {
        // Include the sign-up form
        include __DIR__ . "\signup.php"; 
    } else {
        // Optional: Include a default or error page if mode is unrecognized
        echo "<p>Invalid authentication action specified.</p>";
    }
    ?>
</div>
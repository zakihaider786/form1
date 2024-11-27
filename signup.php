<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Sign Up</title>
</head>
<body>
    <!-- New Dot Loader -->
    <div class="wrapper">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <form method="POST">
        <h2>Sign Up</h2>
        <label>Full Name:</label>
        <input type="text" name="full_name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required>
        <button type="submit" name="signup">Sign Up</button>
    </form>

    <?php
    if (isset($_POST['signup'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password === $confirm_password) {
            // Check if the email already exists
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $error_message = "Email is already registered. Please use a different email.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$hashed_password')";
                if ($conn->query($sql)) {
                    echo "<p>Sign up successful! <a href='login.php'>Log in now</a>.</p>";
                } else {
                    echo "<p>Error: " . $conn->error . "</p>";
                }
            }
        } else {
            echo "<p>Passwords do not match!</p>";
        }
    }
    ?>

    <!-- Display error message if email is already registered -->
    <?php if (!empty($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <script>
        // Show loader on page load
        document.addEventListener("DOMContentLoaded", function () {
            const loader = document.querySelector('.wrapper');
            loader.style.display = 'flex'; // Show loader

            // Simulate content loading
            setTimeout(() => {
                loader.style.display = 'none'; // Hide loader after 4 second
            }, 1000); // Adjust timing as needed
        });

        // Show loader when navigating to another page
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function (e) {
                const loader = document.querySelector('.wrapper');
                loader.style.display = 'flex'; // Show loader
            });
        });
    </script>

</body>
</html>

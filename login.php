<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
<!-- New Dot Loader -->
<div class="wrapper">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>v>

    <form method="POST">
        <h2>Log In</h2>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit" name="login">Log In</button>
    </form>

    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                header("Location: registration.php");
            } else {
                echo "<p>Invalid credentials!</p>";
            }
        } else {
            echo "<p>User not found!</p>";
        }
    }
    ?>
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

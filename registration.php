<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="styles.css">
    <title>Registration</title>
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
        <h2>Registration Form</h2>
        <label>First Name:</label>
        <input type="text" name="first_name" required>
        <label>Last Name:</label>
        <input type="text" name="last_name" required>
        <label>Father's Name:</label>
        <input type="text" name="father_name" required>
        <label>Mother's Name:</label>
        <input type="text" name="mother_name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Permanent Address:</label>
        <textarea name="permanent_address" required></textarea>
        <label>
            <input type="checkbox" id="same_address"> Residential Address same as Permanent Address
        </label>
        <textarea name="residential_address" id="residential_address"></textarea>
        <label>Reason for Filling Form:</label>
        <input type="text" name="reason" required>
        <label>Amount:</label>
        <input type="number" name="amount" required>
        <button type="submit" name="register">Submit</button>
    </form>

    <script>
        document.getElementById('same_address').addEventListener('change', function() {
            const resAddress = document.getElementById('residential_address');
            if (this.checked) {
                resAddress.value = document.querySelector('[name="permanent_address"]').value;
                resAddress.disabled = true;
            } else {
                resAddress.disabled = false;
                resAddress.value = '';
            }
        });
    </script>

    <?php
    if (isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $email = $_POST['email'];
        $permanent_address = $_POST['permanent_address'];
        $residential_address = $_POST['residential_address'];
        $reason = $_POST['reason'];
        $amount = $_POST['amount'];

        $sql = "INSERT INTO registrations (first_name, last_name, father_name, mother_name, email, permanent_address, residential_address, reason, amount) VALUES ('$first_name', '$last_name', '$father_name', '$mother_name', '$email', '$permanent_address', '$residential_address', '$reason', $amount)";
        if ($conn->query($sql)) {
            header("Location: success.php");
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
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

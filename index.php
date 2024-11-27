<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="styles.css">
    <title>Welcome</title>

    <!-- Add custom styles -->
    <style>
        body {
            font-family: 'Merriweather', serif; /* Use Merriweather font */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4; /* Light background color */
        }

        h1 {
            font-weight: 700; /* Bold weight */
            text-align: center;
            font-size: 3.5rem; /* Adjust size as needed */
            color: #4CAF50; /* Brilliant green color */
            text-transform: uppercase;
            letter-spacing: 2px; /* Spacing between letters */
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for brilliance */
            margin-top: 20px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Space between buttons */
            margin-top: 40px;
        }

        button {
            font-size: 1.2rem;
            padding: 15px 30px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 200px; /* Set width of the buttons */
        }

        button:hover {
            background-color: #45a049; /* Green background on hover */
            color: white;
        }

        .loader-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            display: none;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Loader active class */
        .loader-container.active {
            display: flex;
        }
    </style>
</head>
<body>

<!-- New Dot Loader -->
<div class="wrapper">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

<!-- Title split into three lines -->
<h1>
    Welcome to the <br>
    Membership Form of <br>
    Jamia Imam Mehdi Arabic College
</h1>

<div class="button-container">
    <a href="signup.php">
        <button>
            <i class="fas fa-user-plus"></i> Sign Up
        </button>
    </a>
    <a href="login.php">
        <button>
            <i class="fas fa-sign-in-alt"></i> Log In
        </button>
    </a>
</div>

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

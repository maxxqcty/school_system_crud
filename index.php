<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: pages/dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to School Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to School Management System</title>
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">


        <style>
            body {
                background-color: #f8f9fa;
                font-family: 'Arial', sans-serif;
                background-image: url("./assets/norsu_background.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }

            .container {
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .card {
                border: none;
                border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            .card-header {
                background-color: #2575fc;
                color: white;
                text-align: center;
                font-size: 1.5rem;
                font-weight: 600;
                padding: 20px;
            }

            .card-body {
                padding: 2rem;
            }

            .btn-custom {
                background-color: #2575fc;
                color: white;
                width: 100%;
                border-radius: 20px;
                padding: 12px;
                font-size: 1.1rem;
                font-weight: 600;
                transition: transform 0.2s ease-in-out;
            }

            .btn-custom:hover {
                background-color: #1a5bb8;
                transform: scale(1.05);
            }

            .form-control {
                border-radius: 20px;
                transition: all 0.3s ease-in-out;
                border: 2px solid #ccc;
                padding: 12px;
            }

            .form-control:focus {
                border-color: #2575fc;
                box-shadow: 0 0 5px rgba(37, 117, 252, 0.7);
                transform: scale(1.05);
            }

            .welcome-message {
                text-align: center;
                margin-bottom: 30px;
            }

            .welcome-message h1 {
                font-size: 3rem;
                font-weight: bold;
                color: #2575fc;
            }

            .welcome-message p {
                font-size: 1.2rem;
                color: #555;
            }

            .footer {
                text-align: center;
                position: fixed;
                bottom: 10px;
                width: 100%;
                font-size: 0.9rem;
                color: #666;
            }

            .footer a {
                color: #2575fc;
                text-decoration: none;
            }

            .footer a:hover {
                text-decoration: underline;
            }

            .login-register-link {
                text-align: center;
                margin-top: 20px;
            }

            .login-register-link a {
                color: #2575fc;
            }

            .logo-container {
                text-align: center;
                margin-bottom: 30px;
            }

            .logo-container img {
                max-width: 150px;
                height: auto;
            }

            .form-floating-group {
                position: relative;
                margin-bottom: 1.5rem;
            }

            .form-floating-group input {
                border-radius: 20px;
                border: 2px solid #ccc;
                padding: 12px;
                padding-left: 45px;
                /* Adjust to leave space for the icon */
                width: 100%;
                font-size: 1rem;
                transition: border-color 0.3s ease-in-out, transform 0.3s ease-in-out;
                z-index: 1;
                /* Ensure the input stays above the label */
            }

            .form-floating-group input:focus {
                border-color: #2575fc;
                outline: none;
                transform: scale(1.02);
                z-index: 2;
                /* Keep the input in focus above other elements */
            }

            .form-floating-group label {
                position: absolute;
                top: 50%;
                left: 45px;
                /* Match padding-left of input */
                transform: translateY(-50%);
                background-color: #fff;
                padding: 0 5px;
                color: #aaa;
                font-size: 1rem;
                transition: all 0.3s ease-in-out;
                pointer-events: none;
                z-index: 0;
                /* Ensure the label stays below the input */
            }

            .form-floating-group input:focus+label,
            .form-floating-group input:not(:placeholder-shown)+label {
                top: -10px;
                left: 15px;
                font-size: 0.85rem;
                color: #2575fc;
            }

            .form-floating-group .bi {
                position: absolute;
                left: 10px;
                top: 50%;
                transform: translateY(-50%);
                font-size: 1.2rem;
                color: #2575fc;
                z-index: 1;
                /* Keep the icon above the input field */
            }
        </style>
    </head>

<body>
    <div class="container">
        <div class="card w-100" style="max-width: 400px; max-width: 600px;"><br><br>
            <!-- Logo Container -->
            <div class="logo-container">
                <img src="./assets/norsu.png" alt="School Logo">
            </div>

            <div class="card-body">
                <!-- Welcome Message -->
                <div class="welcome-message">
                    <h1>Welcome!</h1>
                    <p>Manage your students, courses, and more. Please login or register to continue.</p>
                </div>

                <form action="./actions/login.php" method="post">
                    <!-- Email Field -->
                    <div class="form-floating-group position-relative">
                        <i class="bi bi-envelope-fill position-absolute"
                            style="color: #2575fc; left: 10px; top: 50%; transform: translateY(-50%); font-size: 1.2rem;"></i>
                        <input type="email" id="email" name="email" placeholder=" " required
                            style="padding-left: 40px;">
                        <label for="email">Email address</label>
                    </div>

                    <!-- Password Field -->
                    <div class="form-floating-group position-relative">
                        <i class="bi bi-lock-fill position-absolute"
                            style="color: #2575fc; left: 10px; top: 50%; transform: translateY(-50%); font-size: 1.2rem;"></i>
                        <input type="password" id="password" name="password" placeholder=" " required
                            style="padding-left: 40px;">
                        <label for="password">Password</label>
                    </div>

                    <button type="submit" class="btn btn-custom">Login</button>
                </form>


                <div class="login-register-link">
                    <p>Don't have an account? <a href="register.php">Register here</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>© 2024 School Management System | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </div>

    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>

</html>
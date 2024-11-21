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

        <link rel="stylesheet" href="./styles/index.css">
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
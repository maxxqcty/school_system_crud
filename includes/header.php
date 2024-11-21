<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/header.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                School Management
            </div>
            <ul>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Trigger for Logout Modal -->
                    <li><a href="#" data-toggle="modal" data-target="#logoutModal" class="<?= (basename($_SERVER['PHP_SELF']) == 'logout.php') ? 'active' : '' ?>">Logout</a></li>
                <?php else: ?>
                    <li><a href="../pages/home.php?action=login" class="<?= (basename($_SERVER['PHP_SELF']) == 'home.php' && isset($_GET['action']) && $_GET['action'] == 'login') ? 'active' : '' ?>">Login</a></li>
                    <li><a href="../pages/home.php?action=register" class="<?= (basename($_SERVER['PHP_SELF']) == 'home.php' && isset($_GET['action']) && $_GET['action'] == 'register') ? 'active' : '' ?>">Register</a></li>
                <?php endif; ?>
            </ul>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <div class="auth-links">
                    <a href="../pages/home.php?action=login">Login</a>
                    <a href="../pages/home.php?action=register">Register</a>
                </div>
            <?php endif; ?>
        </nav>
    </header>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="../pages/logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
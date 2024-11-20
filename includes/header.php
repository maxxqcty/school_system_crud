<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
        }

        header {
            background: linear-gradient(90deg, #3498db, #2980b9);
            padding: 1rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
        }

        .logo {
            font-size: 1.8rem;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        nav li {
            display: inline;
        }

        nav a {
            color: #fff;
            font-size: 1rem;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        nav a.active {
            background-color: #f39c12;
            color: #fff;
        }

        .auth-links {
            display: flex;
            gap: 1rem;
        }

        .auth-links a {
            font-size: 1rem;
            padding: 0.6rem 1rem;
            background-color: #f39c12;
            color: white;
            border-radius: 25px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .auth-links a:hover {
            background-color: #d35400;
        }

        @media (max-width: 768px) {
            nav {
                flex-wrap: wrap;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
                margin-top: 1rem;
            }

            .auth-links {
                flex-direction: column;
                gap: 0.5rem;
                margin-top: 1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                School Management
            </div>
            <ul>
                <li><a href="../index.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : '' ?>">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="../pages/dashboard.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : '' ?>">Dashboard</a></li>
                    <li><a href="../pages/logout.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'logout.php') ? 'active' : '' ?>">Logout</a></li>
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
</body>

</html>
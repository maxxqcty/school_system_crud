<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../db/Database.php";
    $db = (new Database())->connect();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT id, password FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../pages/dashboard.php');
        exit;
    } else {
        echo "Invalid credentials.";
    }
}
?>

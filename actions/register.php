<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../db/Database.php";
    $db = (new Database())->connect();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);

    echo "Registration successful. <a href='../index.php'>Login here</a>";
}
?>
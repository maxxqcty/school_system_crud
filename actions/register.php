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
<form method="post">
    <h2>Register</h2>
    <label>Name:</label>
    <input type="text" name="name" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Register</button>
</form>

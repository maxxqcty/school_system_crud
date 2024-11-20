<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

include "../db/Database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = (new Database())->connect();
    $user_id = $_SESSION['user_id'];
    $student_id = $_POST['student_id'];

    // Ensure the student belongs to the current user
    $stmt = $db->prepare("DELETE FROM students WHERE id = :id AND user_id = :user_id");
    $stmt->execute([
        'id' => $student_id,
        'user_id' => $user_id,
    ]);

    header('Location: ../pages/dashboard.php');
    exit;
}
?>

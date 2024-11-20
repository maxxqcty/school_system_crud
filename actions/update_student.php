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

    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $image_blob = null;

    // Handle image upload
    if (!empty($_FILES['image']['tmp_name'])) {
        $image_blob = file_get_contents($_FILES['image']['tmp_name']);

        // Validate file type
        $image_file_type = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_file_type, $allowed_types)) {
            die("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
        }

        // Validate file size (e.g., 2MB max)
        if ($_FILES['image']['size'] > 2000000) {
            die("Error: File size exceeds 2MB.");
        }
    }

    // Update query with BLOB handling
    $query = "UPDATE students SET name = :name, age = :age, course = :course, contact = :contact, email = :email";
    if ($image_blob !== null) {
        $query .= ", image = :image";
    }
    $query .= " WHERE id = :id AND user_id = :user_id";

    $stmt = $db->prepare($query);
    $params = [
        'name' => $name,
        'age' => $age,
        'course' => $course,
        'contact' => $contact,
        'email' => $email,
        'id' => $student_id,
        'user_id' => $user_id,
    ];
    if ($image_blob !== null) {
        $params['image'] = $image_blob;
    }

    $stmt->execute($params);

    header('Location: ../pages/dashboard.php');
    exit;
}

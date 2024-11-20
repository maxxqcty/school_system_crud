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

    // Generate a random 9-digit number
    $random_id = rand(100000000, 999999999);  // Generates a random 9-digit number

    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    // Handle the file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $photo = file_get_contents($_FILES['image']['tmp_name']);
    } else {
        $photo = null;  // If no image is uploaded, set photo to null
    }

    // Insert student data into the database
    $stmt = $db->prepare("INSERT INTO students (id, name, age, course, contact, email, image, user_id) 
                          VALUES (:id, :name, :age, :course, :contact, :email, :image, :user_id)");

    // Execute the prepared statement with the correct parameters
    $stmt->execute([
        'id' => $random_id,  // Insert the random 9-digit number
        'name' => $name,
        'age' => $age,
        'course' => $course,
        'contact' => $contact,
        'email' => $email,
        'image' => $photo,  // Store the image as a BLOB
        'user_id' => $user_id,
    ]);

    header('Location: ../pages/dashboard.php');
    exit;
}

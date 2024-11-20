<?php
// photo.php
include "../db/Database.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Establish a database connection
    $db = (new Database())->connect();

    // Prepare and execute the query to fetch the image based on the student ID
    $stmt = $db->prepare("SELECT image FROM students WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Fetch the image data
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student && $student['image']) {
        // Set the correct content type header based on the image type (assuming it's a JPEG, adjust if needed)
        header("Content-Type: image/jpeg");

        // Output the image data
        echo $student['image'];
    } else {
        // If no image is found, you can output a default placeholder image or handle it as you prefer
        header("Content-Type: image/jpeg");
        echo file_get_contents("path/to/default-image.jpg");  // Provide a fallback image
    }
} else {
    // Handle the case where no ID is provided (optional)
    echo "No image found.";
}

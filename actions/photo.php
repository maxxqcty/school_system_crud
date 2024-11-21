<?php
// Photo.php
require_once "../db/Database.php";

class PhotoHandler
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function getImageById($id)
    {
        $stmt = $this->db->prepare("SELECT image FROM students WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function outputImage($imageData)
    {
        // Set the correct content type header based on the image type (assuming it's a JPEG)
        header("Content-Type: image/jpeg");

        // Output the image data or a default placeholder if no image exists
        if ($imageData && $imageData['image']) {
            echo $imageData['image'];
        } else {
            echo file_get_contents("path/to/default-image.jpg"); // Provide a fallback image
        }
    }
}

// Main logic
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $photoHandler = new PhotoHandler();
    $imageData = $photoHandler->getImageById($id);
    $photoHandler->outputImage($imageData);
} else {
    // Handle the case where no ID is provided
    echo "No image found.";
}

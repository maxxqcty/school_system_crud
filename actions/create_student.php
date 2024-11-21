<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

// Include the Database class
include "../db/Database.php";

// Define the StudentManager class
class   CreateStudent
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function addStudent($data, $file, $user_id)
    {
        try {
            // Generate a random 9-digit number for the student ID
            $random_id = rand(100000000, 999999999);

            // Extract student data
            $name = $data['name'];
            $age = $data['age'];
            $course = $data['course'];
            $contact = $data['contact'];
            $email = $data['email'];

            // Handle file upload and convert the image to BLOB
            $photo = isset($file['image']) && $file['image']['error'] === UPLOAD_ERR_OK
                ? file_get_contents($file['image']['tmp_name'])
                : null;

            // Prepare the SQL query
            $stmt = $this->db->prepare("INSERT INTO students (id, name, age, course, contact, email, image, user_id) 
                                        VALUES (:id, :name, :age, :course, :contact, :email, :image, :user_id)");

            // Execute the prepared statement with the correct parameters
            $stmt->execute([
                'id' => $random_id,
                'name' => $name,
                'age' => $age,
                'course' => $course,
                'contact' => $contact,
                'email' => $email,
                'image' => $photo,
                'user_id' => $user_id,
            ]);
        } catch (Exception $e) {
            // Handle exceptions, such as database errors
            die("Error: " . $e->getMessage());
        }
    }
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentManager = new CreateStudent();
    $studentManager->addStudent($_POST, $_FILES, $_SESSION['user_id']);

    // Redirect to the dashboard after successful insertion
    header('Location: ../pages/dashboard.php');
    exit;
}

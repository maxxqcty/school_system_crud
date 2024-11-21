<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

include "../db/Database.php";

class UpdateStudent
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function updateStudent($data, $file, $user_id)
    {
        try {
            $student_id = $data['student_id'];
            $name = $data['name'];
            $age = $data['age'];
            $course = $data['course'];
            $contact = $data['contact'];
            $email = $data['email'];

            $image_blob = null;

            // Handle image upload
            if (!empty($file['image']['tmp_name'])) {
                $image_blob = file_get_contents($file['image']['tmp_name']);

                // Validate file type
                $image_file_type = strtolower(pathinfo($file['image']['name'], PATHINFO_EXTENSION));
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($image_file_type, $allowed_types)) {
                    throw new Exception("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
                }

                // Validate file size (e.g., 2MB max)
                if ($file['image']['size'] > 2000000) {
                    throw new Exception("Error: File size exceeds 2MB.");
                }
            }

            // Update query with BLOB handling
            $query = "UPDATE students SET name = :name, age = :age, course = :course, contact = :contact, email = :email";
            if ($image_blob !== null) {
                $query .= ", image = :image";
            }
            $query .= " WHERE id = :id AND user_id = :user_id";

            $stmt = $this->db->prepare($query);

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
        } catch (Exception $e) {
            // Handle exceptions gracefully
            die("Error: " . $e->getMessage());
        }
    }
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];

    $updateStudent = new UpdateStudent();
    $updateStudent->updateStudent($_POST, $_FILES, $user_id);

    // Redirect to the dashboard after successful update
    header('Location: ../pages/dashboard.php');
    exit;
}

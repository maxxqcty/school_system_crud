<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

include "../db/Database.php";

class DeleteStudent {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function deleteStudent($student_id, $user_id) {
        try {
            // Ensure the student belongs to the current user and delete the record
            $stmt = $this->db->prepare("DELETE FROM students WHERE id = :id AND user_id = :user_id");
            $stmt->execute([
                'id' => $student_id,
                'user_id' => $user_id,
            ]);
        } catch (Exception $e) {
            // Handle exceptions gracefully
            die("Error: " . $e->getMessage());
        }
    }
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $student_id = $_POST['student_id'];

    $deleteStudent = new DeleteStudent();
    $deleteStudent->deleteStudent($student_id, $user_id);

    // Redirect to the dashboard after deletion
    header('Location: ../pages/dashboard.php');
    exit;
}
?>

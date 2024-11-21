<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

include "../db/Database.php";
$db = (new Database())->connect();
$user_id = $_SESSION['user_id'];

$stmt = $db->prepare("SELECT * FROM students WHERE user_id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
include "../modals/create_student_modal.php";
include "../modals/edit_student_modal.php";
include "../modals/confirm_delete_modal.php";
include "../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="../styles/dashboard.css">
</head>

<body>

    <div class="container my-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
        </div>

        <div style="text-align: center; margin-bottom: 20px; padding: 20px; border-radius: 8px;">
            <h1 style="color: white; font-size: 2em; font-weight: bold;">Manage Students</h1>
            <p style="color: white; font-style: italic;">"Create, Read, Update and Delete"</p>
            <div style="margin-top: 15px;">

            </div>
        </div>

        <table>

        </table>

        <div class="d-flex justify-content-between align-items-center">
            <div class="input-group me-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                <input type="text" style="max-width: 50%;" id="searchInput" class="form-control" placeholder="Search students..." onkeyup="searchTable()">
            </div> <br><br><br>
            <button class="btn btn-custom" onclick="openModal('createStudentModal')">
                <i class="fas fa-plus-circle"></i> Add Student
            </button>
        </div>
        </h2>


        <div class="table-responsive">
            <table id="studentsTable" class="table table-hover table-bordered">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Student ID</th>
                        <th>Photo</th> <!-- New Column for Student ID -->
                        <th>Name</th>
                        <th>Age</th>
                        <th>Course</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($students)): ?>
                        <tr>
                            <td colspan="8" class="text-center">No students available</td> <!-- Adjusted colspan to 8 -->
                        </tr>
                    <?php else: ?>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <!-- Face Column -->
                                <td class="text-center"><?= htmlspecialchars($student['id']) ?></td>
                                <td class="text-center">
                                    <img src="../actions/photo.php?id=<?= $student['id'] ?>" alt="Student Photo"
                                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                </td>
                                <!-- New Student ID Column -->
                                <!-- Displaying Student ID -->
                                <!-- Other Columns -->
                                <td><?= htmlspecialchars($student['name']) ?></td>
                                <td><?= htmlspecialchars($student['age']) ?></td>
                                <td><?= htmlspecialchars($student['course']) ?></td>
                                <td><?= htmlspecialchars($student['contact']) ?></td>
                                <td><?= htmlspecialchars($student['email']) ?></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button style=" font-family: 'Inter', sans-serif;" class="btn btn-primary btn-action me-2"
                                            onclick="fillEditModal({
            id: '<?= $student['id'] ?>',
            name: '<?= addslashes($student['name']) ?>',
            age: '<?= $student['age'] ?>',
            course: '<?= addslashes($student['course']) ?>',
            contact: '<?= $student['contact'] ?>',
            email: '<?= $student['email'] ?>'
        })">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button style=" font-family: 'Inter', sans-serif;" class="btn btn-danger btn-action"
                                            onclick="confirmDelete(<?= $student['id'] ?>)">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js">

    </script>
</body>

</html>
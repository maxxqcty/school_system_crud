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
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            line-height: 1.6;
        }

        h1,
        h2 {
            color: #2c3e50;
            font-weight: 600;
        }

        .container {
            max-width: 1200px;
            padding: 40px;
        }

        .btn-custom {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            width: 180px;
            color: white;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #2575fc, #6a11cb);
            color: yellow;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }



        .table th,
        .table td {
            vertical-align: middle;
            padding: 15px;
        }

        .table-hover tbody tr:hover {
            background-color: #eef2f7;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            background-color: #fff;
        }

        .card-header {
            background-color: #2575fc;
            color: white;
            font-size: 1.25rem;
            text-align: center;
            padding: 1rem;
            font-weight: 600;
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        .navbar {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            padding: 1rem;
            color: white;
            font-weight: 500;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #f39c12;
        }

        .btn-action {
            border-radius: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .input-group input {
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .input-group button {
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .btn-custom {
                font-size: 14px;
                padding: 10px 20px;
            }

            .table-responsive {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="container my-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
        </div>

        <div style="text-align: center; margin-bottom: 20px; background-color: #f4f4f4; padding: 20px; border-radius: 8px;">
            <h1 style="color: #333; font-size: 2em; font-weight: bold;">Manage Students</h1>
            <p style="color: #555; font-style: italic;">"Create, Read, Update and Delete"</p>
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
                        <th>Face</th> <!-- New Column for Student ID -->
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
                                        <button class="btn btn-primary btn-action me-2"
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
                                        <button class="btn btn-danger btn-action"
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

    <!-- Modal for Confirming Deletion -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this student?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="post" action="../actions/delete_student.php" class="d-inline">
                        <input type="hidden" name="student_id" id="deleteStudentId">
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
          function openModal(modalId) {
            const modal = new bootstrap.Modal(document.getElementById(modalId));
            modal.show();
        }

        function fillEditModal(student) {
            document.getElementById('student_id').value = student.id;
            document.getElementById('edit_name').value = student.name;
            document.getElementById('edit_age').value = student.age;
            document.getElementById('edit_course').value = student.course;
            document.getElementById('edit_contact').value = student.contact;
            document.getElementById('edit_email').value = student.email;
            openModal('editStudentModal');
        }

        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('studentsTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) { // Start at 1 to skip header row
                const cells = rows[i].getElementsByTagName('td');
                let match = false;
                for (let j = 0; j < cells.length - 1; j++) { // Exclude actions column
                    if (cells[j].textContent.toLowerCase().includes(filter)) {
                        match = true;
                        break;
                    }
                }
                rows[i].style.display = match ? '' : 'none';
            }
        }

        function confirmDelete(studentId) {
            document.getElementById('deleteStudentId').value = studentId;
            var deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            deleteModal.show();
        }

        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            table = document.getElementById("studentsTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                let matchFound = false;
                for (let j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            matchFound = true;
                            break;
                        }
                    }
                }
                tr[i].style.display = matchFound ? "" : "none";
            }
        }
    </script>
</body>

</html>
<style>
    .animated-input {
        position: relative;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .animated-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .form-group label {
        display: flex;
        align-items: center;
        font-weight: bold;
        color: #495057;
    }
</style>

<div id="createStudentModal" class="modal fade" tabindex="-1" aria-labelledby="createStudentModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="createStudentModalLabel">
                    <i class="fas fa-user-plus me-2"></i> Add Student
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/create_student.php" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3 position-relative">
                        <label for="name" class="form-label">
                            <i class="fas fa-user me-2"></i>Name:
                        </label>
                        <input type="text" id="name" name="name" class="form-control animated-input" required>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="age" class="form-label">
                            <i class="fas fa-calendar-alt me-2"></i>Age:
                        </label>
                        <input type="number" id="age" name="age" class="form-control animated-input" required>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="course" class="form-label">
                            <i class="fas fa-book me-2"></i>Course:
                        </label>
                        <input type="text" id="course" name="course" class="form-control animated-input" required>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="contact" class="form-label">
                            <i class="fas fa-phone me-2"></i>Contact:
                        </label>
                        <input type="text" id="contact" name="contact" class="form-control animated-input">
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Email:
                        </label>
                        <input type="email" id="email" name="email" class="form-control animated-input" required>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="photo" class="form-label">
                            <i class="fas fa-camera me-2"></i>Student Photo:
                        </label>
                        <input type="file" id="photo" name="image" class="form-control animated-input" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-plus-circle me-2"></i>Add Student
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
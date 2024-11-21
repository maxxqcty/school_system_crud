<style>
    .animated-input {
        position: relative;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .animated-input:focus {
        border-color: #ffc107;
        box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
    }

    .form-group label {
        display: flex;
        align-items: center;
        font-weight: bold;
        color: #495057;
    }
</style>


<div id="editStudentModal" class="modal fade" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editStudentModalLabel">
                    <i class="fas fa-user-edit me-2"></i> Edit Student
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/update_student.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="student_id" name="student_id">

                    <div class="form-group mb-3 position-relative">
                        <label for="edit_name" class="form-label">
                            <i class="fas fa-user me-2"></i>Name:
                        </label>
                        <input type="text" id="edit_name" name="name" class="form-control animated-input" required>
                    </div>

                    <div class="form-group mb-3 position-relative">
                        <label for="edit_age" class="form-label">
                            <i class="fas fa-calendar-alt me-2"></i>Age:
                        </label>
                        <input type="number" id="edit_age" name="age" class="form-control animated-input" required>
                    </div>

                    <div class="form-group mb-3 position-relative">
                        <label for="edit_course" class="form-label">
                            <i class="fas fa-book me-2"></i>Course:
                        </label>
                        <input type="text" id="edit_course" name="course" class="form-control animated-input" required>
                    </div>

                    <div class="form-group mb-3 position-relative">
                        <label for="edit_contact" class="form-label">
                            <i class="fas fa-phone me-2"></i>Contact:
                        </label>
                        <input type="text" id="edit_contact" name="contact" class="form-control animated-input">
                    </div>

                    <div class="form-group mb-3 position-relative">
                        <label for="edit_email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Email:
                        </label>
                        <input type="email" id="edit_email" name="email" class="form-control animated-input" required>
                    </div>

                    <div class="form-group mb-3 position-relative">
                        <label for="edit_image" class="form-label">
                            <i class="fas fa-camera me-2"></i>Upload Image:
                        </label>
                        <input type="file" id="edit_image" name="image" class="form-control animated-input" accept="image/*">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Update Student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
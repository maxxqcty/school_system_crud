<div id="editStudentModal" class="modal fade" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/update_student.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="student_id" name="student_id">

                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name:</label>
                        <input type="text" id="edit_name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_age" class="form-label">Age:</label>
                        <input type="number" id="edit_age" name="age" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_course" class="form-label">Course:</label>
                        <input type="text" id="edit_course" name="course" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_contact" class="form-label">Contact:</label>
                        <input type="text" id="edit_contact" name="contact" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email:</label>
                        <input type="email" id="edit_email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Upload Image:</label>
                        <input type="file" id="edit_image" name="image" class="form-control" accept="image/*">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
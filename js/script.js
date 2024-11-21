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

        
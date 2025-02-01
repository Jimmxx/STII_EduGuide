<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Input Form and Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-6">
        <!-- Button to Open Modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputModal">Add Student Report</button>

        <!-- Modal -->
        <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputModalLabel">Student Progress Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="studentForm">
                            <div class="mb-3">
                                <label for="studentName" class="form-label">Student Name</label>
                                <input type="text" class="form-control" id="studentName" placeholder="Enter student name" required>
                            </div>
                            <div class="mb-3">
                                <label for="academicPerformance" class="form-label">Academic Performance</label>
                                <input type="text" class="form-control" id="academicPerformance" placeholder="E.g., A, B+" required>
                            </div>
                            <div class="mb-3">
                                <label for="attendance" class="form-label">Attendance (%)</label>
                                <input type="number" class="form-control" id="attendance" placeholder="Enter attendance percentage" required>
                            </div>
                            <div class="mb-3">
                                <label for="behavior" class="form-label">Behavior</label>
                                <input type="text" class="form-control" id="behavior" placeholder="E.g., Excellent, Needs Improvement" required>
                            </div>
                            <div class="mb-3">
                                <label for="counselorComments" class="form-label">Counselor's Comments</label>
                                <textarea class="form-control" id="counselorComments" rows="3" placeholder="Add comments here"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-full">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="mt-6">
            <table class="table table-striped table-bordered">
                <thead class="bg-gray-200">
                    <tr>
                        <th>Student Name</th>
                        <th>Academic Performance</th>
                        <th>Attendance (%)</th>
                        <th>Behavior</th>
                        <th>Counselor's Comments</th>
                    </tr>
                </thead>
                <tbody id="studentTableBody">
                    <!-- Data will be inserted here dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for Form Submission -->
    <script>
        document.getElementById('studentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get form data
            const studentName = document.getElementById('studentName').value;
            const academicPerformance = document.getElementById('academicPerformance').value;
            const attendance = document.getElementById('attendance').value;
            const behavior = document.getElementById('behavior').value;
            const counselorComments = document.getElementById('counselorComments').value;

            // Insert data into table
            const tableBody = document.getElementById('studentTableBody');
            const row = `<tr>
                <td>${studentName}</td>
                <td>${academicPerformance}</td>
                <td>${attendance}</td>
                <td>${behavior}</td>
                <td>${counselorComments}</td>
            </tr>`;
            tableBody.insertAdjacentHTML('beforeend', row);

            // Clear form and close modal
            document.getElementById('studentForm').reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById('inputModal'));
            modal.hide();
        });
    </script>
</body>
</html>

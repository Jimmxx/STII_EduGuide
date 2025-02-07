<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - STII EduGuide</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            width: 250px;
            transition: width 0.3s ease, padding 0.3s ease;
            overflow: hidden;
            background-color: #2c3e50;
        }

        .sidebar.collapsed {
            width: 60px; /* Sidebar collapses to this width */
        }

        .sidebar.collapsed .nav-text {
            display: none; /* Hide text when sidebar is collapsed */
        }

        .sidebar.collapsed .toggle-sidebar-btn {
            right: 10px; /* Adjust button position when collapsed */
        }

        .toggle-sidebar-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            color: #4caf50;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 1000;
        }

        .main-content {
            flex: 1;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 60px;
        }

        .nav-item {
            padding: 10px 20px;
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .nav-item:hover {
            background-color: #34495e;
        }

        .nav-icon {
            margin-right: 10px;
        }
        .modal .nav-item:hover{
            background-color:transparent !important ;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600 flex items-center">
            <i class="bi bi-mortarboard-fill mr-2"></i>STII EduGuide
        </h1>        <div class="flex items-center space-x-4">
            <span class="text-gray-800 font-medium">Warren Duran</span>
            <img src="https://via.placeholder.com/40" alt="Profile Picture" class="w-10 h-10 rounded-full border-2 border-green-600">
        </div>
    </header>
    <style>
        /* Add these new styles */
        body, html {
            height: 100%;
            overflow: hidden;
        }

        .main-content {
            height: calc(100vh - 4rem); /* Subtract header height */
            overflow-y: auto;
            padding: 1.5rem;
        }

        /* Modified profile section */
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .student-checkbox{
            height: 40px;
            width: 40px;
        }
        .profile-details {
            flex: 1;
            min-width: 300px;
        }

        .profile-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        @media (max-width: 640px) {
            .profile-header {
                flex-direction: column;
            }
            
            .profile-actions {
                width: 100%;
                justify-content: flex-start;
            }
        }
    </style>
    <style>
    /* Add this to your existing styles */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .main-content {
        animation: fadeIn 0.8s ease-out forwards;
    }
</style>
    <div class="flex">
        <!-- Sidebar -->
        <aside class="sidebar h-screen relative" id="sidebar">
            <button class="toggle-sidebar-btn" id="toggleSidebar">&#9776;</button>
            <nav class="mt-6 space-y-4">
                <a href="home_admin.php" class="nav-item">
                    <span class="nav-icon">🏠</span>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a href="student_profiling.php" class="nav-item">
                    <span class="nav-icon">👨‍🎓</span>
                    <span class="nav-text">Student Profiling</span>
                </a>
                <a href="counseling.php" class="nav-item">
                    <span class="nav-icon">🗂️</span>
                    <span class="nav-text">Counseling</span>
                </a>
                <!-- <a href="#" class="nav-item">
                    <span class="nav-icon">📚</span>
                    <span class="nav-text">Academic & Career Planning</span>
                </a> -->
                <a href="guidance_program.php" class="nav-item">
                    <span class="nav-icon">📊</span>
                    <span class="nav-text">Guidance Program</span>
                </a>
                <a href="ptc.php" class="nav-item">
                    <span class="nav-icon">👨‍👩‍👧‍👦</span>
                    <span class="nav-text">Parent & Teacher Communication</span>
                </a>
                <a href="event.php" class="nav-item">
                    <span class="nav-icon">📅</span>
                    <span class="nav-text">Programs & Events</span>
                </a>
                <a href="teacher.php" class="nav-item">
                    <span class="nav-icon">🧑‍🏫</span>
                    <span class="nav-text">Teacher</span>
                </a>
                <!-- <a href="#" class="nav-item">
                    <span class="nav-icon">🔗</span>
                    <span class="nav-text">Referrals & Resources</span>
                </a> -->
                <!-- <a href="#" class="nav-item">
                    <span class="nav-icon">⚠️</span>
                    <span class="nav-text">Crisis Management</span>
                </a> -->
                <a href="#" class="nav-item">
                    <span class="nav-icon">🛠️</span>
                    <span class="nav-text">Administrative Task</span>
                </a>
                <a href="#" class="nav-item settings">
                    <span class="nav-icon">📝</span>
                    <span class="nav-text">Reports</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">⚙️</span>
                    <span class="nav-text">Settings</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content bg-gray-50 p-6" id="mainContent">
            <h1 class="text-2xl font-bold mb-6 text-center">Group Counseling Session</h1>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <form class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
<div class="bg-gray-50 p-4 rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Participants</h2>
        <button type="button" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 flex items-center"
                data-bs-toggle="modal" data-bs-target="#addParticipantModal">
            <i class="bi bi-plus-circle mr-2"></i>Add Participant
        </button>
    </div>
    <div class="participants-list">
        <!-- Selected participants will appear here -->
    </div>
</div>
                        
                    </div>
                    <div id="counselingFields">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-lg font-semibold mb-4">1. Background of the Case Description</label>
                            <textarea class="w-full p-3 border rounded" rows="4"></textarea>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-lg font-semibold mb-4">2. Group Counseling Plan</label>
                            <textarea class="w-full p-3 border rounded" rows="4"></textarea>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-lg font-semibold mb-4">3. Group Observations</label>
                            <textarea class="w-full p-3 border rounded" rows="4"></textarea>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-lg font-semibold mb-4">4. Group Recommendations</label>
                            <textarea class="w-full p-3 border rounded" rows="4"></textarea>
                        </div>
                    </div>
                </form>
                <div class="mt-6 flex justify-end">
    <button type="button" 
            class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 flex items-center"
            data-bs-toggle="modal" 
            data-bs-target="#saveConfirmationModal">
        <i class="bi bi-save2 mr-2"></i>Save Session
    </button>
</div>
            </div>
        </main>
    </div>

    <!-- Confirmation Modal -->
<div class="modal fade" id="saveConfirmationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green-600 text-white">
                <h5 class="modal-title">Confirm Save</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to save this group counseling session?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="window.location='final_submit_gcounseling.php'">Yes, Save</button>
            </div>
        </div>
    </div>
</div>

    <script>
    // Toggle sidebar functionality
    const sidebar = document.getElementById('sidebar');
    const toggleSidebarBtn = document.getElementById('toggleSidebar');
    const mainContent = document.getElementById('mainContent');

    toggleSidebarBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
    });
</script>

<!-- Add this modal code near the end of the body -->
<div class="modal fade" id="addParticipantModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-green-600 text-white">
                <h5 class="modal-title">Add Participants</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-4">
                    <input type="text" id="studentSearch" class="form-control" placeholder="Search by name or student ID...">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                
                <div id="studentList" class="list-group">
                    <!-- Sample Students (replace with dynamic data in real implementation) -->
                    <div class="list-group-item student-item">
                        <input type="checkbox" class="form-check-input student-checkbox me-3">
                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3">
                        <span class="fw-bold">John Doe</span>
                        <span class="text-muted ms-2">(STD-001)</span>
                    </div>
                    <div class="list-group-item student-item">
                        <input type="checkbox" class="form-check-input student-checkbox me-3">
                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3">
                        <span class="fw-bold">Jane Smith</span>
                        <span class="text-muted ms-2">(STD-002)</span>
                    </div>
                    <div class="list-group-item student-item">
                        <input type="checkbox" class="form-check-input student-checkbox me-3">
                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3">
                        <span class="fw-bold">Mike Johnson</span>
                        <span class="text-muted ms-2">(STD-003)</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="addParticipantsBtn">Add Selected</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show modal when Add Participant button is clicked
    document.querySelector('[data-bs-target="#addParticipantModal"]').addEventListener('click', function() {
        // Clear previous selections
        document.querySelectorAll('.student-checkbox').forEach(checkbox => checkbox.checked = false);
    });

    // Search functionality
    document.getElementById('studentSearch').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        document.querySelectorAll('.student-item').forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(searchTerm) ? 'flex' : 'none';
        });
    });

    // Add selected participants
    document.getElementById('addParticipantsBtn').addEventListener('click', function() {
        const selectedStudents = [];
        document.querySelectorAll('.student-checkbox:checked').forEach(checkbox => {
            const studentName = checkbox.closest('.student-item').querySelector('.fw-bold').textContent;
            selectedStudents.push(studentName);
        });

        if (selectedStudents.length > 0) {
            // Add to participants list (you can modify this to your needs)
            const participantsContainer = document.querySelector('.participants-list');
            participantsContainer.innerHTML = selectedStudents.map(name => 
                `<span class="badge bg-green-600 text-white p-2 me-2">${name}</span>`
            ).join('');
            
            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('addParticipantModal')).hide();
        } else {
            alert('Please select at least one student');
        }
    });
});
</script>

<style>
.student-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    cursor: pointer;
    transition: background-color 0.2s;
}

.student-item:hover {
    background-color: #f8f9fa;
}

.student-item input[type="checkbox"]:checked {
    background-color: #16a34a;
    border-color: #16a34a;
}

.participants-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    padding: 1rem 0;
}
</style>
                    </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

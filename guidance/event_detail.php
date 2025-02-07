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
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Event Details</h1>
            <p class="text-gray-600 mt-1">Workshop on Career Guidance and University Applications</p>
        </div>
        <a href="event_form.php" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 flex items-center">
            <i class="bi bi-arrow-left-short mr-2"></i> Back to Form
        </a>
    </div>

    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <div class="space-y-6">
            <!-- Basic Information Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-sm font-medium text-gray-500">Event Name</label>
                    <p class="mt-1 text-lg text-gray-800">Career Guidance Workshop</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-500">Date & Time</label>
                    <p class="mt-1 text-gray-800">March 15, 2024 | 2:00 PM - 4:00 PM</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-500">Speaker/Facilitator</label>
                    <p class="mt-1 text-gray-800">Dr. Maria Santos (University Admissions Director)</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-500">Location</label>
                    <p class="mt-1 text-gray-800">STII Auditorium</p>
                </div>
            </div>

            <!-- Divider -->
            <hr class="my-4 border-gray-200">

            <!-- Attendance Details -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Attendance Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Participants</label>
                        <ul class="mt-2 space-y-1 text-gray-800">
                            <li>• Grade 12 - Section A (25 students)</li>
                            <li>• Grade 12 - Section B (22 students)</li>
                            <li>• 5 Faculty Members</li>
                        </ul>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Engagement Notes</label>
                        <p class="mt-2 text-gray-800">Active participation in Q&A session. Strong interest in STEM career paths noted. 15 students stayed for additional consultation.</p>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr class="my-4 border-gray-200">

            <!-- Feedback Section -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Participant Feedback</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Average Rating</label>
                        <div class="mt-2 flex items-center">
                            <div class="flex text-yellow-400">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                            <span class="ml-2 text-gray-800">4.5/5 Stars</span>
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Key Feedback</label>
                        <ul class="mt-2 space-y-1 text-gray-800">
                            <li>• Request for more university-specific sessions</li>
                            <li>• Interest in internship opportunities</li>
                            <li>• Need more time for one-on-one consultations</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr class="my-4 border-gray-200">

            <!-- Additional Information -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Additional Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Materials Distributed</label>
                        <p class="mt-2 text-gray-800">University application guidebooks, Career assessment forms</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Follow-up Actions</label>
                        <p class="mt-2 text-gray-800">Schedule individual counseling sessions, Distribute survey forms</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Save Button to trigger the Save Confirmation Modal -->
    <div class="mt-6 flex justify-end" style="margin-bottom: 20px;">
        <button type="button" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors flex items-center gap-2" data-bs-toggle="modal" data-bs-target="#saveConfirmationModal">
            <i class="bi bi-check-lg"></i>
            Save
        </button>
    </div>
</main>

<!-- Save Confirmation Modal -->
<div class="modal fade" id="saveConfirmationModal" tabindex="-1" aria-labelledby="saveConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="saveConfirmationModalLabel">Confirm Save</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        Are you sure you want to save the changes?
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition-colors" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors" onclick="window.location='event.php'
        ">Save</button>
      </div>
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


                    </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

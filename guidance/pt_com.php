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
    <h1 class="text-2xl font-bold mb-6 text-center">Parent & Teacher Communication Form</h1>

    <!-- Form Sections -->
    <form class="space-y-6">
        <!-- General Information -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h2 class="text-lg font-semibold mb-4">General Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Date</label>
                    <input type="date" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Time</label>
                    <input type="time" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Recorded By (Guidance Staff)</label>
                    <input type="text" class="w-full p-2 border rounded">
                </div>
            </div>
            
            <div class="mt-4">
                <label class="block text-sm font-medium mb-2">Communication Type</label>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="form-checkbox"> Meeting
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="form-checkbox"> Email
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="form-checkbox"> Phone Call
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="form-checkbox"> Other:
                        <input type="text" class="p-1 border-b-2" placeholder="Specify">
                    </label>
                </div>
            </div>
        </div>

        <!-- Meeting Summary -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h2 class="text-lg font-semibold mb-4">Meeting Summary (If Applicable)</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-2">Meeting Type</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="form-checkbox"> Parent-Teacher
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="form-checkbox"> IEP
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="form-checkbox"> Other:
                            <input type="text" class="p-1 border-b-2" placeholder="Specify">
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Participants</label>
                    <input type="text" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Key Discussion Points & Outcomes</label>
                    <textarea class="w-full p-2 border rounded" rows="3"></textarea>
                </div>
            </div>
        </div>

        <!-- Communication Log -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h2 class="text-lg font-semibold mb-4">Communication Log</h2>
            <label class="block text-sm font-medium mb-1">Summary of Discussion</label>
            <textarea class="w-full p-2 border rounded" rows="4"></textarea>
        </div>

        <!-- Form Buttons -->
        <div class="flex justify-end gap-4 mt-6" style="margin-bottom: 20px;">
            <button type="button" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
            <button type="button" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600" data-bs-toggle="modal" data-bs-target="#confirmationModal4">Save Record</button>
        </div>
    </form>
</main>

<!--  Confirmation Modal -->
<div class="modal fade" id="confirmationModal4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="submit_pt_com.php" class="btn btn-success">Yes</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Not Yet</button>
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

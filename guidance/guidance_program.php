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
<!-- Add Referral Modal -->
<div class="modal fade" id="addReferralModal" tabindex="-1" aria-labelledby="addReferralModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="referral" >Add Program Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="mb-3">
                            <label class="form-label">Program Name</label>
                            <input type="text" class="form-control" name="programName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="programDate" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rating (1-5)</label>
                            <select class="form-select" name="rating" required>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Feedback</label>
                            <textarea class="form-control" name="feedback" rows="4" required></textarea>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Feedback</button>
            </div>
        </div>
    </div>
</div>

    <!-- Navbar -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600 flex items-center">
        <img src="images/logostiiq.png" alt="STII EduGuide Logo" class="h-10 w-auto mr-2">
    </h1>
    <div class="flex items-center space-x-4">
        <span class="text-gray-800 font-medium">Warren Duran</span>
        <img src="https://via.placeholder.com/40" alt="Profile Picture" class="w-10 h-10 rounded-full border-2 border-green-600">
    </div>
</header>

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
                <!-- <a href="crisis_management.php" class="nav-item">
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
        <div class="p-6">
    <h1 class="text-2xl font-bold text-center mb-6">Guidance Program Feedback</h1>

    <!-- Tabs
    <div class="flex justify-center space-x-6 mb-6">
        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Referral</button>
        <button class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300"><a href="action_plan.php"> Action Plan </a></button>
        <button class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300"><a href="progress_tracking.php"> Progress Tracking</a></button>
        <button class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300"><a href="guidance_counseling"> Guidance Counseling</a></button>
    </div> -->
    <!-- <h1 class="text-2xl font-bold mb-6">Referral</h1> -->
    <!-- Search and Add Referral -->
    <div class="flex justify-between items-center mb-4">
        <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-600" data-bs-toggle="modal" data-bs-target="#addReferralModal">Add New Feedback</button>
        <div class="flex items-center space-x-2">
            <input type="text" placeholder="Search..." class="border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md">
    <table class="w-full text-sm text-left text-gray-600">
        <thead class="text-xs text-white bg-blue-600 uppercase">
            <tr>
                <th class="px-6 py-3">No.</th>
                <th class="px-6 py-3">Program Name</th>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3">Rating</th>
                <th class="px-6 py-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <!-- Example Row -->
            <tr class="bg-white hover:bg-gray-50 transition-colors duration-200">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">1</td>
                <td class="px-6 py-4">Career Guidance Seminar</td>
                <td class="px-6 py-4">2024-03-15</td>
                <td class="px-6 py-4">
                    <div class="flex items-center text-yellow-400">
                        ★★★★★
                        <span class="ml-2 text-gray-600 text-sm">(5.0)</span>
                    </div>
                </td>
                <td class="px-6 py-4 flex justify-center space-x-2">
                    <button class="text-white bg-blue-500 hover:bg-blue-600 px-3 py-1.5 rounded-md transition-colors duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        View
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#editModalGuidanceProgram" class="text-white bg-green-500 hover:bg-green-600 px-3 py-1.5 rounded-md transition-colors duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Edit
                    </button>
                    <?php include 'edit_modal.php';?>
                    <button data-bs-toggle="modal" data-bs-target="#deleteModalGuidanceProgram" class="text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded-md transition-colors duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </button>
                     <?php include 'delete_modal.php';?>
                </td>
            </tr>

            <!-- Empty State -->
            <tr class="bg-white hover:bg-gray-50">
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                    No feedback submissions found
                </td>
            </tr>
        </tbody>
    </table>
</div>    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center mt-4">
        <button class="px-3 py-1 border rounded-l bg-gray-200 hover:bg-gray-300">1</button>
        <button class="px-3 py-1 border bg-gray-200 hover:bg-gray-300">2</button>
        <button class="px-3 py-1 border bg-gray-200 hover:bg-gray-300">3</button>
        <button class="px-3 py-1 border rounded-r bg-gray-200 hover:bg-gray-300">Next</button>
    </div>
</div>

        </main>
    </div>
        

 
<!--  avaScript for Sidebar Toggle --> 
    <script>
        const sidebar = document.getElementById("sidebar");
        const toggleSidebar = document.getElementById("toggleSidebar");
        const mainContent = document.getElementById("mainContent");

        toggleSidebar.addEventListener("click", () => {
            sidebar.classList.toggle("collapsed");
            mainContent.classList.toggle("expanded");
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

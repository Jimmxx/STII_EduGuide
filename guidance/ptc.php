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
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Parent & Teacher Communication</h1>
            <p class="text-gray-600 mt-1">Manage all communication records and interactions</p>
        </div>
        <button class="w-full md:w-auto px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg shadow-sm hover:shadow-md transition-all flex items-center gap-2 justify-center" data-bs-toggle="modal" data-bs-target="#addRecordModal">
            <i class="bi bi-plus-lg"></i>
            Add New Record
        </button>
    </div>
    
    <!-- Search and Filters -->
    <div class="mb-6 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
        <div class="flex flex-col md:flex-row gap-3">
            <div class="flex-1 relative">
                <input type="text" id="searchInput" class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all" placeholder="Search records...">
                <i class="bi bi-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <div class="flex items-center gap-3">
                <select class="w-full md:w-48 px-3 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                    <option>All Types</option>
                    <option>Meeting</option>
                    <option>Email</option>
                    <option>Phone Call</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px]">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Date</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Time</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Recorded By</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Type</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Participants</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Status</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-gray-700">2025-02-03</td>
                        <td class="px-6 py-4 text-gray-700">10:00 AM</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <img src="https://via.placeholder.com/32" class="w-6 h-6 rounded-full" alt="avatar">
                                <span>John Doe</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Parent-Teacher Meeting</span>
                        </td>
                        <td class="px-6 py-4 text-gray-700">Jane Smith, Mark Brown</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Completed</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 hover:bg-gray-100 rounded-lg text-blue-600 hover:text-blue-800">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="p-2 hover:bg-gray-100 rounded-lg text-red-600 hover:text-red-800">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <button class="p-2 hover:bg-gray-100 rounded-lg text-gray-600 hover:text-gray-800">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Additional rows with similar structure -->
                </tbody>
            </table>
        </div>
        
        <!-- Table Footer -->
        <div class="flex flex-col md:flex-row justify-between items-center p-4 border-t border-gray-100">
            <span class="text-sm text-gray-600 mb-2 md:mb-0">Showing 1 to 5 of 23 entries</span>
            <div class="flex gap-1">
                <button class="px-3 py-1.5 rounded-lg border border-gray-200 hover:bg-gray-100 text-gray-600">
                    Previous
                </button>
                <button class="px-3 py-1.5 rounded-lg bg-blue-500 text-white border border-blue-500">1</button>
                <button class="px-3 py-1.5 rounded-lg border border-gray-200 hover:bg-gray-100 text-gray-600">2</button>
                <button class="px-3 py-1.5 rounded-lg border border-gray-200 hover:bg-gray-100 text-gray-600">3</button>
                <button class="px-3 py-1.5 rounded-lg border border-gray-200 hover:bg-gray-100 text-gray-600">
                    Next
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Enhanced Add Record Modal -->
<div class="modal fade" id="addRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-b-0 pb-0">
                <h5 class="modal-title text-xl font-semibold">New Communication Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meeting Title</label>
                        <input type="text" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Enter meeting title">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                        <input type="time" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                    </div>
                    
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Participants</label>
                        <select multiple class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 h-32">
                            <option>Parent 1</option>
                            <option>Parent 2</option>
                            <option>Teacher 1</option>
                            <option>Teacher 2</option>
                        </select>
                    </div>
                    
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                        <textarea class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" rows="3" placeholder="Add meeting notes..."></textarea>
                    </div>
                    
                    <div class="col-span-2 flex justify-end gap-3 mt-4">
                        <button type="button" class="px-6 py-2.5 border border-gray-200 rounded-lg hover:bg-gray-50" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="px-6 py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Save Record</button>
                    </div>
                </form>
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

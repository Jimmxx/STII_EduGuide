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
    <style>
    .tab-link.active {
        color: #2563eb; /* text-blue-600 */
        border-bottom-color: #2563eb; /* border-blue-600 */
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
</head>
<body class="bg-gray-100">


    <!-- Navbar -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600 flex items-center">
            <i class="bi bi-mortarboard-fill mr-2"></i>STII EduGuide
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
                    <span class="nav-text">Parent & Teacher Communication</spa>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">📅</span>
                    <span class="nav-text">Programs & Events</span>
                </a>
                <a href="teacher.php" class="nav-item">
                    <span class="nav-icon">🧑‍🏫</span>
                    <span class="nav-text">Teacher</span>
                <!-- </a>   <a href="#" class="nav-item">
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
                    <a href="#" class="nav-item settings">
                    <span class="nav-icon">⚙️</span>
                    <span class="nav-text">Settings</span>
                </a>
                <!-- <a href="#" class="nav-item">
                    <span class="nav-icon">🔗</span>
                    <span class="nav-text">Referrals & Resources</span>
                </a> -->
                
                <!-- Settings Dropdown -->
                <!-- <a href="#" class="nav-item settings">
                    <span class="nav-icon">⚙️</span>
                    <span class="nav-text">Settings</span>
                </a> -->
            </nav>
        </aside>


        <main class="main-content bg-gray-50 p-6" id="mainContent">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Counseling Management</h1>

        <!-- Tabs -->
        <div class="flex mb-6 border-b border-gray-200">
        <button data-tab-target="#individual" class="tab-link px-6 py-3 text-lg font-medium text-gray-500 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 active">Individual Counseling</button>
        <button data-tab-target="#group" class="tab-link px-6 py-3 text-lg font-medium text-gray-500 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600">Group Counseling</button>
        </div>

        <!-- Individual Counseling Tab -->
        <div id="individual" class="tab-content hidden">
            <div class="flex justify-between items-center mb-4">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center" onclick="openModal()">
                      <i class="bi bi-plus-circle mr-2"></i>New Session
                    </button>
                <div class="relative">
                    <input type="text" placeholder="Search students..." class="w-64 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="bi bi-search absolute right-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Student Name</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Counseling Type</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Example Row -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-800">Juan Dela Cruz</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">Academic</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">2024-03-15</td>
                            <td class="px-6 py-4">
                                <button class="text-blue-600 hover:text-blue-800 mr-4" data-bs-toggle="modal" data-bs-target="#sessionDetailModal">
                                    <i class="bi bi-eye-fill"></i> View
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- More rows... -->
                    </tbody>
                </table>
            </div>
        </div>

<!-- Modal -->
<div id="studentModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Search Student</h2>
        <input type="text" id="searchInput" placeholder="Search student..." class="w-full p-2 border rounded mb-4" onkeyup="filterStudents()">
        <ul id="studentList" class="max-h-40 overflow-y-auto">
            <li class="p-2 border-b cursor-pointer hover:bg-gray-100" onclick="selectStudent(this)">John Doe</li>
            <li class="p-2 border-b cursor-pointer hover:bg-gray-100" onclick="selectStudent(this)">Jane Smith</li>
            <li class="p-2 border-b cursor-pointer hover:bg-gray-100" onclick="selectStudent(this)">Michael Brown</li>
        </ul>
        <button class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="closeModal()">Close</button>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('studentModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('studentModal').classList.add('hidden');
}

function filterStudents() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let students = document.querySelectorAll('#studentList li');
    
    students.forEach(student => {
        if (student.textContent.toLowerCase().includes(input)) {
            student.style.display = "block";
        } else {
            student.style.display = "none";
        }
    });
}

function selectStudent(element) {
    alert('Selected Student: ' + element.textContent);
}
</script>


        <!-- Group Counseling Tab -->
        <div id="group" class="tab-content hidden">
            <div class="flex justify-between items-center mb-4">
                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 flex items-center" data-bs-toggle="modal" data-bs-target="#addGroupModal" onclick="window.location='group_counseling.php'">
                    <i class="bi bi-people-fill mr-2"></i>New Group
                </button>
                <div class="relative">
                    <input type="text" placeholder="Search groups..." class="w-64 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="bi bi-search absolute right-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Group Name</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Approach</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Example Row -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm font-medium text-gray-800">Grade 11 Career Planning</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Workshop Series</td>
                            <td class="px-6 py-4 text-sm text-gray-600">2024-03-20</td>
                            <td class="px-6 py-4">
                                <button class="text-blue-600 hover:text-blue-800 mr-4" data-bs-toggle="modal" data-bs-target="#groupDetailModal">
                                    <i class="bi bi-eye-fill"></i> View
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- More rows... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Individual Session Detail Modal -->
<div class="modal fade" id="sessionDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-xl">
            <div class="modal-header bg-blue-600 text-white rounded-t-xl">
                <h5 class="modal-title">Session Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Student Name</label>
                        <p class="text-gray-900">Juan Dela Cruz</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <p class="text-gray-900">March 15, 2024</p>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Session Notes</label>
                        <p class="text-gray-900">Student showed improvement in time management skills. Recommended follow-up session in 2 weeks.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Counseling Type</label>
                        <p class="text-gray-900">Academic Counseling</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Outcome</label>
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full">Successful</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Group Session Detail Modal -->
<div class="modal fade" id="groupDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-xl">
            <div class="modal-header bg-green-600 text-white rounded-t-xl">
                <h5 class="modal-title">Group Session Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Group Name</label>
                        <p class="text-gray-900 font-medium">Grade 11 Career Planning Workshop</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <p class="text-gray-900">March 20, 2024</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Participants</label>
                        <p class="text-gray-900">25 students</p>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Approach</label>
                        <p class="text-gray-900">Interactive workshop with career assessment activities</p>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Session Notes</label>
                        <p class="text-gray-900">Group engaged well with material. Follow-up session scheduled for resume writing skills.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tab Switching Functionality
    document.querySelectorAll('.tab-link').forEach(button => {
        button.addEventListener('click', () => {
            const target = document.querySelector(button.dataset.tabTarget);
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            // Remove active class from all buttons
            document.querySelectorAll('.tab-link').forEach(btn => {
                btn.classList.remove('active');
            });
            // Show target tab and set button as active
            target.classList.remove('hidden');
            button.classList.add('active');
        });
    });

    // Initialize first tab as active
    document.querySelector('.tab-link').click();
</script>
    </div>
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

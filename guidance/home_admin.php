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
            position: relative; /* Added for dropdown positioning */
        }

        .nav-item:hover {
            background-color: #34495e;
        }

        .nav-icon {
            margin-right: 10px;
        }

        /* Dropdown Styles */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
        }

        .nav-item.settings:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
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
            <span style="margin-left: 20px;">Settings</span>
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

                <a href="ptc.php" class="nav-item">
                    <span class="nav-icon">👨‍👩‍👧‍👦</span>
                    <span class="nav-text">Parent & Teacher Communication</spa>
                </a>
                <a href="event.php" class="nav-item">
                    <span class="nav-icon">📅</span>
                    <span class="nav-text">Programs & Events</span>
                </a>
                <a href="teacher.php" class="nav-item">
                    <span class="nav-icon">🧑‍🏫</span>
                    <span class="nav-text">Teacher</span>
                </a>   <a href="#" class="nav-item">
                    <span class="nav-icon">⚠️</span>
                    <span class="nav-text">Crisis Management</span>
                </a>
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
                <a href="#" class="nav-item settings">
                    <span class="nav-icon">⚙️</span>
                    <span class="nav-text">Settings</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content bg-gray-50 p-6" id="mainContent">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Students Counseled -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-gray-500 text-lg font-medium">Total Students Counseled</h3>
                    <p class="text-4xl font-bold text-green-600 mt-4">200</p>
                </div>

                <!-- Pending Appointments -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-gray-500 text-lg font-medium">Pending Appointments</h3>
                    <p class="text-4xl font-bold text-green-600 mt-4">5</p>
                </div>

                <!-- Referrals Made -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-gray-500 text-lg font-medium">Referrals Made</h3>
                    <p class="text-4xl font-bold text-green-600 mt-4">3</p>
                </div>

                <!-- Sessions Completed -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-gray-500 text-lg font-medium">Sessions Completed</h3>
                    <p class="text-4xl font-bold text-green-600 mt-4">10</p>
                </div>

                <!-- Programs/Events -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-gray-500 text-lg font-medium">Programs/Events</h3>
                    <p class="text-4xl font-bold text-green-600 mt-4">200</p>
                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript for Sidebar Toggle -->
    <script>
        const sidebar = document.getElementById("sidebar");
        const toggleSidebar = document.getElementById("toggleSidebar");
        const mainContent = document.getElementById("mainContent");

        toggleSidebar.addEventListener("click", () => {
            sidebar.classList.toggle("collapsed");
            mainContent.classList.toggle("expanded");
        });
    </script>

</body>
</html>

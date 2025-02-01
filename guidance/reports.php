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
                <a href="#" class="nav-item">
                    <span class="nav-icon">🏠</span>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">👨‍🎓</span>
                    <span class="nav-text">Student Profiling</span>
                </a>
                <a href="counseling.php" class="nav-item">
                    <span class="nav-icon">🗂️</span>
                    <span class="nav-text">Counseling</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">📚</span>
                    <span class="nav-text">Academic & Career Planning</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">📊</span>
                    <span class="nav-text">Reports and Evaluation</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">👨‍👩‍👧‍👦</span>
                    <span class="nav-text">Parent & Teacher Communication</spa>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">📅</span>
                    <span class="nav-text">Programs & Events</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">⚖️</span>
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
            <div class="p-6">
                <h1 class="text-2xl font-bold text-center mb-6">Teachers</h1>

                <!-- Add students reports and -->
                <div class="flex justify-between items-center mb-4">
                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" data-bs-toggle="modal" data-bs-target="#addTeacherModal">Add Student Report</button>
                    <div class="flex items-center space-x-2">
                        <input type="text" placeholder="Search..." class="border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
                    </div>
                </div>

                <!-- Teacher Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">No.</th>
                                <th class="border border-gray-300 px-4 py-2">Student Name</th>
                                <th class="border border-gray-300 px-4 py-2">Academic Performance</th>
                                <th class="border border-gray-300 px-4 py-2">Attendance (%)</th>
                                <th class="border border-gray-300 px-4 py-2">Behavior</th>
                                <th class="border border-gray-300 px-4 py-2">Counselor Comments</th>
                                <th class="border border-gray-300 px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Teacher Rows -->
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                                <td class="border border-gray-300 px-4 py-2">John Smith</td>
                                <td class="border border-gray-300 px-4 py-2">john.smith@example.com</td>
                                <td class="border border-gray-300 px-4 py-2">Mathematics</td>
                                <td class="border border-gray-300 px-4 py-2">Admin123</td>
                                <td class="border border-gray-300 px-4 py-2">Admin123</td>
                                <td class="border border-gray-300 px-4 py-2">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600" data-bs-toggle="modal" data-bs-target="#editTeacherModal">Edit</button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" data-bs-toggle="modal" data-bs-target="#delete">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center mt-4">
                    <button class="px-3 py-1 border rounded-l bg-gray-200 hover:bg-gray-300">1</button>
                    <button class="px-3 py-1 border bg-gray-200 hover:bg-gray-300">2</button>
                    <button class="px-3 py-1 border bg-gray-200 hover:bg-gray-300">3</button>
                    <button class="px-3 py-1 border rounded-r bg-gray-200 hover:bg-gray-300">Next</button>
                </div>
            </div>
        </main>

        <!-- Add Student report Modal -->
        <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTeacherModalLabel">Add Student Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="teacherName" class="form-label">Student Name</label>
                                <input type="text" class="form-control" id="teacherName" placeholder="Enter teacher's full name" required>
                            </div>
                            <div class="mb-3">
                                <label for="teacherEmail" class="form-label">Academic Performance</label>
                                <select class="form-select" aria-label="Default select example">
                                <option selected>Select</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="A+">A+</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="teacherDepartment" class="form-label">Attendance (%)</label>
                                <input type="text" class="form-control" id="teacherDepartment" placeholder="Enter Student Attendance Percentage" required>
                            </div>
                            <div class="mb-3">
                                <label for="teacherPassword" class="form-label">Behavior</label>
                                <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Need's Improvement">Need's Improvement</option>
                            </select>                      
                              </div>
                            <div class="mb-3">
                                <label for="teacherPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="teacherPassword" placeholder="Enter teacher's password" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Student</button>
                    </div>
                </div>
            </div>
        </div>

                <!-- Edit Student Report Modal -->
                <div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTeacherModalLabel">Edit Student Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <form>
                            <div class="mb-3">
                                <label for="teacherName" class="form-label">Student Name</label>
                                <input type="text" class="form-control" id="teacherName" placeholder="Enter teacher's full name" required>
                            </div>
                            <div class="mb-3">
                                <label for="teacherEmail" class="form-label">Academic Performance</label>
                                <select class="form-select" aria-label="Default select example">
                                <option selected>Select</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="A+">A+</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="teacherDepartment" class="form-label">Attendance (%)</label>
                                <input type="text" class="form-control" id="teacherDepartment" placeholder="Enter Student Attendance Percentage" required>
                            </div>
                            <div class="mb-3">
                                <label for="teacherPassword" class="form-label">Behavior</label>
                                <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Need's Improvement">Need's Improvement</option>
                            </select>                      
                              </div>
                            <div class="mb-3">
                                <label for="teacherPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="teacherPassword" placeholder="Enter teacher's password" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Teacher</button>
                    </div>
                </div>
            </div>
        </div>

        </main>
    </div>
<!-- Delete Permisson -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Permisson</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-floating mb-3">
  <input type="Password" class="form-control" id="floatingInput" placeholder="">
  <label for="floatingInput">Password</label>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Done</button>
      </div>
    </div>
  </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

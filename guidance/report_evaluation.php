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
                <h5 class="modal-title" id="referral" >Add Referral</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="referralName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="referralName" placeholder="Enter full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="referralReason" class="form-label">Reason for Referral</label>
                        <textarea class="form-control" id="referralReason" rows="3" placeholder="Enter reason for referral" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="referrerName" class="form-label">Referrer</label>
                        <input type="text" class="form-control" id="referrerName" placeholder="Enter referrer name" required>
                    </div>
                    <div class="mb-3">
                        <label for="referralDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="referralDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="referralNote" class="form-label">Note</label>
                        <textarea class="form-control" id="referralNote" rows="3" placeholder="Additional notes (optional)"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Referral</button>
            </div>
        </div>
    </div>
</div>

    <!-- Navbar -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600 flex items-center">
            <i class="bi bi-mortarboard-fill mr-2"></i>STII EduGuide
        </h1>        <div class="flex items-center space-x-4">
            <span class="text-gray-800 font-medium">Warren Duran</span>
            <img src="https://via.placeholder.com/40" alt="Profile Picture" class="w-10 h-10 rounded-full border-2 border-green-600">
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
                <a href="student_profiling.php" class="nav-item">
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
                <a href="report_evaluation.php" class="nav-item">
                    <span class="nav-icon">📊</span>
                    <span class="nav-text">Reports and Evaluation</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">👨‍👩‍👧‍👦</span>
                    <span class="nav-text">Parent & Teacher Communication</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">📅</span>
                    <span class="nav-text">Programs & Events</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">⚖️</span>
                    <span class="nav-text">Compliance & Legal</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">🔗</span>
                    <span class="nav-text">Referrals & Resources</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">⚠️</span>
                    <span class="nav-text">Crisis Management</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">🛠️</span>
                    <span class="nav-text">Administrative Task</span>
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
    <h1 class="text-2xl font-bold text-center mb-6">Reports and Evaluation</h1>

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
        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" data-bs-toggle="modal" data-bs-target="#addReferralModal">Add</button>
        <div class="flex items-center space-x-2">
            <input type="text" placeholder="Search..." class="border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">No.</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Reason for Referral</th>
                    <th class="border border-gray-300 px-4 py-2">Referrer</th>
                    <th class="border border-gray-300 px-4 py-2">Date</th>
                    <th class="border border-gray-300 px-4 py-2">Note</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Empty Rows -->
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewReferralModal">View</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">2</td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2"></td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">View</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
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
    </div>
    <!-- View Referral Modal -->
    <div class="modal fade" id="viewReferralModal" tabindex="-1" aria-labelledby="viewReferralModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewReferralModalLabel">Referral Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item"  >
                            <a class="nav-link active" data-bs-toggle="tab" href="#referralDetails">Referral Details</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" data-bs-toggle="tab" href="#actionPlan">Action Plan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#progressTracking">Progress Tracking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#guidanceCounseling">Group Counseling</a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content mt-4">
                        <!-- Referral Details -->
                        <div class="tab-pane fade show active" id="referralDetails">
                            <p><strong>Name:</strong> Jane Doe</p>
                            <p><strong>Reason for Referral:</strong> Academic difficulties</p>
                            <p><strong>Referrer:</strong> Teacher</p>
                            <p><strong>Date:</strong> 2025-01-20</p>
                            <p><strong>Note:</strong> Needs tutoring</p>
                        </div>

                        <!-- Action Plan -->
                        <div class="tab-pane fade" id="actionPlan">
                            <h6>Action Plans</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Goals</th>
                                        <th>Action Steps</th>
                                        <th>Deadline</th>
                                        <th>Assigned Counselor</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Improve GPA</td>
                                        <td>Weekly tutoring</td>
                                        <td>2025-02-15</td>
                                        <td>Mrs. Johnson</td>
                                        <td>
                                            <button class="btn btn-primary">Edit</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success">Add Action Plan</button>
                        </div>

                        <!-- Progress Tracking -->
                        <div class="tab-pane fade" id="progressTracking">
                            <h6>Progress Tracking</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Session Date</th>
                                        <th>Counselor Notes</th>
                                        <th>Outcomes</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2025-01-21</td>
                                        <td>Focused on math improvement</td>
                                        <td>Showed better engagement</td>
                                        <td>
                                            <button class="btn btn-primary">Edit</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success">Add Progress</button>
                        </div>

                        <!-- Guidance Counseling -->
                        <div class="tab-pane fade" id="guidanceCounseling">
                            <h6>Group Counseling</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Topic</th>
                                        <th>Session Date</th>
                                        <th>Attendance</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Stress Management</td>
                                        <td>2025-01-25</td>
                                        <td>10 Students</td>
                                        <td>
                                            <button class="btn btn-primary">Edit</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success">Add Counseling</button>
                        </div>
                    </div>
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

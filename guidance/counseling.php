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
                <a href="teacher.php" class="nav-item">
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
    <h1 class="text-2xl font-bold text-center mb-6">Counseling</h1>

    <!-- Tabs
    <div class="flex justify-center space-x-6 mb-6">
        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Referral</button>
        <button class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300"><a href="action_plan.php"> Action Plan </a></button>
        <button class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300"><a href="progress_tracking.php"> Progress Tracking</a></button>
        <button class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300"><a href="guidance_counseling"> Guidance Counseling</a></button>
    </div> -->
    <h1 class="text-2xl font-bold mb-6">Referral</h1>
    <!-- Search and Add Referral -->
    <div class="flex justify-between items-center mb-4">
        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" data-bs-toggle="modal" data-bs-target="#addReferralModal">Add Referral</button>
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
<!-- View Referral Modal - Wider Version -->
<div class="modal fade" id="viewReferralModal" tabindex="-1" aria-labelledby="viewReferralModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl"> <!-- Changed to modal-xl for extra large size -->
        <div class="modal-content" style="min-height: 80vh;"> <!-- Increased minimum height -->
            <div class="modal-header bg-primary text-white py-3">
                <h5 class="modal-title fs-4" id="viewReferralModalLabel">
                    <i class="bi bi-person-lines-fill me-2"></i>Student Referral Details: Jane Doe
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-4">
                <!-- Full-width Tab Navigation -->
                <ul class="nav nav-pills mb-4 gap-2">
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link active d-flex align-items-center justify-content-center py-3" data-bs-toggle="tab" href="#referralDetails">
                            <i class="bi bi-info-circle fs-5 me-2"></i>Basic Details
                        </a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link d-flex align-items-center justify-content-center py-3" data-bs-toggle="tab" href="#actionPlan">
                            <i class="bi bi-list-task fs-5 me-2"></i>Action Plans
                        </a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link d-flex align-items-center justify-content-center py-3" data-bs-toggle="tab" href="#progressTracking">
                            <i class="bi bi-graph-up fs-5 me-2"></i>Progress
                        </a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link d-flex align-items-center justify-content-center py-3" data-bs-toggle="tab" href="#guidanceCounseling">
                            <i class="bi bi-people-fill fs-5 me-2"></i>Group Sessions
                        </a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Referral Details - Wider Layout -->
                    <div class="tab-pane fade show active" id="referralDetails">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <div class="card h-100">
                                    <div class="card-header bg-primary text-white">
                                        <h6 class="mb-0"><i class="bi bi-file-text me-2"></i>Case Overview</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label text-muted small mb-1">Referral Date</label>
                                                <p class="mb-3">January 20, 2025</p>
                                                
                                                <label class="form-label text-muted small mb-1">Referrer</label>
                                                <p class="mb-3">Ms. Sarah Johnson (Math Teacher)</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-muted small mb-1">Priority Level</label>
                                                <p><span class="badge bg-warning">Medium Priority</span></p>
                                                
                                                <label class="form-label text-muted small mb-1">Case Status</label>
                                                <p><span class="badge bg-success">Active</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-header bg-primary text-white">
                                        <h6 class="mb-0"><i class="bi bi-chat-left-text me-2"></i>Quick Notes</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small mb-1">Primary Concerns</label>
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-arrow-right-short text-primary"></i>Math Performance</li>
                                                <li><i class="bi bi-arrow-right-short text-primary"></i>Homework Completion</li>
                                                <li><i class="bi bi-arrow-right-short text-primary"></i>Class Participation</li>
                                            </ul>
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label text-muted small mb-1">Last Updated</label>
                                            <p class="mb-0">February 1, 2025 by Dr. Smith</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Plan - Wider Table -->
                    <div class="tab-pane fade" id="actionPlan">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-primary mb-0"><i class="bi bi-list-task me-2"></i>Active Plans</h4>
                            <button class="btn btn-primary btn-lg">
                                <i class="bi bi-plus-circle me-2"></i>Add New Plan
                            </button>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th style="width: 20%">Goal</th>
                                        <th style="width: 25%">Action Steps</th>
                                        <th style="width: 15%">Timeline</th>
                                        <th style="width: 15%">Responsible</th>
                                        <th style="width: 10%">Status</th>
                                        <th style="width: 10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Improve Math Grades</td>
                                        <td>Twice-weekly tutoring sessions</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <small class="text-muted">Start: Jan 25</small>
                                                <small class="text-muted">End: Mar 15</small>
                                            </div>
                                        </td>
                                        <td>Mrs. Johnson</td>
                                        <td><span class="badge bg-warning">Ongoing</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Progress Tracking - Wider Layout -->
                    <div class="tab-pane fade" id="progressTracking">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <!-- Progress Table -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="text-primary mb-0"><i class="bi bi-graph-up me-2"></i>Progress Timeline</h4>
                                    <button class="btn btn-primary btn-lg">
                                        <i class="bi bi-plus-circle me-2"></i>Add Entry
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <!-- Table content similar to action plan -->
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Progress Summary Card -->
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-white">
                                        <h6 class="mb-0"><i class="bi bi-speedometer2 me-2"></i>Progress Overview</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h3 class="text-primary">65%</h3>
                                            <p class="text-muted small">Overall Progress</p>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-primary" style="width: 65%"></div>
                                            </div>
                                        </div>
                                        <div class="mb-0">
                                            <p class="text-muted small mb-1">Next Milestone:</p>
                                            <h5 class="text-primary">March 1, 2025</h5>
                                            <p class="small">Mid-term assessment deadline</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Group Counseling - Wider Layout -->
                    <div class="tab-pane fade" id="guidanceCounseling">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <!-- Sessions Table -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="text-primary mb-0"><i class="bi bi-people-fill me-2"></i>Scheduled Sessions</h4>
                                    <button class="btn btn-primary btn-lg">
                                        <i class="bi bi-plus-circle me-2"></i>Add Session
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <!-- Table content similar to previous sections -->
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Upcoming Sessions Card -->
                                <div class="card border-info">
                                    <div class="card-header bg-info text-white">
                                        <h6 class="mb-0"><i class="bi bi-calendar-event me-2"></i>Next Session</h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="text-info">Feb 15, 2025</h4>
                                        <p class="text-muted small">Time: 2:00 PM - 3:30 PM</p>
                                        <div class="mb-3">
                                            <p class="text-muted small mb-1">Participants:</p>
                                            <span class="badge bg-info me-1">Jane Doe</span>
                                            <span class="badge bg-info me-1">John Smith</span>
                                            <span class="badge bg-info">+8 more</span>
                                        </div>
                                        <button class="btn btn-outline-info w-100">
                                            <i class="bi bi-eye me-2"></i>View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Close
                </button>
                <button type="button" class="btn btn-primary btn-lg">
                    <i class="bi bi-save me-2"></i>Save All Changes
                </button>
            </div>
        </div>
    </div>
</div>    <!-- JavaScript for Sidebar Toggle -->
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

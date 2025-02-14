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
        <h1 class="text-2xl font-bold mb-6 text-center">Student Profiling</h1>
        
        <!-- Search and Add Student -->
        <div class="flex justify-between items-center mb-4">
    <div class="flex items-center space-x-2 ml-auto"> <!-- Added ml-auto to push to right -->
        <input type="text" placeholder="Search..." class="border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
    </div>
</div>

        <!-- Student Table -->
        <div class="overflow-x-auto rounded-lg shadow-md">
    <table class="min-w-full border-collapse bg-white">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-200 px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">No.</th>
                <th class="border border-gray-200 px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Full Name</th>
                <th class="border border-gray-200 px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Student ID</th>
                <th class="border border-gray-200 px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Grade Level</th>
                <th class="border border-gray-200 px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Strand</th>
                <th class="border border-gray-200 px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Birthdate</th>
                <th class="border border-gray-200 px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Contact</th>
                <th class="border border-gray-200 px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                <td class="border border-gray-200 px-6 py-4 text-sm text-gray-700 text-center">1</td>
                <td class="border border-gray-200 px-6 py-4 text-sm text-gray-700">John Doe</td>
                <td class="border border-gray-200 px-6 py-4 text-sm text-gray-700">2025001</td>
                <td class="border border-gray-200 px-6 py-4 text-sm text-gray-700">Grade 12</td>
                <td class="border border-gray-200 px-6 py-4 text-sm text-gray-700">STEM</td>
                <td class="border border-gray-200 px-6 py-4 text-sm text-gray-700">2005-06-15</td>
                <td class="border border-gray-200 px-6 py-4 text-sm text-gray-700">+1 234 567 890</td>
                <td class="border border-gray-200 px-6 py-4 text-sm text-center">
                    <button data-bs-toggle="modal" data-bs-target="#viewDetailsModal" class="bg-blue-500 text-white px-3 py-1.5 rounded-md hover:bg-blue-600 transition duration-150 ease-in-out flex items-center justify-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        View
                    </button>
                </td>
            </tr>
            <!-- Additional rows can be added here -->
        </tbody>
    </table>
</div>    
</main>

</div>
<!--view  Modal -->
<div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-blue-500 text-white">
                <h5 class="modal-title" id="viewDetailsModalLabel">Personal Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<!-- Personal Information Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Personal Information
    </div>
    <div class="card-body">
        <div class="row g-3 justify-content-between">
            <!-- First Name -->
            <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">First Name</div>
                <div class="fw-bold">Juan</div>
            </div>
            
            <!-- Middle Name -->
            <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">Middle Name</div>
                <div class="fw-bold">Santos</div>
            </div>
            
            <!-- Last Name -->
            <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">Last Name</div>
                <div class="fw-bold">Dela Cruz</div>
            </div>
            
            <!-- Suffix -->
            <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">Suffix</div>
                <div class="fw-bold">Jr.</div>
            </div>
            
            <!-- Age -->
            <div class="col-auto flex-grow-1 text-truncate">
                <div class="text-secondary small">Age</div>
                <div class="fw-bold">34</div>
            </div>
        </div>
    </div>
</div>
                <!-- Basic Information Section -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Basic Information
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-3">
                                <div class="text-secondary small">Date of Birth</div>
                                <div class="fw-bold">January 1, 1990</div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-secondary small">Gender</div>
                                <div class="fw-bold">Male</div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-secondary small">Citizenship</div>
                                <div class="fw-bold">Filipino</div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-secondary small">Status</div>
                                <div class="fw-bold">Single</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information Section -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Additional Information
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="text-secondary small">Religious Affiliation</div>
                                <div class="fw-bold">Roman Catholic</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-secondary small">Tribe</div>
                                <div class="fw-bold">Tagalog</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-secondary small">Province</div>
                                <div class="fw-bold">Cavite</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information Section -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Address Information
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="text-secondary small">Town/Municipality</div>
                                <div class="fw-bold">Imus</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-secondary small">Barangay</div>
                                <div class="fw-bold">Bucandala</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-secondary small">Zipcode</div>
                                <div class="fw-bold">4103</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Contact Information
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="text-secondary small">Mobile Number</div>
                                <div class="fw-bold">+63 912 345 6789</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Email Address</div>
                                <div class="fw-bold">juan.delacruz@example.com</div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-secondary small">Number of Siblings</div>
                                <div class="fw-bold">3</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program Membership -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Program Membership
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="text-secondary small">4P's Member</div>
                                <div class="fw-bold">Yes</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">IP's Member</div>
                                <div class="fw-bold">No</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Attendance Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Attendance Records
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>Month</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dec</th>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">School Days</td>
                        <td>20</td>
                        <td>22</td>
                        <td>20</td>
                        <td>21</td>
                        <td>23</td>
                        <td>20</td>
                        <td>19</td>
                        <td>20</td>
                        <td>19</td>
                        <td>22</td>
                        <td>20</td>
                        <td class="fw-bold">245</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Days Present</td>
                        <td>18</td>
                        <td>20</td>
                        <td>19</td>
                        <td>20</td>
                        <td>22</td>
                        <td>19</td>
                        <td>18</td>
                        <td>19</td>
                        <td>18</td>
                        <td>21</td>
                        <td>19</td>
                        <td class="fw-bold">232</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Days Absent</td>
                        <td>2</td>
                        <td>2</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td class="fw-bold">13</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Family Information Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Family Information
    </div>
    <div class="card-body">
        <div class="row g-4">
            <!-- Father's Information -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Father's Details
                    </div>
                    <div class="card-body">
                        <dl class="mb-0">
                            <dt>Name</dt>
                            <dd>Juan Dela Cruz</dd>
                            
                            <dt>Occupation</dt>
                            <dd>Engineer</dd>
                            
                            <dt>Address</dt>
                            <dd>123 Main Street, City</dd>
                            
                            <dt>Contact</dt>
                            <dd>+63 912 345 6789</dd>
                            
                            <dt>Income</dt>
                            <dd>₱45,000/month</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Mother's Information -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-success text-white">
                        Mother's Details
                    </div>
                    <div class="card-body">
                        <dl class="mb-0">
                            <dt>Name</dt>
                            <dd>Maria Dela Cruz</dd>
                            
                            <dt>Occupation</dt>
                            <dd>Teacher</dd>
                            
                            <dt>Address</dt>
                            <dd>123 Main Street, City</dd>
                            
                            <dt>Contact</dt>
                            <dd>+63 917 654 3210</dd>
                            
                            <dt>Income</dt>
                            <dd>₱35,000/month</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Guardian's Information -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-info text-white">
                        Guardian's Details
                    </div>
                    <div class="card-body">
                        <dl class="mb-0">
                            <dt>Name</dt>
                            <dd>Pedro Santos</dd>
                            
                            <dt>Occupation</dt>
                            <dd>Business Owner</dd>
                            
                            <dt>Address</dt>
                            <dd>456 Oak Street, City</dd>
                            
                            <dt>Contact</dt>
                            <dd>+63 918 765 4321</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Previous School Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Previous School Information
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-md-6">
                <dl>
                    <dt>School Name</dt>
                    <dd>City National High School</dd>
                    
                    <dt>Address</dt>
                    <dd>789 Education Road, City</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt>Completion Year</dt>
                    <dd>2022</dd>
                    
                    <dt>Transfer Reason</dt>
                    <dd>Family relocation</dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<!-- Documents Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Attached Documents
    </div>
    <div class="card-body">
        <dl>
            <dt>School Card</dt>
            <dd>
                <span class="badge bg-primary">school_card_2023.pdf</span>
                <small class="text-muted ms-2">Uploaded: 2023-08-15</small>
            </dd>
        </dl>
    </div>
</div>

            </div>
            <div class="modal-footer"> 
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-600"
        onclick="window.location.href='individual_counseling.php'">
    <i class="bi bi-person-bounding-box"></i> Start Counseling
</button>
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

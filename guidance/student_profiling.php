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
                <a href="#" class="nav-item">
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
                <a href="teacher.php" class="nav-item">
                    <span class="nav-icon">⚖️</span>
                    <span class="nav-text">Teacher</span>
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
        <h1 class="text-2xl font-bold mb-6 text-center">Student Profiling</h1>
        
        <!-- Search and Add Student -->
        <div class="flex justify-between items-center mb-4">
    <div class="flex items-center space-x-2 ml-auto"> <!-- Added ml-auto to push to right -->
        <input type="text" placeholder="Search..." class="border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
    </div>
</div>

        <!-- Student Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">No.</th>
                        <th class="border border-gray-300 px-4 py-2">Full Name</th>
                        <th class="border border-gray-300 px-4 py-2">Student ID</th>
                        <th class="border border-gray-300 px-4 py-2">Grade Level</th>
                        <th class="border border-gray-300 px-4 py-2">Strand</th>
                        <th class="border border-gray-300 px-4 py-2">Birthdate</th>
                        <th class="border border-gray-300 px-4 py-2">Contact</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                        <td class="border border-gray-300 px-4 py-2">John Doe</td>
                        <td class="border border-gray-300 px-4 py-2">2025001</td>
                        <td class="border border-gray-300 px-4 py-2">Grade 12</td>
                        <td class="border border-gray-300 px-4 py-2">STEM</td>
                                                <td class="border border-gray-300 px-4 py-2">2005-06-15</td>
                        <td class="border border-gray-300 px-4 py-2">+1 234 567 890</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                        <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600" data-bs-toggle="modal" data-bs-target="#viewDetailsModal">View</button>
                         <!-- <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button> -->
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
<!-- Guidance Records Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Guidance Records
    </div>
    <div class="card-body">
        <!-- Counseling Sessions -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                Counseling Sessions
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Counselor</th>
                                <th>Outcome</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-03-15</td>
                                <td>Academic</td>
                                <td>Ms. Rodriguez</td>
                                <td>Improved study plan created</td>
                            </tr>
                            <tr>
                                <td>2023-06-22</td>
                                <td>Behavioral</td>
                                <td>Mr. Thompson</td>
                                <td>Conflict resolution session</td>
                            </tr>
                            <tr>
                                <td>2023-09-10</td>
                                <td>Career</td>
                                <td>Ms. Gomez</td>
                                <td>University options discussed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Behavioral Observations -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                Behavioral Observations
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">2023-04-05</div>
                        <div class="timeline-content">
                            <h6>Positive Behavior</h6>
                            <p>Showed leadership during group activities</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">2023-07-12</div>
                        <div class="timeline-content">
                            <h6>Class Participation</h6>
                            <p>Improved engagement in classroom discussions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Progress Tracking -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Academic Progress
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <dl>
                            <dt>Mathematics</dt>
                            <dd>Grade improved from 85 to 92</dd>
                            <dt>Science</dt>
                            <dd>Consistent 90+ average</dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl>
                            <dt>English</dt>
                            <dd>Reading level increased by 2 grades</dd>
                            <dt>Social Studies</dt>
                            <dd>Improved participation in class debates</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parent-Teacher Meetings -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                Parent-Teacher Conferences
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6>2023-05-10 Meeting</h6>
                                <p class="mb-0">Discussed academic performance and study habits</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6>2023-08-22 Meeting</h6>
                                <p class="mb-0">Addressed classroom behavior improvements</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Intervention Plans -->
        <div class="card">
            <div class="card-header bg-danger text-white">
                Intervention Programs
            </div>
            <div class="card-body">
                <dl>
                    <dt>Reading Enhancement</dt>
                    <dd>Completed 20-week program (2023-01 to 2023-05)</dd>
                    <dt>Peer Mentoring</dt>
                    <dd>Active participation since 2023-06</dd>
                    <dt>Status</dt>
                    <dd><span class="badge bg-success">Active</span> Math Tutoring Program</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Panel - STII EduGuide</title>
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
            background-color:  #2c3e50;
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
        .student-checkbox{
            height: 40px;
            width: 40px;
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
                <a href="home_teacher.php" class="nav-item">
                    <span class="nav-icon">🏠</span>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">👨‍🎓</span>
                    <span class="nav-text">Student Profiling</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">⚙️</span>
                    <span class="nav-text">Settings</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content bg-gray-50 p-6" id="mainContent">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h1 class="text-2xl font-bold mb-6 text-center">Student Details</h1>
            
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



                   <!-- Attendance -->
                   <div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px;margin-top:30px;">
    <h6 style="margin: 0; color: black; font-weight: bold;">Attendance</h6>
</div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
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
                                    <td>No. of School Days</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td>No. of Days Present</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control"/></td>
                                    <td><input type="number" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td>No. of Days Absent</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                </tr>
                            </tbody>
                        </table>
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

        


<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-secondary me-2" onclick="window.location='student_profiling_teacher.php'">
        Close
    </button>
    <button class="btn btn-primary" >
        Edit
    </button>
</div>


</div>
                    </main>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

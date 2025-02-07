<?php 
include 'conn.php';

// Fetch all departments from the database
$departmentOptions = "";
$result = $conn->query("SELECT name FROM departments ORDER BY name ASC");
while ($row = $result->fetch_assoc()) {
    $departmentName = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
$departmentOptions .= "<option value='{$departmentName}'>{$departmentName}</option>";

}

// Fetch all subjects (Strands/Courses) from the database
$strandOptions = "";
$result = $conn->query("SELECT name FROM subjects ORDER BY name ASC");
while ($row = $result->fetch_assoc()) {
    $strandOptions .= "<option value='{$row['name']}'>{$row['name']}</option>";
}
?>

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
 
    /* Style disabled select elements to appear gray */
    select:disabled {
      background-color: #e9ecef !important;
      color: #6c757d;
      cursor: not-allowed;
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
                <a href="student_profiling_teacher.php" class="nav-item">
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
        <h1 class="text-2xl font-bold mb-6 text-center">Add Student</h1>
<form method="post" action="data_insertion.php">
        <div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center; margin-bottom: 10px;">
    <h6 style="margin: 0; color: black; font-weight: bold;">Personal Information</h6>
</div>
<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
    <div class="col-md-3" >
        <label for="firstName" class="form-label mb-2" style="font-weight: bold;">First Name</label>
        <input type="text" class="form-control py-2" id="firstName" name="s_firstname" placeholder="Enter first name" required style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
        <label for="middleName" class="form-label mb-2" style="font-weight: bold;" >Middle Name</label>
        <input type="text" class="form-control py-2" id="middleName" placeholder="Enter middle name" name="s_middlename" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label mb-2" style="font-weight: bold;"> Last Name</label>
        <input type="text" class="form-control py-2" id="lastName" name="s_lastname"placeholder="Enter last name" required style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
        <label for="suffix" class="form-label mb-2" style="font-weight: bold;" >Suffix</label>
        <select class="form-select py-2" id="suffix" style="border: 2px solid #333; background-color: #f8f9fa;" name="s_suffix">
            <option value="" selected>None</option>
            <option value="Jr.">Jr.</option>
            <option value="Sr.">Sr.</option>
            <option value="III">III</option>
            <option value="IV">IV</option>
        </select>
    </div>
</div>
<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
    <div class="col-md-3">
        <label for="dob" class="form-label mb-2" style="font-weight: bold;" >Date of Birth</label>
        <input type="date" class="form-control py-2" id="dob" name="s_dob" required style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
        <label for="gender" class="form-label mb-2" style="font-weight: bold;">Gender</label>
        <select class="form-select py-2" id="gender" required name="s_gender" style="border: 2px solid #333; background-color: #f8f9fa;">
            <option value="" selected>Select gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="citizenship" class="form-label mb-2" style="font-weight: bold;">Citizenship</label>
        <input type="text" class="form-control py-2" id="citizenship" name="citizenship" placeholder="Enter citizenship" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
    <label for="status" class="form-label mb-2" style="font-weight: bold;">Status</label>
    <select class="form-select py-2" id="status" name="s_status" style="border: 2px solid #333; background-color: #f8f9fa;">
        <option value="" selected>Select status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
    </select>
</div>

</div>
<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
    <div class="col-md-4">
        <label for="religion" class="form-label mb-2" style="font-weight: bold;">Religious Affiliation</label>
        <input type="text" class="form-control py-2" id="religion" name="religion" placeholder="Enter religion" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-4">
        <label for="tribe" class="form-label mb-2" style="font-weight: bold;">Tribe</label>
        <input type="text" class="form-control py-2" id="tribe" name="tribe" placeholder="Enter tribe" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-4">
        <label for="province" class="form-label mb-2" style="font-weight: bold;">Province</label>
        <select class="form-select py-2" id="province" required name="province" style="border: 2px solid #333; background-color: #f8f9fa;">
            <option value="" selected>Select province</option>
            <!-- Add provinces here -->
        </select>
    </div>
</div>
<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
    <div class="col-md-4">
        <label for="municipality" class="form-label mb-2" style="font-weight: bold;">Town/Municipality</label>
        <select class="form-select py-2" id="municipality" name="municipality" required style="border: 2px solid #333; background-color: #f8f9fa;">
            <option value="" selected>Select municipality</option>
            <!-- Add municipalities here -->
        </select>
    </div>
    <div class="col-md-4">
        <label for="barangay" class="form-label mb-2" style="font-weight: bold;">Barangay</label>
        <select class="form-select py-2" id="barangay" name="barangay" required style="border: 2px solid #333; background-color: #f8f9fa;">
            <option value="" selected>Select barangay</option>
            <!-- Add barangays here -->
        </select>
    </div>
    <div class="col-md-4">
        <label for="zipcode" class="form-label mb-2" style="font-weight: bold;">Zipcode/Postal Code</label>
        <input type="text" class="form-control py-2" name="zipcode" id="zipcode" placeholder="Enter zipcode" style="border: 2px solid #333; background-color: #f8f9fa;" readonly>
    </div>
</div>

<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
<div class="col-md-6">
    <label for="mobile" class="form-label mb-2" style="font-weight: bold;">Mobile Number</label>
    <div class="row g-2">
        <div class="col-auto">
            <input type="text" class="form-control py-2" id="countryCode" placeholder="+63" 
                   style="border: 2px solid #333; background-color: #f8f9fa; width: 60px;" readonly>
        </div>
        <div class="col">
        <input type="text" class="form-control py-2" id="mobileNumber" name="s_number" placeholder="Enter mobile number" 
       style="border: 2px solid #333; background-color: #f8f9fa;"
       maxlength="10" 
       minlength="10"
       
       oninput="this.value = this.value.replace(/[^0-9]/g, '')">        </div>
    </div>
</div>
    
    <div class="col-md-6">
        <label for="email" class="form-label mb-2" style="font-weight: bold;">Email Address</label>
        <input type="email" class="form-control py-2" name="s_email" id="email" placeholder="Enter email address" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="container" style="margin-top: 45px;">


<!-- First Row -->
<div class="row">
        <div class="col-md-4">
            <label for="siblings" class="form-label" style="font-weight: bold;">Number of Siblings</label>
            <input type="number" class="form-control" id="siblings" name="siblings" placeholder="Number of Siblings" style="border: 2px solid #333; background-color: #f8f9fa;">
        </div>
        <div class="col-md-4">
            <label for="gradeLevel" class="form-label" style="font-weight: bold;">Grade/Year Level</label>
            <select class="form-select py-2" id="gradeLevel" name="gradeLevel" required style="border: 2px solid #333; background-color: #f8f9fa;">
                <option value="" selected>Select grade level</option>
                <option value="GRADE 7">Grade 7</option>
                <option value="GRADE 8">Grade 8</option>
                <option value="GRADE 9">Grade 9</option>
                <option value="GRADE 10">Grade 10</option>
                <option value="GRADE 11">Grade 11</option>
                <option value="GRADE 12">Grade 12</option>
                <option value="1ST YEAR COLLEGE">1st Year College</option>
                <option value="2ND YEAR COLLEGE">2nd Year College</option>
                <option value="3RD YEAR COLLEGE">3rd Year College</option>
                <option value="4TH YEAR COLLEGE">4th Year College</option>

            </select>
        </div>
        <div class="col-md-4">
            <label for="student_id" class="form-label" style="font-weight: bold;">Student ID</label>
            <input type="number" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" style="border: 2px solid #333; background-color: #f8f9fa;">
        </div>
    </div>

    <!-- Second Row -->
    <div class="row" style="margin-top: 45px;">
        <div class="col-md-4">
            <label for="department" class="form-label" style="font-weight: bold;">Department</label>
            <select class="form-select py-2" id="department" name="department" required style="border: 2px solid #333; background-color: #f8f9fa;">
                <option value="" selected>Select Department</option>
                <?= $departmentOptions ?> <!-- Dynamically loaded from database -->
                <option value="add_dept">Add Department</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="school_year" class="form-label" style="font-weight: bold;">School Year</label>
            <select class="form-select py-2" id="school_year" name="school_year" required style="border: 2px solid #333; background-color: #f8f9fa;">
                <option value="" selected>Select School Year</option> <!-- Dynamically loaded from database -->
                <option value="2020-2021">2020-2021</option>
                <option value="2021-2022">2021-2022</option>
                <option value="2022-2023">2022-2023</option>
                <option value="2023-2024">2023-2024</option>
                <option value="2024-2025">2024-2025</option>
                <option value="2025-2026">2025-2026</option>
                <option value="2026-2027">2026-2027</option>
                <option value="2027-2028">2027-2028</option>
                <option value="add_school_year">Add School Year</option>

            </select>
                </div>
        <div class="col-md-4">
            <label for="strandCourse" class="form-label" style="font-weight: bold;">Strand</label>
            <select class="form-select py-2" id="strandCourse" name="strand" required style="border: 2px solid #333; background-color: #f8f9fa;">
                <option value="" selected>Select Strand</option>
                <?= $strandOptions ?> <!-- Dynamically loaded from database -->
                <option value="add_course">Add Strand/Course</option>
            </select>
        </div>
    </div>
    <div class="row" style="margin-top: 45px;">
    <div class="col-md-4">
            <label for="strandCourse" class="form-label" style="font-weight: bold;">Course</label>
            <select class="form-select py-2" id="Course" name="course" required style="border: 2px solid #333; background-color: #f8f9fa;">
                <option value="" selected>Select Course</option>
                <?= $strandOptions ?> <!-- Dynamically loaded from database -->
                <option value="add_course">Add Strand/Course</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="section" class="form-label" style="font-weight: bold;">Section</label>
            <input type="text" class="form-control" id="section" name="section" placeholder="Enter Section" style="border: 2px solid #333; background-color: #f8f9fa;">
        </div>
    </div>
    
</div>

</div>
<div class="form-check mb-4 ms-3">  <!-- Increased margin -->
    <input class="form-check-input" type="checkbox" id="4ps" name="4ps" style="border: 2px solid #333;">
    <label class="form-check-label" for="4ps" style="font-weight: bold;">4P's</label>
</div>
<div class="form-check mb-4 ms-3">  <!-- Increased margin -->
    <input class="form-check-input" type="checkbox" id="ips" name="ips" style="border: 2px solid #333;">
    <label class="form-check-label" for="ips" style="font-weight: bold;">IP's</label>
</div>

                    <div class="mt-4">
                    <div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center;">
    <h6 style="margin: 0; color: black; font-weight: bold;">Family Information</h6>
</div>

    <div class="row" style="margin-top: 10px;">
        <!-- Father's Information Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0">Father's Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="fatherName" class="form-label" style="font-weight: bold;">Name</label>
                        <input type="text" name="f_fname" class="form-control" id="fatherName" placeholder="Full Name" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="fatherOccupation" class="form-label" style="font-weight: bold;">Occupation</label>
                        <input type="text" name="f_occupation" class="form-control" id="fatherOccupation" placeholder="Occupation" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="fatherAddress" class="form-label" style="font-weight: bold;">Address</label>
                        <input type="text" name="f_address" class="form-control" id="fatherAddress" placeholder="Address" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                             <label for="fatherMobile" class="form-label" style="font-weight: bold;">Mobile Number</label>
                    <div class="d-flex gap-2">
                            <input type="text" class="form-control flex-shrink-0" id="countryCode" placeholder="+63" style="border: 2px solid #333; background-color: #f8f9fa; width: 70px;" readonly>
                           <input name="f_number" type="text" class="form-control" id="mobileNumber" placeholder="Enter mobile number" 
       style="border: 2px solid #333; background-color: #f8f9fa;"
       maxlength="10" 
       minlength="10"

       oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="fatherIncome" class="form-label" style="font-weight: bold;">Monthly Income</label>
                        <input type="number" name="f_income" class="form-control" id="fatherIncome" placeholder="Income (PHP)" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>

                </div>
            </div>
        </div>

        <!-- Mother's Information Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0">Mother's Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="motherName" class="form-label" style="font-weight: bold;">Name</label>
                        <input type="text" name="m_fname" class="form-control" id="motherName" placeholder="Full Name" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="motherOccupation" class="form-label" style="font-weight: bold;" >Occupation</label>
                        <input type="text" name="m_occupation" class="form-control" id="motherOccupation" placeholder="Occupation" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="motherAddress" class="form-label" style="font-weight: bold;">Address</label>
                        <input type="text" name="m_address" class="form-control" id="motherAddress" placeholder="Address" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                             <label for="fatherMobile" class="form-label" style="font-weight: bold;">Mobile Number</label>
                    <div class="d-flex gap-2">
                            <input type="text" class="form-control flex-shrink-0" id="countryCode" placeholder="+63" style="border: 2px solid #333; background-color: #f8f9fa; width: 70px;" readonly>
                           <input type="text" name="m_number" class="form-control" id="mobileNumber" placeholder="Enter mobile number" 
       style="border: 2px solid #333; background-color: #f8f9fa;"
       maxlength="10" 
       minlength="10"

       oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    </div>

                    <div class="mb-3">
                        <label for="motherIncome" class="form-label" style="font-weight: bold;">Monthly Income</label>
                        <input type="number" name="m_income" class="form-control" id="motherIncome" placeholder="Income (PHP)" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Guardian's Information Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0">Guardian's Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="guardianName" class="form-label" style="font-weight: bold;">Name</label>
                        <input type="text" name="g_name" class="form-control" id="guardianName" placeholder="Full Name" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="guardianOccupation" class="form-label" style="font-weight: bold;">Occupation</label>
                        <input type="text" name="g_occupation" class="form-control" id="guardianOccupation" placeholder="Occupation" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="guardianAddress" class="form-label"style="font-weight: bold;">Address</label>
                        <input type="text" name="g_address" class="form-control" id="guardianAddress" placeholder="Address" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                             <label for="fatherMobile" class="form-label" style="font-weight: bold;">Mobile Number</label>
                    <div class="d-flex gap-2">
                            <input type="text" class="form-control flex-shrink-0" id="countryCode" placeholder="+63" style="border: 2px solid #333; background-color: #f8f9fa; width: 70px;" readonly>
                           <input type="text" name="g_number" class="form-control" id="mobileNumber" placeholder="Enter mobile number" 
       style="border: 2px solid #333; background-color: #f8f9fa;"
       maxlength="10" 
       minlength="10"
       pattern="[0-9]{11}"
       oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-4">
<div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px">
    <h6 style="margin: 0; color: black; font-weight: bold;">Previous School Information</h6>
</div>

    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="lastSchoolName" class="form-label" style="font-weight: bold;">Last Attended School Name</label>
                <input type="text" class="form-control" name="last_schoolname" id="lastSchoolName" placeholder="School Name" style="border: 2px solid #333; background-color: #f8f9fa;">
            </div>
            <div class="mb-3">
                <label for="schoolAddress" class="form-label" style="font-weight: bold;">School Address</label>
                <input type="text" class="form-control" name="last_schooladdress" id="schoolAddress" placeholder="School Address" style="border: 2px solid #333; background-color: #f8f9fa;">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="yearGraduated" class="form-label" style="font-weight: bold;">Year Graduated/Completed</label>
                <input type="number" class="form-control" name="lastyeargraduated" id="yearGraduated" placeholder="Year Graduated" style="border: 2px solid #333; background-color: #f8f9fa;">
            </div>
            <div class="mb-3">
                <label for="reasonForTransfer" class="form-label" style="font-weight: bold;">Reason for Transfer (if applicable)</label>
                <textarea class="form-control" name="reason" id="reasonForTransfer" rows="3" placeholder="Reason for Transfer" style="border: 2px solid #333; background-color: #f8f9fa;"></textarea>
            </div>
        </div>
    </div>
</div>


                    <!-- Upload School Card -->
                    <h6 class="mt-4" style="font-weight: bold;">Upload School Card</h6>

                    <div class="mb-3">
                        <input type="file" class="form-control" id="schoolCardUpload" accept=".jpg, .png, .pdf" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>

                    <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-2"  onclick="window.location='student_profiling_teacher.php'">Cancel</button>
                <button type="submit" class="btn btn-primary" >Save Student</button>
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


</form>
<script src="provinces.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

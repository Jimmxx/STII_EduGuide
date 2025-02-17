<?php
// Include database connection
include 'conn.php'; 


// Make sure to check if the form data exists to avoid errors.
$background   = isset($_POST['background']) ? $_POST['background'] : '';
$approach     = isset($_POST['approach']) ? $_POST['approach'] : '';
$goals        = isset($_POST['goals']) ? $_POST['goals'] : '';
$comments     = isset($_POST['comments']) ? $_POST['comments'] : '';
$recommendations = isset($_POST['recommendations']) ? $_POST['recommendations'] : '';


// Get the student ID from GET parameter and sanitize it
$student_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($student_id > 0) {
    // Fetch student details from the database
    $query = "SELECT s_fname, s_mname, s_lname, suffix, course, grade_level, student_id FROM student_info WHERE student_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        
        // Format the full name properly
        $full_name = $student['s_fname'] . " " . 
                     (!empty($student['s_mname']) ? $student['s_mname'] . " " : "") . 
                     $student['s_lname'] . 
                     (!empty($student['suffix']) ? ", " . $student['suffix'] : "");
    } else {
        $full_name = "Unknown Student";
        $student = ['course' => '', 'year' => '', 'student_id' => ''];
    }
} else {
    echo "Invalid student ID.";
    exit;
}
?>

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

        <main class="main-content bg-gray-50 p-6" id="mainContent">
    <div class="max-w-4xl mx-auto">
      <!-- Review Card -->
      <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <!-- Header Section -->
        <div class="flex justify-between items-start mb-6">
          <div>
            <h1 class="text-2xl font-bold text-gray-800">Counseling Session Review</h1>
            <p class="text-gray-500">Session Date: May 15, 2024</p>
          </div>
          <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Completed</span>
        </div>

        <!-- Notice: The form's action now points to final_submit_counseling.php and includes an id -->
        <form method="post" action="php/final_submit_coun1.php?id=<?php echo $student_id; ?>" id="counselingForm">
  <!-- Hidden Fields to Pass the Data -->
  <input type="hidden" name="background" value="<?php echo htmlspecialchars($background); ?>">
  <input type="hidden" name="approach" value="<?php echo htmlspecialchars($approach); ?>">
  <input type="hidden" name="goals" value="<?php echo htmlspecialchars($goals); ?>">
  <input type="hidden" name="comments" value="<?php echo htmlspecialchars($comments); ?>">
  <input type="hidden" name="recommendations" value="<?php echo htmlspecialchars($recommendations); ?>">
  <input type="hidden" name="s_fullname" value="<?php echo htmlspecialchars($full_name); ?>">
          <!-- Student Information -->
          <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div class="space-y-2">
              <h3 class="font-semibold text-lg text-gray-700 border-b pb-2">Student Details</h3>
              <dl class="space-y-1">
                <div class="flex justify-between">
                  <dt class="text-gray-500">Name:</dt>
                  <dd class="font-medium"><?php echo htmlspecialchars($full_name); ?></dd>
                </div>
                <div class="flex justify-between">
                  <dt class="text-gray-500">Course/Year:</dt>
                  <dd class="font-medium"><?php echo htmlspecialchars($student['course']) . " " . htmlspecialchars($student['grade_level']); ?></dd>
                </div>
                <div class="flex justify-between">
                  <dt class="text-gray-500">Student ID:</dt>
                  <dd class="font-medium"><?php echo htmlspecialchars($student['student_id']); ?></dd>
                </div>
              </dl>
            </div>
            <!-- Session Details -->
            <div class="space-y-2">
              <h3 class="font-semibold text-lg text-gray-700 border-b pb-2">Session Details</h3>
              <dl class="space-y-1">
                <div class="flex justify-between">
                  <dt class="text-gray-500">Counselor:</dt>
                  <dd class="font-medium">Warren Duran</dd>
                </div>
                <div class="flex justify-between">
                  <dt class="text-gray-500">Type:</dt>
                  <dd class="font-medium">Individual Counseling</dd>
                </div>
              </dl>
            </div>
          </div>

          <!-- Review Sections -->
          <div class="space-y-6">
            <!-- Background -->
            <div class="space-y-2">
              <h3 class="font-semibold text-gray-700">1. Background of the Case</h3>
              <p class="text-gray-600 bg-gray-50 p-4 rounded-lg">
                <?php echo htmlspecialchars($background); ?>
              </p>
            </div>

            <!-- Counseling Plan -->
            <div class="space-y-2">
              <h3 class="font-semibold text-gray-700">2. Counseling Plan</h3>
              <div class="bg-gray-50 p-4 rounded-lg space-y-3">
                <div>
                  <p class="text-sm text-gray-500">Approach Used:</p>
                  <p class="text-gray-600"><?php echo htmlspecialchars($approach); ?></p>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Goals:</p>
                  <p class="text-gray-600"><?php echo htmlspecialchars($goals); ?></p>
                </div>
              </div>
            </div>

            <!-- Comments -->
            <div class="space-y-2">
              <h3 class="font-semibold text-gray-700">3. Session Comments</h3>
              <p class="text-gray-600 bg-gray-50 p-4 rounded-lg">
                <?php echo htmlspecialchars($comments); ?>
              </p>
            </div>

            <!-- Recommendations -->
            <div class="space-y-2">
              <h3 class="font-semibold text-gray-700">4. Recommendations</h3>
              <ul class="list-disc list-inside text-gray-600 bg-gray-50 p-4 rounded-lg space-y-2">
                <?php
                // Split recommendations into list items if they are on separate lines
                $recommendationItems = preg_split('/\r\n|\r|\n/', $recommendations);
                foreach ($recommendationItems as $item) {
                  if (trim($item) !== '') {
                    echo '<li>' . htmlspecialchars($item) . '</li>';
                  }
                }
                ?>
              </ul>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex justify-end gap-4 mt-8">
    <button type="button" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg" onclick="window.location.href='individual_counseling1.php?id=<?php echo $student_id;?>'">Go back to Counseling</button>
    <button type="button" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
      <i class="bi bi-printer"></i>
    </button>
    <!-- This button triggers the modal -->
    <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700" data-bs-toggle="modal" data-bs-target="#confirmationModal">
      Submit
    </button>
          </div>
        </form>
      </div>
    </div>


  </main>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Are you sure you want to submit?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <p>Do you want to proceed?</p>
          </div>
          <div class="modal-footer justify-content-center">
            <!-- When clicked, this button will submit the form -->
            <button type="button" class="btn btn-success" id="confirmSubmitButton">Yes, Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Not Yet</button>
          </div>
        </div>
      </div>
    </div>



</div>
<?php include 'view_modal.php' ;?>
<script>
    // Toggle sidebar functionality
    const sidebar = document.getElementById('sidebar');
    const toggleSidebarBtn = document.getElementById('toggleSidebar');
    const mainContent = document.getElementById('mainContent');

    toggleSidebarBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
    });

        // When the "Yes, Submit" button in the modal is clicked, submit the form.
        document.getElementById('confirmSubmitButton').addEventListener('click', function(){
      document.getElementById('counselingForm').submit();
    });
</script>


                    </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

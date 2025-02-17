<?php
// conn.php should establish a MySQLi connection and assign it to $conn
include('conn.php');


// Fetch all counseling records from the individual_counseling table, ordered by date (most recent first)
$counselingQuery = "SELECT * FROM individual_counseling ORDER BY date DESC";
$counselingResult = $conn->query($counselingQuery);



// Fetch all student names (for other purposes)
$query = "SELECT student_id, s_fname, s_lname FROM student_info";
$result = $conn->query($query);

$students = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Process search if search button clicked
$searchResults = [];
if (isset($_POST['searchButton']) && !empty($_POST['searchInput'])) {
    $searchTerm = trim($_POST['searchInput']);
    if (strlen($searchTerm) >= 2) {
        // Using MySQLi prepared statement
        $stmt = $conn->prepare("SELECT * FROM student_info WHERE s_fname LIKE ? OR s_lname LIKE ?");
        $likeTerm = "%{$searchTerm}%";
        $stmt->bind_param("ss", $likeTerm, $likeTerm);
        $stmt->execute();
        $resultSearch = $stmt->get_result();
        if ($resultSearch->num_rows > 0) {
            while ($row = $resultSearch->fetch_assoc()) {
                $searchResults[] = $row;
            }
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - STII EduGuide</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap CSS & Icons (included once) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .sidebar {
      width: 250px;
      transition: width 0.3s ease, padding 0.3s ease;
      overflow: hidden;
      background-color: #2c3e50;
    }
    .sidebar.collapsed {
      width: 60px;
    }
    .sidebar.collapsed .nav-text {
      display: none;
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
      animation: fadeIn 0.8s ease-out forwards;
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
    .modal .nav-item:hover {
      background-color: transparent !important;
    }
    .tab-link.active {
      color: #2563eb;
      border-bottom-color: #2563eb;
    }
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
  </style>
</head>
<body class="bg-gray-100">
  <!-- Navbar -->
  <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600 flex items-center">
      <img src="images/logostiiq.png" alt="STII EduGuide Logo" class="h-10 w-auto mr-2" />
    </h1>
    <div class="flex items-center space-x-4">
      <span class="text-gray-800 font-medium">Warren Duran</span>
      <img src="https://via.placeholder.com/40" alt="Profile Picture" class="w-10 h-10 rounded-full border-2 border-green-600" />
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
        <a href="guidance_program.php" class="nav-item">
          <span class="nav-icon">📊</span>
          <span class="nav-text">Guidance Program</span>
        </a>
        <a href="ptc.php" class="nav-item">
          <span class="nav-icon">👨‍👩‍👧‍👦</span>
          <span class="nav-text">Parent & Teacher Communication</span>
        </a>
        <a href="#" class="nav-item">
          <span class="nav-icon">📅</span>
          <span class="nav-text">Programs & Events</span>
        </a>
        <a href="teacher.php" class="nav-item">
          <span class="nav-icon">🧑‍🏫</span>
          <span class="nav-text">Teacher</span>
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
      </nav>
    </aside>

    <!-- Main Content -->
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
            <!-- New Session Button triggers the search modal -->
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center" data-bs-toggle="modal" data-bs-target="#searchStudentModal">
              <i class="bi bi-plus-circle me-2"></i>New Session
            </button>
            <div class="relative">
              <input type="text" placeholder="Search students..." class="w-64 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
              <i class="bi bi-search position-absolute" style="right: 1rem; top: 0.75rem; color: #a0aec0;"></i>
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
      <?php
      if ($counselingResult && $counselingResult->num_rows > 0) {
          while ($row = $counselingResult->fetch_assoc()) {
              // Retrieve and sanitize data for safe output
              $fullName = htmlspecialchars($row['s_fullname']);
              $approach = htmlspecialchars($row['approach']);
              $date     = htmlspecialchars($row['date']);
              ?>
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 text-sm text-gray-800"><?php echo $fullName; ?></td>
                <td class="px-6 py-4">
                  <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                    <?php echo $approach; ?>
                  </span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600"><?php echo $date; ?></td>
                <td class="px-6 py-4">
                  <!-- Replace the view and delete functionality as needed -->
                  <button class="text-blue-600 hover:text-blue-800 me-4" data-bs-toggle="modal" data-bs-target="#sessionDetailModal">
                    <i class="bi bi-eye-fill"></i> View
                  </button>
                  <button class="text-red-600 hover:text-red-800">
                    <i class="bi bi-trash-fill"></i>
                  </button>
                </td>
              </tr>
              <?php
          }
      } else {
          echo '<tr><td colspan="4" class="px-6 py-4 text-center text-gray-600">No counseling records found.</td></tr>';
      }
      ?>
    </tbody>
  </table>
</div>
        </div>

        <!-- Group Counseling Tab -->
        <div id="group" class="tab-content hidden">
          <div class="flex justify-between items-center mb-4">
            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 flex items-center" onclick="window.location='group_counseling.php'">
              <i class="bi bi-people-fill me-2"></i>New Group
            </button>
            <div class="relative">
              <input type="text" placeholder="Search groups..." class="w-64 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
              <i class="bi bi-search position-absolute" style="right: 1rem; top: 0.75rem; color: #a0aec0;"></i>
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
                    <button class="text-blue-600 hover:text-blue-800 me-4" data-bs-toggle="modal" data-bs-target="#groupDetailModal">
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
  </div>

  <!-- Individual Session Detail Modal -->
  <div class="modal fade" id="sessionDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content rounded-xl">
        <div class="modal-header bg-blue-600 text-white rounded-t-xl">
          <h5 class="modal-title">Session Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-6">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Student Name</label>
              <p>Juan Dela Cruz</p>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Date</label>
              <p>March 15, 2024</p>
            </div>
            <div class="col-12 mb-3">
              <label class="form-label">Session Notes</label>
              <p>Student showed improvement in time management skills. Recommended follow-up session in 2 weeks.</p>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Counseling Type</label>
              <p>Academic Counseling</p>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Outcome</label>
              <span class="badge bg-success">Successful</span>
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
          <div class="row">
            <div class="col-12 mb-3">
              <label class="form-label">Group Name</label>
              <p class="fw-bold">Grade 11 Career Planning Workshop</p>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Date</label>
              <p>March 20, 2024</p>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Participants</label>
              <p>25 students</p>
            </div>
            <div class="col-12 mb-3">
              <label class="form-label">Approach</label>
              <p>Interactive workshop with career assessment activities</p>
            </div>
            <div class="col-12">
              <label class="form-label">Session Notes</label>
              <p>Group engaged well with material. Follow-up session scheduled for resume writing skills.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Search Student Modal (AJAX-powered) -->
<div class="modal fade" id="searchStudentModal" tabindex="-1" aria-labelledby="searchStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="searchStudentModalLabel">Search Students</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Search Input and Button (No page reload!) -->
          <div class="input-group mb-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Start typing student name..." aria-label="Student search">
            <button type="button" id="searchButton" class="btn btn-primary">Search</button>
          </div>
          <!-- Results Container -->
          <div id="searchResults">
            <!-- Results will be dynamically injected here -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle & Custom Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Tab Switching Functionality
    document.querySelectorAll('.tab-link').forEach(button => {
      button.addEventListener('click', () => {
        const target = document.querySelector(button.dataset.tabTarget);
        document.querySelectorAll('.tab-content').forEach(content => {
          content.classList.add('hidden');
        });
        document.querySelectorAll('.tab-link').forEach(btn => {
          btn.classList.remove('active');
        });
        target.classList.remove('hidden');
        button.classList.add('active');
      });
    });
    // Initialize first tab as active
    document.querySelector('.tab-link').click();

    // Sidebar Toggle
    const sidebar = document.getElementById("sidebar");
    const toggleSidebar = document.getElementById("toggleSidebar");
    const mainContent = document.getElementById("mainContent");

    toggleSidebar.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed");
      mainContent.classList.toggle("expanded");
    });

    // AJAX Search Functionality for the Search Student Modal
    document.getElementById('searchButton').addEventListener('click', function(){
      const query = document.getElementById('searchInput').value.trim();
      const resultsContainer = document.getElementById('searchResults');
      
      if(query.length < 2) {
        resultsContainer.innerHTML = '<div class="text-muted text-center mt-3">Please enter at least 2 characters.</div>';
        return;
      }
      
      // Use fetch to call the search endpoint
      fetch('search_student.php?q=' + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
          resultsContainer.innerHTML = ''; // Clear previous results
          if (data.length > 0) {
            const listGroup = document.createElement('div');
            listGroup.className = 'list-group';
            data.forEach(student => {
              const a = document.createElement('a');
              a.href = 'individual_counseling1.php?id=' + student.student_id;
              a.className = 'list-group-item list-group-item-action d-flex justify-content-between align-items-center';
              a.innerHTML = '<div><h5 class="mb-1">' + student.s_fname + ' ' + student.s_lname + '</h5>' +
                            '<small class="text-muted">Student ID: ' + student.student_id + '</small></div>' +
                            '<i class="bi bi-chevron-right"></i>';
              listGroup.appendChild(a);
            });
            resultsContainer.appendChild(listGroup);
          } else {
            resultsContainer.innerHTML = '<div class="text-muted text-center mt-3">No students found matching your search.</div>';
          }
        })
        .catch(error => {
          console.error('Error fetching search results:', error);
        });
    });
  </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - STII EduGuide</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Updated Bootstrap CSS to match the JS version -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
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
    .modal .nav-item:hover {
      background-color: transparent !important;
    }
    
    /* Added styles for proper full-height layout */
    body, html {
      height: 100%;
      overflow: hidden;
    }
    .main-content {
      height: calc(100vh - 4rem); /* Subtract header height */
      overflow-y: auto;
      padding: 1.5rem;
    }
    
    /* Fade in animation */
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
        <a href="event.php" class="nav-item">
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
        <a href="#" class="nav-item">
          <span class="nav-icon">⚙️</span>
          <span class="nav-text">Settings</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content bg-gray-50 p-6" id="mainContent">
      <!-- Page Title -->
      <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Programs &amp; Events</h1>
      </div>

      <!-- Controls: Add Button on Left, Search Input with Button on Right -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <!-- Add Button (Left) -->
        <div>
          <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors flex items-center gap-1" type="button" onclick="window.location='event_form.php'">
            <i class="bi bi-plus-lg"></i>
            <span>Add New Event</span>
          </button>
        </div>
        <!-- Search Field with Trigger Button (Right) -->
        <div class="flex items-center space-x-2 mt-4 md:mt-0">
          <div class="relative">
            <input
              type="text"
              id="searchInput"
              class="w-full md:w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500"
              placeholder="Search events..."
            />
            <i class="bi bi-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
          </div>
          <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
            Search
          </button>
        </div>
      </div>

      <!-- Table Card -->
      <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Event Name</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Date</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Speaker/Facilitator</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Target Audience</th>
              <th class="px-6 py-3 text-right text-sm font-medium text-gray-600">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <!-- Example Row 1 -->
            <tr class="hover:bg-gray-50 transition-colors">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Annual Tech Conference</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">2025-02-10</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Jane Doe</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Developers, Tech Enthusiasts</td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="#" class="text-blue-600 hover:text-blue-800 mr-2 inline-flex items-center gap-1" data-bs-toggle="modal" data-bs-target="#viewEventModal">
                  <i class="bi bi-eye"></i>
                  <span class="hidden sm:inline">View</span>
                </a>
                <a href="#" class="text-green-600 hover:text-green-800 inline-flex items-center gap-1">
                  <i class="bi bi-pencil-square"></i>
                  <span class="hidden sm:inline">Edit</span>
                </a>
              </td>
            </tr>
            <!-- Example Row 2 -->
            <tr class="hover:bg-gray-50 transition-colors">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Creative Writing Workshop</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">2025-03-15</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">John Smith</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Writers, Students</td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="#" class="text-blue-600 hover:text-blue-800 mr-2 inline-flex items-center gap-1" data-bs-toggle="modal" data-bs-target="#viewEventModal">
                  <i class="bi bi-eye"></i>
                  <span class="hidden sm:inline">View</span>
                </a>
                <a href="#" class="text-green-600 hover:text-green-800 inline-flex items-center gap-1">
                  <i class="bi bi-pencil-square"></i>
                  <span class="hidden sm:inline">Edit</span>
                </a>
              </td>
            </tr>
            <!-- Additional rows can be added here -->
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6 flex flex-col sm:flex-row items-center justify-between">
        <p class="text-sm text-gray-600">Showing 1 to 10 of 50 events</p>
        <div class="flex items-center mt-4 sm:mt-0">
          <button class="px-3 py-1.5 border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-100">Previous</button>
          <button class="px-3 py-1.5 mx-1 border border-blue-500 bg-blue-500 text-white rounded-lg">1</button>
          <button class="px-3 py-1.5 mx-1 border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-100">2</button>
          <button class="px-3 py-1.5 mx-1 border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-100">3</button>
          <button class="px-3 py-1.5 border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-100">Next</button>
        </div>
      </div>
    </main>
  </div>

  <!-- View Event Modal (placed as a direct child of body) -->
  <div class="modal fade" id="viewEventModal" tabindex="-1" aria-labelledby="viewEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="viewEventModalLabel">Event Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal Body: Read-only Form -->
        <div class="modal-body">
          <form>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <!-- Event Name -->
              <div>
                <label for="viewEventName" class="block text-sm font-medium text-gray-700 mb-1">Event Name</label>
                <input type="text" id="viewEventName" class="w-full px-4 py-2.5 rounded-lg border border-gray-200" value="Annual Tech Conference" readonly>
              </div>
              <!-- Date -->
              <div>
                <label for="viewEventDate" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                <input type="date" id="viewEventDate" class="w-full px-4 py-2.5 rounded-lg border border-gray-200" value="2025-02-10" readonly>
              </div>
              <!-- Speaker/Facilitator -->
              <div>
                <label for="viewSpeaker" class="block text-sm font-medium text-gray-700 mb-1">Speaker/Facilitator</label>
                <input type="text" id="viewSpeaker" class="w-full px-4 py-2.5 rounded-lg border border-gray-200" value="Jane Doe" readonly>
              </div>
              <!-- Target Audience -->
              <div>
                <label for="viewTargetAudience" class="block text-sm font-medium text-gray-700 mb-1">Target Audience</label>
                <input type="text" id="viewTargetAudience" class="w-full px-4 py-2.5 rounded-lg border border-gray-200" value="Developers, Tech Enthusiasts" readonly>
              </div>
              <!-- Key Topics -->
              <div class="md:col-span-2">
                <label for="viewKeyTopics" class="block text-sm font-medium text-gray-700 mb-1">Key Topics</label>
                <textarea id="viewKeyTopics" class="w-full px-4 py-2.5 rounded-lg border border-gray-200" rows="3" readonly>Key topics and event details can be summarized here...</textarea>
              </div>
            </div>
          </form>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="px-6 py-2.5 border border-gray-200 rounded-lg hover:bg-gray-50" data-bs-dismiss="modal">Close</button>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

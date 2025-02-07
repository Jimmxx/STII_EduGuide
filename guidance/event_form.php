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

        <!-- Main Content -->
        <main class="main-content bg-gray-50 p-6" id="mainContent">
  <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
    <div>
      <h1 class="text-2xl font-bold text-gray-800">Programs &amp; Events</h1>
      <p class="text-gray-600 mt-1">Manage event details and records for workshops, attendance, and feedback.</p>
    </div>
  </div>

  <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
    <form>
      <div class="space-y-8">
        <!-- Workshop/Seminar Form Section -->
        <div>
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Workshop/Seminar Form</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="eventName" class="block text-sm font-medium text-gray-700 mb-1">Event Name</label>
              <input type="text" id="eventName" name="eventName" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Enter event name">
            </div>
            <div>
              <label for="eventDate" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
              <input type="date" id="eventDate" name="eventDate" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            </div>
            <div>
              <label for="speaker" class="block text-sm font-medium text-gray-700 mb-1">Speaker/Facilitator</label>
              <input type="text" id="speaker" name="speaker" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Enter speaker/facilitator name">
            </div>
            <div>
              <label for="targetAudience" class="block text-sm font-medium text-gray-700 mb-1">Target Audience</label>
              <input type="text" id="targetAudience" name="targetAudience" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Enter target audience">
            </div>
            <div class="md:col-span-2">
              <label for="keyTopics" class="block text-sm font-medium text-gray-700 mb-1">Key Topics</label>
              <textarea id="keyTopics" name="keyTopics" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" rows="3" placeholder="Enter key topics"></textarea>
            </div>
          </div>
        </div>

        <!-- Attendance Form Section -->
        <div>
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Attendance Form</h2>
          <div class="grid grid-cols-1 gap-4">
            <div>
              <label for="participantNames" class="block text-sm font-medium text-gray-700 mb-1">Participant Names</label>
              <textarea id="participantNames" name="participantNames" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" rows="3" placeholder="Enter participant names, separated by commas"></textarea>
            </div>
            <div>
              <label for="engagementNotes" class="block text-sm font-medium text-gray-700 mb-1">Engagement/Feedback Notes</label>
              <textarea id="engagementNotes" name="engagementNotes" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" rows="3" placeholder="Enter notes on engagement or feedback"></textarea>
            </div>
          </div>
        </div>

        <!-- Feedback Form Section -->
        <div>
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Feedback Form</h2>
          <div class="grid grid-cols-1 gap-4">
            <div>
              <label for="eventRating" class="block text-sm font-medium text-gray-700 mb-1">Event Rating</label>
              <select id="eventRating" name="eventRating" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">Select rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
              </select>
            </div>
            <div>
              <label for="feedbackComments" class="block text-sm font-medium text-gray-700 mb-1">Comments on Improvements</label>
              <textarea id="feedbackComments" name="feedbackComments" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" rows="3" placeholder="Enter comments on improvements"></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 flex justify-end gap-3">
        <button type="button" class="px-6 py-2.5 border border-gray-200 rounded-lg hover:bg-gray-50" onclick="window.location='event.php'">Cancel</button>
        <button type="button" class="px-6 py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600" onclick="window.location='event_detail.php'">Submit</button>
      </div>
    </form>
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


                    </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

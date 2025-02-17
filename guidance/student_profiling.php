<?php 
require 'conn.php';

$sql = "SELECT student_id, s_fname, s_mname, s_lname, suffix, grade_level, strand, birthdate, number FROM student_info ORDER BY student_id ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
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
    <style>
    .tab-link.active {
        color: #2563eb; /* text-blue-600 */
        border-bottom-color: #2563eb; /* border-blue-600 */
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
    .main-content {
      height: calc(100vh - 4rem);
      overflow-y: auto;
      padding: 1.5rem;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
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
        <img src="images/logostiiq.png" alt="STII EduGuide Logo" class="h-10 w-auto mr-2">
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
                    <span class="nav-text">Parent & Teacher Communication</spa>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">📅</span>
                    <span class="nav-text">Programs & Events</span>
                </a>
                <a href="teacher.php" class="nav-item">
                    <span class="nav-icon">🧑‍🏫</span>
                    <span class="nav-text">Teacher</span>
                <!-- </a>   <a href="#" class="nav-item">
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
                    <a href="#" class="nav-item settings">
                    <span class="nav-icon">⚙️</span>
                    <span class="nav-text">Settings</span>
                </a>
                <!-- <a href="#" class="nav-item">
                    <span class="nav-icon">🔗</span>
                    <span class="nav-text">Referrals & Resources</span>
                </a> -->
                
                <!-- Settings Dropdown -->
                <!-- <a href="#" class="nav-item settings">
                    <span class="nav-icon">⚙️</span>
                    <span class="nav-text">Settings</span>
                </a> -->
            </nav>
        </aside>


        <main class="main-content bg-gray-50 p-6" id="mainContent">
    <div class="p-6">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Student Profiling</h1>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade Level</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Strand/Course</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php $no = 1; ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-4 text-sm text-gray-700 text-center"><?= $no++ ?></td>
                            <td class="px-4 py-4 text-sm text-gray-900">
                                <?= htmlspecialchars($row['s_fname']) . ' ' . (!empty($row['s_mname']) ? htmlspecialchars($row['s_mname']) . ' ' : '') . htmlspecialchars($row['s_lname']) . (!empty($row['suffix']) ? ' ' . htmlspecialchars($row['suffix']) : '') ?>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-900"><?= htmlspecialchars($row['student_id']) ?></td>
                            <td class="px-4 py-4 text-sm text-gray-900"><?= htmlspecialchars($row['grade_level']) ?></td>
                            <td class="px-4 py-4 text-sm text-gray-900"><?= htmlspecialchars($row['strand']) ?></td>
                            <td class="px-4 py-4 text-sm text-gray-900">  <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none" 
          onclick="window.location='student_view.php?id=<?php echo $row['student_id']; ?>'">
    View
  </button></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center text-gray-500 py-4">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
    </div>
</main>


<script>
    // Tab Switching Functionality
    document.querySelectorAll('.tab-link').forEach(button => {
        button.addEventListener('click', () => {
            const target = document.querySelector(button.dataset.tabTarget);
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            // Remove active class from all buttons
            document.querySelectorAll('.tab-link').forEach(btn => {
                btn.classList.remove('active');
            });
            // Show target tab and set button as active
            target.classList.remove('hidden');
            button.classList.add('active');
        });
    });

    // Initialize first tab as active
    document.querySelector('.tab-link').click();
</script>
    </div>
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

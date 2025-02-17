<?php 
include 'conn.php';

// Query to fetch all student records
$sql = "SELECT * FROM student_info";
$result = $conn->query($sql);
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
    <h1 class="text-2xl font-bold mb-6 text-center">Student Profiling</h1>
    
    <!-- Search and Add Student -->
    <div class="flex justify-between items-center mb-4">
        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" onclick="window.location='add_student.php'">Add Student</button>
        <div class="flex items-center space-x-2">
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
                    <th class="border border-gray-300 px-4 py-2">Birthdate</th>
                    <th class="border border-gray-300 px-4 py-2">Contact</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php $no = 1; ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr> 
    <!-- Serial number -->
    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $no++; ?></td>
    <!-- Full Name: concatenating first, middle, and last names -->
    <td class="border border-gray-300 px-4 py-2">
        <?php 
            echo htmlspecialchars(
                $row['s_fname'] . " " . 
                ($row['s_mname'] ? $row['s_mname'] . " " : "") . 
                $row['s_lname']
            ); 
        ?>
    </td>
    <!-- Student ID -->
    <td class="border border-gray-300 px-4 py-2">
        <?php echo htmlspecialchars($row['student_id'] ?? 'N/A'); ?>
    </td>
    <!-- Birthdate -->
    <td class="border border-gray-300 px-4 py-2">
        <?php echo htmlspecialchars($row['birthdate']); ?>
    </td>
    <!-- Contact number -->
    <td class="border border-gray-300 px-4 py-2">
        <?php echo htmlspecialchars($row['number']); ?>
    </td>
    <!-- Action buttons -->
    <td class="border border-gray-300 px-4 py-2 text-center">
    <div class="relative inline-block">
  <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none" 
          onclick="window.location='student_view.php?id=<?php echo $row['student_id']; ?>'">
    View
  </button>
  <?php if ($row['card_status'] == 0): ?>
    <span class="absolute top-0 right-0 flex items-center justify-center w-5 h-5 bg-yellow-500 text-white text-xs rounded-full" title="No Card">
      <i class="bi bi-exclamation-lg"></i>
    </span>
  <?php endif; ?>
</div>

        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" 
            data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['student_id']; ?>">
            Delete
        </button>
    </td>
</tr>


                        <!-- Delete Confirmation Modal for each student -->
                        <div class="modal fade" id="deleteModal<?php echo $row['student_id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $row['student_id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel<?php echo $row['student_id']; ?>">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this student?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="delete_student.php?id=<?php echo $row['student_id']; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="border border-gray-300 px-4 py-2 text-center">No records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

</div>

<!-- Delete Permisson -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Permisson</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-floating mb-3">
  <input type="Password" class="form-control" id="floatingInput" placeholder="">
  <label for="floatingInput">Password</label>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Done</button>
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

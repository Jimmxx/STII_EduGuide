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
        /* Add custom checkbox styling */
        .student-checkbox {
            accent-color: #3b82f6; /* Blue color */
            width: 1.5rem;
            height: 1.5rem;
        }
        
        /* Card styling */
        .student-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-top: 1rem;
            padding: 1.5rem;
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
        <main class="main-content bg-gray-50 p-6" id="mainContent">
    <div class="max-w-4xl mx-auto">
        <!-- Review Card -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <!-- Header Section -->
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Group Counseling Session Review</h1>
                    <p class="text-gray-500">Session Date: [Insert Date]</p>
                </div>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Completed</span>
            </div>

            <!-- Session Information -->
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="space-y-2">
                    <h3 class="font-semibold text-lg text-gray-700 border-b pb-2">Session Details</h3>
                    <dl class="space-y-1">
                        <div class="flex justify-between">
                            <dt class="text-gray-500">Counselor:</dt>
                            <dd class="font-medium">[Insert Counselor Name]</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-500">Duration:</dt>
                            <dd class="font-medium">[Insert Duration]</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-500">Type:</dt>
                            <dd class="font-medium">Group Counseling</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-500">Session Title:</dt>
                            <dd class="font-medium">[Insert Session Title]</dd>
                        </div>
                    </dl>
                </div>

                <!-- Participants List -->
                <div class="space-y-2">
                    <h3 class="font-semibold text-lg text-gray-700 border-b pb-2">Participants</h3>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>[Student Name 1]</li>
                        <li>[Student Name 2]</li>
                        <li>[Student Name 3]</li>
                        <li>...</li>
                    </ul>
                </div>
            </div>

            <!-- Review Sections -->
            <div class="space-y-6">
                <!-- Background -->
                <div class="space-y-2">
                    <h3 class="font-semibold text-gray-700">1. Background of the Case</h3>
                    <p class="text-gray-600 bg-gray-50 p-4 rounded-lg">
                        The group counseling session focused on addressing common academic and personal challenges among participants. 
                        Key issues discussed included time management difficulties, academic stress, and social adjustment concerns.
                    </p>
                </div>

                <!-- Counseling Plan -->
                <div class="space-y-2">
                    <h3 class="font-semibold text-gray-700">2. Counseling Plan</h3>
                    <div class="bg-gray-50 p-4 rounded-lg space-y-3">
                        <div>
                            <p class="text-sm text-gray-500">Approach Used:</p>
                            <p class="text-gray-600">Cognitive Behavioral Therapy & Peer Support Strategies</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Goals:</p>
                            <p class="text-gray-600">Enhance coping mechanisms, improve academic productivity, foster a supportive peer network</p>
                        </div>
                    </div>
                </div>

                <!-- Observations & Comments -->
                <div class="space-y-2">
                    <h3 class="font-semibold text-gray-700">3. Session Observations & Comments</h3>
                    <p class="text-gray-600 bg-gray-50 p-4 rounded-lg">
                        Participants actively engaged in discussions, shared experiences, and provided support to one another. 
                        The session highlighted the importance of structured study habits and self-care practices.
                    </p>
                </div>

                <!-- Recommendations -->
                <div class="space-y-2">
                    <h3 class="font-semibold text-gray-700">4. Recommendations</h3>
                    <ul class="list-disc list-inside text-gray-600 bg-gray-50 p-4 rounded-lg space-y-2">
                        <li>Follow-up session in 3 weeks</li>
                        <li>Encourage peer accountability for study goals</li>
                        <li>Practice relaxation techniques and mindfulness exercises</li>
                        <li>Consult with academic advisors for study planning</li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4 mt-8">
                <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg" onclick="window.location.href='group_counseling.php'">Go back to Counseling</button>
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    <i class="bi bi-printer"></i>
                </button>
<!-- Submit Button -->
<button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700" onclick="openModal()" >
    Submit
</button>

            </div>
        </div>
    </div>
</main>


<!-- Confirmation Modal -->
<div id="saveConfirmationModal111" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-96">
        <div class="bg-green-600 text-white p-4 rounded-t-lg flex justify-between items-center">
            <h5 class="text-xl font-semibold">Confirm Save</h5>
            <button class="text-white" onclick="closeModal()">×</button>
        </div>
        <div class="p-4 text-center">
            <p>Are you sure you want to save this group counseling session?</p>
        </div>
        <div class="flex justify-between p-4">
            <button class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500" onclick="closeModal()">Cancel</button>
            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="window.location='counseling.php'">Yes, Save</button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('saveConfirmationModal111').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('saveConfirmationModal111').classList.add('hidden');
    }
</script>


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

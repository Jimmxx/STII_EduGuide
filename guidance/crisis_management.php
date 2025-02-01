<!-- <!DOCTYPE html>
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
    <-- Navbar --
    <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600 flex items-center">
            <i class="bi bi-mortarboard-fill mr-2"></i>STII EduGuide
        </h1>        <div class="flex items-center space-x-4">
            <span class="text-gray-800 font-medium">Warren Duran</span>
            <img src="https://via.placeholder.com/40" alt="Profile Picture" class="w-10 h-10 rounded-full border-2 border-green-600">
        </div>
    </header>

    <div class="flex">
        <-- Sidebar --
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
                <a href="guidance_program.php" class="nav-item">
                    <span class="nav-icon">📊</span>
                    <span class="nav-text">Guidance Program</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">👨‍👩‍👧‍👦</span>
                    <span class="nav-text">Parent & Teacher Communication</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">📅</span>
                    <span class="nav-text">Programs & Events</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">⚖️</span>
                    <span class="nav-text">Compliance & Legal</span>
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

<!-- Main Content --

<main class="main-content bg-gray-50 p-6" id="mainContent">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center border-b pb-4">
            <h1 class="text-2xl font-bold text-gray-800">Crisis Management</h1>
            <button id="addNewButton" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="bi bi-plus-lg mr-2"></i>Add New
            </button>
        </div>


        <!- Tab Navigation --
        <div class="flex justify-center mt-6 border-b">
            <button data-tab="incident" class="tab-link px-4 py-2 text-blue-600 border-b-2 border-blue-600">Incident Logs</button>
            <button data-tab="emergency" class="tab-link px-4 py-2 text-gray-500 hover:text-blue-600">Emergency Responses</button>
            <button data-tab="followup" class="tab-link px-4 py-2 text-gray-500 hover:text-blue-600">Follow-Up Reports</button>
        </div>


<!- Table Container --
<div class="mt-6">
    <--Incident Logs Tab --
    <div id="incident" class="tab-content active">
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-3">No.</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Incident Description</th>
                        <th class="p-3">Actions Taken</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="p-3 font-bold">1.</td>                        
                        <td class="p-3">2024-03-15</td>
                        <td class="p-3">Student altercation in cafeteria</td>
                        <td class="p-3">Separated students, counseling session</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-800">Resolved</span>
                        </td>
                        <td class="p-3 flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 edit-btn">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Emergency Responses Tab --
    <div id="emergency" class="tab-content hidden">
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full">
                <thead class="bg-red-600 text-white">
                    <tr>
                    <th class="p-3">No.</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Emergency Type</th>
                        <th class="p-3">Response Team</th>
                        <th class="p-3">Outcome</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white hover:bg-gray-50">
                    <td class="p-3 font-bold">1.</td>                        
                        <td class="p-3">2024-03-18</td>
                        <td class="p-3">Fire Drill</td>
                        <td class="p-3">Evacuation conducted</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-800">Successful</span>
                        </td>
                        <td class="p-3 flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 edit-btn">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!- Follow-Up Reports Tab --
    <div id="followup" class="tab-content hidden">
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full">
                <thead class="bg-green-600 text-white">
                    <tr>
                    <th class="p-3">No.</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Student Name</th>
                        <th class="p-3">Follow-Up Actions</th>
                        <th class="p-3">Next Steps</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white hover:bg-gray-50">
                    <td class="p-3 font-bold">1.</td>                        
                        <td class="p-3">2024-03-20</td>
                        <td class="p-3">John Doe</td>
                        <td class="p-3">Counseling session scheduled</td>
                        <td class="p-3">Monitor progress</td>
                        <td class="p-3 flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 edit-btn">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Tab Switching Logic
    document.querySelectorAll('.tab-link').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.tab-link').forEach(t => t.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600'));
            button.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');

            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            document.getElementById(button.dataset.tab).classList.remove('hidden');
        });
    });
</script>

    
<!-- Incident Log Modal --
<div class="modal fade" id="incidentModal" tabindex="-1" aria-labelledby="incidentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue-600 text-white">
                <h5 class="modal-title">Add New Incident</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Incident Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Incident type</label>
                        <select class="form-control">
                            <option value="bullying">Bullying</option>
                            <option value="aksidente">Aksidente</option>
                            <option value="mental_health_crisis">Mental Health Crisis</option>
                            <option value="natural_disaster">Natural Disaster</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <!- Incident-specific fields --
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Incident</button>
            </div>
        </div>
    </div>
</div>

<!-- Emergency Response Modal --
<div class="modal fade" id="emergencyModal" tabindex="-1" aria-labelledby="emergencyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red-600 text-white">
                <h5 class="modal-title">Add Emergency Response</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Emergency Type</label>
                        <select class="form-control">
                            <option>Fire</option>
                            <option>Earthquake</option>
                            <option>Medical Emergency</option>
                        </select>
                    </div>
                    <!- Emergency-specific fields --
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Response</button>
            </div>
        </div>
    </div>
</div>

<!-- Follow-Up Report Modal --
<div class="modal fade" id="followupModal" tabindex="-1" aria-labelledby="followupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green-600 text-white">
                <h5 class="modal-title">Add Follow-Up Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <-- Follow-up specific fields --
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Follow-Up</button>
            </div>
        </div>
    </div>
</div>

<script>
    let activeTab = 'incident';

    // Tab Switching Logic
    document.querySelectorAll('.tab-link').forEach(button => {
        button.addEventListener('click', () => {
            // Update active tab
            activeTab = button.dataset.tab;

            // Reset styles for all buttons
            document.querySelectorAll('.tab-link').forEach(t => {
                t.classList.remove('text-white', 'bg-blue-600', 'bg-red-600', 'bg-green-600', 'border-b-2', 'border-blue-600');
                t.classList.add('text-gray-500', 'hover:text-blue-600');
            });

            // Apply active styles to clicked tab
            button.classList.remove('text-gray-500', 'hover:text-blue-600');
            button.classList.add('text-white', 'border-b-2');

            // Apply different background colors based on the active tab
            if (activeTab === 'incident') {
                button.classList.add('bg-blue-600', 'border-blue-600');
                document.getElementById("addNewButton").className = "bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700";
            } else if (activeTab === 'emergency') {
                button.classList.add('bg-red-600', 'border-red-600');
                document.getElementById("addNewButton").className = "bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700";
            } else if (activeTab === 'followup') {
                button.classList.add('bg-green-600', 'border-green-600');
                document.getElementById("addNewButton").className = "bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700";
            }

            // Update content visibility
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            const activeContent = document.getElementById(button.dataset.tab);
            if (activeContent) activeContent.classList.remove('hidden');
        });
    });

    // Add New Button Handler
    document.getElementById("addNewButton").addEventListener("click", function () {
        const modals = {
            incident: 'incidentModal',
            emergency: 'emergencyModal',
            followup: 'followupModal'
        };
        
        const modalId = modals[activeTab];
        const modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.show();
    });
</script>

<style>
    .tab-link.active {
        color: #2563eb;
        border-bottom-width: 2px;
    }
    
    table th {
        font-weight: 600;
    }
    
    .modal-content {
        border-radius: 0.5rem;
        overflow: hidden;
    }
</style>
     JavaScript for Sidebar Toggle --
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
</html> -->

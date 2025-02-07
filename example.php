    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>School Guidance and Counseling System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <style>
            .dashboard-card {
                transition: all 0.3s ease;
            }
            .dashboard-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }
            .case-item {
                transition: all 0.2s ease;
            }
            .case-item:hover {
                background-color: rgba(243, 244, 246, 1);
            }
        </style>
    </head>
    <body class="bg-gray-50">
        <!-- Top Navigation -->
        <nav class="bg-white border-b border-gray-200 fixed w-full z-30 top-0">
            <div class="px-4 md:px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button class="lg:hidden mr-2" type="button">
                            <i class="fas fa-bars text-gray-500"></i>
                        </button>
                        <span class="text-xl font-bold text-blue-600">School Guidance System</span>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="hidden md:block relative">
                            <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        
                        <button class="p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-bell text-gray-600"></i>
                        </button>
                        
                        <div class="relative">
                            <img src="/api/placeholder/32/32" alt="Profile" class="w-8 h-8 rounded-full">
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="pt-16">
            <div class="container mx-auto px-4 py-6">
                <!-- Navigation Tabs -->
                <ul class="nav nav-tabs mb-6" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#cases">Cases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#programs">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#staff">Staff</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Dashboard Tab -->
                    <div class="tab-pane fade show active" id="dashboard">
                        <!-- Metric Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div class="dashboard-card bg-white rounded-lg p-6 shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-sm font-semibold text-gray-600">Total Active Cases</h3>
                                    <i class="fas fa-chart-bar text-gray-400"></i>
                                </div>
                                <div class="text-2xl font-bold">24</div>
                                <p class="text-xs text-gray-500 mt-1">+2 from last week</p>
                            </div>

                            <div class="dashboard-card bg-white rounded-lg p-6 shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-sm font-semibold text-gray-600">Upcoming Sessions</h3>
                                    <i class="fas fa-calendar text-gray-400"></i>
                                </div>
                                <div class="text-2xl font-bold">8</div>
                                <p class="text-xs text-gray-500 mt-1">Next session in 2 hours</p>
                            </div>

                            <div class="dashboard-card bg-white rounded-lg p-6 shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-sm font-semibold text-gray-600">Active Counselors</h3>
                                    <i class="fas fa-users text-gray-400"></i>
                                </div>
                                <div class="text-2xl font-bold">5</div>
                                <p class="text-xs text-gray-500 mt-1">3 currently available</p>
                            </div>
                        </div>

                        <!-- Recent Cases -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex justify-between items-center mb-6">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900">Recent Cases</h2>
                                    <p class="text-sm text-gray-500">Overview of latest counseling cases</p>
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus mr-2"></i>New Case
                                </button>
                            </div>

                            <div class="space-y-4">
                                <div class="case-item flex items-center justify-between p-4 border rounded-lg">
                                    <div>
                                        <h3 class="font-medium">Alex Johnson</h3>
                                        <p class="text-sm text-gray-500">Mental Health Consultation</p>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">High Priority</span>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Open</span>
                                    </div>
                                </div>

                                <div class="case-item flex items-center justify-between p-4 border rounded-lg">
                                    <div>
                                        <h3 class="font-medium">Sarah Smith</h3>
                                        <p class="text-sm text-gray-500">Academic Counseling</p>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Medium Priority</span>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">In Progress</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cases Tab -->
                    <div class="tab-pane fade" id="cases">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex justify-between items-center mb-6">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900">Case Management</h2>
                                    <p class="text-sm text-gray-500">Manage and track ongoing counseling cases</p>
                                </div>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus mr-2"></i>Register New Case
                                </button>
                            </div>

                            <!-- Case Filters -->
                            <div class="flex flex-wrap gap-4 mb-6">
                                <select class="form-select w-48">
                                    <option>Filter by Status</option>
                                    <option>Open</option>
                                    <option>In Progress</option>
                                    <option>Resolved</option>
                                </select>
                                <select class="form-select w-48">
                                    <option>Filter by Type</option>
                                    <option>Mental Health</option>
                                    <option>Academic</option>
                                    <option>Behavioral</option>
                                </select>
                                <select class="form-select w-48">
                                    <option>Sort by</option>
                                    <option>Date</option>
                                    <option>Priority</option>
                                    <option>Status</option>
                                </select>
                            </div>

                            <!-- Case List -->
                            <div class="space-y-4">
                                <div class="case-item flex items-center justify-between p-4 border rounded-lg">
                                    <div class="flex-1">
                                        <div class="flex items-center">
                                            <img src="/api/placeholder/40/40" alt="Student" class="w-10 h-10 rounded-full mr-4">
                                            <div>
                                                <h3 class="font-medium">Alex Johnson</h3>
                                                <p class="text-sm text-gray-500">Mental Health Consultation</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">High Priority</span>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Open</span>
                                        <button class="btn btn-outline-primary btn-sm">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
    </body>
    </html>
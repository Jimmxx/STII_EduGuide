<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Guidance and Counseling System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard-card {
            transition: transform 0.3s;
            cursor: pointer;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .case-form {
            max-width: 600px;
            margin: 0 auto;
        }
        .nav-link.active {
            font-weight: bold;
            border-bottom: 3px solid #0d6efd;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">School Guidance System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cases">Cases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#programs">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#staff">Staff</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Dashboard Section -->
        <section id="dashboard" class="content-section">
            <h2 class="mb-4">System Dashboard</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card dashboard-card bg-info text-white">
                        <div class="card-body">
                            <h5>Total Cases</h5>
                            <h2 id="totalCases">0</h2>
                        </div>
                    </div>
                </div>
                <!-- Add more dashboard cards here -->
            </div>
        </section>

        <!-- Case Management Section -->
        <section id="cases" class="content-section d-none">
            <h2 class="mb-4">Case Management</h2>
            <div class="mb-3">
                <button class="btn btn-primary" onclick="showCaseForm('mentalHealth')">
                    Register Mental Health Case
                </button>
                <!-- Add other case type buttons -->
            </div>
            
            <!-- Case Form -->
            <div id="caseForm" class="card case-form d-none">
                <div class="card-body">
                    <h5 class="card-title">New Case Registration</h5>
                    <form id="caseRegistrationForm" onsubmit="submitCase(event)">
                        <div class="mb-3">
                            <label class="form-label">Case Type</label>
                            <select class="form-select" id="caseType" required>
                                <option value="">Select Case Type</option>
                                <option value="mentalHealth">Mental Health</option>
                                <option value="suicidePrevention">Suicide Prevention</option>
                                <option value="teenagePregnancy">Teenage Pregnancy</option>
                                <option value="violence">Violence to Children</option>
                            </select>
                        </div>
                        <!-- Add more form fields -->
                        <button type="submit" class="btn btn-primary">Submit Case</button>
                    </form>
                </div>
            </div>

            <!-- Case List -->
            <div class="mt-4">
                <h5>Recent Cases</h5>
                <div id="caseList" class="list-group">
                    <!-- Cases will be dynamically added here -->
                </div>
            </div>
        </section>

        <!-- Programs Section -->
        <section id="programs" class="content-section d-none">
            <h2 class="mb-4">Programs and Workshops</h2>
            <div class="row g-4">
                <!-- Program cards will be dynamically added here -->
            </div>
        </section>

        <!-- Staff Section -->
        <section id="staff" class="content-section d-none">
            <h2 class="mb-4">Counselor Management</h2>
            <div class="row g-4">
                <!-- Staff cards will be dynamically added here -->
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample Data Storage
        let cases = JSON.parse(localStorage.getItem('cases')) || [];
        let programs = JSON.parse(localStorage.getItem('programs')) || [];
        let staff = JSON.parse(localStorage.getItem('staff')) || [];

        // Navigation Handling
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.content-section').forEach(section => {
                    section.classList.add('d-none');
                });
                document.querySelector(this.getAttribute('href')).classList.remove('d-none');
                
                document.querySelectorAll('.nav-link').forEach(l => {
                    l.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        // Case Form Handling
        function showCaseForm(type) {
            document.getElementById('caseForm').classList.remove('d-none');
            document.getElementById('caseType').value = type;
        }

        function submitCase(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            const newCase = {
                id: Date.now(),
                type: formData.get('caseType'),
                date: new Date().toLocaleDateString(),
                status: 'Open'
            };
            
            cases.push(newCase);
            localStorage.setItem('cases', JSON.stringify(cases));
            updateDashboard();
            e.target.reset();
            document.getElementById('caseForm').classList.add('d-none');
            alert('Case submitted successfully!');
        }

        // Dashboard Update
        function updateDashboard() {
            document.getElementById('totalCases').textContent = cases.length;
            // Update other dashboard elements
        }

        // Initial Setup
        function init() {
            updateDashboard();
            // Initialize other components
        }

        // Start the application
        init();
    </script>
</body>
</html>
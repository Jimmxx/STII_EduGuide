<?php
$courses = [
    [
        'title' => 'BS in Information Technology',
        'code' => 'BSIT',
        'duration' => '4 years',
        'department' => 'College of Computer Studies',
        'overview' => 'Focuses on information systems, software development, and network administration',
        'specializations' => ['Web Development', 'Cyber Security', 'Data Science'],
        'careers' => ['Software Developer', 'IT Manager', 'Systems Analyst']
    ],
    [
        'title' => 'BS in Computer Science',
        'code' => 'BSCS',
        'duration' => '4 years',
        'department' => 'College of Computer Studies',
        'overview' => 'Focuses on algorithmic thinking and software system development',
        'specializations' => ['AI', 'Game Development', 'Mobile Development'],
        'careers' => ['Software Engineer', 'Data Scientist', 'Machine Learning Engineer']
    ],
    [
        'title' => 'BS in Accountancy',
        'code' => 'BSA',
        'duration' => '4 years',
        'department' => 'College of Business Administration',
        'overview' => 'Emphasizes accounting principles, financial reporting, and auditing practices',
        'specializations' => ['Financial Accounting', 'Managerial Accounting', 'Taxation'],
        'careers' => ['Accountant', 'Auditor', 'Tax Consultant']
    ],
    [
        'title' => 'BS in Business Administration',
        'code' => 'BSBA',
        'duration' => '4 years',
        'department' => 'College of Business Administration',
        'overview' => 'Focuses on management principles, marketing strategies, and organizational behavior',
        'specializations' => ['Marketing', 'Finance', 'Human Resource Management'],
        'careers' => ['Business Manager', 'Marketing Specialist', 'HR Manager']
    ],
    [
        'title' => 'BS in Hospitality Management',
        'code' => 'BSHM',
        'duration' => '4 years',
        'department' => 'College of Hospitality and Tourism',
        'overview' => 'Prepares students for careers in hotel and restaurant management, event planning, and tourism services',
        'specializations' => ['Hotel Management', 'Restaurant Management', 'Event Planning'],
        'careers' => ['Hotel Manager', 'Event Coordinator', 'Tourism Consultant']
    ],
    [
        'title' => 'BS in Nursing',
        'code' => 'BSN',
        'duration' => '4 years',
        'department' => 'College of Health Sciences',
        'overview' => 'Focuses on patient care, healthcare management, and clinical practices',
        'specializations' => ['Medical-Surgical Nursing', 'Pediatric Nursing', 'Community Health Nursing'],
        'careers' => ['Registered Nurse', 'Clinical Nurse', 'Nurse Manager']
    ],
    [
        'title' => 'BS in Civil Engineering',
        'code' => 'BSCE',
        'duration' => '5 years',
        'department' => 'College of Engineering',
        'overview' => 'Emphasizes the design, construction, and maintenance of infrastructure projects',
        'specializations' => ['Structural Engineering', 'Environmental Engineering', 'Transportation Engineering'],
        'careers' => ['Civil Engineer', 'Structural Engineer', 'Project Manager']
    ],
    [
        'title' => 'BS in Mechanical Engineering',
        'code' => 'BSME',
        'duration' => '5 years',
        'department' => 'College of Engineering',
        'overview' => 'Focuses on design, analysis, and manufacturing of mechanical systems',
        'specializations' => ['Thermodynamics', 'Robotics', 'Automotive Engineering'],
        'careers' => ['Mechanical Engineer', 'Design Engineer', 'Maintenance Engineer']
    ],
    [
        'title' => 'BS in Electrical Engineering',
        'code' => 'BSEE',
        'duration' => '5 years',
        'department' => 'College of Engineering',
        'overview' => 'Covers electrical systems, circuit design, and power generation and distribution',
        'specializations' => ['Power Systems', 'Electronics', 'Control Systems'],
        'careers' => ['Electrical Engineer', 'Electronics Engineer', 'Systems Engineer']
    ],
    [
        'title' => 'BS in Tourism Management',
        'code' => 'BSTM',
        'duration' => '4 years',
        'department' => 'College of Hospitality and Tourism',
        'overview' => 'Focuses on travel, tourism, and hospitality management',
        'specializations' => ['Travel Management', 'Cultural Tourism', 'Event Management'],
        'careers' => ['Tourism Manager', 'Travel Consultant', 'Event Organizer']
    ],
    [
        'title' => 'BS in Psychology',
        'code' => 'BSPsy',
        'duration' => '4 years',
        'department' => 'College of Arts and Sciences',
        'overview' => 'Explores human behavior, mental processes, and counseling techniques',
        'specializations' => ['Clinical Psychology', 'Industrial-Organizational Psychology', 'Counseling'],
        'careers' => ['Psychologist', 'Counselor', 'HR Specialist']
    ],
    [
        'title' => 'BS in Education',
        'code' => 'BSEd',
        'duration' => '4 years',
        'department' => 'College of Education',
        'overview' => 'Prepares future educators with a strong foundation in pedagogy and curriculum development',
        'specializations' => ['Elementary Education', 'Secondary Education', 'Special Education'],
        'careers' => ['Teacher', 'School Administrator', 'Curriculum Developer']
    ],
    [
        'title' => 'BS in Criminal Justice',
        'code' => 'BSCrimJ',
        'duration' => '4 years',
        'department' => 'College of Criminology',
        'overview' => 'Focuses on the study of law enforcement, criminology, and legal systems',
        'specializations' => ['Forensic Science', 'Law Enforcement', 'Corrections'],
        'careers' => ['Police Officer', 'Criminal Investigator', 'Forensic Analyst']
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>College Courses - STII EduGuide</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Optional Bootstrap for some components (if needed) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Course Card Styles */
    .course-card {
      background: white;
      border-radius: 15px;
      transition: all 0.3s ease;
      border: 1px solid rgba(0, 0, 0, 0.1);
    }
    .course-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .course-badge {
      background: #0d6efd;
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.9em;
    }
    /* Transparent Header */
    header {
      background-color: rgba(0, 0, 0, 0.4);
    }
  </style>
</head>
<body class="font-inter bg-gray-100">
  <!-- Header / Navbar (Same as strand.php) -->
  <header class="fixed top-0 left-0 w-full text-white flex justify-between items-center px-6 py-4 z-50">
    <div>
      <a href="Home.php">
        <img src="image/2.png" alt="STII EduGuide Logo" class="h-10" />
      </a>
    </div>
    <!-- Hamburger Menu (Mobile) -->
    <button id="hamburgerBtn" class="flex md:hidden text-white text-3xl focus:outline-none" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <!-- Navigation Links -->
    <nav id="navbarLinks" class="hidden md:flex items-center space-x-4 md:bg-transparent md:relative fixed top-0 left-0 w-full md:w-auto h-full md:h-auto flex-col md:flex-row md:space-y-0 space-y-4 pt-20 md:pt-0">
      <a href="Home.php" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Home</a>
      <!-- Programs Dropdown -->
      <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded flex items-center">
          Programs
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div x-show="open" @click.away="open = false" class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded-md py-2 z-10">
          <a href="strand.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Strand</a>
          <a href="course.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Courses</a>
        </div>
      </div>
      <a href="Home.php#laboratory" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Activities</a>
      <a href="Home.php#About" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">About Us</a>
      <a href="Home.php#Contact" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Contact</a>
      <button class="login bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button id="closeMenuBtn" class="md:hidden mt-4 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Close Menu</button>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto pt-24">
    <div class="text-center mb-5">
      <h1 class="text-3xl md:text-5xl font-bold mb-3">College Degree Programs</h1>
      <div class="max-w-xl mx-auto">
        <input type="text" class="w-full p-3 rounded border" placeholder="Search courses..." id="searchInput" />
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="coursesContainer">
      <?php foreach ($courses as $course): ?>
      <div class="course-card p-6 h-full">
        <div class="flex justify-between items-start mb-3">
          <h4 class="text-xl font-bold"><?= $course['title'] ?></h4>
          <span class="course-badge"><?= $course['code'] ?></span>
        </div>
        <div class="mb-3 text-sm text-gray-600">
          <?= $course['duration'] ?> • <?= $course['department'] ?>
        </div>
        <p class="text-gray-600 mb-3"><?= $course['overview'] ?></p>
        <!-- Using Alpine.js for simple toggle of details -->
        <div x-data="{ openSpec: false, openCareer: false }">
          <button @click="openSpec = !openSpec" class="w-full text-left font-semibold text-blue-600">Specializations</button>
          <div x-show="openSpec" class="mt-2 text-gray-700">
            <?= implode(', ', $course['specializations']) ?>
          </div>
          <button @click="openCareer = !openCareer" class="w-full text-left font-semibold text-blue-600 mt-4">Career Paths</button>
          <div x-show="openCareer" class="mt-2 text-gray-700">
            <ul class="list-disc pl-5">
              <?php foreach ($course['careers'] as $career): ?>
              <li><?= $career ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </main>
    <!-- Footer -->
    <footer class="bg-white/80 backdrop-blur-sm text-center py-6 mt-12">
    <p class="text-sm text-gray-600">✨ Made with ❤️ by STII EduGuide • © 2025 ✨</p>
  </footer>


  <script>
    // Mobile Navigation Toggle
    document.addEventListener("DOMContentLoaded", () => {
      const hamburgerBtn = document.getElementById("hamburgerBtn");
      const navbarLinks = document.getElementById("navbarLinks");
      const closeMenuBtn = document.getElementById("closeMenuBtn");

      hamburgerBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        navbarLinks.classList.toggle("hidden");
      });

      closeMenuBtn.addEventListener("click", () => {
        navbarLinks.classList.add("hidden");
      });

      document.addEventListener("click", (e) => {
        if (!navbarLinks.contains(e.target) && !hamburgerBtn.contains(e.target)) {
          navbarLinks.classList.add("hidden");
        }
      });
    });

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function(e) {
      const term = e.target.value.toLowerCase();
      document.querySelectorAll('.course-card').forEach(card => {
        const text = card.textContent.toLowerCase();
        card.parentElement.style.display = text.includes(term) ? 'block' : 'none';
      });
    });
  </script>
</body>
</html>

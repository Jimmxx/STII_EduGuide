<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>STII EduGuide - Academic Strands</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  
  <style>
    :root {
      --primary: #4361ee;
      --secondary: #3f37c9;
    }
    /* Navbar & Header Styles (Same as index.html) */
    header {
      background-color: rgba(0, 0, 0, 0.4);
    }
    @media (max-width: 768px) {
      #navbarLinks {
        background: rgba(0, 0, 0, 0.7);
        display: none;
        flex-direction: column;
        align-items: center;
        padding-top: 60px;
      }
      #navbarLinks.show {
        display: flex !important;
      }
      #navbarLinks a,
      #navbarLinks button {
        width: 100%;
        text-align: center;
        padding: 10px 20px;
        border-bottom: 1px solid #444;
      }
      #navbarLinks a:hover,
      #navbarLinks button:hover {
        background-color: rgba(255, 255, 255, 0.2);
      }
    }
    @media (min-width: 768px) {
      #navbarLinks {
        flex-direction: row;
        position: static;
        background-color: transparent;
        display: flex !important;
        margin-left: auto;
      }
      #navbarLinks a,
      #navbarLinks button {
        width: auto;
        padding: 0;
        border: none;
        text-align: left;
      }
    }
    /* Strand Hero Section */
    .strand-hero {
      background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
        url('image/strand-bg.jpg') center/cover;
      height: 60vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
    }
  </style>
</head>
<body class="font-inter">
  <!-- Header / Navbar (Same as index.html) -->
  <header class="fixed top-0 left-0 w-full text-white flex justify-between items-center px-6 py-4 z-50">
    <!-- Logo -->
    <div>
      <a href="Home.php">
        <img src="image/2.png" alt="STII EduGuide Logo" class="h-10" />
      </a>
    </div>
    <!-- Hamburger Menu (Mobile) -->
    <button
      id="hamburgerBtn"
      class="flex md:hidden text-white text-3xl focus:outline-none"
      aria-label="Toggle Navigation"
    >
      &#9776;
    </button>
    <!-- Navigation Links -->
    <nav
      id="navbarLinks"
      class="hidden md:flex items-center space-x-4 md:bg-transparent md:relative fixed top-0 left-0 w-full md:w-auto h-full md:h-auto flex-col md:flex-row md:space-y-0 space-y-4 pt-20 md:pt-0"
    >
      <a href="Home.php" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Home</a>
      
      <!-- Programs Dropdown -->
      <div x-data="{ open: false }" class="relative">
        <button
          @click="open = !open"
          class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded flex items-center"
        >
          Programs
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 ml-1"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"
            />
          </svg>
        </button>
        <div
          x-show="open"
          @click.away="open = false"
          class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded-md py-2 z-10"
        >
          <a href="strand.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Strand</a>
          <a href="course.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Courses</a>
        </div>
      </div>

      <a href="Home.php#laboratory" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Activities</a>
      <a href="Home.php#about" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">About Us</a>
      <a href="Home.php#contact" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Contact</a>

      <button
        class="login bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded"
        data-bs-toggle="modal"
        data-bs-target="#loginModal"
      >
        Login
      </button>
      
      <!-- Mobile Close Button -->
      <button
        id="closeMenuBtn"
        class="md:hidden mt-4 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded"
      >
        Close Menu
      </button>
    </nav>
    <!-- Alpine.js for Dropdown -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  </header>

  <!-- Main Content -->
  <main class="pt-24">
    <!-- Strand Hero Section -->
    <section class="strand-hero">
      <div class="container mx-auto px-4">
        <h1 class="text-5xl font-bold mb-4">Academic Strands</h1>
        <p class="text-xl">Choose your path to success with our specialized programs</p>
      </div>
    </section>

    <!-- Academic Strands Cards -->
    <section class="py-16 bg-gray-50" id="strands">
      <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-12">Choose Your Strand</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- STEM Strand Card -->
          <div class="bg-white p-6 rounded-xl shadow-lg transform transition hover:scale-105">
            <img src="image/stem.jpg" alt="STEM Strand" class="w-full h-48 object-cover rounded-md mb-4" />
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">STEM</h3>
            <p class="text-gray-600 mb-4">
              Focused on Science, Technology, Engineering, and Mathematics, fostering analytical and problem-solving skills.
            </p>
            <a href="#stem-details" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Learn More</a>
          </div>
          <!-- ABM Strand Card -->
          <div class="bg-white p-6 rounded-xl shadow-lg transform transition hover:scale-105">
            <img src="image/abm.jpg" alt="ABM Strand" class="w-full h-48 object-cover rounded-md mb-4" />
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">ABM</h3>
            <p class="text-gray-600 mb-4">
              Emphasizes Accountancy, Business, and Management, preparing future leaders in the corporate world.
            </p>
            <a href="#abm-details" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Learn More</a>
          </div>
          <!-- HUMSS Strand Card -->
          <div class="bg-white p-6 rounded-xl shadow-lg transform transition hover:scale-105">
            <img src="image/humss.jpg" alt="HUMSS Strand" class="w-full h-48 object-cover rounded-md mb-4" />
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">HUMSS</h3>
            <p class="text-gray-600 mb-4">
              Focuses on Humanities and Social Sciences, nurturing communication, critical thinking, and social awareness.
            </p>
            <a href="#humss-details" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Learn More</a>
          </div>
          <!-- TVL Strand Card -->
          <div class="bg-white p-6 rounded-xl shadow-lg transform transition hover:scale-105">
            <img src="image/tvl.jpg" alt="TVL Strand" class="w-full h-48 object-cover rounded-md mb-4" />
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">TVL</h3>
            <p class="text-gray-600 mb-4">
              Offers Technical-Vocational-Livelihood training, equipping students with practical skills for immediate employment.
            </p>
            <a href="#tvl-details" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Learn More</a>
          </div>
          <!-- GAS Strand Card -->
          <div class="bg-white p-6 rounded-xl shadow-lg transform transition hover:scale-105">
            <img src="image/gas.jpg" alt="GAS Strand" class="w-full h-48 object-cover rounded-md mb-4" />
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">GAS</h3>
            <p class="text-gray-600 mb-4">
              The General Academic Strand offers a balanced curriculum, blending academic subjects with practical skills for versatile career paths.
            </p>
            <a href="#gas-details" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Learn More</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Detailed Section for STEM -->
    <section class="py-16 bg-white" id="stem-details">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
          <div class="md:w-1/2">
            <h2 class="text-4xl font-bold mb-4">STEM: Science, Technology, Engineering, and Mathematics</h2>
            <p class="text-gray-700 mb-4">
              The STEM strand emphasizes a deep understanding of mathematical concepts and scientific principles. It encourages analytical thinking and problem solving, preparing students for careers in engineering, technology, research, and health sciences.
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4">
              <li><strong>Engineering:</strong> Mechanical, Civil, Electrical, and Computer Engineering</li>
              <li><strong>Computer Science:</strong> Software Development, AI, Data Analytics</li>
              <li><strong>Health Sciences:</strong> Biotechnology, Medical Research, Pharmacology</li>
              <li><strong>Research &amp; Development:</strong> Innovation and Scientific Research</li>
            </ul>
          </div>
          <div class="md:w-1/2 mt-8 md:mt-0">
            <img src="image/stem-detail.jpg" alt="STEM Details" class="w-full h-auto rounded-lg shadow-lg" />
          </div>
        </div>
      </div>
    </section>

    <!-- Detailed Section for ABM -->
    <section class="py-16 bg-gray-50" id="abm-details">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
          <div class="md:w-1/2 order-2 md:order-1 mt-8 md:mt-0">
            <img src="image/abm-detail.jpg" alt="ABM Details" class="w-full h-auto rounded-lg shadow-lg" />
          </div>
          <div class="md:w-1/2 order-1 md:order-2">
            <h2 class="text-4xl font-bold mb-4">ABM: Accountancy, Business, and Management</h2>
            <p class="text-gray-700 mb-4">
              The ABM strand is tailored for students with an affinity for numbers, business, and economic theories. It provides a strong foundation in accounting, financial management, and business practices, preparing students for careers in the corporate world and entrepreneurship.
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4">
              <li><strong>Accountancy:</strong> Financial Reporting, Auditing, Taxation</li>
              <li><strong>Business Administration:</strong> Management, Marketing, HR</li>
              <li><strong>Economics:</strong> Business Economics and Financial Analysis</li>
              <li><strong>Entrepreneurship:</strong> Startups and Small Business Management</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Detailed Section for HUMSS -->
    <section class="py-16 bg-white" id="humss-details">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
          <div class="md:w-1/2">
            <h2 class="text-4xl font-bold mb-4">HUMSS: Humanities and Social Sciences</h2>
            <p class="text-gray-700 mb-4">
              The HUMSS strand nurtures a deep understanding of human behavior, culture, and society. It develops critical thinking, effective communication, and empathetic leadership skills—paving the way for careers in education, law, public service, and media.
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4">
              <li><strong>Communication Arts:</strong> Journalism, Media Studies, Creative Writing</li>
              <li><strong>Social Sciences:</strong> Psychology, Sociology, Political Science</li>
              <li><strong>Humanities:</strong> Literature, Philosophy, History</li>
              <li><strong>Public Service:</strong> Law, Education, Community Development</li>
            </ul>
          </div>
          <div class="md:w-1/2 mt-8 md:mt-0">
            <img src="image/humss-detail.jpg" alt="HUMSS Details" class="w-full h-auto rounded-lg shadow-lg" />
          </div>
        </div>
      </div>
    </section>

    <!-- Detailed Section for TVL -->
    <section class="py-16 bg-gray-50" id="tvl-details">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
          <div class="md:w-1/2 order-2 md:order-1 mt-8 md:mt-0">
            <img src="image/tvl-detail.jpg" alt="TVL Details" class="w-full h-auto rounded-lg shadow-lg" />
          </div>
          <div class="md:w-1/2 order-1 md:order-2">
            <h2 class="text-4xl font-bold mb-4">TVL: Technical-Vocational-Livelihood</h2>
            <p class="text-gray-700 mb-4">
              The TVL track equips students with hands-on skills and technical knowledge that bridge the gap between education and industry. It offers specialized training in various trades, preparing students for immediate employment or further technical education.
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4">
              <li><strong>Culinary Arts:</strong> Cooking Techniques, Food Safety, Hospitality</li>
              <li><strong>Information Technology:</strong> Computer Systems, Networking, Digital Graphics</li>
              <li><strong>Automotive &amp; Electronics:</strong> Vehicle Maintenance, Electrical Systems</li>
              <li><strong>Carpentry:</strong> Woodworking, Furniture Making, Interior Finishing</li>
              <li><strong>Welding:</strong> Metal Fabrication, Construction Welding, Structural Welding</li>
              <li><strong>Tailoring:</strong> Garment Construction, Fashion Design, Textile Care</li>
              <li><strong>Beauty Care:</strong> Cosmetology, Hairdressing, Skincare</li>
              <li><strong>Agri-Fishery:</strong> Agricultural Production, Fisheries Management, Horticulture</li>
              <li><strong>Home Economics:</strong> Culinary, Child Care, Home Management</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Detailed Section for GAS -->
    <section class="py-16 bg-white" id="gas-details">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
          <div class="md:w-1/2">
            <h2 class="text-4xl font-bold mb-4">GAS: General Academic Strand</h2>
            <p class="text-gray-700 mb-4">
              The GAS track offers a balanced curriculum that blends academic rigor with practical skills. It is designed for students who are exploring various fields and are yet to decide on a specialized career path. This strand emphasizes holistic development, critical thinking, and effective communication.
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4">
              <li><strong>Integrated Curriculum:</strong> A mix of sciences, humanities, and social studies</li>
              <li><strong>Flexible Pathways:</strong> Elective choices allow exploration in various disciplines</li>
              <li><strong>Holistic Development:</strong> Emphasis on soft skills, creativity, and leadership</li>
              <li><strong>College Readiness:</strong> Prepares students for diverse tertiary education programs</li>
            </ul>
          </div>
          <div class="md:w-1/2 mt-8 md:mt-0">
            <img src="image/gas-detail.jpg" alt="GAS Details" class="w-full h-auto rounded-lg shadow-lg" />
          </div>
        </div>
      </div>
    </section>

  </main>

<!-- Modern Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-2xl font-bold">Welcome Back</h3>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-3 mb-4">
                    <button class="btn btn-outline-primary flex-grow-1">
                        <i class="bi bi-google me-2"></i>Google
                    </button>
                    <button class="btn btn-outline-primary flex-grow-1">
                        <i class="bi bi-facebook me-2"></i>Facebook
                    </button>
                </div>
                
                <div class="divider my-4">OR</div>
                
                <form>
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="••••••••">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn-gradient w-100">Sign In</button>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <p class="text-muted">Don't have an account? <a href="#" class="text-primary" id="registerForFreeLink">Create account</a></p>
            </div>
        </div>
    </div>
</div>

    <!-- Sign-Up Modal -->
    <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-xl font-bold" id="signUpModalLabel">Sign up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded mb-3" data-bs-toggle="modal" data-bs-target="#schoolIDModal" data-bs-dismiss="modal">Student of STII</button>
                    <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded" data-bs-toggle="modal" data-bs-target="#newUserModal" data-bs-dismiss="modal">Not a Student of STII</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Enter School ID Modal -->
    <div class="modal fade" id="schoolIDModal" tabindex="-1" aria-labelledby="schoolIDModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-xl font-bold" id="schoolIDModalLabel">Please enter school ID number</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-4" placeholder="ex. 222301-2768">
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded" id="completeDetailsBtn">Done</button>
                </div>
            </div>
        </div>
    </div>

    <!-- New User Modal -->
    <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-xl font-bold" id="newUserModalLabel">Complete Your Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-4">
                            <label for="newEmail" class="block font-medium">Email</label>
                            <input type="email" id="newEmail" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-4">
                            <label for="newPassword" class="block font-medium">Password</label>
                            <input type="password" id="newPassword" class="form-control" placeholder="Enter your password">
                        </div>
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded" id="completeSignUpBtn">Complete Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



  <!-- Footer -->
  <footer class="bg-white/80 backdrop-blur-sm text-center py-6 mt-12">
    <p class="text-sm text-gray-600">✨ Made with ❤️ by STII EduGuide • © 2025 ✨</p>
  </footer>



      <!-- Scripts -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('registerForFreeLink').addEventListener('click', function () {
            const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
            const signUpModal = new bootstrap.Modal(document.getElementById('signUpModal'));
            loginModal.hide();
            signUpModal.show();
        });

        document.getElementById('completeDetailsBtn').addEventListener('click', function () {
            window.location.href = 'home_assessment.php';
        });

        document.getElementById('completeSignUpBtn').addEventListener('click', function () {
            window.location.href = 'home_assessment.php';
        });
    </script>
  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Navbar Toggle Script -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const hamburgerBtn = document.getElementById("hamburgerBtn");
      const navbarLinks = document.getElementById("navbarLinks");
      const closeMenuBtn = document.getElementById("closeMenuBtn");

      // Toggle mobile menu on burger button click
      hamburgerBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        navbarLinks.classList.toggle("show");
      });

      // Close mobile menu when clicking the close button
      closeMenuBtn.addEventListener("click", () => {
        navbarLinks.classList.remove("show");
      });

      // Close mobile menu when clicking outside
      document.addEventListener("click", (e) => {
        if (!navbarLinks.contains(e.target) && !hamburgerBtn.contains(e.target)) {
          navbarLinks.classList.remove("show");
        }
      });

      // Close mobile menu when any link inside the menu is clicked
      document.querySelectorAll('#navbarLinks a').forEach(link => {
        link.addEventListener('click', () => {
          navbarLinks.classList.remove("show");
        });
      });
    });
  </script>
</body>
</html>

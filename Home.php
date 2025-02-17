<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>STII EduGuide</title>
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
    /* Custom Styles */
    .dark-overlay {
      background-color: rgba(0, 0, 0, 0.5);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
    }

    /* Updated Hero Section */
    .hero {
      background: url('image/STII.jpg') no-repeat center center/cover;
      height: 100vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Updated Hero Content */
    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 800px;
      padding: 2rem;
      background: transparent;
      border-radius: 1.5rem;
      box-shadow: none;
      backdrop-filter: none;
      text-align: center;
    }

    /* Light and Attractive Text for Hero Content */
    .hero-content h1,
    .hero-content p {
      color: #ffffff;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
    }

    /* Updated Button inside Hero Content */
    .hero-content .btn-gradient {
      background-image: linear-gradient(to right, var(--primary), var(--secondary));
      color: #fff;
      border: none;
      padding: 0.75rem 2rem;
      border-radius: 0.75rem;
      transition: all 0.3s ease;
    }
    .hero-content .btn-gradient:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    }

    header {
      background-color: rgba(0, 0, 0, 0.4);
    }
    .section {
      padding: 50px 20px;
    }
    .section img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    /* Academics Section Styles */
    .academics {
      padding: 50px 20px;
      background-color: #e8f3fc;
    }
    .academics-title {
      font-size: 2rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 40px;
      color: #333;
      text-transform: uppercase;
    }
    .academics-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }
    .academics-card {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
      padding: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .academics-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
    .academics-card img {
      max-width: 100%;
      height: auto;
      margin-bottom: 20px;
      border-radius: 8px;
    }
    .academics-card h3 {
      font-size: 1.2rem;
      font-weight: bold;
      color: #0056b3;
      margin-bottom: 15px;
    }
    .academics-card p {
      font-size: 1rem;
      line-height: 1.6;
      color: #555;
    }
    /* Laboratory Section Styles */
    .laboratory {
      padding: 50px 20px;
      background-color: #f5f5f5;
    }
    .laboratory-title {
      font-size: 2rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 40px;
      color: #333;
      text-transform: uppercase;
    }
    .laboratory-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }
    .activity-card {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
      padding: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .activity-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
    .activity-card img {
      max-width: 100%;
      height: auto;
      margin-bottom: 15px;
      border-radius: 8px;
    }
    .activity-card h3 {
      font-size: 1.2rem;
      font-weight: bold;
      color: #0056b3;
      margin-top: 10px;
      text-transform: uppercase;
    }
    /* Contact Section */
    .contact-section {
      background-color: #a6cbd8;
      padding: 50px 20px;
      color: white;
    }
    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 30px;
      align-items: start;
    }
    .contact-info h2 {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .contact-info p {
      margin: 10px 0;
      font-size: 1rem;
    }
    .contact-form .form-group {
      margin-bottom: 20px;
    }
    .contact-form label {
      font-size: 1rem;
      margin-left: 5px;
      color: white;
    }
    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #d9ebf2;
      font-size: 1rem;
      color: #333;
    }
    .contact-form textarea {
      resize: none;
    }
    .contact-form input:focus,
    .contact-form textarea:focus {
      outline: 2px solid #007bff;
    }
    /* Checkbox Alignment */
    .checkbox-label {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 0.9rem;
      color: white;
    }
    .checkbox-label a {
      color: #007bff;
      text-decoration: underline;
    }
    .btn-submit {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
    }
    .btn-submit:hover {
      background-color: #0056b3;
    }
    /* Responsive Design */
    @media (max-width: 768px) {
      .contact-grid {
        grid-template-columns: 1fr;
      }
      /* Mobile Navigation Styles */
      #navbarLinks {
        background: rgba(0, 0, 0, 0.7);
        display: none; /* Hidden by default */
        flex-direction: column;
        align-items: center;
        padding-top: 60px; /* Space for mobile nav */
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
    /* Desktop Dropdown Styling */
    @media (min-width: 768px) {
      .dropdown-menu {
        background: white !important;
      }
      .dropdown-menu a {
        color: #333 !important;
      }
      .dropdown-menu a:hover {
        background: #f8f9fa !important;
      }
    }
  </style>
</head>
<body>

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

      // Prevent dropdown click propagation (if using Alpine.js for dropdowns)
      document.querySelectorAll('.dropdown-menu').forEach(item => {
        item.addEventListener('click', e => e.stopPropagation());
      });
    });
  </script>

  <header class="fixed top-0 left-0 w-full text-white flex justify-between items-center px-6 py-4 z-50">
    <!-- Logo -->
    <div>
      <img src="image/2.png" alt="STII EduGuide Logo" class="h-10" />
    </div>

    <!-- Hamburger Menu (Visible on Mobile) -->
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
      <!-- Navigation Items -->
      <a href="#home" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Home</a>
      
      <!-- Programs Dropdown -->
      <div x-data="{ open: false }" class="relative">
        <button
          @click="open = !open"
          class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded flex items-center"
        >
          Programs
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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

      <a href="#laboratory" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Activities</a>
      <a href="#about" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">About Us</a>
      <a href="#contact" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Contact</a>

      <button
        class="login bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded"
        data-bs-toggle="modal"
        data-bs-target="#loginModal"
      >
        Login
      </button>
      
      <!-- New Mobile Close Button Below the Login Button -->
      <button
        id="closeMenuBtn"
        class="md:hidden mt-4 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded"
      >
        Close Menu
      </button>
    </nav>
    <!-- Alpine.js for Dropdown (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  </header>


<!-- Modern Hero Section -->
<div class="hero" id="home">
    <div class="dark-overlay"></div>
    <div class="hero-content">
        <h1 class="text-5xl font-bold mb-6 ">Build Your Future With Us</h1>
        <p class="text-xl text-gray-600 mb-8">Discover the best academic path for you with our personalized assessment</p>
        <button class="btn-gradient" data-bs-toggle="modal" data-bs-target="#takeAssessmentModal">
            Start Free Assessment
        </button>
    </div>
</div>

<!-- STII EduGuide Description Section -->
<section class="py-16 bg-gray-50" id="eduguide">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto text-center mb-12">
      <h2 class="text-4xl font-bold text-gray-800 mb-6">About STII EduGuide</h2>
      <p class="text-lg text-gray-600">
      STII EduGuide is an innovative educational initiative developed by BSIT students from the College of Computer Studies at Sibugay Technical Institute Incorporation to help students navigate their academic journey. Our intelligent assessment system combines educational research with cutting-edge technology to provide personalized career path recommendations.      </p>
    </div>

    <div class="grid md:grid-cols-2 gap-8 items-center">
      <div class="bg-white p-8 rounded-xl shadow-lg">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Key Features</h3>
        <ul class="space-y-4">
          <li class="flex items-center">
            <i class="bi bi-person-badge text-blue-500 text-xl mr-3"></i>
            Personalized career assessments
          </li>
          <li class="flex items-center">
            <i class="bi bi-graph-up text-green-500 text-xl mr-3"></i>
            Skill gap analysis
          </li>
          <li class="flex items-center">
            <i class="bi bi-book text-purple-500 text-xl mr-3"></i>
            Course recommendations
          </li>
          <li class="flex items-center">
            <i class="bi bi-briefcase text-orange-500 text-xl mr-3"></i>
            Career pathway mapping
          </li>
        </ul>
      </div>
      <img src="image/eduguide-process.jpg" alt="EduGuide Process" class="rounded-xl shadow-lg">
    </div>
  </div>
</section>

<!-- School History Section -->
<section class="py-16 bg-white" id="history">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-4xl font-bold text-center mb-12">Our History & Legacy</h2>
      <div class="grid gap-8 md:grid-cols-2">
        <div class="space-y-6">
          <div class="bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-3">Founded in 1997</h3>
            <p class="text-gray-600">
              Established as a technical vocational institute in Ipil, Zamboanga Sibugay, STII has grown from a small training center to a comprehensive educational institution serving thousands of students annually.
            </p>
          </div>
          <div class="bg-green-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-3">TESDA Recognition</h3>
            <p class="text-gray-600">
              Accredited by the Technical Education and Skills Development Authority (TESDA) since 2001, offering quality technical-vocational programs.
            </p>
          </div>
        </div>
        <div class="space-y-6">
          <div class="bg-yellow-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-3">Expansion</h3>
            <p class="text-gray-600">
              Expanded to offer senior high school programs in 2016 under the K-12 system, followed by college degree programs in 2019.
            </p>
          </div>
          <div class="bg-purple-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-3">Awards</h3>
            <p class="text-gray-600">
              Recipient of multiple regional awards for technical education excellence and community development initiatives.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Campus Facilities Section -->
<section class="py-16 bg-gray-100" id="campus">
  <div class="container mx-auto px-4">
    <h2 class="text-4xl font-bold text-center mb-12">Campus Facilities</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <img src="image/computer-lab.jpg" alt="Computer Lab" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold mb-2">Technology Labs</h3>
          <p class="text-gray-600">State-of-the-art computer laboratories with latest software and hardware</p>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <img src="image/library.jpg" alt="Library" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold mb-2">Learning Resource Center</h3>
          <p class="text-gray-600">Comprehensive library with digital resources and study spaces</p>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <img src="image/workshop.jpg" alt="Workshop" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold mb-2">Technical Workshops</h3>
          <p class="text-gray-600">Fully-equipped workshops for hands-on technical training</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-16 bg-blue-800 text-white" id="mission">
  <div class="container mx-auto px-4 text-center">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-4xl font-bold mb-8">Our Core Values</h2>
      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white bg-opacity-10 p-8 rounded-xl">
          <h3 class="text-2xl font-semibold mb-4">Mission</h3>
          <p class="text-gray-200">
            To provide quality technical education and training that produces competent graduates equipped with practical skills and moral values for global competitiveness.
          </p>
        </div>
        <div class="bg-white bg-opacity-10 p-8 rounded-xl">
          <h3 class="text-2xl font-semibold mb-4">Vision</h3>
          <p class="text-gray-200">
            To be the leading technical-vocational institution in Mindanao recognized for producing highly skilled professionals and entrepreneurs.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


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

<!-- Enhanced Assessment Modal -->
<div class="modal fade" id="takeAssessmentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="mb-4">
                    <div class="icon-lg bg-primary text-white rounded-circle d-inline-flex mb-3">
                        <i class="bi bi-clipboard-check fs-4"></i>
                    </div>
                    <h3 class="mb-3">Ready to Discover Your Path?</h3>
                    <p class="text-muted">Please sign in to start your personalized assessment</p>
                </div>
                <div class="d-flex gap-3 justify-content-center">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Later</button>
                    <button class="btn-gradient" data-bs-target="#loginModal" data-bs-toggle="modal">
                        Sign In Now
                    </button>
                </div>
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
    <div class="section" id="about">
    <div class="container">
        <div class="text-center mb-5">
            <h1 style="font-size: 2.5rem; font-weight: bold;">
                Welcome to Sibugay Technical Institute Incorporation
            </h1>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <p style="font-size: 1.2rem; line-height: 1.8;">
                    At Sibugay Technical Institute, we are committed to nurturing a global community of learners.
                    Our rigorous and engaging curriculum is designed to challenge and inspire students. With dedicated
                    faculty members who are experts in their fields, we foster a love of learning and critical thinking.
                </p>
                <p style="font-size: 1.2rem; line-height: 1.8;">
                    Beyond academics, we provide a wide range of extracurricular activities, from arts and athletics
                    to clubs and leadership opportunities, allowing students to explore their passions and develop
                    new skills.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="image/project.png" alt="School Building" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>
<div class="academics" id="academics">
    <div class="container">
        <h2 class="academics-title">ACADEMICS</h2>
        <div class="academics-grid">
            <!-- Primary Years Programme -->
            <div class="academics-card">
                <img src="image/primary.png" alt="Primary Years Programme">
                <h3>PRIMARY YEARS PROGRAMME</h3>
                <p>
                    The Primary section offers the Primary Years Programme (PYP) for children aged 3 - 12.
                    The programme nurtures young students to be caring, lifelong learners who are
                    internationally open-minded individuals.
                </p>
            </div>
            <!-- Middle Years Programme -->
            <div class="academics-card">
                <img src="image/middle.png" alt="Middle Years Programme">
                <h3>MIDDLE YEARS PROGRAMME</h3>
                <p>
                    The Middle Years Programme (Grades 6-10) is a concept and skill-based curriculum that
                    encourages student inquiry and aids in the development of personal understanding and
                    a sense of responsibility in their community.
                </p>
            </div>
            <!-- Diploma Programme -->
            <div class="academics-card">
                <img src="image/diploma.png" alt="Diploma Programme">
                <h3>DIPLOMA PROGRAMME</h3>
                <p>
                    The Diploma Programme (Grade 11-12) helps students to broaden their experience in
                    education, challenging them to then apply their education in today’s world.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="laboratory" id="laboratory">
    <div class="container">
        <h2 class="laboratory-title">ACTIVITIES</h2>
        <div class="laboratory-grid">
            <!-- Activity 1 -->
            <div class="activity-card">
                <img src="image/smart_classes.png" alt="Smart Classes">
                <h3>SMART CLASSES</h3>
            </div>
            <!-- Activity 2 -->
            <div class="activity-card">
                <img src="image/scientific_labs.png" alt="Scientific Labs">
                <h3>SCIENTIFIC LABS</h3>
            </div>
            <!-- Activity 3 -->
            <div class="activity-card">
                <img src="image/seminar_halls.png" alt="Seminar Halls">
                <h3>SEMINAR HALLS</h3>
            </div>
            <!-- Activity 4 -->
            <div class="activity-card">
                <img src="image/auditorium.png" alt="Auditorium">
                <h3>AUDITORIUM</h3>
            </div>
            <!-- Activity 5 -->
            <div class="activity-card">
                <img src="image/libraries.png" alt="Libraries">
                <h3>LIBRARIES</h3>
            </div>
            <!-- Activity 6 -->
            <div class="activity-card">
                <img src="image/kindergartens.png" alt="Kindergartens">
                <h3>KINDERGARTENS</h3>
            </div>
        </div>
    </div>
</div>
<div class="contact-section" id="contact">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Details -->
            <div class="contact-info">
                <h2>Contact Us</h2>
                <!-- <p>Register for daily updates</p> -->
                <p><strong>Email:</strong> STII_EduGuide@gmail.com</p>
                <p><strong>Phone:</strong> +63 906-7111-971</p>
                <p><strong>Address:</strong> Lower Taway, Ipil, Zamboanga Sibugay</p>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="4" placeholder="Type your message..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
        <!-- Footer -->
        <footer class="bg-white/80 backdrop-blur-sm text-center py-6 mt-12">
        <p class="text-sm text-gray-600">
            ✨ Made with ❤️ by STII EduGuide • © 2025 ✨
        </p>
    </footer>
</body>
</html>

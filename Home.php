<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STII EduGuide</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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

        .hero {
            background: url('image/STII.jpg') no-repeat center center/cover;
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 50px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            max-width: 700px;
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
    background-color: #f5f5f5; /* Light gray background */
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
    background-color: #a6cbd8; /* Light teal background */
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
    align-items: center; /* Ensures checkbox and text align on the same line */
    gap: 10px; /* Space between checkbox and text */
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
}

@media (min-width: 768px) {
    #navbarLinks {
        flex-direction: row; /* Links inline on desktop */
        position: static; /* Static for desktop */
        background-color: transparent;
        display: flex !important; /* Always visible */
        margin-left: auto; /* Align links to the right */
    }

    #navbarLinks a,
    #navbarLinks button {
        width: auto;
        padding: 0;
        border-bottom: none;
    }
}


/* Desktop Layout (Visible always for larger screens) */
@media (min-width: 768px) {
    #navbarLinks {
        display: flex !important; /* Always visible on larger screens */
        flex-direction: row; /* Inline links */
        background-color: transparent;
        position: static; /* No fixed positioning */
    }

    #navbarLinks a,
    #navbarLinks button {
        padding: 0;
        width: auto;
        border: none;
        text-align: left;
    }
}

/* Mobile Layout (Hidden links and hamburger menu visible) */
@media (max-width: 767px) {
    #navbarLinks {
        display: none; /* Initially hidden for mobile */
        flex-direction: column;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.9); /* Dropdown background */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
        padding-top: 20px;
    }

    #navbarLinks.show {
        display: flex !important; /* Display dropdown on toggle */
    }

    #navbarLinks a,
    #navbarLinks button {
        color: white;
        padding: 10px 20px;
        text-align: center;
        width: 100%; /* Full width for dropdown items */
        border-bottom: 1px solid #444; /* Add dividers between items */
    }

    #navbarLinks a:hover,
    #navbarLinks button:hover {
        background-color: rgba(255, 255, 255, 0.2); /* Highlight on hover */
    }
}

/* Hamburger Button Styling */
#hamburgerBtn {
    background: none;
    border: none;
    cursor: pointer;
}

    </style>
</head>
<body>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const navbarLinks = document.getElementById("navbarLinks");

    hamburgerBtn.addEventListener("click", () => {
        navbarLinks.classList.toggle("show"); // Toggles the visibility of the menu
    });
});
</script>
<header class="fixed top-0 left-0 w-full text-white flex justify-between items-center px-6 py-4 z-50 ">
    <!-- Logo -->
    <div class="text-xl font-bold text-blue-600"><i class="bi bi-mortarboard-fill mr-2"></i>STII EduGuide</div>

    <!-- Hamburger Menu (Visible in Mobile) -->
    <button
        id="hamburgerBtn"
        class="flex md:hidden text-white text-3xl focus:outline-none"
        aria-label="Toggle Navigation"
    >
        &#9776;
    </button>

    <!-- Navigation Links -->
<!-- Navigation Bar -->
<nav
    id="navbarLinks"
    class="hidden md:flex items-center space-x-4 md:bg-transparent md:relative fixed top-0 left-0 w-full md:w-auto h-full md:h-auto flex-col md:flex-row md:space-y-0 space-y-4 pt-20 md:pt-0"
>
    <a href="#home" class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded">Home</a>

    <!-- Dropdown Wrapper -->
    <div x-data="{ open: false }" class="relative">
        <!-- Dropdown Trigger -->
        <button 
            @click="open = !open" 
            class="hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded flex items-center"
        >
            Programs
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div 
            x-show="open" 
            @click.away="open = false" 
            class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded-md py-2 z-10"
        >
            <a href="#strand" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Strand</a>
            <a href="#courses" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Courses</a>
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
</nav>

<!-- Alpine.js for Dropdown -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</header>

    <!-- Hero Section -->
    <div class="hero" id="home">
        <div class="dark-overlay"></div>
        <div class="hero-content">
            <h1 class="text-4xl font-bold" style="font-size:65px;">Join Us</h1>
            <h2 class="text-4xl" style="margin-top: 10px;">The School That Cares For Your Future</h2>
            <p class="text-lg" style="font-size: 20px;">Get Ready for Your Future! 🎓 Take the assessment and find the perfect strand and course for you!</p>
            <button class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded shadow" data-bs-toggle="modal" data-bs-target="#takeAssessmentModal" style="margin-top: 10px;">Take the Assessment</button>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-xl font-bold" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                                        <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="margin-top: 15px;">
                    <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" style="margin-bottom: 20px;">
                    <label for="floatingPassword">Password</label>
                    </div>
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded">Sign in</button>
                    </form>
                </div>
                <div class="modal-footer text-center">
                    <p>Don't have an account yet? <a href="#" class="text-blue-600 hover:underline" id="registerForFreeLink">Register for free</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Take Assessment Modal -->
    <div class="modal fade" id="takeAssessmentModal" tabindex="-1" aria-labelledby="takeAssessmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-xl font-bold" id="takeAssessmentModalLabel">Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>You need to log in first to take the assessment.</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Go to Login</button>
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
</body>
</html>

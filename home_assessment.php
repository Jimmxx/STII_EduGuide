<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Assessment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            padding: 100px 20px 20px;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .wave {
            animation: wave-animation 2s infinite;
            margin-bottom: 1rem;
            font-size: 3.5rem;
        }

        .btn-custom {
            background: white;
            border: 2px solid #0d6efd;
            color: #0d6efd;
            padding: 1.5rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-custom:hover {
            background: #0d6efd;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-custom:active {
            transform: translateY(0);
        }

        .profile-pic {
            width: 35px;
            height: 35px;
            border: 2px solid #0d6efd;
            border-radius: 50%;
        }

        @keyframes wave-animation {
            0% { transform: rotate(0deg); }
            10% { transform: rotate(14deg); }
            20% { transform: rotate(-8deg); }
            30% { transform: rotate(14deg); }
            40% { transform: rotate(-4deg); }
            50% { transform: rotate(10deg); }
            60% { transform: rotate(0deg); }
            100% { transform: rotate(0deg); }
        }

        @media (max-width: 768px) {
            .container {
                padding-top: 80px;
            }
            
            .btn-custom {
                width: 100%;
                margin-bottom: 1rem;
            }

            .wave {
                font-size: 2.5rem;
            }

            .header h1 {
                font-size: 1.2rem;
            }

            .profile-pic {
                width: 30px;
                height: 30px;
            }
        }
    </style>
</head>
<body>

<!-- Header (Fixed and Corrected for Bootstrap) -->
<header class="fixed-top bg-primary text-white d-flex justify-content-between align-items-center px-4 py-3">
    <!-- Logo -->
    <div>
        <img src="image/2.png" alt="STII EduGuide Logo" style="height: 40px;">
    </div>
    <!-- Profile Section -->
    <div class="d-flex align-items-center gap-3">
        <img src="image/profile.jpg" alt="Profile" class="profile-pic">
        <span class="d-none d-md-inline text-sm">User Name</span>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="text-center mb-5">
        <div class="wave">👋</div>
        <h1 class="display-5 fw-bold mb-3">Hi there!</h1>
        <p class="lead text-muted mb-4">Let's get started by selecting your current educational status</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-custom w-100" onclick="location.href='instruction.php'">
                Incoming Senior High School Student
            </button>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-custom w-100" onclick="location.href='college_assessment/instructioncol.php'">
                Incoming College Student
            </button>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <button class="btn btn-custom w-100" onclick="location.href='other.php'">
                None of the Above
            </button>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

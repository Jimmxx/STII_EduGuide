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
            background-color: #FFEB3B;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            padding-top: 150px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 60px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .btn-custom {
            width: 300px;
            height: 60px;
            margin: 0;
            border: 2px solid black;
            background-color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
        }

        .btn-custom:hover {
            background-color: #f1f1f1;
        }

        header img {
            margin: 20px auto;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logout {
            font-size: 16px;
            position: absolute;
            right: 50px;
            top: 20px;
            text-decoration: none;
            font-weight: bold;
            color: black;
        }

        .logout:hover {
            color: #555;
        }

        /* Waving Hand Animation */
        .wave {
            font-size: 3rem;
            display: inline-block;
            animation: wave-animation 2s infinite;
            margin-bottom: 20px;
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
        body {
            background-color:skyblue;
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 40px;
            background-color: transparent; /* Transparent navbar */
            color: black; /* Black text for navbar */
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .header-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .header-left h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
        }

        .back-arrow {
            font-size: 1rem;
            color: black; /* Black color for back link */
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-top: 20px;
            margin-left: 5px; /* Adjusted position for better visibility */
        }

        .back-arrow:hover {
            text-decoration: underline;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid black; /* Black border for profile picture */
            object-fit: cover;
        }

    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-left">
        <h1><a href="home_assessment.php" style="text-decoration:none;color:black;"> STII EduGuide</a></h1>
        </div>
        <div class="header-right">
            <img src="image/profile.jpg" alt="Profile Picture" class="profile-pic">
            <span>User Name</span>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="wave">👋</div>
        <h1>Hi there,</h1>
        <h2>Before we begin, pick which describes you best</h2>
        <div class="btn-container">
            <button class="btn btn-custom" onclick="location.href='instruction.php'">Incoming Senior High School Student</button>
            <button class="btn btn-custom">Incoming College Student</button>
            <button class="btn btn-custom">None of the Above</button>
        </div>
    </div>
</body>
</html>

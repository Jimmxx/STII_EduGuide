<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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

        .container {
            max-width: 700px;
            margin: 120px auto 0; /* Adjusted margin to account for navbar */
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        p {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .btn-custom {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="header">
        <div class="header-left">
        <h1><a href="home_assessment.php" style="text-decoration:none;color:black;"> STII EduGuide</a></h1>
        <a href="home_assessment.php" class="back-arrow">← Back to Home</a>
        </div>
        <div class="header-right">
            <img src="image/profile.jpg" alt="Profile Picture" class="profile-pic">
            <span>User Name</span>
        </div>
    </div>

    <!-- Instructions Content -->
    <div class="container">
        <h1>Welcome to the Assessment</h1>
        <p>
            In this assessment, you will be asked to make choices between two options.
            These questions are designed to help us understand your preferences better and
            recommend the best strand or course for you.
        </p>
        <p>Click "Start" when you're ready to begin the assessment!</p>
        <button class="btn-custom" onclick="location.href='assessment.php'">Start</button>
    </div>
</body>
</html>

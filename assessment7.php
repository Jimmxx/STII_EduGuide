<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: skyblue; /* Sky blue background */
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
            max-width: 900px;
            margin: 100px auto 50px; /* Added margin to account for fixed navbar */
            text-align: center;
            padding: 20px;
        }

        h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333; /* Darker gray for text */
        }

        .options {
            display: flex;
            justify-content: center;
            align-items: stretch; /* Ensures all options are the same height */
            gap: 40px; /* Space between the options */
        }

        .option {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between; /* Ensures even spacing between elements */
            text-align: center;
            width: 40%; /* Equal width for both options */
            border: 1px solid #ddd; /* Light gray border */
            padding: 20px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Added shadow for a 3D effect */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effect */
        }

        .option:hover {
            transform: translateY(-5px); /* Lift the box slightly */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Enhance the shadow */
        }

        .option img {
            max-width: 70%;
            height: auto;
            margin-bottom: 15px;
        }

        .option p {
            font-size: 1rem;
            margin-bottom: 15px;
            flex-grow: 1; /* Pushes buttons to the bottom */
            color: #555; /* Medium gray text */
        }

        .option button {
            background-color: #28a745; /* Green for active button */
            color: white;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%; /* Full width buttons for better alignment */
            transition: background-color 0.3s ease;
        }

        .option button:hover {
            background-color: #218838;
        }

        .option button.locked {
            background-color: #ffc107; /* Yellow for locked button */
            color: black; /* Black text for better contrast */
            cursor: pointer; /* Allow unlocking */
        }

        .arrow {
            font-size: 2rem;
            color: #007bff;
            margin-top: 40px;
            cursor: pointer;
        }

        .arrow:hover {
            color: #0056b3;
        }

        .warning {
            color: red;
            margin-top: 10px;
            font-size: 1rem;
            display: none; /* Hidden by default */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .options {
                flex-direction: column;
                gap: 30px; /* Adjust gap for mobile view */
            }

            .option {
                width: 100%; /* Full width for mobile */
            }

            .option button {
                width: 90%; /* Adjust button size for mobile */
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
        <h1><a href="home_assessment.php" style="text-decoration:none;color:black;"> STII EduGuide</a></h1>
        <a href="assessment6.php" class="back-arrow">← previous</a>
        </div> <div>7 out of 10</div>
        <div class="header-right">
            <img src="image/profile.jpg" alt="Profile Picture" class="profile-pic">
            <span>User Name</span>
        </div>
    </div>
    <div class="container">
        <h2>What interests you more?</h2>
        <div class="options">
            <div class="option">
                <!-- Sports Illustration -->
                <img src="image/poem.png" alt="Sports">
                <p>Presenting ideas or speaking publicly</p>
                <button onclick="toggleOption(this)">Play Sports</button>
            </div>
            <div class="option">
                <!-- Board Games Illustration -->
                <img src="image/project.png" alt="Board Games">
                <p>Working with machines or gadgets</p>
                <button onclick="toggleOption(this)">Play Board Games</button>
            </div>
        </div>
        <button class="arrow" id="nextButton" onclick="validateSelection()">➡️</button>
        <p class="warning" id="warningText">Please lock a button before proceeding to the next question.</p>
    </div>

    <script>
        let selectedButton = null;

        function toggleOption(button) {
            const allButtons = document.querySelectorAll(".option button");

            if (selectedButton === button) {
                // Unlock if the same button is clicked again
                button.classList.remove("locked");
                selectedButton = null;
            } else {
                // Unlock all buttons and lock the clicked button
                allButtons.forEach(btn => btn.classList.remove("locked"));
                button.classList.add("locked");
                selectedButton = button;
            }

            // Hide the warning text if a button is locked
            document.getElementById("warningText").style.display = "none";
        }

        function validateSelection() {
            if (selectedButton) {
                location.href = "assessment8.php"; // Redirect to next question
            } else {
                const warning = document.getElementById("warningText");
                warning.style.display = "block"; // Show the warning message
            }
        }
    </script>
</body>
</html>

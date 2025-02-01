<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Profile Styles */
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <header class="fixed top-0 left-0 w-full bg-pink-500 text-black flex justify-between items-center px-6 py-4 z-50">
        <div class="text-xl font-bold"><a href="home_assessment.php">STII EduGuide</a></div>
        <nav class="flex items-center space-x-4">

            <div class="flex items-center space-x-2">
                <img src="image/profile.jpg" alt="Profile Picture" class="profile-pic">
                <span>User Name</span>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="bg-pink-0 pt-24 pb-12 text-center">
        <h1 class="text-4xl font-bold">Based on Your Answers</h1>
        <p class="text-lg mt-4">Here are the strands that fit you best.</p>
    </div>

    <!-- Instructions -->
    <div class="max-w-4xl mx-auto px-4 py-6 text-center">
        <p class="mt-2 text-gray-700 text-sm">
            <span class="font-bold text-pink-500">Tip:</span> Tap or hover over the strand title to get the stream_bucket_append description.
        </p>
    </div>

    <!-- Careers Section -->
    <div class="max-w-4xl mx-auto px-4 py-6">
        <h2 class="text-xl md:text-2xl font-bold mb-4">Recommended Strands For You</h2>
        <ul class="grid gap-4 md:gap-6 grid-cols-1 md:grid-cols-2">
            <!-- Career Items -->
            <li class="bg-white p-4 shadow rounded flex items-center">
                <input type="checkbox" class="form-check-input mr-4">
                <a href="#" class="text-blue-500 hover:underline text-base md:text-lg flex-1">Creative Director</a>
                <span class="text-blue-500 text-lg cursor-pointer ml-2" title="Click for more info">ℹ️</span>
            </li>
            <li class="bg-white p-4 shadow rounded flex items-center">
                <input type="checkbox" class="form-check-input mr-4">
                <a href="#" class="text-blue-500 hover:underline text-base md:text-lg flex-1">Web Designer</a>
                <span class="text-blue-500 text-lg cursor-pointer ml-2" title="Click for more info">ℹ️</span>
            </li>
            <li class="bg-white p-4 shadow rounded flex items-center">
                <input type="checkbox" class="form-check-input mr-4">
                <a href="#" class="text-blue-500 hover:underline text-base md:text-lg flex-1">Office Manager</a>
                <span class="text-blue-500 text-lg cursor-pointer ml-2" title="Click for more info">ℹ️</span>
            </li>
            <li class="bg-white p-4 shadow rounded flex items-center">
                <input type="checkbox" class="form-check-input mr-4">
                <a href="#" class="text-blue-500 hover:underline text-base md:text-lg flex-1">Marketing Manager</a>
                <span class="text-blue-500 text-lg cursor-pointer ml-2" title="Click for more info">ℹ️</span>
            </li>
            <li class="bg-white p-4 shadow rounded flex items-center">
                <input type="checkbox" class="form-check-input mr-4">
                <a href="#" class="text-blue-500 hover:underline text-base md:text-lg flex-1">Editor</a>
                <span class="text-blue-500 text-lg cursor-pointer ml-2" title="Click for more info">ℹ️</span>
            </li>
            <li class="bg-white p-4 shadow rounded flex items-center">
                <input type="checkbox" class="form-check-input mr-4">
                <a href="#" class="text-blue-500 hover:underline text-base md:text-lg flex-1">IT Specialist</a>
                <span class="text-blue-500 text-lg cursor-pointer ml-2" title="Click for more info">ℹ️</span>
            </li>
            <li class="bg-white p-4 shadow rounded flex items-center">
                <input type="checkbox" class="form-check-input mr-4">
                <a href="#" class="text-blue-500 hover:underline text-base md:text-lg flex-1">Ultrasound Technologist</a>
                <span class="text-blue-500 text-lg cursor-pointer ml-2" title="Click for more info">ℹ️</span>
            </li>
            <li class="bg-white p-4 shadow rounded flex items-center">
                <input type="checkbox" class="form-check-input mr-4">
                <a href="#" class="text-blue-500 hover:underline text-base md:text-lg flex-1">Police Officer</a>
                <span class="text-blue-500 text-lg cursor-pointer ml-2" title="Click for more info">ℹ️</span>
            </li>
        </ul>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 bg-gray-200 mt-6">
        <p class="text-sm text-gray-600">© 2025 STII EduGuide</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

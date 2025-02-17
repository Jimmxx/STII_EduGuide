<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assessment Results</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Patrick+Hand&display=swap" rel="stylesheet">
  <style>
    .profile-pic {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }
    .bounce-hover:hover {
      animation: bounce 0.5s;
    }
    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
  </style>
</head>
<body class="bg-gradient-to-br from-pink-100 to-blue-100 font-[PatrickHand]" 
      style="opacity: 0; transition: opacity 1s ease;"
      onload="document.body.style.opacity = '1'">

  <!-- Navbar -->
  <header class="flex flex-wrap items-center justify-between p-4 sm:px-8 bg-white/80 backdrop-blur-sm shadow-md fixed w-full top-0 z-50">
    <div class="flex flex-col items-start">
      <a href="../home_assessment.php" class="flex items-center bg-transparent">
        <img src="image/2.png" alt="Logo" class="w-200 h-9 bg-transparent" style="margin-top: -5px;">
      </a>
      <a href="../home_assessment.php" class="mt-2 text-sm text-black hover:underline">
        ← Back to Home Assessment
      </a>
    </div>
    <div class="flex items-center space-x-4 mt-2 sm:mt-0">
      <div class="bg-yellow-300 px-3 py-1 rounded-full text-sm font-bold shadow-sm">
        🎉 3/3
      </div>
      <div class="relative group">
        <img src="image/profile.jpg" alt="Profile" class="w-10 h-10 rounded-full border-2 border-purple-500 shadow-lg">
        <span class="hidden sm:inline ml-2 text-gray-700">User Name</span>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <div class="pt-32 pb-12 text-center px-4">
    <h1 class="text-4xl font-bold text-purple-600 mb-4 animate-bounce">
      🎉 Ta-da! Your Future Path! 🚀
    </h1>
    <p class="text-xl text-gray-700">
      Discover your perfect match from these awesome options!
    </p>
    <div class="mt-6 bg-yellow-100 p-4 rounded-lg max-w-2xl mx-auto">
      <p class="text-sm text-yellow-800">
        ✨ <span class="font-bold">Pro Tip:</span> Click the sparkle icons for super cool info! ✨
      </p>
    </div>
  </div>

  <!-- Recommendations Section -->
  <div class="max-w-6xl mx-auto px-4 py-6">
    <h2 class="text-3xl font-bold mb-8 text-center text-blue-600">
      🌟 Your Top Recommendations 🌟
    </h2>

    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
      <!-- BSIT Card -->
      <div class="bg-white p-6 rounded-2xl shadow-xl transform transition hover:scale-105">
        <div class="bg-blue-100 p-4 rounded-xl mb-4">
          <img src="image/bsit.png" alt="BSIT" class="w-full h-32 object-contain bounce-hover">
        </div>
        <h3 class="text-2xl font-bold text-blue-600 mb-4">
          BSIT
        </h3>
        <div class="space-y-4">
          <div class="flex items-center bg-green-50 p-3 rounded-lg">
            <span class="mr-3">💻</span>
            <span>IT Innovator</span>
            <button class="ml-auto text-blue-400 hover:text-blue-600" 
                    onclick="alert('Design and manage innovative IT solutions!')">✨</button>
          </div>
          <div class="flex items-center bg-purple-50 p-3 rounded-lg">
            <span class="mr-3">🔧</span>
            <span>Systems Specialist</span>
            <button class="ml-auto text-purple-400 hover:text-purple-600"
                    onclick="alert('Optimize systems and enhance network efficiency!')">✨</button>
          </div>
        </div>
      </div>

      <!-- BSCS Card -->
      <div class="bg-white p-6 rounded-2xl shadow-xl transform transition hover:scale-105">
        <div class="bg-green-100 p-4 rounded-xl mb-4">
          <img src="image/bscs.png" alt="BSCS" class="w-full h-32 object-contain bounce-hover">
        </div>
        <h3 class="text-2xl font-bold text-green-600 mb-4">
          BSCS
        </h3>
        <div class="space-y-4">
          <div class="flex items-center bg-yellow-50 p-3 rounded-lg">
            <span class="mr-3">👨‍💻</span>
            <span>Code Master</span>
            <button class="ml-auto text-yellow-400 hover:text-yellow-600"
                    onclick="alert('Develop cutting-edge software applications!')">✨</button>
          </div>
          <div class="flex items-center bg-pink-50 p-3 rounded-lg">
            <span class="mr-3">🤖</span>
            <span>Algorithm Ace</span>
            <button class="ml-auto text-pink-400 hover:text-pink-600"
                    onclick="alert('Solve complex problems with brilliant algorithms!')">✨</button>
          </div>
        </div>
      </div>

      <!-- BMMA Card -->
      <div class="bg-white p-6 rounded-2xl shadow-xl transform transition hover:scale-105">
        <div class="bg-red-100 p-4 rounded-xl mb-4">
          <img src="image/bmma.png" alt="BMMA" class="w-full h-32 object-contain bounce-hover">
        </div>
        <h3 class="text-2xl font-bold text-red-600 mb-4">
          BMMA
        </h3>
        <div class="space-y-4">
          <div class="flex items-center bg-blue-50 p-3 rounded-lg">
            <span class="mr-3">🎨</span>
            <span>Creative Storyteller</span>
            <button class="ml-auto text-blue-400 hover:text-blue-600"
                    onclick="alert('Express your creativity through innovative media!')">✨</button>
          </div>
          <div class="flex items-center bg-orange-50 p-3 rounded-lg">
            <span class="mr-3">🎬</span>
            <span>Media Specialist</span>
            <button class="ml-auto text-orange-400 hover:text-orange-600"
                    onclick="alert('Master the art of visual and digital communication!')">✨</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Next Steps -->
  <div class="max-w-4xl mx-auto px-4 py-12 text-center">
    <h3 class="text-2xl font-bold mb-6 text-purple-600">
      Ready for Your Next Adventure? 🌈
    </h3>
    <button class="bg-purple-500 hover:bg-purple-600 text-white text-xl px-8 py-3 rounded-full shadow-lg transition-all"
            onclick="location.href='learning_path.html'">
      Show My Learning Path ➔
    </button>
  </div>

  <!-- Footer -->
  <footer class="bg-white/80 backdrop-blur-sm text-center py-6 mt-12">
    <p class="text-sm text-gray-600">
      ✨ Made with ❤️ by STII EduGuide • © 2025 ✨
    </p>
  </footer>
</body>
</html>

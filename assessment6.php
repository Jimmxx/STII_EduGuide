<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assessment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add a playful font -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Patrick+Hand&display=swap" rel="stylesheet">
  </head>
  <body class="bg-gradient-to-br from-blue-100 to-purple-100 font-[PatrickHand]"
        style="opacity: 0; transition: opacity 1s ease;"
        onload="document.body.style.opacity = '1'">
    
    <!-- Navbar -->
    <header class="flex flex-wrap items-center justify-between p-4 sm:px-8 bg-white/80 backdrop-blur-sm shadow-md">
      <div class="flex flex-col items-start">
      <a href="assessment3.php" class="flex items-center bg-transparent">
  <img src="image/2.png" alt="Logo" class="w-200 h-9 bg-transparent " style="margin-top: -5px;">
</a>

        <a href="assessment5.php" class="mt-2 text-sm text-black hover:underline">
          ← previous
        </a>
      </div>
      
      <!-- Progress & Profile -->
      <div class="flex items-center space-x-4 mt-2 sm:mt-0">
        <div class="bg-yellow-300 px-3 py-1 rounded-full text-sm font-bold shadow-sm">
          🚀 6/6
        </div>
        <div class="relative group">
          <img src="image/profile.jpg" alt="Profile" class="w-10 h-10 rounded-full border-2 border-purple-500 shadow-lg">
          <span class="hidden sm:inline ml-2 text-gray-700">User Name</span>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center text-gray-800 animate-pulse">
     What career do you see yourself in the future?
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
        <!-- Option a: Conducting experiments -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-blue-100 rounded-lg p-3 mb-4">
            <img src="image/science.png" alt="Conducting experiments" class="w-full h-24 object-contain">
          </div>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Doctor, Engineer, or Scientist</span>
            <span class="ml-2">🚀</span>
          </button>
        </div>

        <!-- Option b: Solving math problems -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-green-100 rounded-lg p-3 mb-4">
            <img src="image/math.png" alt="Solving math problems" class="w-full h-24 object-contain">
          </div>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Technician, IT Specialist, Mechanic, or Chef  </span>
            <span class="ml-2">📐</span>
          </button>
        </div>

        <!-- Option c: Writing, debating, or public speaking -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-yellow-100 rounded-lg p-3 mb-4">
            <img src="image/writing.png" alt="Writing, debating, or public speaking" class="w-full h-24 object-contain">
          </div>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Accountant, Economist, or Statistician </span>
            <span class="ml-2">🗣️</span>
          </button>
        </div>

        <!-- Option d: Drawing, designing, or performing -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-pink-100 rounded-lg p-3 mb-4">
            <img src="image/arts.png" alt="Drawing, designing, or performing" class="w-full h-24 object-contain">
          </div>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Journalist, Lawyer, or Teacher </span>
            <span class="ml-2">🎨</span>
          </button>
        </div>

        <!-- Option e: Managing businesses or financial planning -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-purple-100 rounded-lg p-3 mb-4">
            <img src="image/business.png" alt="Managing businesses or financial planning" class="w-full h-24 object-contain">
          </div>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Painter, Designer, or Musician  </span>
            <span class="ml-2">💼</span>
          </button>
        </div>

        <!-- Option f: Working with hands, fixing, or cooking -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-red-100 rounded-lg p-3 mb-4">
            <img src="image/hands.png" alt="Working with hands, fixing, or cooking" class="w-full h-24 object-contain">
          </div>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Entrepreneur, Manager, or Marketer  </span>
            <span class="ml-2">👩‍🍳</span>
          </button>
        </div>
        
      </div>
    </main>
        <!-- Footer -->
        <footer class="bg-white/80 backdrop-blur-sm text-center py-6 mt-12">
        <p class="text-sm text-gray-600">
            ✨ Made with ❤️ by STII EduGuide • © 2025 ✨
        </p>
    </footer>
  </body>
</html>

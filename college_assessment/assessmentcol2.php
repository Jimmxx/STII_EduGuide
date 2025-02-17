<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assessment - Question 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Playful fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Patrick+Hand&display=swap" rel="stylesheet">
  </head>
  <body class="bg-gradient-to-br from-blue-100 to-purple-100 font-[PatrickHand]"
        style="opacity: 0; transition: opacity 1s ease;"
        onload="document.body.style.opacity = '1'">
    
    <!-- Navbar -->
    <header class="flex flex-wrap items-center justify-between p-4 sm:px-8 bg-white/80 backdrop-blur-sm shadow-md">
      <div class="flex flex-col items-start">
        <a href="home_assessment.php" class="flex items-center bg-transparent">
          <img src="image/2.png" alt="Logo" class="w-200 h-9 bg-transparent" style="margin-top: -5px;">
        </a>
        <a href="assessmentcol.php" class="mt-2 text-sm text-black hover:underline">
          ← previous
        </a>
      </div>
      
      <!-- Progress & Profile -->
      <div class="flex items-center space-x-4 mt-2 sm:mt-0">
        <div class="bg-yellow-300 px-3 py-1 rounded-full text-sm font-bold shadow-sm">
          🚀 2/6
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
        2. What activity do you enjoy the most?
      </h2>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
        <!-- Option A: Doing experiments or studying nature -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-green-100 rounded-lg p-3 mb-4">
            <img src="image/experiment_nature.png" alt="Doing experiments or studying nature" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-green-600 mb-2">
            A) Doing experiments or studying nature 🌿
          </h3>
          <button onclick="location.href='assessmentcol3.php'" 
                  class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Experiments/Nature</span>
            <span class="ml-2">🌿</span>
          </button>
        </div>
        
        <!-- Option B: Fixing gadgets or coding a program -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-blue-100 rounded-lg p-3 mb-4">
            <img src="image/gadgets_coding.png" alt="Fixing gadgets or coding a program" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-blue-600 mb-2">
            B) Fixing gadgets or coding a program 🖥️
          </h3>
          <button onclick="location.href='assessmentcol3.php'" 
                  class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Gadgets/Coding</span>
            <span class="ml-2">🖥️</span>
          </button>
        </div>
        
        <!-- Option C: Drawing, taking photos, or making videos -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-purple-100 rounded-lg p-3 mb-4">
            <img src="image/creative_media.png" alt="Drawing, taking photos, or making videos" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-purple-600 mb-2">
            C) Drawing, taking photos, or making videos 🎥
          </h3>
          <button onclick="location.href='assessmentcol3.php'" 
                  class="w-full bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Creative Media</span>
            <span class="ml-2">🎥</span>
          </button>
        </div>
        
        <!-- Option D: Selling, planning, or managing money -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-red-100 rounded-lg p-3 mb-4">
            <img src="image/finance.png" alt="Selling, planning, or managing money" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-red-600 mb-2">
            D) Selling, planning, or managing money 💰
          </h3>
          <button onclick="location.href='assessmentcol3.php'" 
                  class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Finance</span>
            <span class="ml-2">💰</span>
          </button>
        </div>
        
        <!-- Option E: Listening to people and helping them -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-pink-100 rounded-lg p-3 mb-4">
            <img src="image/helping_people.png" alt="Listening to people and helping them" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-pink-600 mb-2">
            E) Listening to people and helping them ❤️
          </h3>
          <button onclick="location.href='assessmentcol3.php'" 
                  class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Helping</span>
            <span class="ml-2">❤️</span>
          </button>
        </div>
        
        <!-- Option F: Solving mysteries and following rules -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-indigo-100 rounded-lg p-3 mb-4">
            <img src="image/mystery.png" alt="Solving mysteries and following rules" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-indigo-600 mb-2">
            F) Solving mysteries and following rules ⚖️
          </h3>
          <button onclick="location.href='assessmentcol3.php'" 
                  class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Mystery</span>
            <span class="ml-2">⚖️</span>
          </button>
        </div>
        
        <!-- Option G: Writing stories, articles, or letters -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-yellow-100 rounded-lg p-3 mb-4">
            <img src="image/writing.png" alt="Writing stories, articles, or letters" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-yellow-600 mb-2">
            G) Writing stories, articles, or letters ✍️
          </h3>
          <button onclick="location.href='assessmentcol3.php'" 
                  class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Writing</span>
            <span class="ml-2">✍️</span>
          </button>
        </div>
        
        <!-- Option H: Preparing food, setting tables, or planning events -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-orange-100 rounded-lg p-3 mb-4">
            <img src="image/preparing_food.png" alt="Preparing food, setting tables, or planning events" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-orange-600 mb-2">
            H) Preparing food, setting tables, or planning events 🍕
          </h3>
          <button onclick="location.href='assessmentcol3.php'" 
                  class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Food/Events</span>
            <span class="ml-2">🍕</span>
          </button>
        </div>
        
        <!-- Option I: Fixing cars, repairing machines, or using tools -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-gray-100 rounded-lg p-3 mb-4">
            <img src="image/fixing_cars.png" alt="Fixing cars, repairing machines, or using tools" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-gray-600 mb-2">
            I) Fixing cars, repairing machines, or using tools 🔩
          </h3>
          <button onclick="location.href='assessmentcol3.php'" 
                  class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Fixing/Repairing</span>
            <span class="ml-2">🔩</span>
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

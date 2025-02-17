<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assessment - Question 5</title>
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
        <a href="../home_assessment.php" class="flex items-center bg-transparent">
          <img src="image/2.png" alt="Logo" class="w-200 h-9 bg-transparent" style="margin-top: -5px;">
        </a>
        <a href="assessmentcol4.php" class="mt-2 text-sm text-black hover:underline">
          ←previous
        </a>
      </div>
      
      <!-- Progress & Profile -->
      <div class="flex items-center space-x-4 mt-2 sm:mt-0">
        <div class="bg-yellow-300 px-3 py-1 rounded-full text-sm font-bold shadow-sm">
          🚀 5/6
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
        5. How do you solve problems?
      </h2>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
        <!-- Option A: Researching, analyzing, and testing ideas 🔍 -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-blue-100 rounded-lg p-3 mb-4">
            <img src="image/research_ideas.png" alt="Researching, analyzing, and testing ideas" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-blue-600 mb-2">
            A) Researching, analyzing, and testing ideas 🔍
          </h3>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Research</span>
            <span class="ml-2">🔍</span>
          </button>
        </div>
        
        <!-- Option B: Using technology, fixing errors, or coding solutions 🖥️ -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-teal-100 rounded-lg p-3 mb-4">
            <img src="image/coding_solutions.png" alt="Using technology, fixing errors, or coding solutions" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-teal-600 mb-2">
            B) Using technology, fixing errors, or coding solutions 🖥️
          </h3>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Tech</span>
            <span class="ml-2">🖥️</span>
          </button>
        </div>
        
        <!-- Option C: Finding creative and unique ways to express ideas 🎭 -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-purple-100 rounded-lg p-3 mb-4">
            <img src="image/creative_expression.png" alt="Finding creative and unique ways to express ideas" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-purple-600 mb-2">
            C) Finding creative and unique ways to express ideas 🎭
          </h3>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Creative</span>
            <span class="ml-2">🎭</span>
          </button>
        </div>
        
        <!-- Option D: Thinking of ways to make money or organize a business 📈 -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-red-100 rounded-lg p-3 mb-4">
            <img src="image/business_thinking.png" alt="Thinking of ways to make money or organize a business" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-red-600 mb-2">
            D) Thinking of ways to make money or organize a business 📈
          </h3>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Business</span>
            <span class="ml-2">📈</span>
          </button>
        </div>
        
        <!-- Option E: Talking to people, understanding their problems, and giving advice 🤗 -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-pink-100 rounded-lg p-3 mb-4">
            <img src="image/communication_advice.png" alt="Talking to people, understanding their problems, and giving advice" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-pink-600 mb-2">
            E) Talking to people, understanding their problems, and giving advice 🤗
          </h3>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Advice</span>
            <span class="ml-2">🤗</span>
          </button>
        </div>
        
        <!-- Option F: Investigating, collecting evidence, and making fair decisions ⚖️ -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-indigo-100 rounded-lg p-3 mb-4">
            <img src="image/investigation_evidence.png" alt="Investigating, collecting evidence, and making fair decisions" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-indigo-600 mb-2">
            F) Investigating, collecting evidence, and making fair decisions ⚖️
          </h3>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Investigation</span>
            <span class="ml-2">⚖️</span>
          </button>
        </div>
        
        <!-- Option G: Writing down thoughts, reading, and explaining things clearly ✏️ -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-yellow-100 rounded-lg p-3 mb-4">
            <img src="image/writing_explaining.png" alt="Writing down thoughts, reading, and explaining things clearly" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-yellow-600 mb-2">
            G) Writing down thoughts, reading, and explaining things clearly ✏️
          </h3>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Writing</span>
            <span class="ml-2">✏️</span>
          </button>
        </div>
        
        <!-- Option H: Solving problems with good service, planning, and teamwork 🎉 -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-orange-100 rounded-lg p-3 mb-4">
            <img src="image/teamwork_service.png" alt="Solving problems with good service, planning, and teamwork" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-orange-600 mb-2">
            H) Solving problems with good service, planning, and teamwork 🎉
          </h3>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Teamwork</span>
            <span class="ml-2">🎉</span>
          </button>
        </div>
        
        <!-- Option I: Fixing broken things, building, or creating solutions with my hands 🔩 -->
        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
          <div class="bg-gray-100 rounded-lg p-3 mb-4">
            <img src="image/fixing_building_solutions.png" alt="Fixing broken things, building, or creating solutions with my hands" class="w-full h-24 object-contain">
          </div>
          <h3 class="text-lg sm:text-xl font-bold text-gray-600 mb-2">
            I) Fixing broken things, building, or creating solutions with my hands 🔩
          </h3>
          <button onclick="location.href='result.php'" 
                  class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center">
            <span>Choose Fixing</span>
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

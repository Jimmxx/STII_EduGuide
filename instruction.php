<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instructions</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind CSS (for the navbar) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --background-gradient: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    body {
      background: var(--background-gradient);
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      padding-top: 120px; /* To avoid content hiding behind the fixed navbar */
    }

    .container {
      max-width: 800px;
      margin: 2rem auto;
      background: white;
      border-radius: 20px;
      padding: 2.5rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    h1 {
      color: var(--primary-color);
      font-weight: 700;
      margin-bottom: 1.5rem;
      font-size: 2.5rem;
    }

    .instruction-content {
      text-align: left;
      margin: 2rem 0;
    }

    .instruction-content p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #495057;
      margin-bottom: 1.5rem;
    }

    .btn-custom {
      background: var(--primary-color);
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      padding: 1rem 2.5rem;
      border-radius: 12px;
      border: none;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .btn-custom:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(67, 97, 238, 0.3);
    }

    .btn-custom i {
      margin-left: 8px;
      transition: transform 0.3s ease;
    }

    .btn-custom:hover i {
      transform: translateX(3px);
    }

    @media (max-width: 768px) {
      .container {
        margin: 90px 1rem 2rem;
        padding: 1.5rem;
      }
      
      h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <!-- Tailwind Navbar -->
  <header class="fixed top-0 left-0 right-0 flex flex-wrap items-center justify-between p-4 sm:px-8 bg-white/80 backdrop-blur-sm shadow-md z-50">
    <div class="flex flex-col items-start">
      <a href="home_assessment.php" class="flex items-center bg-transparent">
        <img src="image/2.png" alt="Logo" class="w-200 h-9 bg-transparent" style="margin-top: -15px;">
      </a>
      <a href="home_assessment.php" class="mt-2 text-sm text-black hover:underline">
        ← Back to Home Assessment
      </a>
    </div>
    
    <!-- Progress & Profile -->
    <div class="flex items-center space-x-4 mt-2 sm:mt-0" >
      <div class="bg-yellow-300 px-3 py-1 rounded-full text-sm font-bold shadow-sm">
        🚀 1/10
      </div>
      <div class="relative group">
        <img src="image/profile.jpg" alt="Profile" class="w-10 h-10 rounded-full border-2 border-purple-500 shadow-lg" style="margin-top: -20px;">
        <span class="hidden sm:inline ml-2 text-gray-700">User Name</span>
      </div>
    </div>
  </header>

  <!-- Instructions Content -->
  <div class="container">
    <h1>Welcome to Your Career Assessment</h1>
    <div class="instruction-content">
      <p class="lead">
        🎓 This assessment will help us understand your strengths and preferences through a series of carefully crafted questions. You'll be presented with different scenarios where you'll choose between two options.
      </p>
      <div class="alert alert-primary" role="alert">
        <i class="fas fa-info-circle me-2"></i>
        There are no right or wrong answers - just be yourself!
      </div>
      <p>
        <strong>What to expect:</strong><br>
        • 15-20 minute completion time<br>
        • Multiple-choice format<br>
        • Instant results with personalized recommendations
      </p>
    </div>
    <button class="btn-custom btn-lg text-white" onclick="location.href='assessment.php'">
      Start Assessment <i class="fas fa-play"></i>
    </button>
  </div>
  
  <!-- Optionally include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

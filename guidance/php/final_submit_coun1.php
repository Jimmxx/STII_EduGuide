<?php
// final_submit_coun1.php

// Include your database connection
include 'conn.php';

// Process the form only if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form fields
    $background      = isset($_POST['background']) ? trim($_POST['background']) : '';
    $approach        = isset($_POST['approach']) ? trim($_POST['approach']) : '';
    $goals           = isset($_POST['goals']) ? trim($_POST['goals']) : '';
    $comments        = isset($_POST['comments']) ? trim($_POST['comments']) : '';
    $recommendations = isset($_POST['recommendations']) ? trim($_POST['recommendations']) : '';
    $full_name       = isset($_POST['s_fullname']) ? trim($_POST['s_fullname']) : '';
    
    // Get the student ID from the GET parameter
    $student_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    // Validate the student ID
    if ($student_id <= 0) {
        echo "Invalid student ID.";
        exit;
    }
    
    // Prepare the SQL INSERT statement.
    // Adjust the table name and columns to match your database schema
    $query = "INSERT INTO individual_counseling (student_id, s_fullname, background, approach, goal, comment, recommendation, date)
              VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameters (assuming student_id is integer and the rest are strings)
        $stmt->bind_param("issssss", $student_id, $full_name, $background, $approach, $goals, $comments, $recommendations);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Display a SweetAlert2 success alert before redirecting
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Submission Success</title>
              <!-- Include SweetAlert2 from a CDN -->
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>
            <body>
              <script>
                Swal.fire({
                  icon: "success",
                  title: "Success!",
                  text: "Counseling session submitted successfully!",
                  showConfirmButton: false,
                  timer: 2000,
                  timerProgressBar: true
                }).then((result) => {
                  window.location.href = "../counseling.php";
                });
              </script>
            </body>
            </html>
            ';
            exit;
        } else {
            // Handle execution errors
            echo "Error during insertion: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Handle prepare statement error
        echo "Failed to prepare statement: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
    exit;
}
?>

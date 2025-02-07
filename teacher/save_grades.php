<?php
// save_grades.php

// Include your database connection file.
include 'conn.php';

// Retrieve the student_id (sanitize and validate as needed)
$student_id = $_POST['student_id'] ?? '';
if (!$student_id) {
    die("Student ID is required.");
}

// Retrieve the arrays of values from the POST request.
$subjects        = $_POST['subject'] ?? [];
$grade_q1        = $_POST['q1'] ?? [];
$grade_q2        = $_POST['q2'] ?? [];
$grade_q3        = $_POST['q3'] ?? [];
$grade_q4        = $_POST['q4'] ?? [];
$final_grades    = $_POST['final'] ?? [];
$remarks         = $_POST['remarks'] ?? [];

// Retrieve general average as a single value (not an array)
$general_average = $_POST['gen_ave'] ?? '';

// Debugging (optional):
// echo '<pre>'; print_r($_POST); echo '</pre>';

// Prepare the SQL statement.
// The query expects 9 parameters corresponding to the columns:
// student_id (integer), subject (string),
// q1, q2, q3, q4, final_rating, gen_ave (all doubles), and remarks (string).
$sql = "INSERT INTO student_grades (student_id, subject, q1, q2, q3, q4, final_rating, gen_ave, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Loop over each row (assuming that all arrays have the same length)
$rowCount = count($subjects);
for ($i = 0; $i < $rowCount; $i++) {
    // Retrieve the values for this row.
    $subject = $subjects[$i];
    $q1      = $grade_q1[$i];
    $q2      = $grade_q2[$i];
    $q3      = $grade_q3[$i];
    $q4      = $grade_q4[$i];
    $final   = $final_grades[$i];
    $rem_ark = $remarks[$i];
    
    // Since general average is not repeatable, use the same value for all rows.
    $gen_ave = $general_average;
    
    // Bind parameters:
    // "i" - integer for student_id,
    // "s" - string for subject,
    // "d" - double for each numeric value (q1, q2, q3, q4, final_rating, gen_ave),
    // "s" - string for remarks.
    // The format string for 9 parameters is: "isdddddds"
    if (!$stmt->bind_param("isdddddds", $student_id, $subject, $q1, $q2, $q3, $q4, $final, $gen_ave, $rem_ark)) {
        echo "Binding failed on row " . ($i + 1) . ": " . $stmt->error . "<br>";
        continue;
    }
    
    if (!$stmt->execute()) {
        // Handle any execution errors
        echo "Error inserting row " . ($i + 1) . ": " . $stmt->error . "<br>";
    }
}

echo "<script>
alert('Grades saved successfully!');
window.location.href = 'student_view.php?id=" . urlencode($student_id) . "';
</script>";

?>

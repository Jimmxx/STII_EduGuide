<?php
// college_card.php

// Include your database connection file.
include 'conn.php';

// Retrieve the student_id (sanitize and validate as needed)
$student_id = $_POST['student_id'] ?? '';
if (!$student_id) {
    die("Student ID is required.");
}

// Retrieve arrays from the POST data and force them to be arrays
$subjects    = (array)($_POST['subject']    ?? []);
$units       = (array)($_POST['unit']       ?? []);
$prelims     = (array)($_POST['prelim']     ?? []);
$midterms    = (array)($_POST['midterm']    ?? []);
$prefinals   = (array)($_POST['prefinal']   ?? []);
$final_aves  = (array)($_POST['final_ave']  ?? []);
$gen_aves    = (array)($_POST['gen_ave']    ?? []);
$remarks     = (array)($_POST['remarks']    ?? []);

// For second semester:
$subjects1   = (array)($_POST['subject1']   ?? []);
$units1      = (array)($_POST['unit1']      ?? []);
$prelims1    = (array)($_POST['prelim1']    ?? []);
$midterms1   = (array)($_POST['midterm1']   ?? []);
$prefinals1  = (array)($_POST['prefinal1']  ?? []);
$final_aves1 = (array)($_POST['final_ave1'] ?? []);
$gen_aves1   = (array)($_POST['gen_ave1']   ?? []);
$remarks1    = (array)($_POST['remarks1']   ?? []);

// Get the number of rows for the first semester (assuming each subject row is represented)
$rowCount = count($subjects);

// New SQL statement WITHOUT the 'final' and 'final1' columns.
$sql = "INSERT INTO student_grades_college 
        (student_id, subject, unit, prelim, midterm, prefinal, final_ave, gen_ave, remarks, 
         subject1, unit1, prelim1, midterm1, prefinal1, final_ave1, gen_ave1, remarks1)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
$errorFound = false;

for ($i = 0; $i < $rowCount; $i++) {
    // First semester values
    $subject_val   = $subjects[$i];
    $unit_val      = $units[$i];
    $prelim_val    = $prelims[$i];
    $midterm_val   = $midterms[$i];
    $prefinal_val  = $prefinals[$i];
    $final_ave_val = $final_aves[$i];
    // For gen_ave, if not defined for this row, default to the first element or 0
    $gen_ave_val   = isset($gen_aves[$i]) ? $gen_aves[$i] : (isset($gen_aves[0]) ? $gen_aves[0] : 0);
    $remarks_val   = $remarks[$i];
    
    // Second semester values (default to empty string if not provided)
    $subject1_val   = isset($subjects1[$i])   ? $subjects1[$i]   : '';
    $unit1_val      = isset($units1[$i])      ? $units1[$i]      : '';
    $prelim1_val    = isset($prelims1[$i])    ? $prelims1[$i]    : '';
    $midterm1_val   = isset($midterms1[$i])   ? $midterms1[$i]   : '';
    $prefinal1_val  = isset($prefinals1[$i])  ? $prefinals1[$i]  : '';
    $final_ave1_val = isset($final_aves1[$i]) ? $final_aves1[$i] : '';
    // For gen_ave1, if not defined for this row, default to the first element or 0
    $gen_ave1_val   = isset($gen_aves1[$i])   ? $gen_aves1[$i]   : (isset($gen_aves1[0]) ? $gen_aves1[0] : 0);
    $remarks1_val   = isset($remarks1[$i])    ? $remarks1[$i]    : '';
    
    // Combined type string for 17 parameters:
    // First semester: student_id (i), subject (s), unit (d), prelim (d), midterm (d), prefinal (d), final_ave (d), gen_ave (d), remarks (s) --> "isdddddds" (9 parameters)
    // Second semester: subject1 (s), unit1 (d), prelim1 (d), midterm1 (d), prefinal1 (d), final_ave1 (d), gen_ave1 (d), remarks1 (s) --> "sdddddds" (8 parameters)
    // Total: 9 + 8 = 17 parameters.
    $type_str = "isdddddds" . "sdddddds";
    
    // Prepare the statement for each row
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Prepare failed at row " . ($i + 1) . ": " . $conn->error;
        $errorFound = true;
        break;
    }
    
    $stmt->bind_param(
        $type_str,
        $student_id,
        $subject_val,
        $unit_val,
        $prelim_val,
        $midterm_val,
        $prefinal_val,
        $final_ave_val,
        $gen_ave_val,
        $remarks_val,
        $subject1_val,
        $unit1_val,
        $prelim1_val,
        $midterm1_val,
        $prefinal1_val,
        $final_ave1_val,
        $gen_ave1_val,
        $remarks1_val
    );
    
    if (!$stmt->execute()) {
        echo "Error inserting row " . ($i + 1) . ": " . $stmt->error;
        $errorFound = true;
        $stmt->close();
        break;
    }
    $stmt->close();
}

if (!$errorFound) {
    // Update card_status in student_info table to 1
    $updateSql = "UPDATE student_info SET card_status = 1 WHERE student_id = ?";
    $updateStmt = $conn->prepare($updateSql);
    if ($updateStmt) {
        $updateStmt->bind_param("i", $student_id);
        if (!$updateStmt->execute()) {
            echo "Error updating card_status: " . $updateStmt->error;
        }
        $updateStmt->close();
    } else {
        echo "Update prepare failed: " . $conn->error;
    }
    
    echo "<script>
          alert('College grades saved successfully!');
          window.location.href = 'student_view.php?id=" . urlencode($student_id) . "';
          </script>";
}

$conn->close();
?>

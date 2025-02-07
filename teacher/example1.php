<?php
include 'conn.php';

if(isset($_POST['submit'])) {
    // School Card General Info
    $school_card_type = $_POST['scool_card'];
    $school_year = $_POST['school_year'];
    $section = $_POST['section'];
    
    // Insert school card header
    $stmt = $conn->prepare("INSERT INTO school_cards 
        (type, school_year, section, strand, course, year_level, general_average, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
    
    // Default values for optional fields
    $strand = null;
    $course = null;
    $year_level = null;
    $general_avg = null;

    // Handle different card types
    switch($school_card_type) {
        case '1': // Junior High
            $general_avg = $_POST['jgaverage'];
            break;
            
        case '2': // Senior High
            $strand = $_POST['strand']; // You need to add name='strand' to the Senior High select
            break;
            
        case '3': // College
            $course = $_POST['course']; // Add name='course' to College course select
            $year_level = $_POST['year_level']; // Add name='year_level' to College year select
            break;
    }

    $stmt->bind_param("ssssssd", 
        $school_card_type, 
        $school_year,
        $section,
        $strand,
        $course,
        $year_level,
        $general_avg
    );
    
    $stmt->execute();
    $school_card_id = $conn->insert_id;

    // Function to handle subject creation
    function getSubjectId($subjectName, $type, $conn) {
        $check = $conn->prepare("SELECT id FROM subjects WHERE name = ? AND type = ?");
        $check->bind_param("ss", $subjectName, $type);
        $check->execute();
        $result = $check->get_result();
        
        if($result->num_rows > 0) {
            return $result->fetch_assoc()['id'];
        } else {
            $insert = $conn->prepare("INSERT INTO subjects (name, type) VALUES (?, ?)");
            $insert->bind_param("ss", $subjectName, $type);
            $insert->execute();
            return $insert->insert_id;
        }
    }

    // Handle Junior High
    if($school_card_type == '1') {
        $subjects = $_POST['jsubject'] ?? [];
        $q1 = $_POST['jq1'] ?? [];
        $q2 = $_POST['jq2'] ?? [];
        $q3 = $_POST['jq3'] ?? [];
        $q4 = $_POST['jq4'] ?? [];
        $finals = $_POST['jfinal'] ?? [];
        $remarks = $_POST['jremarks'] ?? [];

        $grade_stmt = $conn->prepare("INSERT INTO grades 
            (school_card_id, subject_id, q1, q2, q3, q4, final, remarks)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        for($i = 0; $i < count($subjects); $i++) {
            $subject_id = getSubjectId($subjects[$i], 'junior', $conn);
            
            $grade_stmt->bind_param("iiddddds",
                $school_card_id,
                $subject_id,
                $q1[$i],
                $q2[$i],
                $q3[$i],
                $q4[$i],
                $finals[$i],
                $remarks[$i]
            );
            $grade_stmt->execute();
        }
    }

    // Handle Senior High (similar structure for College)
    if($school_card_type == '2') {
        // Process first semester
        $s1_subjects = $_POST['sh_s1_subject'] ?? [];
        $s1_q1 = $_POST['sh_s1_q1'] ?? [];
        $s1_q2 = $_POST['sh_s1_q2'] ?? [];
        $s1_final = $_POST['sh_s1_final'] ?? [];
        
        $grade_stmt = $conn->prepare("INSERT INTO grades 
            (school_card_id, subject_id, q1, q2, final, semester)
            VALUES (?, ?, ?, ?, ?, '1')");

        for($i = 0; $i < count($s1_subjects); $i++) {
            $subject_id = getSubjectId($s1_subjects[$i], 'senior', $conn);
            
            $grade_stmt->bind_param("iiddd",
                $school_card_id,
                $subject_id,
                $s1_q1[$i],
                $s1_q2[$i],
                $s1_final[$i]
            );
            $grade_stmt->execute();
        }

        // Repeat for second semester with semester='2'
    }

    // Redirect or success message
    header("Location: success.php");
    exit();
}
?>

<!-- Add array names to your HTML inputs -->
<!-- Example for Junior High subjects -->
<select class="form-select subject-select" name="jsubject[]">
<!-- ... -->
<input type="number" name="jq1[]">
<input type="number" name="jq2[]">
<input type="number" name="jq3[]">
<input type="number" name="jq4[]">
<input type="number" name="jfinal[]">
<input type="text" name="jremarks[]">
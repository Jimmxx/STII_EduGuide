<?php 
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Begin transaction
    $conn->begin_transaction();
    $allSuccess = true;
    $errorMsg = "";

    // Collect student details
    $studentID    = intval($_POST['student_id'] ?? 0);
    $firstName    = $_POST['s_firstname']    ?? '';
    $middleName   = $_POST['s_middlename']   ?? '';
    $lastName     = $_POST['s_lastname']     ?? '';
    $suffix       = $_POST['s_suffix']       ?? '';
    $dob          = $_POST['s_dob']          ?? '';
    $gender       = $_POST['s_gender']       ?? '';
    $citizenship  = $_POST['citizenship']    ?? '';
    $status       = $_POST['s_status']       ?? '';
    $religion     = $_POST['religion']       ?? '';
    $tribe        = $_POST['tribe']          ?? '';
    $province     = $_POST['province']       ?? '';
    $municipality = $_POST['municipality']   ?? '';
    $barangay     = $_POST['barangay']       ?? '';
    $zipcode      = $_POST['zipcode']        ?? '';
    $mobileNumber = $_POST['s_number']       ?? '';
    $email        = $_POST['s_email']        ?? '';
    $noOfSiblings = intval($_POST['siblings'] ?? 0);
    $fourPs       = isset($_POST['4ps']) ? 1 : 0;
    $ips          = isset($_POST['ips'])  ? 1 : 0;
    $gradeLevel   = $_POST['gradeLevel']     ?? '';
    $department   = trim($_POST['department'] ?? '');
    $strand       = trim($_POST['strand'] ?? '');
    $course       = trim($_POST['course'] ?? '');
    $schoolYear   = $_POST['school_year']    ?? '';
    $section      = $_POST['section']        ?? '';

    // ✅ Validate Student ID
    if ($studentID <= 0) {
        echo "<script>alert('Invalid Student ID.'); window.history.back();</script>";
        exit();
    }

    // ✅ Check if Student ID exists
    $checkStudent = $conn->prepare("SELECT student_id FROM student_info WHERE student_id = ?");
    $checkStudent->bind_param("i", $studentID);
    $checkStudent->execute();
    $result = $checkStudent->get_result();
    
    if ($result->num_rows === 0) {
        echo "<script>alert('Error: Student ID not found.'); window.history.back();</script>";
        exit();
    }
    $checkStudent->close();

// ✅ Ensure that the SQL query has the correct number of placeholders
$sql = "UPDATE student_info SET 
            s_fname = ?, s_mname = ?, s_lname = ?, suffix = ?, birthdate = ?, gender = ?, citizenship = ?, 
            s_status = ?, religion = ?, tribe = ?, province = ?, municipality = ?, barangay = ?, 
            zipcode = ?, number = ?, s_email = ?, siblings = ?, four_ps = ?, ips = ?, 
            grade_level = ?, school_year = ?, strand = ?, course = ?, department = ?, section = ?
        WHERE student_id = ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    $conn->rollback();
    die("Prepare failed (student_info): " . $conn->error);
}

// ✅ Now, ensure the number of `?` matches the number of variables in `bind_param()`
$stmt->bind_param(
    "sssssssssssssiisissssssssi",  // ✅ Corrected: Now exactly 26 placeholders
    $firstName, 
    $middleName, 
    $lastName, 
    $suffix, 
    $dob, 
    $gender, 
    $citizenship, 
    $status, 
    $religion, 
    $tribe, 
    $province, 
    $municipality, 
    $barangay, 
    $zipcode, 
    $mobileNumber, 
    $email, 
    $noOfSiblings, 
    $fourPs, 
    $ips,
    $gradeLevel,
    $schoolYear,
    $strand,
    $course,
    $department,
    $section,
    $studentID  // ✅ Last parameter should match last `?` in query
);

if (!$stmt->execute()) {
    $allSuccess = false;
    $errorMsg = "Error updating student record: " . addslashes($stmt->error);
}
$stmt->close();


    // ✅ Update family information
    $fatherName = $_POST['f_fname'] ?? '';
    $fatherOccupation = $_POST['f_occupation'] ?? '';
    $fatherAddress = $_POST['f_address'] ?? '';
    $fatherNumber = $_POST['f_number'] ?? '';
    $fatherIncome = intval($_POST['f_income'] ?? 0);

    $motherName = $_POST['m_fname'] ?? '';
    $motherOccupation = $_POST['m_occupation'] ?? '';
    $motherAddress = $_POST['m_address'] ?? '';
    $motherNumber = $_POST['m_number'] ?? '';
    $motherIncome = intval($_POST['m_income'] ?? 0);

    $guardianName = $_POST['g_name'] ?? '';
    $guardianOccupation = $_POST['g_occupation'] ?? '';
    $guardianAddress = $_POST['g_address'] ?? '';
    $guardianNumber = $_POST['g_number'] ?? '';

    $sql_parent = "UPDATE parent_info SET 
        father_name = ?, father_occupation = ?, father_address = ?, father_number = ?, father_income = ?, 
        mother_name = ?, mother_occupation = ?, mother_address = ?, mother_number = ?, mother_income = ?, 
        guardian_name = ?, guardian_occupation = ?, guardian_address = ?, guardian_number = ?
        WHERE student_id = ?";
        
    $stmt_parent = $conn->prepare($sql_parent);
    if (!$stmt_parent) {
        $conn->rollback();
        die("Prepare failed (parent_info): " . $conn->error);
    }

    $stmt_parent->bind_param(
        "ssssissssissssi",
        $fatherName,
        $fatherOccupation,
        $fatherAddress,
        $fatherNumber,
        $fatherIncome,
        $motherName,
        $motherOccupation,
        $motherAddress,
        $motherNumber,
        $motherIncome,
        $guardianName,
        $guardianOccupation,
        $guardianAddress,
        $guardianNumber,
        $studentID
    );

    if (!$stmt_parent->execute()) {
        $allSuccess = false;
        $errorMsg = "Error updating parent record: " . addslashes($stmt_parent->error);
    }
    $stmt_parent->close();

    // ✅ Update previous school info
    $prev_school     = $_POST['last_schoolname'] ?? '';
    $year_graduated  = $_POST['lastyeargraduated'] ?? '';  
    $school_address  = $_POST['last_schooladdress'] ?? ''; 
    $reason          = $_POST['reason'] ?? '';

    $sql_prev_school = "UPDATE prev_school_info SET 
        last_school = ?, year_graduated = ?, school_address = ?, reason = ? 
        WHERE student_id = ?";
    
    $stmt_prev = $conn->prepare($sql_prev_school);
    if (!$stmt_prev) {
        $conn->rollback();
        die("Prepare failed (prev_school_info): " . $conn->error);
    }
    $stmt_prev->bind_param("sissi", $prev_school, $year_graduated, $school_address, $reason, $studentID);
    if (!$stmt_prev->execute()) {
        $allSuccess = false;
        $errorMsg = "Error updating previous school record: " . addslashes($stmt_prev->error);
    }
    $stmt_prev->close();

    // ✅ Finalize transaction
    if ($allSuccess) {
        $conn->commit();
        echo "<script>
                alert('Student record updated successfully!');
                window.location.href = 'student_profiling_teacher.php';
              </script>";
    } else {
        $conn->rollback();
        echo "<script>
                alert('$errorMsg');
                window.history.back();
              </script>";
    }
}
?>

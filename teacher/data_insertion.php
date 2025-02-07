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
    $strand = trim($_POST['strand'] ?? '');
    $course = trim($_POST['course'] ?? '');
    $schoolYear   = $_POST['school_year']    ?? '';
    $section   = $_POST['section']    ?? '';


    // ✅ Validate Student ID
    if ($studentID <= 0) {
        echo "<script>alert('Invalid Student ID. Please enter a valid number.'); window.history.back();</script>";
        exit();
    }

    // ✅ Check if Student ID already exists
    $checkStudent = $conn->prepare("SELECT student_id FROM student_info WHERE student_id = ?");
    $checkStudent->bind_param("i", $studentID);
    $checkStudent->execute();
    $result = $checkStudent->get_result();
    
    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Student ID already exists. Please use a different ID.'); window.history.back();</script>";
        exit();
    }
    $checkStudent->close();

    // ✅ Insert student info
    $sql = "INSERT INTO student_info 
            (student_id, s_fname, s_mname, s_lname, suffix, birthdate, gender, citizenship, s_status, religion, tribe, province, municipality, barangay, zipcode, number, s_email, siblings, four_ps, ips, grade_level, school_year, strand, course, department, section) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";



    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        $conn->rollback();
        die("Prepare failed (student_info): " . $conn->error);
    }

    $stmt->bind_param(
        "isssssssssssssssisisssssss", 
        $studentID,
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
        $section
    );

    if (!$stmt->execute()) {
        $allSuccess = false;
        $errorMsg = "Error inserting student record: " . addslashes($stmt->error);
    }
    $stmt->close();




    // ✅ Insert family information (Father, Mother, Guardian)
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

    $sql_parent = "INSERT INTO parent_info 
        (student_id, father_name, father_occupation, father_address, father_number, father_income, 
         mother_name, mother_occupation, mother_address, mother_number, mother_income, 
         guardian_name, guardian_occupation, guardian_address, guardian_number)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
    $stmt_parent = $conn->prepare($sql_parent);
    if (!$stmt_parent) {
        $conn->rollback();
        die("Prepare failed (parent_info): " . $conn->error);
    }

    $stmt_parent->bind_param(
        "issssissssissss",
        $studentID,
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
        $guardianNumber
    );

    if (!$stmt_parent->execute()) {
        $allSuccess = false;
        $errorMsg = "Error inserting parent record: " . addslashes($stmt_parent->error);
    }
    $stmt_parent->close();

    // ✅ Insert previous school info
    $prev_school     = $_POST['last_schoolname'] ?? '';
    $year_graduated  = $_POST['lastyeargraduated'] ?? '';  
    $school_address  = $_POST['last_schooladdress'] ?? ''; 
    $reason          = $_POST['reason'] ?? '';

    if (!empty($prev_school) && !empty($year_graduated)) {
        $sql_prev_school = "INSERT INTO prev_school_info (student_id, last_school, year_graduated, school_address, reason) VALUES (?, ?, ?, ?, ?)";
        $stmt_prev = $conn->prepare($sql_prev_school);
        if (!$stmt_prev) {
            $conn->rollback();
            die("Prepare failed (prev_school_info): " . $conn->error);
        }
        $stmt_prev->bind_param("isiss", $studentID, $prev_school, $year_graduated, $school_address, $reason);
        $stmt_prev->execute();
        $stmt_prev->close();
    }

    // ✅ Finalize transaction
    if ($allSuccess) {
        $conn->commit();
        echo "<script>
                alert('Student record inserted successfully!');
                window.location.href = 'student_profiling_teacher.php';
              </script>";
    } else {
        $conn->rollback();
        echo "<script>
                alert('$errorMsg');
                window.location.href = 'student_profiling_teacher.php';
              </script>";
    }

  
    if (isset($_POST['type'])) {
        $type = $_POST['type'];
    
        if ($type === 'add_department') {
            $department = trim($_POST['department']);
            
            if (!empty($department)) {
                // Check if department exists
                $stmt = $conn->prepare("SELECT department_id FROM departments WHERE name = ?");
                $stmt->bind_param("s", $department);
                $stmt->execute();
                $result = $stmt->get_result();
    
                if ($result->num_rows === 0) {
                    // Insert department if it doesn't exist
                    $stmt = $conn->prepare("INSERT INTO departments (name) VALUES (?)");
                    $stmt->bind_param("s", $department);
                    if ($stmt->execute()) {
                        echo json_encode(["status" => "success", "message" => "Department added successfully!"]);
                    } else {
                        echo json_encode(["status" => "error", "message" => "Error adding department!"]);
                    }
                    $stmt->close();
                } else {
                    echo json_encode(["status" => "error", "message" => "Department already exists!"]);
                }
            }
        } elseif ($type === 'add_course') {
            $course = trim($_POST['course']);
            $department = trim($_POST['department']);
            
            if (!empty($course) && !empty($department)) {
                // Ensure department exists before inserting course
                $stmt = $conn->prepare("SELECT department_id FROM departments WHERE name = ?");
                $stmt->bind_param("s", $department);
                $stmt->execute();
                $result = $stmt->get_result();
                $deptRow = $result->fetch_assoc();
                
                if (!$deptRow) {
                    // Insert department if not exists
                    $stmt = $conn->prepare("INSERT INTO departments (name) VALUES (?)");
                    $stmt->bind_param("s", $department);
                    $stmt->execute();
                    $department_id = $stmt->insert_id; // Get newly inserted department ID
                    $stmt->close();
                } else {
                    $department_id = $deptRow['id'];
                }
    
                // Insert course under the correct department
                $stmt = $conn->prepare("INSERT INTO courses (course_name, department_id) VALUES (?, ?)");
                $stmt->bind_param("si", $course, $department_id);
                
                if ($stmt->execute()) {
                    echo json_encode(["status" => "success", "message" => "Course added successfully!"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Error adding course!"]);
                }
                $stmt->close();
            }
        }
    }
    
 $conn->close();

} else {
    echo "No POST data received.";
}

?>

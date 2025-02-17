<?php
include 'conn.php';

// Check if a student id is provided in the URL
if (!isset($_GET['id'])) {
    echo "Student ID not provided.";
    exit;
}
$student_id = intval($_GET['id']);

// Fetch the student data from the student_info table
$sql_student = "SELECT * FROM student_info WHERE student_id = ?";
$stmt_student = $conn->prepare($sql_student);
$stmt_student->bind_param("i", $student_id);
$stmt_student->execute();
$result_student = $stmt_student->get_result();
if ($result_student->num_rows === 0) {
    echo "Student not found.";
    exit;
}
$student = $result_student->fetch_assoc();
$stmt_student->close();

// Fetch the parent (family) data from the parent_info table
$sql_parent = "SELECT * FROM parent_info WHERE student_id = ?";
$stmt_parent = $conn->prepare($sql_parent);
$stmt_parent->bind_param("i", $student_id);
$stmt_parent->execute();
$result_parent = $stmt_parent->get_result();
$parent = $result_parent->fetch_assoc();
$stmt_parent->close();

// Fetch previous school data from the prev_school_info table
$sql_prev = "SELECT last_school, school_address, year_graduated, reason FROM prev_school_info WHERE student_id = ?";
$stmt_prev = $conn->prepare($sql_prev);
$stmt_prev->bind_param("i", $student_id);
$stmt_prev->execute();
$result_prev = $stmt_prev->get_result();
$prevSchool = $result_prev->fetch_assoc();
$stmt_prev->close();

// --- Determine which card to show based on grade_level ---
$grade_level = strtoupper(trim($student['grade_level']));
$cardType = ''; // will be 'junior', 'senior', or 'college'

if (strpos($grade_level, 'GRADE') !== false) {
    // Remove the word "GRADE" and trim extra spaces then convert to an integer
    $numericPart = trim(str_replace('GRADE', '', $grade_level));
    $level = (int)$numericPart;
    if ($level >= 7 && $level <= 10) {
        $cardType = 'junior';
    } elseif ($level >= 11 && $level <= 12) {
        $cardType = 'senior';
    }
} elseif (preg_match('/(1ST|2ND|3RD|4TH)/i', $grade_level)) {
    $cardType = 'college';
}
if (empty($cardType)) {
    die('Grade level format not recognized.');
}

// Fetch student grades based on cardType
if ($cardType === 'college') {
    // For college, fetch from student_grades_college
    $sql_grades = "SELECT * FROM student_grades_college WHERE student_id = ?";
} elseif ($cardType === 'senior') {
    // For senior, fetch from student_grades_senior
    $sql_grades = "SELECT * FROM student_grades_senior WHERE student_id = ?";
} else {
    // For junior, fetch from student_grades
    $sql_grades = "SELECT subject, q1, q2, q3, q4, final_rating, gen_ave, remarks FROM student_grades WHERE student_id = ?";
}
$stmt_grades = $conn->prepare($sql_grades);
$stmt_grades->bind_param("i", $student_id);
$stmt_grades->execute();
$result_grades = $stmt_grades->get_result();
$grades = $result_grades->fetch_all(MYSQLI_ASSOC);
$stmt_grades->close();

$conn->close();

// Calculate the student's age from birthdate
$dob = new DateTime($student['birthdate']);
$today = new DateTime();
$age = $today->diff($dob)->y;
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!--view  Modal -->
<div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-blue-500 text-white">
                <h5 class="modal-title" id="viewDetailsModalLabel">Personal Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h1 class="text-2xl font-bold mb-6 text-center">Student Details</h1>
        <!-- Personal Information Section -->
        <div class="card mb-4">
          <div class="card-header bg-success text-white fw-bold">
            Personal Information
          </div>
          <div class="card-body">
            <div class="row g-3 justify-content-between">
              <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">First Name</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['s_fname'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">Middle Name</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['s_mname'] ?? ''); ?></div>
              </div>
              <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">Last Name</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['s_lname'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">Suffix</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['suffix'] ?? ''); ?></div>
              </div>
              <div class="col-auto flex-grow-1 text-truncate">
                <div class="text-secondary small">Age</div>
                <div class="fw-bold"><?php echo $age; ?></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Basic Information Section -->
        <div class="card mb-4">
          <div class="card-header bg-success text-white fw-bold">
            Basic Information
          </div>
          <div class="card-body">
            <div class="row g-4">
              <div class="col-md-3">
                <div class="text-secondary small">Date of Birth</div>
                <div class="fw-bold"><?php echo date("F j, Y", strtotime($student['birthdate'])); ?></div>
              </div>
              <div class="col-md-3">
                <div class="text-secondary small">Gender</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['gender'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-3">
                <div class="text-secondary small">Citizenship</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['citizenship'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-3">
                <div class="text-secondary small">Status</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['s_status'] ?? 'N/A'); ?></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Additional Information Section -->
        <div class="card mb-4">
          <div class="card-header bg-success text-white fw-bold">
            Additional Information
          </div>
          <div class="card-body">
            <div class="row g-4">
              <div class="col-md-4">
                <div class="text-secondary small">Religious Affiliation</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['religion'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-4">
                <div class="text-secondary small">Tribe</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['tribe'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-4">
                <div class="text-secondary small">Province</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['province'] ?? 'N/A'); ?></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Address Information Section -->
        <div class="card mb-4">
          <div class="card-header bg-success text-white fw-bold">
            Address Information
          </div>
          <div class="card-body">
            <div class="row g-4">
              <div class="col-md-4">
                <div class="text-secondary small">Town/Municipality</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['municipality'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-4">
                <div class="text-secondary small">Barangay</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['barangay'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-4">
                <div class="text-secondary small">Zipcode</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['zipcode'] ?? 'N/A'); ?></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Contact Information Section -->
        <div class="card mb-4">
          <div class="card-header bg-success text-white fw-bold">
            Contact Information
          </div>
          <div class="card-body">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="text-secondary small">Mobile Number</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['number'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-6">
                <div class="text-secondary small">Email Address</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['s_email'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-12">
                <div class="text-secondary small">Number of Siblings</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['siblings'] ?? 'N/A'); ?></div>
              </div>
            </div>
          </div>
        </div>
        <!-- School Information Section -->
        <div class="card mb-4">
          <div class="card-header bg-success text-white fw-bold">
            School Information
          </div>
          <div class="card-body">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="text-secondary small">Contact Number</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['number'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-6">
                <div class="text-secondary small">Student ID</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['student_id'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-6">
                <div class="text-secondary small">Grade/Year Level</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['grade_level'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-6">
                <div class="text-secondary small">School Year</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['school_year'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-6">
                <div class="text-secondary small">Department</div>
                <div class="fw-bold"><?php echo htmlspecialchars($student['department'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-6">
              <div class="text-secondary small">Strand</div>
              <div class="fw-bold"><?php echo htmlspecialchars($student['strand'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-6">
              <div class="text-secondary small">Course</div>
              <div class="fw-bold"><?php echo htmlspecialchars($student['course'] ?? 'N/A'); ?></div>
              </div>
              <div class="col-md-6">
              <div class="text-secondary small">Section</div>
              <div class="fw-bold"><?php echo htmlspecialchars($student['section'] ?? 'N/A'); ?></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Program Membership Section -->
        <div class="card mb-4">
          <div class="card-header bg-success text-white fw-bold">
            Program Membership
          </div>
          <div class="card-body">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="text-secondary small">4P's Member</div>
                <div class="fw-bold"><?php echo $student['four_ps'] ? 'Yes' : 'No'; ?></div>
              </div>
              <div class="col-md-6">
                <div class="text-secondary small">IP's Member</div>
                <div class="fw-bold"><?php echo $student['ips'] ? 'Yes' : 'No'; ?></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Family Information Section -->
        <div class="card mb-4">
          <div class="card-header bg-success text-white fw-bold">
            Family Information
          </div>
          <div class="card-body">
            <div class="row g-4">
              <!-- Father's Information -->
              <div class="col-md-4">
                <div class="card h-100">
                  <div class="card-header bg-primary text-white">
                    Father's Details
                  </div>
                  <div class="card-body">
                    <dl class="mb-0">
                      <dt>Name</dt>
                      <dd><?php echo htmlspecialchars($parent['father_name'] ?? 'N/A'); ?></dd>
                      <dt>Occupation</dt>
                      <dd><?php echo htmlspecialchars($parent['father_occupation'] ?? 'N/A'); ?></dd>
                      <dt>Address</dt>
                      <dd><?php echo htmlspecialchars($parent['father_address'] ?? 'N/A'); ?></dd>
                      <dt>Contact</dt>
                      <dd><?php echo htmlspecialchars($parent['father_number'] ?? 'N/A'); ?></dd>
                      <dt>Income</dt>
                      <dd><?php echo isset($parent['father_income']) ? '₱' . number_format($parent['father_income']) . '/month' : 'N/A'; ?></dd>
                    </dl>
                  </div>
                </div>
              </div>
              <!-- Mother's Information -->
              <div class="col-md-4">
                <div class="card h-100">
                  <div class="card-header bg-success text-white">
                    Mother's Details
                  </div>
                  <div class="card-body">
                    <dl class="mb-0">
                      <dt>Name</dt>
                      <dd><?php echo htmlspecialchars($parent['mother_name'] ?? 'N/A'); ?></dd>
                      <dt>Occupation</dt>
                      <dd><?php echo htmlspecialchars($parent['mother_occupation'] ?? 'N/A'); ?></dd>
                      <dt>Address</dt>
                      <dd><?php echo htmlspecialchars($parent['mother_address'] ?? 'N/A'); ?></dd>
                      <dt>Contact</dt>
                      <dd><?php echo htmlspecialchars($parent['mother_number'] ?? 'N/A'); ?></dd>
                      <dt>Income</dt>
                      <dd><?php echo isset($parent['mother_income']) ? '₱' . number_format($parent['mother_income']) . '/month' : 'N/A'; ?></dd>
                    </dl>
                  </div>
                </div>
              </div>
              <!-- Guardian's Information -->
              <div class="col-md-4">
                <div class="card h-100">
                  <div class="card-header bg-info text-white">
                    Guardian's Details
                  </div>
                  <div class="card-body">
                    <dl class="mb-0">
                      <dt>Name</dt>
                      <dd><?php echo htmlspecialchars($parent['guardian_name'] ?? 'N/A'); ?></dd>
                      <dt>Occupation</dt>
                      <dd><?php echo htmlspecialchars($parent['guardian_occupation'] ?? 'N/A'); ?></dd>
                      <dt>Address</dt>
                      <dd><?php echo htmlspecialchars($parent['guardian_address'] ?? 'N/A'); ?></dd>
                      <dt>Contact</dt>
                      <dd><?php echo htmlspecialchars($parent['guardian_number'] ?? 'N/A'); ?></dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    

<!-- Previous School Section -->
<div class="card mb-4">
  <div class="card-header bg-success text-white fw-bold">
    Previous School Information
  </div>
  <div class="card-body">
    <div class="row g-4">
      <div class="col-md-6">
        <dl>
          <dt>School Name</dt>
          <dd><?php echo htmlspecialchars($prevSchool['last_school'] ?? 'N/A'); ?></dd>
          <dt>Address</dt>
          <dd><?php echo htmlspecialchars($prevSchool['school_address'] ?? 'N/A'); ?></dd>
        </dl>
      </div>
      <div class="col-md-6">
        <dl>
          <dt>Completion Year</dt>
          <dd><?php echo htmlspecialchars($prevSchool['year_graduated'] ?? 'N/A'); ?></dd>
          <dt>Transfer Reason</dt>
          <dd><?php echo htmlspecialchars($prevSchool['reason'] ?? 'N/A'); ?></dd>
        </dl>
      </div>
    </div>
  </div>
</div>

      





<!-- Documents Section -->
<?php if ($student['card_status'] == 1): ?>
<div class="card mb-4" id="havecard">
    <div class="card-header bg-success text-white fw-bold">
        Student Card
    </div>
    <div class="card-body" >
        <!-- Enter Grades Button - Right aligned -->
        <h1 class="mb-3">Student Grades Details</h1>
  <div class="mb-3">
    <strong>Grade Level:</strong> <?php echo htmlspecialchars($student['grade_level']); ?>
  </div>

  <?php if ($cardType === 'junior'): ?>
    <div class="card mb-4">
        <div class="card-header bg-success text-white fw-bold">
            Junior High School Card
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Learning Areas</th>
                        <th>Quarter 1</th>
                        <th>Quarter 2</th>
                        <th>Quarter 3</th>
                        <th>Quarter 4</th>
                        <th>Final Rating</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $lastGenAve = ''; // Variable to store gen_ave
                    if (count($grades) > 0): 
                        foreach ($grades as $row): 
                            $lastGenAve = $row['gen_ave']; // Store last gen_ave value
                    ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['subject']); ?></td>
                                <td><?php echo htmlspecialchars($row['q1']); ?></td>
                                <td><?php echo htmlspecialchars($row['q2']); ?></td>
                                <td><?php echo htmlspecialchars($row['q3']); ?></td>
                                <td><?php echo htmlspecialchars($row['q4']); ?></td>
                                <td><?php echo htmlspecialchars($row['final_rating']); ?></td>
                                <td><?php echo htmlspecialchars($row['remarks']); ?></td>
                            </tr>
                    <?php 
                        endforeach; 
                    else: 
                    ?>
                        <tr>
                            <td colspan="7">No grades found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <?php if (!empty($lastGenAve)): ?>
                <tfoot>
                    <tr>
                        <th colspan="5">General Average</th>
                        <th><?php 
if (!empty($lastGenAve)) {
    $avg = floatval($lastGenAve);
    if ($avg >= 75) {
         echo '<span style="color: green;">Passed  ' . number_format($avg, 2) . '</span>';
    } else {
         echo '<span style="color: red;">Failed ' . number_format($avg, 2) . '</span>';
    }
} else {
    echo "N/A";
}
?>
</th>
                    </tr>
                </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </div>
<?php endif; ?>

<?php if ($cardType === 'senior'): ?>
    <!-- Senior High School Card - First Semester -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            Senior High School Card - First Semester
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Unit</th>
                        <th>Prelim</th>
                        <th>Midterm</th>
                        <th>Prefinal</th>
                        <th>Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($grades) > 0): ?>
                        <?php foreach ($grades as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['subject']); ?></td>
                                <td><?php echo htmlspecialchars($row['unit']); ?></td>
                                <td><?php echo htmlspecialchars($row['prelim']); ?></td>
                                <td><?php echo htmlspecialchars($row['midterm']); ?></td>
                                <td><?php echo htmlspecialchars($row['prefinal']); ?></td>
                                <td><?php echo htmlspecialchars($row['final_ave']); ?></td>
                                <td><?php echo htmlspecialchars($row['remarks']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No grades found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>General Average</th>
                        <th colspan="4"></th>
                        <th>
                            <?php 
                                if (count($grades) > 0) {
                                    $avg = floatval($grades[0]['gen_ave']);
                                    if ($avg >= 75) {
                                        echo '<span style="color: green;">Passed ' . number_format($avg, 2) . '</span>';
                                    } else {
                                        echo '<span style="color: red;">Failed ' . number_format($avg, 2) . '</span>';
                                    }
                                } else {
                                    echo "N/A";
                                }
                            ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Senior High School Card - Second Semester -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            Senior High School Card - Second Semester
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Unit</th>
                        <th>Prelim</th>
                        <th>Midterm</th>
                        <th>Prefinal</th>
                        <th>Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($grades) > 0): ?>
                        <?php foreach ($grades as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['subject1']); ?></td>
                                <td><?php echo htmlspecialchars($row['unit1']); ?></td>
                                <td><?php echo htmlspecialchars($row['prelim1']); ?></td>
                                <td><?php echo htmlspecialchars($row['midterm1']); ?></td>
                                <td><?php echo htmlspecialchars($row['prefinal1']); ?></td>
                                <td><?php echo htmlspecialchars($row['final_ave1']); ?></td>
                                <td><?php echo htmlspecialchars($row['remarks1']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No grades found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>General Average</th>
                        <th colspan="4"></th>
                        <th>
                            <?php 
                                if (count($grades) > 0) {
                                    $avg = floatval($grades[0]['gen_ave1']);
                                    if ($avg >= 75) {
                                        echo '<span style="color: green;">Passed ' . number_format($avg, 2) . '</span>';
                                    } else {
                                        echo '<span style="color: red;">Failed ' . number_format($avg, 2) . '</span>';
                                    }
                                } else {
                                    echo "N/A";
                                }
                            ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php endif; ?>


<?php if ($cardType === 'college'): ?>
    <!-- College Card - First Semester -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark fw-bold">
            College Card - First Semester
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Unit</th>
                        <th>Prelim</th>
                        <th>Midterm</th>
                        <th>Prefinal</th>
                        <th>Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (count($grades) > 0): 
                        foreach ($grades as $row): 
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['subject']); ?></td>
                            <td><?php echo htmlspecialchars($row['unit']); ?></td>
                            <td><?php echo htmlspecialchars($row['prelim']); ?></td>
                            <td><?php echo htmlspecialchars($row['midterm']); ?></td>
                            <td><?php echo htmlspecialchars($row['prefinal']); ?></td>
                            <td><?php echo htmlspecialchars($row['final_ave']); ?></td>
                            <td><?php echo htmlspecialchars($row['remarks']); ?></td>
                        </tr>
                    <?php 
                        endforeach; 
                    else: 
                    ?>
                        <tr>
                            <td colspan="8">No grades found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th >General Average</th>
                        <th colspan="4"></th>
                        <th>
    <?php 
        if (count($grades) > 0) {
            $avg = floatval($grades[0]['gen_ave']);
            if ($avg >= 75) {
                echo '<span style="color: green;">Passed  ' . number_format($avg, 2) . '</span>';
            } else {
                echo '<span style="color: red;">Failed  ' . number_format($avg, 2) . '</span>';
            }
        } else {
            echo "N/A";
        }
    ?>
</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- College Card - Second Semester -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark fw-bold">
            College Card - Second Semester
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Unit</th>
                        <th>Prelim</th>
                        <th>Midterm</th>
                        <th>Prefinal</th>
                        <th>Final Grade</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (count($grades) > 0): 
                        foreach ($grades as $row): 
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['subject1']); ?></td>
                            <td><?php echo htmlspecialchars($row['unit1']); ?></td>
                            <td><?php echo htmlspecialchars($row['prelim1']); ?></td>
                            <td><?php echo htmlspecialchars($row['midterm1']); ?></td>
                            <td><?php echo htmlspecialchars($row['prefinal1']); ?></td> 
                            <td><?php echo htmlspecialchars($row['final_ave1']); ?></td>
                            <td><?php echo htmlspecialchars($row['remarks1']); ?></td>
                        </tr>
                    <?php 
                        endforeach; 
                    else: 
                    ?>
                        <tr>
                            <td colspan="8">No grades found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>General Average</th>
                        <th colspan="4"></th>
                        <th>
                        <?php 
        if (count($grades) > 0) {
            $avg = floatval($grades[0]['gen_ave1']);
            if ($avg >= 75) {
                echo '<span style="color: green;">Passed  ' . number_format($avg, 2) . '</span>';
            } else {
                echo '<span style="color: red;">Failed  ' . number_format($avg, 2) . '</span>';
            }
        } else {
            echo "N/A";
        }
    ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php endif; ?>


<?php else: ?>
<!-- Documents Section with Pulse Animation -->
<div class="card mb-4 pulse-animation" id="nocard">
  <div class="card-header bg-warning text-white fw-bold">
    Student Card
  </div>
  <div class="card-body">
    <div class="d-flex justify-content-center">
      <a class="btn btn-danger" href="example2.php?id=<?php echo $student_id; ?>">Add Student Grades</a>
    </div>
  </div>
</div>

  <?php endif; ?>
        <div class="d-flex justify-content-end">
  
            </div>
      </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

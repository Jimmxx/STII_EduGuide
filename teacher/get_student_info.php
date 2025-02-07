<?php 
include 'conn.php';  // Your database connection file

// Use 'id' if 'student_id' is not provided
$student_id = $_GET['student_id'] ?? $_GET['id'] ?? '';

if (!$student_id) {
    echo json_encode(['error' => 'Missing student_id']);
    exit;
}

$sql = "SELECT grade_level FROM student_info WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Student not found']);
}
?>
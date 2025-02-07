<?php
include 'conn.php';

$department = $_GET['department'] ?? '';
$courses = [];

if (!empty($department)) {
    $stmt = $conn->prepare("SELECT name FROM subjects WHERE department = ?");
    $stmt->bind_param("s", $department);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $courses[] = ["value" => $row['name'], "text" => $row['name']];
    }
}
echo json_encode($courses);
?>

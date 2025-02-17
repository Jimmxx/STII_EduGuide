<?php

include('conn.php');

header('Content-Type: application/json');

if (isset($_GET['q']) && strlen(trim($_GET['q'])) >= 2) {
    $searchTerm = trim($_GET['q']);
    $stmt = $conn->prepare("SELECT student_id, s_fname, s_lname FROM student_info WHERE s_fname LIKE ? OR s_lname LIKE ?");
    $likeTerm = "%{$searchTerm}%";
    $stmt->bind_param("ss", $likeTerm, $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    echo json_encode($students);
    $stmt->close();
} else {
    // If query string is missing or too short, return an empty array
    echo json_encode([]);
}
?>
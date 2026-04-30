<?php
header('Content-Type: application/json');
require_once 'db.php';

// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

$type = $data['type'] ?? '';
$description = $data['description'] ?? '';
$user_id = 1; // Mock user ID for employee1

if (empty($type) || empty($description)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
    exit;
}

// AI Threat Assessment Simulation (Keyword-based)
$severity = 'Low';
$descriptionLower = strtolower($description);

$highKeywords = ['password', 'breach', 'ransomware', 'stolen', 'hacked', 'unauthorized', 'critical'];
$mediumKeywords = ['spam', 'slow', 'suspicious', 'adware'];

foreach ($highKeywords as $word) {
    if (strpos($descriptionLower, $word) !== false) {
        $severity = 'High';
        break;
    }
}
if ($severity === 'Low') {
    foreach ($mediumKeywords as $word) {
        if (strpos($descriptionLower, $word) !== false) {
            $severity = 'Medium';
            break;
        }
    }
}

// Insert into Database
try {
    $stmt = $pdo->prepare("INSERT INTO incidents (user_id, type, description, severity) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $type, $description, $severity]);
    $incident_id = $pdo->lastInsertId();

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "message" => "Incident reported successfully.",
        "data" => [
            "id" => $incident_id,
            "severity" => $severity
        ]
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Failed to save incident."]);
}
?>

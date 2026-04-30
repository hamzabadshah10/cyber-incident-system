<?php
header('Content-Type: application/json');
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    exit;
}

// Fetch all incidents for the admin, or filter by user for employee dashboard
try {
    $role = $_GET['role'] ?? 'admin';
    
    if ($role === 'employee') {
        $stmt = $pdo->prepare("SELECT id, type, description, severity, status, created_at FROM incidents WHERE user_id = 1 ORDER BY created_at ASC");
        $stmt->execute();
    } else {
        $stmt = $pdo->query("SELECT id, type, description, severity, status, created_at FROM incidents ORDER BY created_at ASC");
    }
    
    $incidents = $stmt->fetchAll();

    http_response_code(200);
    echo json_encode(["status" => "success", "data" => $incidents]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Failed to retrieve incidents."]);
}
?>

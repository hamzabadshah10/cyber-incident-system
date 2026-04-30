<?php
header('Content-Type: application/json');
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    exit;
}

$last_check = $_GET['last_check'] ?? date('Y-m-d H:i:s', strtotime('-1 minute'));

try {
    // Only poll High or Critical alerts that occurred after the last check
    $stmt = $pdo->prepare("SELECT id, type, severity, created_at FROM incidents WHERE severity IN ('High', 'Critical') AND created_at > ? ORDER BY created_at DESC");
    $stmt->execute([$last_check]);
    $alerts = $stmt->fetchAll();

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "timestamp" => date('Y-m-d H:i:s'),
        "alerts" => $alerts
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Polling failed."]);
}
?>

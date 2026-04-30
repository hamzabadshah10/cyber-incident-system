<?php
header('Content-Type: application/json');
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'] ?? null;
$status = $data['status'] ?? null;

if (!$id || !in_array($status, ['Pending', 'Investigating', 'Resolved'])) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Invalid parameters"]);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE incidents SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);

    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "Status updated"]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Failed to update status"]);
}
?>

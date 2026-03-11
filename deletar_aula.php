<?php
header('Content-Type: application/json');
require 'db.php';

$id = $_POST['id'] ?? '';
if (!$id) {
    echo json_encode(['status'=>'error','message'=>'missing_id']);
    exit;
}

try {
    $stmt = $pdo->prepare('DELETE FROM aulas WHERE id=:id');
    $stmt->execute([':id'=>$id]);
    echo json_encode(['status'=>'success']);
} catch (Exception $e) {
    echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}

<?php
header('Content-Type: application/json');
require 'db.php';

try {
    $stmt = $pdo->query('SELECT * FROM aulas');
    $aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($aulas);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

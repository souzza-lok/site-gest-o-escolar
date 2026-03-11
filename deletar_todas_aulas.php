<?php
header('Content-Type: application/json');
require 'db.php';

try {
    $pdo->exec('DELETE FROM aulas');
    echo json_encode(['status'=>'success']);
} catch (Exception $e) {
    echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}

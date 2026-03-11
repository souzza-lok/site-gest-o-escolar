<?php
header('Content-Type: application/json');
require 'db.php';

$data = $_POST;
if (empty($data['id'])) {
    echo json_encode(['status'=>'error','message'=>'missing_id']);
    exit;
}

try {
    $stmt = $pdo->prepare('UPDATE aulas SET dia=:dia, horario=:horario, duracao=:duracao, turma=:turma, professor=:professor, materia=:materia, sala=:sala, observacoes=:observacoes WHERE id=:id');
    $stmt->execute([
        ':id' => $data['id'],
        ':dia' => $data['dia'],
        ':horario' => $data['horario'],
        ':duracao' => (int)$data['duracao'],
        ':turma' => $data['turma'],
        ':professor' => $data['professor'],
        ':materia' => $data['materia'],
        ':sala' => $data['sala'],
        ':observacoes' => $data['observacoes'] ?? ''
    ]);
    echo json_encode(['status'=>'success']);
} catch (Exception $e) {
    echo json_encode(['status'=>'error','message'=>$e->getMessage()]);
}

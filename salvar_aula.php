<?php
header('Content-Type: application/json');
require 'db.php';

// expect POST parameters dia, horario, duracao, turma, professor, materia, sala, observacoes
$data = $_POST;

if (empty($data['dia']) || empty($data['horario']) || empty($data['duracao']) || empty($data['turma']) || empty($data['professor']) || empty($data['materia']) || empty($data['sala'])) {
    echo json_encode(['status' => 'error', 'message' => 'missing_fields']);
    exit;
}

$id = uniqid('aula_', true);

try {
    $stmt = $pdo->prepare('INSERT INTO aulas (id, dia, horario, duracao, turma, professor, materia, sala, observacoes) VALUES (:id, :dia, :horario, :duracao, :turma, :professor, :materia, :sala, :observacoes)');
    $stmt->execute([
        ':id' => $id,
        ':dia' => $data['dia'],
        ':horario' => $data['horario'],
        ':duracao' => (int)$data['duracao'],
        ':turma' => $data['turma'],
        ':professor' => $data['professor'],
        ':materia' => $data['materia'],
        ':sala' => $data['sala'],
        ':observacoes' => $data['observacoes'] ?? ''
    ]);
    echo json_encode(['status' => 'success', 'id' => $id]);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM eventos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Evento não encontrado.";
        exit();
    }
} else {
    echo "ID do evento não especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consultar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h2>Detalhes do Evento</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['nome_evento']; ?></h5>
            <p class="card-text"><strong>Data:</strong> <?php echo $row['data_evento']; ?></p>
            <p class="card-text"><strong>Hora de Início:</strong> <?php echo $row['hora_inicio']; ?></p>
            <p class="card-text"><strong>Hora de Fim:</strong> <?php echo $row['hora_fim']; ?></p>
            <p class="card-text"><strong>Descrição:</strong> <?php echo $row['descricao']; ?></p>
            <p class="card-text"><strong>Local:</strong> <?php echo $row['local_evento']; ?></p>
            <p class="card-text"><strong>Responsável:</strong> <?php echo $row['responsavel_evento']; ?></p>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>

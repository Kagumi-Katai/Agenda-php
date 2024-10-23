<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Compromissos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Agenda de Compromissos</h1>
    <a href="create.php" class="btn btn-primary mb-3">Cadastrar Novo Evento</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome do Evento</th>
                <th>Data</th>
                <th>Hora Início</th>
                <th>Hora Fim</th>
                <th>Descrição</th>
                <th>Local</th>
                <th>Responsável</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM eventos ORDER BY data_evento, hora_inicio";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["nome_evento"]."</td>
                            <td>".$row["data_evento"]."</td>
                            <td>".$row["hora_inicio"]."</td>
                            <td>".$row["hora_fim"]."</td>
                            <td>".$row["descricao"]."</td>
                            <td>".$row["local_evento"]."</td>
                            <td>".$row["responsavel_evento"]."</td>
                            <td>
                                <a href='read.php?id=".$row["id"]."' class='btn btn-outline-info btn-sm'>Consultar</a>
                                <a href='update.php?id=".$row["id"]."' class='btn btn-outline-warning btn-sm'>Atualizar</a>
                                <a href='delete.php?id=".$row["id"]."' class='btn btn-outline-danger btn-sm' onclick=\"return confirm('Tem certeza que deseja remover este evento?')\">Remover</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='text-center'>Nenhum evento encontrado.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>

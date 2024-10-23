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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_evento = $_POST['nome_evento'];
    $data_evento = $_POST['data_evento'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $descricao = $_POST['descricao'];
    $local_evento = $_POST['local_evento'];
    $responsavel_evento = $_POST['responsavel_evento'];

    $sql = "UPDATE eventos SET 
                nome_evento='$nome_evento', 
                data_evento='$data_evento', 
                hora_inicio='$hora_inicio', 
                hora_fim='$hora_fim', 
                descricao='$descricao', 
                local_evento='$local_evento', 
                responsavel_evento='$responsavel_evento' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Atualizar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Atualizar Evento</h2>
        <form method="POST" action="">
            <div class="row">
                <div class="col-6 col-md-4">
                    <div class="mb-3">
                        <label for="nome_evento" class="form-label">Nome do Evento</label>
                        <input type="text" class="form-control" id="nome_evento" name="nome_evento"
                            value="<?php echo $row['nome_evento']; ?>" required>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="mb-3">
                        <label for="data_evento" class="form-label">Data do Evento</label>
                        <input type="date" class="form-control" id="data_evento" name="data_evento"
                            value="<?php echo $row['data_evento']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-md-4">
                    <div class="mb-3">
                        <label for="hora_inicio" class="form-label">Hora de Início</label>
                        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio"
                            value="<?php echo $row['hora_inicio']; ?>" required>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="mb-3">
                        <label for="hora_fim" class="form-label">Hora de Fim</label>
                        <input type="time" class="form-control" id="hora_fim" name="hora_fim"
                            value="<?php echo $row['hora_fim']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8">
                    <label for="descricao" class="form-label">Descrição do Evento</label>
                    <textarea class="form-control" id="descricao" name="descricao"
                        rows="3"><?php echo $row['descricao']; ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-8">
                    <label for="local_evento" class="form-label">Local do Evento</label>
                    <input type="text" class="form-control" id="local_evento" name="local_evento"
                        value="<?php echo $row['local_evento']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md-8">
                    <label for="responsavel_evento" class="form-label">Responsável pelo Evento</label>
                    <input type="text" class="form-control" id="responsavel_evento" name="responsavel_evento"
                        value="<?php echo $row['responsavel_evento']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>

                </div>
            </div>
        </form>
    </div>
</body>

</html>
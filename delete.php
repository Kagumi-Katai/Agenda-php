<?php
    include 'db_connect.php';

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "DELETE FROM eventos WHERE id = $id";

        if ($conn->query(query: $sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao remover: " . $conn->error;
        }
    } else {
        echo "ID do evento não especificado.";
        exit();
    }
?>

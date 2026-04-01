<?php
session_start();
require_once "../dao/HistoriaDAO.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}

$dao = new HistoriaDAO();
$usuario_id = $_SESSION['usuario']['id'];

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // 🔒 VERIFICA SE O EVENTO É DO USUÁRIO
    $evento = $dao->buscarPorId($id);

    if ($evento && $evento['usuario_id'] == $usuario_id) {

        if ($dao->excluir($id, $usuario_id)) {
            echo "Evento excluído com sucesso!";
            header("refresh:2;url=../views/hoje.php");
            exit;
        } else {
            echo "Erro ao excluir!";
        }

    } else {
        echo "Acesso negado!";
    }
}
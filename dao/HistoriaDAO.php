<?php
require_once __DIR__ . "/../config/database.php";

class HistoriaDAO {

    private $conn;

    public function __construct() {
        $this->conn = (new Database())->Conectar();
    }

    public function criar($evento, $data, $imagem, $usuario) {
    $sql = "INSERT INTO historia (evento, data_historica, imagem, usuario_id)
            VALUES (?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$evento, $data, $imagem, $usuario]);
}

    public function hoje() {
        $sql = "SELECT * FROM historia 
                WHERE DATE_FORMAT(data_historica, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')";
        return $this->conn->query($sql)->fetchAll();
    }

    public function ontem() {
    $sql = "SELECT * FROM historia 
            WHERE DATE_FORMAT(data_historica, '%m-%d') = DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 DAY), '%m-%d')";
    return $this->conn->query($sql)->fetchAll();
}

    public function listar() {
        $sql = "SELECT * FROM historia ORDER BY data_historica ASC";
        return $this->conn->query($sql)->fetchAll();
    }

    public function buscarPorId($id) {
    $sql = "SELECT * FROM historia WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

public function atualizar($id, $evento, $data, $imagem, $usuario) {

    if ($imagem) {
        $sql = "UPDATE historia 
                SET evento=?, data_historica=?, imagem=? 
                WHERE id=? AND usuario_id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$evento, $data, $imagem, $id, $usuario]);
    } else {
        $sql = "UPDATE historia 
                SET evento=?, data_historica=? 
                WHERE id=? AND usuario_id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$evento, $data, $id, $usuario]);
    }
}

public function excluir($id, $usuario) {
    $sql = "DELETE FROM historia WHERE id=? AND usuario_id=?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$id, $usuario]);
}

public function listarPorUsuario($usuario_id) {
    $sql = "SELECT * FROM historia WHERE usuario_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$usuario_id]);
    return $stmt->fetchAll();
}
}
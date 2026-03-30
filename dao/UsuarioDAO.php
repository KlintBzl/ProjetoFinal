<?php
require_once "../config/database.php";

class UsuarioDAO {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function cadastrar($usuario) {

        // Criptografar senha
        $senhaHash = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $usuario->getNome(),
            $usuario->getEmail(),
            $senhaHash
        ]);
    }

    public function login($email, $senha) {
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        return $usuario;
    }

    return false;
}

public function atualizar($id, $nome, $email, $senha = null) {

    if ($senha) {
        // Se quiser trocar senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET nome=?, email=?, senha=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$nome, $email, $senhaHash, $id]);
    } else {
        // Se NÃO quiser trocar senha
        $sql = "UPDATE usuarios SET nome=?, email=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$nome, $email, $id]);
    }
}

public function excluir($id) {
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$id]);
}
}
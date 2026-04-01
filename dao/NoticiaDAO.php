<?php
require_once __DIR__ . "/../config/database.php";

class NoticiaDAO {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function criar($titulo, $noticia, $autor, $imagem = null) {

        $sql = "INSERT INTO noticias (titulo, noticia, autor, imagem) 
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $titulo,
            $noticia,
            $autor,
            $imagem
        ]);
    }

    public function listar() {

    $sql = "SELECT 
                n.id,
                n.titulo,
                n.data,
                n.autor,
                u.nome AS autor_nome
            FROM noticias n
            JOIN usuarios u ON n.autor = u.id
            ORDER BY n.data DESC";

    return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

public function excluir($id, $autor) {

    $sql = "DELETE FROM noticias WHERE id = ? AND autor = ?";
    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([$id, $autor]);
}

public function buscarPorId($id) {

    $sql = "SELECT 
                n.*, 
                u.nome AS autor_nome
            FROM noticias n
            JOIN usuarios u ON n.autor = u.id
            WHERE n.id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function atualizar($id, $titulo, $noticia, $autor, $imagem = null) {

    if ($imagem) {
        $sql = "UPDATE noticias 
                SET titulo=?, noticia=?, imagem=? 
                WHERE id=? AND autor=?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$titulo, $noticia, $imagem, $id, $autor]);
    } else {
        $sql = "UPDATE noticias 
                SET titulo=?, noticia=? 
                WHERE id=? AND autor=?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$titulo, $noticia, $id, $autor]);
    }
}
}
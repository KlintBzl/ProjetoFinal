<?php
class Database {
    private $host = "localhost";
    private $db = "portal_historia";
    private $user = "root";
    private $pass = "";

    public function conectar() {
        try {
            return new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }
}
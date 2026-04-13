<?php
class Database {
    private $host = "sql100.infinityfree.com";
    private $db = "if0_41655155_portal_historia";
    private $user = "if0_41655155";
    private $pass = "klint1234567";

    public function conectar() {
        try {
            return new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }
}
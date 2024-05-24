<?php
abstract class Model{
    private $host = 'db';
    private $db_name = 'php_docker';
    private $username = 'php_docker'; 
    private $password = 'password';   
    
    protected $connexion;

    public $table;
    public $id;

    public function __construct(){}


    public function getConnection(){
        $this->connexion = null;

        try {
            $this->connexion = new PDO("mysql:host=". $this->host . ";dbname=". $this->db_name, $this->username, $this->password);
            $this->connexion->exec('set names utf8');
        } catch (PDOException $e) {
            echo 'Erreur : '. $e->getMessage();
            die();
        }
    }

    public function getOne(){
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }

    public function getAll(){
        $sql = "SELECT * FROM ".$this->table;
        $query = $this->connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }
}
<?php

require_once 'Crud.php';

class TipoParada extends Crud{
   protected $table = 'tipo_parada';
    private $idParada;
    private $tipoParada;
    private $descricao;
    private $nome;
    private $IdDeptoFK;
    function getTable() {
        return $this->table;
    }

    function getIdParada() {
        return $this->idParada;
    }

    function getTipoParada() {
        return $this->tipoParada;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getNome() {
        return $this->nome;
    }

    function getIdDeptoFK() {
        return $this->IdDeptoFK;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setIdParada($idParada) {
        $this->idParada = $idParada;
    }

    function setTipoParada($tipoParada) {
        $this->tipoParada = $tipoParada;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdDeptoFK($IdDeptoFK) {
        $this->IdDeptoFK = $IdDeptoFK;
    }

        public function insert() {


        $sql = "INSERT INTO $this->table (Nome, TipoParada, Descricao, IdDeptoFK)"
                . " VALUES (:nome, :tipoParada, :descricao, :IdDeptoFK)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':tipoParada', $this->tipoParada);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':IdDeptoFK', $this->IdDeptoFK);
        
        try {
            return $stmt->execute();  
        } catch (PDOException $e) {
            if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                return '1451';
            }
        }
    }

    
    public function findDepParada($id){
        $sql = "SELECT * FROM $this->table WHERE IdDeptoFK=:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    
    public function update($id) {
        $sql = "UPDATE $this->table SET Nome= :nome, "
                . "TipoParada=:tipoParada,"
                . "Descricao=:descricao,"
                . "IdDeptoFK= :IdDeptoFK "
                . "WHERE Id = :id";
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':tipoParada', $this->tipoParada);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':IdDeptoFK', $this->IdDeptoFK);
        $stmt->bindParam(':id', $id);
       try {
            return $stmt->execute();
        } catch (PDOException $e) {
            if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1062') {
                return false;
            }
        }        
    }

}

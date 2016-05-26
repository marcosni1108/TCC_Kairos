<?php

require_once 'Crud.php';

class parada extends Crud {

    protected $table = 'parada';
    private $idParada;
    private $tipoParada;
    private $descricao;
    private $nome;
    private $tempoParada;
    
    function getIdParada() {
        return $this->idParada;
    }

    function getTable() {
        return $this->table;
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

    function getTempoParada() {
        return $this->tempoParada;
    }

    function setTable($table) {
        $this->table = $table;
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

    function setTempoParada($tempoParada) {
        $this->tempoParada = $tempoParada;
    }

    
        public function insert() {


        $sql = "INSERT INTO $this->table (idParada, nome, tempoParada)"
                . " VALUES (:idParada, :nome, :tempoParada)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':idParada', $this->idParada);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':tempoParada', $this->tempoParada);



        return $stmt->execute();
    }

    public function update($idParada) {

        $sql = "UPDATE $this->table SET nome= :nome, "
                . "tempoParada=:tempoParada where" + $idParada;
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':tempoParada', $this->tempoParada);

        return $stmt->execute();
    }

}

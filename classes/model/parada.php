<?php

require_once 'Crud.php';

class parada extends Crud {

    protected $table = 'parada';
    private $idParada;
    private $nome;
    private $tempoParada;
    function getIdParada() {
        return $this->idParada;
    }

    function getNome() {
        return $this->nome;
    }

    function getTempoParada() {
        return $this->tempoParada;
    }

    function setIdParada($idParada) {
        $this->idParada = $idParada;
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

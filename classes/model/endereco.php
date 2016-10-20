<?php

require_once 'Crud.php';

class endereco extends Crud {

    protected $table = 'endereco';
    private $id;
    private $cep;
    private $rua;
    private $cnpj;
    private $numero;
    private $nomeFilial;

    function getNomeFilial() {
        return $this->nomeFilial;
    }

    function setNomeFilial($nomeFilial) {
        $this->nomeFilial = $nomeFilial;
    }

    function getId() {
        return $this->id;
    }

    function getCep() {
        return $this->cep;
    }

    function getRua() {
        return $this->rua;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getNumero() {
        return $this->numero;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    public function insert() {


        $sql = "INSERT INTO $this->table (cep,endereco,	cnpj,numero,nomeFilial)"
                . " VALUES (:cep,:endereco,:cnpj,:numero,:nomeFilial)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':endereco', $this->rua);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':nomeFilial', $this->nomeFilial);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1062') {
                return false;
            }
        }
    }

    public function update($id) {

        $sql = "UPDATE $this->table SET cep= :cep, "
                . "endereco=:endereco,"
                . "nomeFilial=:nomeFilial,"
                . "numero=:numero where id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':endereco', $this->rua);
        //$stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nomeFilial', $nomeFilial);


        return $stmt->execute();
    }

}

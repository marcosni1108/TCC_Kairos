<?php

require_once 'Crud.php';

class endereco extends Crud {

    protected $table = 'endereco';
    private $id;
    private $cep;
    private $rua;
    private $cnpj;
    private $numero;
    
    function getId() {
        return $this->id;
    }
    function construtor($cep, $rua, $cnpj, $numero) {
        $this->cep = $cep;
        $this->rua = $rua;
        $this->cnpj = $cnpj;
        $this->numero = $numero;
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


        $sql = "INSERT INTO $this->table (cep,endereco,	cnpj,numero)"
                . " VALUES (:cep,:endereco,:cnpj,:numero)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':endereco', $this->rua);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':numero', $this->numero);
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
                . "numero=:numero where id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':endereco', $this->rua);
        //$stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':id', $id);


        return $stmt->execute();
    }

}

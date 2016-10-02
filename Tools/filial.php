<?php

require_once 'Crud.php';

class filal extends Crud {

    protected $table = 'filial';
    private $cep;
    private $cnpjl;
    private $endereco;
    private $numero;

    function getCep() {
        return $this->cep;
    }

    function getCnpjl() {
        return $this->cnpjl;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getNumero() {
        return $this->numero;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setCnpjl($cnpjl) {
        $this->cnpjl = $cnpjl;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

            public function insert() {


        $sql = "INSERT INTO $this->table (idfilial, cep, cnpj, endereco, numero)"
                . " VALUES (:idfilial, :cep, :cnpj, :endeeco, :numero)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':idfilial', $this->idfilial);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':numero', $this->numero);


        return $stmt->execute();
    }

    public function update($idFilial) {

        $sql = "UPDATE $this->table SET "
                . "cep=:cep,"
                . "cnpj=:cnpj,"
                . "endereco=:endereco,"
                . "numero=:numero,"
                . " where" + $idFilial;
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':idfilial', $this->idfilial);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':numero', $this->numero);

        return $stmt->execute();
    }

}

<?php

require_once 'Crud.php';

class atividade extends Crud {

    protected $table = 'atividade';
    private $id;
    private $nome;
    private $descricao;
    private $idDepartamentoFK;
    private $cnpj;
    

    function getDescricao() {
        return $this->descricao;
    }

    function getIdDepartamentoFK() {
        return $this->idDepartamentoFK;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setDescricao($descricao) {
        $this->descrição = $descricao;
    }

    function setIdDepartamentoFK($idDepartamentoFK) {
        $this->idDepartamentoFK = $idDepartamentoFK;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

        function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

   

    function setIdAtividade($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

   

     

    

        public function insert() {


        $sql = "INSERT INTO $this->table (nome,descricao,idDepartamentoFK,cnpj)"
                . " VALUES (:nome,:descricao,:idDepartamentoFK,:cnpj)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descrição);
        $stmt->bindParam(':idDepartamentoFK', $this->idDepartamentoFK);
        $stmt->bindParam(':cnpj', $this->cnpj);
     

       
        return $stmt->execute();
    }

    public function update($idAtividade) {

        $sql = "UPDATE $this->table SET nome= :nome, "
                . "descricao=:descricao,idDepartamentoFK=:idDepartamentoFK,"
                . "cnpj=:cnpj where id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descrição);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':id', $idAtividade);
        
        
        return $stmt->execute();
    }

}

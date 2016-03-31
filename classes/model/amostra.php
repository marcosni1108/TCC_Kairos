<?php

require_once 'Crud.php';

class amostra extends Crud {

    protected $table = 'amostra';
    private $idAmostra;
    private $tempoinicial;
    private $tempofinal;
    private $quantidade;
    private $indice;
    private $departamento;
    private $atividade;
    
    function getIdAmostra() {
        return $this->idAmostra;
    }

    function getTempoinicial() {
        return $this->tempoinicial;
    }

    function getTempofinal() {
        return $this->tempofinal;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getIndice() {
        return $this->indice;
    }

    function setIdAmostra($idAmostra) {
        $this->idAmostra = $idAmostra;
    }

    function setTempoinicial($tempoinicial) {
        $this->tempoinicial = $tempoinicial;
    }

    function setTempofinal($tempofinal) {
        $this->tempofinal = $tempofinal;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setIndice($indice) {
        $this->indice = $indice;
    }
    
    function getDepartamento() {
        return $this->departamento;
    }

    function getAtividade() {
        return $this->atividade;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setAtividade($atividade) {
        $this->atividade = $atividade;
    }

    
        public function insert() {


        $sql = "INSERT INTO $this->table ( horainicial, horafinal, quantidade, indice, IdDeptoFK, IdAtividadeFK)"
                . " VALUES ( :tempoinicial, :tempofinal, :quantidade, :indice, :departamento, :atividade)";
        $stmt = DB::prepare($sql);
      
        $stmt->bindParam(':tempoinicial', $this->tempoinicial);
        $stmt->bindParam(':tempofinal', $this->tempofinal);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':indice', $this->indice);
        $stmt->bindParam(':departamento', $this->departamento);
        $stmt->bindParam(':atividade', $this->atividade);
        
        return $stmt->execute();
    }

    public function update($idAmostra) {

        $sql = "UPDATE $this->table SET  "
                . "tempoinicial=:tempoinicial,"
                . "tempofinal=:tempofinal,"
                . "quantidade=:quantidade,"
                . "indice=:indice,"
                . " where" + $idAmostra;
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':$idAmostra', $this->$idAmostra);
        $stmt->bindParam(':tempoinicial', $this->tempoinicial);
        $stmt->bindParam(':tempofinal', $this->tempofinal);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':indice', $this->indice);

        return $stmt->execute();
    }

}

<?php

require_once 'Crud.php';

class amostra extends Crud {

    protected $table = 'amostra';
    private $idAmostra;
    private $tempoinicial;
    private $tempofinal;
    private $quantidade;
    private $indice;
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

        public function insert() {


        $sql = "INSERT INTO $this->table (idAmostra, tempoinicial, tempofinal, quantidade, indice)"
                . " VALUES (:idAmostra, :tempoinicial, :tempofinal, :quantidade, :indice)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':idAmostra', $this->idAmostra);
        $stmt->bindParam(':tempoinicial', $this->tempoinicial);
        $stmt->bindParam(':tempofinal', $this->tempofinal);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':indice', $this->indice);


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

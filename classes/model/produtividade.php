<?php

require_once 'Crud.php';

class produtividade extends Crud {

    protected $table = 'produtividade';
    private $idProdutividade;
    private $tempoinicial;
    private $tempofinal;
    private $quantidade;
    private $data;
    private $IdFuncionario;
    private $IdDepartamento;
    private $IdAtividade;
    function getIdAtividade() {
        return $this->IdAtividade;
    }

    function setIdAtividade($IdAtividade) {
        $this->IdAtividade = $IdAtividade;
    }

        function getTable() {
        return $this->table;
    }

    function getIdProdutividade() {
        return $this->idProdutividade;
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

    function getData() {
        return $this->data;
    }

    function getIdFuncionario() {
        return $this->IdFuncionario;
    }

    function getIdDepartamento() {
        return $this->IdDepartamento;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setIdProdutividade($idProdutividade) {
        $this->idProdutividade = $idProdutividade;
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

    function setData($data) {
        $this->data = $data;
    }

    function setIdFuncionario($IdFuncionario) {
        $this->IdFuncionario = $IdFuncionario;
    }

    function setIdDepartamento($IdDepartamento) {
        $this->IdDepartamento = $IdDepartamento;
    }

        
    
        public function insert() {


        $sql = "INSERT INTO $this->table ( tempoInicial, tempoFinal, quantidade, data, IdFuncionario, IdDepartamento, IdAtividade)"
                . " VALUES ( :tempoinicial, :tempofinal, :quantidade, :data, :IdFuncionario, :IdDepartamento, :IdAtividade)";
        $stmt = DB::prepare($sql);
      
        $stmt->bindParam(':tempoinicial', $this->tempoinicial);
        $stmt->bindParam(':tempofinal', $this->tempofinal);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':IdFuncionario', $this->IdFuncionario,PDO::PARAM_INT);
        $stmt->bindParam(':IdAtividade', $this->IdAtividade,PDO::PARAM_INT);
        $stmt->bindParam(':IdDepartamento', $this->IdDepartamento,PDO::PARAM_INT);
         try {
            return $stmt->execute();
        } catch (PDOException $e) {
        if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
            return '1451';
        }
        
             }
        }

    public function update($IdProdutividade) {

        $sql = "UPDATE $this->table SET  "
                . "tempoInicial=:tempoinicial,"
                . "tempoFinal=:tempofinal,"
                . "quantidade=:quantidade,"
                . "data=:data,"
                . " where" + $IdProdutividade;
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':$IdProdutividade', $this->idProdutividade);
        $stmt->bindParam(':tempoinicial', $this->tempoInicial);
        $stmt->bindParam(':tempofinal', $this->tempofinal);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':data', $this->data);


        return $stmt->execute();
    }
    
    public function verificarModa($indice_autal,$indice_proximo,$w,$jcount) {

            if($indice_autal==$indice_proximo && $w <> $jcount){
                    $moda = true;
                    $contModa = $contModa +1;
                    return $moda;
           }else {
                    $media = true;
                    return $media;
            }
            
            
    }
    public function findAllAmostras($id) {
        $sql = "SELECT * FROM $this->table where idProdutividade = :idProdutividade";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':idProdutividade', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}


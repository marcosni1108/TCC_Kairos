<?php

require_once 'Crud.php';

class produtividade extends Crud {


    protected $table = 'produtividade';
    private $idProdutividade;
    private $tempoinicial;
    private $tempofinal;
    private $quantidade;
    private $data;
    private $idFuncionario;
    private $idDepartamento;
    private $idAtividade;
    private $status;
    private $turno;
    private $percentProd;
    private $tempoProdEfetivo;
    private $capacidadeTurno;

    function getTurno() {
        return $this->turno;
    }

    function getPercentProd() {
        return $this->percentProd;
    }

    function getTempoProdEfetivo() {
        return $this->tempoProdEfetivo;
    }

    function getCapacidadeTurno() {
        return $this->capacidadeTurno;
    }

    function setTurno($turno) {
        $this->turno = $turno;
    }

    function setPercentProd($percentProd) {
        $this->percentProd = $percentProd;
    }

    function setTempoProdEfetivo($tempoProdEfetivo) {
        $this->tempoProdEfetivo = $tempoProdEfetivo;
    }

    function setCapacidadeTurno($capacidadeTurno) {
        $this->capacidadeTurno = $capacidadeTurno;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getIdAtividade() {
        return $this->idAtividade;
    }

    function setIdAtividade($IdAtividade) {
        $this->idAtividade = $IdAtividade;
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
        return $this->idFuncionario;
    }

    function getIdDepartamento() {
        return $this->idDepartamento;
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
        $this->idFuncionario = $IdFuncionario;
    }

    function setIdDepartamento($IdDepartamento) {
        $this->idDepartamento = $IdDepartamento;
    }

    public function insert() {
        $sql = "INSERT INTO $this->table"
                . " ( tempoInicial, tempoFinal, turno, quantidade, percentProd, tempoProdEfetivo, capacidade, data, IdFuncionario, IdDepartamento, IdAtividade, status)"
                . " VALUES ( :tempoinicial, :tempofinal, :turno, :quantidade, :percentProd, :tempoProdEfetivo, :capacidade, :data, :IdFuncionario, :IdDepartamento, :IdAtividade, :status)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':tempoinicial', $this->tempoinicial);
        $stmt->bindParam(':tempofinal', $this->tempofinal);
        $stmt->bindParam(':turno', $this->turno);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':percentProd', $this->percentProd);
        $stmt->bindParam(':tempoProdEfetivo', $this->tempoProdEfetivo);
        $stmt->bindParam(':capacidade', $this->capacidadeTurno);
        $stmt->bindParam(':IdFuncionario', $this->idFuncionario);
        $stmt->bindParam(':IdAtividade', $this->idAtividade);
        $stmt->bindParam(':IdDepartamento', $this->idDepartamento);
        $stmt->bindParam(':status', $this->status);
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
                . " tempoFinal =:tempofinal,"
                . " quantidade =:quantidade,"
                . " percentProd =:percentProd,"
                . " tempoProdEfetivo =:tempoProdEfetivo,"
                . " capacidade =:capacidade,"
                . " turno =:turno,"
                . " status =:status "
                . " where id =:IdProdutividade";

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':tempofinal', $this->tempofinal);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':percentProd', $this->percentProd);
        $stmt->bindParam(':tempoProdEfetivo', $this->tempoProdEfetivo);
        $stmt->bindParam(':capacidade', $this->capacidadeTurno);
        $stmt->bindParam(':turno', $this->turno);
        $stmt->bindParam(':IdProdutividade', $IdProdutividade);
        return $stmt->execute();
    }

    public function findAtividadeIniciadas($idFuncionario) {

        $sql = "SELECT * FROM $this->table where status = 'iniciado' and IdFuncionario = :idFuncionario";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findIdFunc($idFuncionario, $data) {

        $sql = "SELECT * FROM $this->table where IdFuncionario = :idFuncionario and data = :data";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
        $stmt->bindParam(':data', $data);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findAtivProd($dataDe, $dataAte, $id) {

        $sql = "select func.nome as nomFunc, AT.nome,prod.capacidade,prod.percentProd"
                . " from produtividade as prod inner join funcionario func"
                . " ON prod.IdFuncionario = func.id "
                . "INNER JOIN ATIVIDADE AT ON AT.ID = prod.IDAtividade"
                . " where AT.ID=:id and prod.data BETWEEN :dataDe"
                . " and :dataAte group by func.nome";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':dataDe', $dataDe);
        $stmt->bindParam(':dataAte', $dataAte);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function findProdDept($dataDe, $dataAte, $idCnpj) {

        $sql = "SELECT SUM(produtividade.quantidade) as prod,"
                . " departamento.nome FROM produtividade "
                . " INNER JOIN departamento ON "
                . " produtividade.`IdDepartamento` = departamento.id "
                . " where produtividade.data BETWEEN :dataDe"
                . " and :dataAte and departamento.idEnderecoFK = :idCnpj  "
                . " GROUP BY produtividade.IdDepartamento";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':dataDe', $dataDe);
        $stmt->bindParam(':dataAte', $dataAte);
        $stmt->bindParam(':idCnpj', $idCnpj);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function findProdTotal() {

        $sql = "SELECT SUM(produtividade.quantidade) as prod, "
                . "departamento.nome FROM produtividade INNER JOIN departamento"
                . " ON produtividade.`IdDepartamento` = departamento.id "
                . "GROUP BY produtividade.IdDepartamento";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function buscaAtividadeMeta($idDepartamento){
        
        $sql = "select a.id, a.nome from atividade a inner join meta m on  m.idatividadefk = a.id"
                . " where m.iddeptofk = :iddeptofk ";
        
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':iddeptofk', $idDepartamento);
        $stmt->execute();
        try {
            return $stmt->fetchAll();  
        } catch (PDOException $e) {
            if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                return '1451';
            }
        }
              
    }

}

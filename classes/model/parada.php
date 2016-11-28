<?php

require_once 'Crud.php';

class Parada extends Crud {
    
    function construtor($tempoInicial, $tempoFinal, $turno, $entradaTempo, $tempConvertSegun, $percentParada, $data, $idFuncionarioFK, $idDepartamentoFK, $idParadaFK, $status) {
        $this->tempoInicial = $tempoInicial;
        $this->tempoFinal = $tempoFinal;
        $this->turno = $turno;
        $this->entradaTempo = $entradaTempo;
        $this->tempConvertSegun = $tempConvertSegun;
        $this->percentParada = $percentParada;
        $this->data = $data;
        $this->idFuncionarioFK = $idFuncionarioFK;
        $this->idDepartamentoFK = $idDepartamentoFK;
        $this->idParadaFK = $idParadaFK;
        $this->status = $status;
    }

    protected $table = 'parada';
    private $id;
    private $tempoInicial;
    private $tempoFinal;
    private $turno;
    private $entradaTempo;
    private $tempConvertSegun;
    private $percentParada;
    private $data;
    private $idFuncionarioFK;
    private $idDepartamentoFK;
    private $idParadaFK;
    private $status;
    
    function getId() {
        return $this->id;
    }

    function getTempoInicial() {
        return $this->tempoInicial;
    }

    function getTempoFinal() {
        return $this->tempoFinal;
    }

    function getTurno() {
        return $this->turno;
    }

    function getEntradaTempo() {
        return $this->entradaTempo;
    }

    function getTempConvertSegun() {
        return $this->tempConvertSegun;
    }

    function getPercentParada() {
        return $this->percentParada;
    }

    function getData() {
        return $this->data;
    }

    function getIdFuncionarioFK() {
        return $this->idFuncionarioFK;
    }

    function getIdDepartamentoFK() {
        return $this->idDepartamentoFK;
    }

    function getIdParadaFK() {
        return $this->idParadaFK;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTempoInicial($tempoInicial) {
        $this->tempoInicial = $tempoInicial;
    }

    function setTempoFinal($tempoFinal) {
        $this->tempoFinal = $tempoFinal;
    }

    function setTurno($turno) {
        $this->turno = $turno;
    }

    function setEntradaTempo($entradaTempo) {
        $this->entradaTempo = $entradaTempo;
    }

    function setTempConvertSegun($tempConvertSegun) {
        $this->tempConvertSegun = $tempConvertSegun;
    }

    function setPercentParada($percentParada) {
        $this->percentParada = $percentParada;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setIdFuncionarioFK($idFuncionarioFK) {
        $this->idFuncionarioFK = $idFuncionarioFK;
    }

    function setIdDepartamentoFK($idDepartamentoFK) {
        $this->idDepartamentoFK = $idDepartamentoFK;
    }

    function setIdParadaFK($idParadaFK) {
        $this->idParadaFK = $idParadaFK;
    }

    function setStatus($status) {
        $this->status = $status;
    }

        
        public function insert() {


        $sql = "INSERT INTO $this->table (tempoInicial, tempoFinal, turno,entradaTempo,tempConvertSegun,"
                . "percentParada,data,idFuncionarioFK,idDepartamentoFK,	idParadaFK,status)"
                . " VALUES (:tempoInicial, :tempoFinal, :turno, :entradaTempo, :tempConvertSegun, :percentParada,"
                . ":data,:idFuncionarioFK,:idDepartamentoFK,:idParadaFK,:status)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':tempoInicial', $this->tempoInicial);
        $stmt->bindParam(':tempoFinal', $this->tempoFinal);
        $stmt->bindParam(':turno', $this->turno);
        $stmt->bindParam(':entradaTempo', $this->entradaTempo);
        $stmt->bindParam(':tempConvertSegun', $this->tempConvertSegun);
        $stmt->bindParam(':percentParada', $this->percentParada);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':idFuncionarioFK', $this->idFuncionarioFK);
        $stmt->bindParam(':idDepartamentoFK', $this->idDepartamentoFK);
        $stmt->bindParam(':idParadaFK', $this->idParadaFK);
        $stmt->bindParam(':status', $this->status);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1062') {
                return false;
            }
        }
    }

    public function findtotParadaDept($id,$mes,$ano) {

        $sql = "SELECT SUM(tempConvertSegun)as totParada,tipo_parada.nome as nome_parada ,departamento.nome as nome_departamento,idDepartamentoFK 
                FROM parada 
                INNER JOIN departamento ON (idDepartamentoFK = :id) 
                INNER JOIN tipo_parada ON (idParadaFK = tipo_parada.id) 
                WHERE MONTH(data) = :mes AND YEAR(data) = :ano
                GROUP BY idDepartamentoFK, idParadaFK";
        
        
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':mes', $mes, PDO::PARAM_INT);
        $stmt->bindParam(':ano', $ano, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function ParadaDept($de,$ate,$idDept) {

        $sql = "SELECT SUM(tempConvertSegun)as totParada, "
                . "tipo_parada.nome as nome_parada "
                . "FROM parada INNER JOIN tipo_parada "
                . "ON (idParadaFK = tipo_parada.id) "
                . "WHERE DATA BETWEEN :de and :ate and `idDepartamentoFK`=:id GROUP BY idParadaFK";
        
        
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':de', $de);
        $stmt->bindParam(':ate', $ate);
		 $stmt->bindParam('::id', $idDept);
        $stmt->execute();
        try {
            return  $stmt->fetchAll();
        } catch (PDOException $e) {
            if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1062') {
                $erro = $this->trataErro($e->errorInfo[2]);
                return $erro;
            }
        }
    }
    
    public function findtotTipoParada($id,$mes,$ano,$tipoParada) {

        $sql = "SELECT SUM(tempConvertSegun)as totParada,tipo_parada.nome as nome_parada ,departamento.nome as nome_departamento,idDepartamentoFK 
                FROM parada 
                INNER JOIN departamento ON (idDepartamentoFK = :id) 
                INNER JOIN tipo_parada ON (idParadaFK = tipo_parada.id) 
                WHERE MONTH(data) = :mes AND YEAR(data) = :ano AND tipo_parada.TIPOPARADA=:tipoParada
                GROUP BY idDepartamentoFK, idParadaFK";
        
        
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':mes', $mes, PDO::PARAM_INT);
        $stmt->bindParam(':ano', $ano, PDO::PARAM_INT);
        $stmt->bindParam(':tipoParada', $tipoParada);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function update($idParada) {

    }

}

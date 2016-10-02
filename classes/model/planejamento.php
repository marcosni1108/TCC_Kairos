<?php


require_once 'Crud.php';

class planejamento extends Crud {
    protected $table = 'planejamento';    
    private $qtd_hora_planejada;
    private $qtd_atividades;
    private $mao_de_obra;
    private $id_atividade_fk;
    
    function getTable() {
        return $this->table;
    }

    function getQtd_hora_planejada() {
        return $this->qtd_hora_planejada;
    }

    function getQtd_atividades() {
        return $this->qtd_atividades;
    }

    function getMao_de_obra() {
        return $this->mao_de_obra;
    }

    function getId_atividade_fk() {
        return $this->id_atividade_fk;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setQtd_hora_planejada($qtd_hora_planejada) {
        $this->qtd_hora_planejada = $qtd_hora_planejada;
    }

    function setQtd_atividades($qtd_atividades) {
        $this->qtd_atividades = $qtd_atividades;
    }

    function setMao_de_obra($mao_de_obra) {
        $this->mao_de_obra = $mao_de_obra;
    }

    function setId_atividade_fk($id_atividade_fk) {
        $this->id_atividade_fk = $id_atividade_fk;
    }

            
    
    public function insert() {

        $sql = "INSERT INTO $this->table(`QTD_HORA_PLANEJADO`, `QTD_ATIVIDADES`, `QTD_MAO_DE_OBRA`, `ID_ATIVIDADE_FK`) VALUES (:qtd_hora_planejada,:qtd_atividades,:mao_de_obra,:id_atividade_fk)";
        
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':qtd_hora_planejada', $this->qtd_hora_planejada);
        $stmt->bindParam(':qtd_atividades', $this->qtd_atividades);
        $stmt->bindParam(':mao_de_obra', $this->mao_de_obra);
        $stmt->bindParam(':id_atividade_fk', $this->id_atividade_fk);
        try {
            $stmt->execute();
            return "OK" ;
        } catch (PDOException $e) {
            if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1062') {
                 $erro = $this->trataErro($e->errorInfo[2]);
                return $erro;
            }
        }
        
    }

    public function update($id) {
        
    }

}


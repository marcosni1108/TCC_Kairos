<?php

require_once 'Crud.php';

class meta{
	
	protected $table = 'atividade';
        private $departamento;
        private $cnpj;
	private $atividade;
        private $meta;

	public function update(){

		$sql  = "UPDATE $this->table SET meta= :meta "
                        . "WHERE idDepartamentoFK =:departamento"
                        . " AND "
                        . "cnpj =:cnpj"
                        . " AND "
                        . "nome =:nome";
                
		$stmt = DB::prepare($sql);
		
		$stmt->bindParam(':meta', $this->meta);
                $stmt->bindParam(':departamento', $this->departamento);
                $stmt->bindParam(':cnpj', $this->cnpj);
                $stmt->bindParam(':nome', $this->atividade);
		return $stmt->execute();
                
                //Toda vez que criar (alterar) a meta, insere o mesmo registro na History
                //TODO - Descomentar quando criar a table de History
               
                // $this-> insertHistory();

	}
        
        public function insertHistory(){
            $sql = "INSERT INTO $this->table ( meta, departamento, cnpj ,atividade)"
                        . " VALUES (:meta, :departamento, :cnpj , :atividade)";
            	$stmt = DB::prepare($sql);
		
		$stmt->bindParam(':meta', $this->meta);
                $stmt->bindParam(':departamento', $this->departamento);
                $stmt->bindParam(':cnpj', $this->cnpj);
                $stmt->bindParam(':atividade', $this->atividade);
		return $stmt->execute();
        }
        
        function getTable() {
            return $this->table;
        }

        function getDepartamento() {
            return $this->departamento;
        }

        function getCnpj() {
            return $this->cnpj;
        }

        function getAtividade() {
            return $this->atividade;
        }

        function getMeta() {
            return $this->meta;
        }

        function setTable($table) {
            $this->table = $table;
        }

        function setDepartamento($departamento) {
            $this->departamento = $departamento;
        }

        function setCnpj($cnpj) {
            $this->cnpj = $cnpj;
        }

        function setAtividade($atividade) {
            $this->atividade = $atividade;
        }

        function setMeta($meta) {
            $this->meta = $meta;
        }


}
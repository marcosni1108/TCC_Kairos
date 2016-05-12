<?php

require_once 'Crud.php';

class meta{
	
	protected $table = 'meta';
        private $MediaIndice;
        private $quantidade;
        private $Meta;
	private $resultado;
        private $AcrescimoMeta;
        private $IdDeptoFK;
        private $IdAtividadeFK;
       
	public function update(){

		$sql  = "UPDATE $this->table SET meta= :meta "
                        . "WHERE idDepartamentoFK =:departamento"
                        . " AND "
                        . "cnpj =:cnpj"
                        . " AND "
                        . "nome =:nome";
                
		$stmt = DB::prepare($sql);
		
		$stmt->bindParam(':MetaIndice', $this->MetaIndice);
                $stmt->bindParam(':quantidade', $this->quantidade);
                $stmt->bindParam(':Meta', $this->Meta);
                $stmt->bindParam(':resultado', $this->resultado);
                $stmt->bindParam(':AcrescimoMeta', $this->AcrescimoMeta);
                $stmt->bindParam(':IdDeptoFK', $this->IdDeptoFK);
                $stmt->bindParam(':IdAtividadeFK', $this->IdAtividadeFK);
		return $stmt->execute();
                
                //Toda vez que criar (alterar) a meta, insere o mesmo registro na History
                //TODO - Descomentar quando criar a table de History
               
                // $this-> insertHistory();

	}
        
        public function insertMeta(){
            $sql = "INSERT INTO $this->table ( MediaIndice, quantidade , Meta, resultado, AcrescimoMeta, IdDeptoFK, IdAtividadeFK)"
                        . " VALUES (:MetaIndice, :quantidade , :Meta, :resultado, :AcrescimoMeta, :IdDeptoFK, :IdAtividadeFK)";
            	$stmt = DB::prepare($sql);
		
		$stmt->bindParam(':MetaIndice', $this->MetaIndice);
                $stmt->bindParam(':quantidade', $this->quantidade);
                $stmt->bindParam(':Meta', $this->Meta);
                $stmt->bindParam(':resultado', $this->resultado);
                $stmt->bindParam(':AcrescimoMeta', $this->AcrescimoMeta);
                $stmt->bindParam(':IdDeptoFK', $this->IdDeptoFK);
                $stmt->bindParam(':IdAtividadeFK', $this->IdAtividadeFK);
		return $stmt->execute();
        }
        
        function getTable() {
            return $this->table;
        }

        function getQuantidade() {
            return $this->quantidade;
        }

        function getMeta() {
            return $this->Meta;
        }

        function getResultado() {
            return $this->resultado;
        }

        function getAcrescimoMeta() {
            return $this->AcrescimoMeta;
        }

        function getIdDeptoFK() {
            return $this->IdDeptoFK;
        }

        function getIdAtividadeFK() {
            return $this->IdAtividadeFK;
        }

        function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }

        function setMeta($Meta) {
            $this->Meta = $Meta;
        }

        function setResultado($resultado) {
            $this->resultado = $resultado;
        }

        function setAcrescimoMeta($AcrescimoMeta) {
            $this->AcrescimoMeta = $AcrescimoMeta;
        }

        function setIdDeptoFK($IdDeptoFK) {
            $this->IdDeptoFK = $IdDeptoFK;
        }

        function setIdAtividadeFK($IdAtividadeFK) {
            $this->IdAtividadeFK = $IdAtividadeFK;
        }

        

        function getMediaIndice() {
            return $this->MediaIndice;
        }

         function setMediaIndice($MediaIndice) {
            $this->MediaIndice = $MediaIndice;
        }

}
<?php

require_once 'Crud.php';

class departamento extends Crud {

    protected $table = 'departamento';
    private $id;
    private $nome;
    private $cnpj;
    private $lider;
    private $gerente;
    private $idEnderecoFK;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getLider() {
        return $this->lider;
    }

    function getGerente() {
        return $this->gerente;
    }

    function getIdEnderecoFK() {
        return $this->idEnderecoFK;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setLider($lider) {
        $this->lider = $lider;
    }

    function setGerente($gerente) {
        $this->gerente = $gerente;
    }

    function setIdEnderecoFK($idEnderecoFK) {
        $this->idEnderecoFK = $idEnderecoFK;
    }

    public function insert() {


        $sql = "INSERT INTO $this->table (nome,cnpj,lider,gerente,idEnderecoFK	)"
                . " VALUES (:nome,:cnpj,:lider,:gerente,:idEnderecoFK)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':lider', $this->lider);
        $stmt->bindParam(':gerente', $this->gerente);
        $stmt->bindParam(':idEnderecoFK', $this->idEnderecoFK);



        return $stmt->execute();
    }

    public function update($id) {

        $sql = "UPDATE $this->table SET nome= :nome, "
                . "cnpj=:cnpj,lider=:lider,"
                . "gerente=:gerente,idEnderecoFK =:idEnderecoFK where id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':lider', $this->lider);
        $stmt->bindParam(':gerente', $this->gerente);
        $stmt->bindParam(':idEnderecoFK', $this->idEnderecoFK);
        $stmt->bindParam(':id', $id);


        return $stmt->execute();
    }

    public function findDeptCnpj($idEnd) {
        $sql = "SELECT * FROM $this->table WHERE idEnderecoFK = :idEnd";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':idEnd', $idEnd, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function BuscaTable() {
        $sql = "SELECT dep.id,
	  dep.cnpj,
	  dep.nome as Departamento,
	  funcLider.nome as Lider,
	  funcGerente.nome as Gerente,
          concat(ende.endereco, ', ' , ende.numero) as Endereco
                FROM departamento as dep
                inner join funcionario funcLider
                on funcLider.id = dep.lider
                inner join funcionario funcGerente
                on funcGerente.id = dep.gerente
                inner join endereco ende
                on ende.id = dep.idEnderecoFK";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

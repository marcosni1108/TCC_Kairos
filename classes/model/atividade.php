<?php

require_once 'Crud.php';

class Atividade extends Crud {

    protected $table = 'atividade';
    private $id;
    private $nome;
    private $descricao;
    private $idDepartamentoFK;
    private $cnpj;
    private $meta;
    private $unid_med;

    function getUnid_med() {
        return $this->unid_med;
    }

    function setUnid_med($unid_med) {
        $this->unid_med = $unid_med;
    }

    function getMeta() {
        return $this->meta;
    }

    function setMeta($meta) {
        $this->meta = $meta;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getIdDepartamentoFK() {
        return $this->idDepartamentoFK;
    }

//    function getCnpj() {
//        return $this->cnpj;
//    }

    function setTable($table) {
        $this->table = $table;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setIdDepartamentoFK($idDepartamentoFK) {
        $this->idDepartamentoFK = $idDepartamentoFK;
    }

//    function setCnpj($cnpj) {
//        $this->cnpj = $cnpj;
//    }

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


        $sql = "INSERT INTO $this->table (nome,descricao,idDepartamentoFK,unid_med)"
                . " VALUES (:nome,:descricao,:idDepartamentoFK,:unid_med)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':idDepartamentoFK', $this->idDepartamentoFK);
        // $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':unid_med', $this->unid_med);


        return $stmt->execute();
    }

    public function update($idAtividade) {

        $sql = "UPDATE $this->table SET nome= :nome, "
                . "descricao=:descricao,idDepartamentoFK=:idDepartamentoFK,"
                . "unid_med =:unid_med where id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        //$stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':idDepartamentoFK', $this->idDepartamentoFK);
        $stmt->bindParam(':unid_med', $this->unid_med);
        $stmt->bindParam(':id', $idAtividade);


        return $stmt->execute();
    }

    public function findDept($id) {
        $sql = "SELECT * FROM $this->table WHERE idDepartamentoFK = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findQtdAtiv($id) {
        $sql = "SELECT COUNT(id) FROM $this->table WHERE idDepartamentoFK = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findProdTotalAtividade($id, $mes, $ano) {

        $sql = "SELECT SUM(produtividade.quantidade) as prod,atividade.nome as nome_atividade,departamento.nome as nome_departamento
                FROM produtividade 
                INNER JOIN atividade ON (produtividade.`IdAtividade` = atividade.id)
                INNER JOIN departamento ON (:id = departamento.id)
                WHERE MONTH(data) = :mes AND YEAR(data) = :ano
                GROUP BY produtividade.IdAtividade";


        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':mes', $mes, PDO::PARAM_INT);
        $stmt->bindParam(':ano', $ano, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function dashProdTotalAtividade($de, $ate) {

        $sql = "SELECT SUM(produtividade.quantidade) as prod,atividade.nome as nome_atividade,departamento.nome as nome_departamento
                FROM produtividade 
                INNER JOIN atividade ON (produtividade.`IdAtividade` = atividade.id)
                INNER JOIN departamento ON (produtividade.`IdDepartamento` = departamento.id) 
                WHERE DATA BETWEEN :de and :ate
                GROUP BY produtividade.IdDepartamento";


        $stmt = DB::prepare($sql);
        $stmt->bindParam(':de', $de);
        $stmt->bindParam(':ate', $ate);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

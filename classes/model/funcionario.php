<?php

require_once 'Crud.php';

class funcionario extends Crud {

    protected $table = 'funcionario';
    private $matricula;
    private $nome;
    private $cpf;
    private $email;
    private $login;
    private $senha;
    private $nivel;

    function getMatricula() {
        return $this->matricula;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function insert() {


        $sql = "INSERT INTO $this->table ( matricula, nome, cpf ,email, login, senha, nivel)"
                . " VALUES (:matricula, :nome, :cpf , :email, :login, :senha, :nivel)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':nivel', $this->nivel);

        return $stmt->execute();
    }

    public function update($id) {

        $sql = "UPDATE $this->table SET nome= :nome, "
                . "cpf=:cpf,"
                . "email=:email,"
                . "login=:login,"
                . "senha= :senha,"
                . "nivel= :nivel "
                . "WHERE id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':nivel', $this->nivel);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function verificaLogin($login, $senha) {

        $sql = "SELECT * FROM $this->table WHERE login = :login AND senha= :senha";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
//        $rows = $stmt->rowCount();
//        return $rows;

        return $stmt->fetchAll();
    }

    public function whereNivel($nivel) {
        $sql = "SELECT * FROM $this->table WHERE nivel = :nivel";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nivel', $nivel, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
}

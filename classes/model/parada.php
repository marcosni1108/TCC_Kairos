<?php

  require_once 'Crud.php';

  class parada extends Crud {

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

      function __construct($tempoInicial, $tempoFinal, $turno, $entradaTempo, $tempConvertSegun, $percentParada, $data, $idFuncionarioFK, $idDepartamentoFK, $idParadaFK, $status) {
          $this -> tempoInicial = $tempoInicial;
          $this -> tempoFinal = $tempoFinal;
          $this -> turno = $turno;
          $this -> entradaTempo = $entradaTempo;
          $this -> tempConvertSegun = $tempConvertSegun;
          $this -> percentParada = $percentParada;
          $this -> data = $data;
          $this -> idFuncionarioFK = $idFuncionarioFK;
          $this -> idDepartamentoFK = $idDepartamentoFK;
          $this -> idParadaFK = $idParadaFK;
          $this -> status = $status;
      }

      function getId() {
          return $this -> id;
      }

      function getTempoInicial() {
          return $this -> tempoInicial;
      }

      function getTempoFinal() {
          return $this -> tempoFinal;
      }

      function getTurno() {
          return $this -> turno;
      }

      function getEntradaTempo() {
          return $this -> entradaTempo;
      }

      function getTempConvertSegun() {
          return $this -> tempConvertSegun;
      }

      function getPercentParada() {
          return $this -> percentParada;
      }

      function getData() {
          return $this -> data;
      }

      function getIdFuncionarioFK() {
          return $this -> idFuncionarioFK;
      }

      function getIdDepartamentoFK() {
          return $this -> idDepartamentoFK;
      }

      function getIdParadaFK() {
          return $this -> idParadaFK;
      }

      function getStatus() {
          return $this -> status;
      }

      function setId($id) {
          $this -> id = $id;
      }

      function setTempoInicial($tempoInicial) {
          $this -> tempoInicial = $tempoInicial;
      }

      function setTempoFinal($tempoFinal) {
          $this -> tempoFinal = $tempoFinal;
      }

      function setTurno($turno) {
          $this -> turno = $turno;
      }

      function setEntradaTempo($entradaTempo) {
          $this -> entradaTempo = $entradaTempo;
      }

      function setTempConvertSegun($tempConvertSegun) {
          $this -> tempConvertSegun = $tempConvertSegun;
      }

      function setPercentParada($percentParada) {
          $this -> percentParada = $percentParada;
      }

      function setData($data) {
          $this -> data = $data;
      }

      function setIdFuncionarioFK($idFuncionarioFK) {
          $this -> idFuncionarioFK = $idFuncionarioFK;
      }

      function setIdDepartamentoFK($idDepartamentoFK) {
          $this -> idDepartamentoFK = $idDepartamentoFK;
      }

      function setIdParadaFK($idParadaFK) {
          $this -> idParadaFK = $idParadaFK;
      }

      function setStatus($status) {
          $this -> status = $status;
      }

      public function insert() {

          $sql = "INSERT INTO $this -> table (tempoInicial, tempoFinal, turno,entradaTempo,tempConvertSegun,"
                  ."percentParada,data,idFuncionarioFK,idDepartamentoFK,	idParadaFK,status)"
                  ." VALUES (:tempoInicial, :tempoFinal, :turno, :entradaTempo, :tempConvertSegun, :percentParada,"
                  .":data,:idFuncionarioFK,:idDepartamentoFK,:idParadaFK,:status)";
          $stmt = DB::prepare($sql);
          $stmt -> bindParam(':tempoInicial', $this -> tempoInicial);
          $stmt -> bindParam(':tempoFinal', $this -> tempoFinal);
          $stmt -> bindParam(':turno', $this -> turno);
          $stmt -> bindParam(':entradaTempo', $this -> entradaTempo);
          $stmt -> bindParam(':tempConvertSegun', $this -> tempConvertSegun);
          $stmt -> bindParam(':percentParada', $this -> percentParada);
          $stmt -> bindParam(':data', $this -> data);
          $stmt -> bindParam(':idFuncionarioFK', $this -> idFuncionarioFK);
          $stmt -> bindParam(':idDepartamentoFK', $this -> idDepartamentoFK);
          $stmt -> bindParam(':idParadaFK', $this -> idParadaFK);
          $stmt -> bindParam(':status', $this -> status);
          try {
              return $stmt -> execute();
          } catch(PDOException $e) {
              if(isset($e -> errorInfo[1])&&$e -> errorInfo[1]=='1062') {
                  return false;
              }
          }
      }

      public function update($idParada) {

      }

  }

<?php

require_once 'DB.php';

abstract class Crud extends DB {

    protected $table;

    abstract public function insert();

    abstract public function update($id);

    public function find($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }


    public function findAll() {
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
        if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
            return '1451';
   }
}
        
    }
    public function whereSelected($nivel,$id) {
        $sql = "SELECT * FROM $this->table WHERE nivel = :nivel AND id <>:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nivel', $nivel , PDO::PARAM_INT);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function whereSelectedEnd($id) {
        $sql = "SELECT * FROM $this->table WHERE  id <>:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
  

}

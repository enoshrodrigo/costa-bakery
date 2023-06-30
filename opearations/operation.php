<?php
include_once '../db_connect/connect.php';

class Operation extends Connect
{
       private $table;
        private $fields;

        public function setTable($table)
        {
            $this->table = $table;
        }

        public function setFields($fields)
        {
           $this->fields = $fields;
        }

        public function getTable()
        {
            return $this->table;
        }

        public function getFields()
        {
            return $this->fields;
        }

    public function insertOData(){
        $tabel  = $this->getTable();
        $fields = $this->getFields();
        $connect = new Connect();
      
       $result= $connect->insertData($tabel, $fields);
       
       if($result){
           return true;
    }
    else{
        return false;
    }
    }  

    public function selectOData($where = null,$area ='*'){
        $tabel  = $this->getTable();
        $connect = new Connect();
        $result= $connect->selectData($tabel, $where,$area);
        if($result){
            return $result;
     }
     else{
         return false;
     }
    }

    public function deleteOData($where = null){
        $tabel  = $this->getTable();
        $connect = new Connect();
        $result= $connect->deleteData($tabel, $where);
        if($result){
            return true;
     }
     else{
         return false;
     }
    }


}

?>
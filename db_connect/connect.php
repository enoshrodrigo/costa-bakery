<?php
class Connect {
    private $host = "localhost";        
    private $username = "root";       
    private $password = "";
    private $db_name = "costabakery"; 
    public  $con;                            

  public function __construct()
  {
    $this->con = new mysqli($this->host, $this->username, $this->password, $this->db_name);
    if ($this->con->connect_error) {
      echo "Fail " . $this->con->connect_error;
    } else {
      return $this->con;
    }
  }

    public function insertData($table, $fields)
    { //adding bind param in upcoming version 
        $col = implode(",", array_keys($fields));
        $row = implode("','", array_values($fields));
        $sql = "INSERT INTO $table ($col) VALUES ('$row')";
        $query = $this->con->query($sql);
        if ($query) {
        return true;
        } else {
        return false;
        }
    }
    
    public function selectData($table, $where = null,$area ='*')
    {
        $sql = "SELECT $area FROM $table";
        if ($where != null) {
        $sql .= " WHERE $where";
        }
        $query = $this->con->query($sql);
        
        if ($query->num_rows > 0) {
          while ($row = $query->fetch_assoc()) {
            $data[] = $row;
          }
          return $data;
        
        } else {
        return false;
        }
    }

    public function deleteData($table, $where = null)
    {
        $sql = "DELETE FROM $table";
        if ($where != null) {
        $sql .= " WHERE $where";
        }
        $query = $this->con->query($sql);
        if ($query) {
        return true;
        } else {
        return false;
        }
    }

    public function updateData($tabel,$columns,$where=null)  {
       $column=implode(" , ",$columns);
      $sql="UPDATE `$tabel` SET ";
      $sql = $sql.$column;
      if($where!=null){
        $sql=$sql." WHERE ".$where;
      }

      $query=$this->con->query($sql);
      if($query){
        return true;
      }else{
        return false;
      }

      
    }
  
}

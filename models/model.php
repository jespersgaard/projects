<?php
require_once '../settings.php';
abstract class Model {
    protected $dbConnection = null;
    protected $table = null;
    
    protected function init(){
        global $database;
        $this->dbConnection = mysql_connect($database['host'], $database['username'], $database['password'])
                or die ('Could not connect to Database: '.  mysql_error());
        
        mysql_select_db($database['database']) or die ('Database not found: '.  mysql_error());
        $this->table = $database['prefix'].strtolower(str_replace('Model', '', get_class($this)));
    }
    
    public function find($field, $value = ''){
        if ($field == 'all'){
            $query = "SELECT * FROM ".$this->table;
        }
        else{
            $query = "SELECT * FROM ".$this->table." WHERE ".$field." = ".$value;
        }
        $result = mysql_query($query) or die ('Query failed: '.  mysql_error());
        $rows = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($rows, $row);
        }
        
        return $rows;
    }
    
    public function add(array $data){
        $keys = array();
        $values = array();
        
        foreach($data as $key=>$value) {
            $keys[] = $key;
            $values[] = $value;
        }
        
        $query = 'INSERT INTO '.$this->table.' ('.$keys[0];
        for ($i = 1; $i < count($keys); $i++){
            $query .= ', '.$keys[$i];
        }
        $query .= ") VALUES ('".$values[0]."'";
        for ($i = 1; $i < count($values); $i++){
            $query .= ", '".$values[$i]."'";
        }
        $query .= ')';
        
        if(mysql_query($query)){
            return mysql_error();
        }
        else {
            return mysql_error();
        }
    }
    
    public function remove($id){
        $query = "DELETE FROM $this->table WHERE ID=$id";
        if(mysql_query($query)){
            return mysql_error();
        }
        else {
            return mysql_error();
        }
    }


    function __destruct() {
        if ($this->dbConnection != null){
            mysql_close($this->dbConnection);
        }
    }
}
?>

<?php
 
class SQLQuery {
    protected $_dbHandle;
    protected $_result;
    protected $_table;
 
    /** Connects to database **/
 
    function connect($address, $account, $pwd, $name) {
        $this->_dbHandle = mysqli_connect($address, $account, $pwd);
        if ($this->_dbHandle) {
            if (mysqli_select_db($this->_dbHandle, $name)) {
                return 1;
            }
            else {
                return 0;
            }
        }
        else {
            return 0;
        }
    }
 
    /** Disconnects from database **/
 
    function disconnect() {
        if (mysqli_close($this->_dbHandle)) {
            return 1;
        }  else {
            return 0;
        }
    }
    

    function selectAll($table) {
        $query = 'select * from '.$table;
        return $this->query($query);
    }
 
    function select($id) {
        $query = 'select * from '.$this->_table.' where id = \''.mysqli_real_escape_string($this->_dbHandle,$id).'\'';
        return $this->query($query, 1);
    }
 
    /** Custom SQL Query **/
 
    function query($query, $singleResult = 0) {
 
        $this->_result = mysqli_query( $this->_dbHandle, $query) or die(mysqli_error($this->_dbHandle));
        // var_dump($this->_result);
 
        if (preg_match("/select/i",$query)) {
            $result = array();
            while ($row = mysqli_fetch_assoc($this->_result)) {
                array_push($result, $row);
            }
            mysqli_free_result($this->_result);
            return($result);
        }

        if($this->_result){
            $singleResult = 1;
        }
        
        return $singleResult;

    }
 
    /** Get number of rows **/
    function getNumRows() {
        return mysqli_num_rows($this->_result);
    }
 
    /** Free resources allocated by a query **/
 
    function freeResult() {
        mysqli_free_result($this->_result);
    }
 
    /** Get error string **/
 
    function getError() {
        return mysqli_error($this->_dbHandle);
    }
}

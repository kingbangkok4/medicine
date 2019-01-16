<?php
header('Content-Type: text/html; charset=utf-8');
class Type {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO tb_type (`id`, `type_name`, `low_quantity`) VALUES (NULL, '{$data["type_name"]}', '{$data["low_quantity"]}')";
		$query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $condition) {
        $this->sql = "UPDATE tb_type SET type_name = '{$data["type_name"]}', low_quantity = '{$data["low_quantity"]}' WHERE {$condition} ";     
		$query = mysql_query($this->sql);   
		
        if ($query) {
			return false;
		}else{
			return false;
		}
    }

    public function delete($condition) {
        $this->sql_p = "DELETE FROM tb_type WHERE {$condition}";
		$query = mysql_query($this->sql_p);
				
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function read($condition = " 1=1") {
        $this->sql = "SELECT * FROM tb_type WHERE $condition";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
    }

}

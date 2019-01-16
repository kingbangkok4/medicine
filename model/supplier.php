<?php
header('Content-Type: text/html; charset=utf-8');
class Supplier {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO tb_supplier(`id`,`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone`, `fax`) VALUES (NULL, '{$data["supplier_id"]}', '{$data["supplier_name"]}', '{$data["supplier_address"]}', '{$data["supplier_phone"]}', '{$data["fax"]}') ";
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return  false;
        }
    }

    public function update($data, $condition) {
        $this->sql = "UPDATE tb_supplier SET supplier_id = '{$data["supplier_id"]}', supplier_name = '{$data["supplier_name"]}', supplier_address = '{$data["supplier_address"]}', supplier_phone='{$data["supplier_phone"]}', fax = '{$data["fax"]}' WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        
        if ($query) {
			 return true;
        } else {
             return false;
        }
    }

    public function delete($condition) {
        $this->sql = "DELETE FROM tb_supplier WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1=1") {
        $this->sql = "SELECT * FROM tb_supplier WHERE $condition";
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

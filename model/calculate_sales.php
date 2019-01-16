<?php
header('Content-Type: text/html; charset=utf-8');
class calculate_sales {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO tb_calculate_sales (`id`, `product_id`, `product_name`, `price`, `quantity`, `total`) VALUES (NULL, '{$data["product_id"]}', '{$data["product_name"]}', '{$data["price"]}', '{$data["quantity"]}', '{$data["total"]}')";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_user($username, $password) {
        $this->sql = "insert into tb_user(id, username, password, type) values(NULL, '$username', '$password', 'Staff')";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $condition) {
        $this->sql = "UPDATE tb_employee SET fullname = '{$data["fullname"]}', mobile = '{$data["mobile"]}', email = '{$data["email"]}', address='{$data["address"]}', gender = '{$data["gender"]}' WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        
        if ($query) {
			$this->sql = "SELECT * FROM tb_employee WHERE {$condition} ";
			mysql_query("SET NAMES 'utf8'");
			$query = mysql_query($this->sql);
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
				$this->sql = "UPDATE tb_user SET username = '{$data["username"]}', password = '{$data["password"]}' WHERE id = ".$row['user_ref']." ";
				mysql_query("SET NAMES 'utf8'");
				$query = mysql_query($this->sql);
            }
            if (count($result) > 0) {
                return $result[0];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete($condition) {
        $this->sql = "DELETE FROM tb_employee WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1=1") {
        $this->sql = "SELECT e.id, e.fullname, e.mobile, e.email, e.address, e.gender, e.user_ref, u.type FROM tb_employee e left outer join tb_user u on e.user_ref = u.id WHERE $condition";
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

    public function get_user($condition = " 1=1 ") {
        $this->sql = "SELECT * FROM tb_user WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            if (count($result) > 0) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

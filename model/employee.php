<?php
header('Content-Type: text/html; charset=utf-8');

class Employee {   
    public $sql;
    
    public function insert($data) {
        $this->sql = "INSERT INTO tb_employee (`id`, `fullname`, `mobile`, `email`, `address`, `gender`, `user_ref`) VALUES (NULL, '{$data["fullname"]}', '{$data["mobile"]}', '{$data["email"]}', '{$data["address"]}', '{$data["gender"]}', '{$data["user_ref"]}')";
        mysqli_query("SET NAMES 'utf8'");
		$query = mysqli_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_user($username, $password) {
        $this->sql = "insert into tb_user(id, username, password, type) values(NULL, '$username', '$password', 'Staff')";
        mysqli_query("SET NAMES 'utf8'");
		$query = mysqli_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $condition) {
		$conn = new createCon();
        $con = $conn->connect();
		
        $this->sql = "UPDATE tb_employee SET fullname = '{$data["fullname"]}', mobile = '{$data["mobile"]}', email = '{$data["email"]}', address='{$data["address"]}', gender = '{$data["gender"]}' WHERE {$condition}";
        mysqli_query("SET NAMES 'utf8'");
		$query = mysqli_query($this->sql);
        
        if ($query) {
			$this->sql = "SELECT * FROM tb_employee WHERE {$condition} ";
			mysqli_query($con, "SET NAMES 'utf8'");
			$query = mysqli_query($con, $this->sql);
            $result = array();
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$this->sql = "UPDATE tb_user SET username = '{$data["username"]}', password = '{$data["password"]}' WHERE id = ".$row['user_ref']." ";
				mysqli_query("SET NAMES 'utf8'");
				$query = mysqli_query($this->sql);
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
        mysqli_query("SET NAMES 'utf8'");
		$query = mysqli_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1=1") {
		$conn = new createCon();
        $con = $conn->connect();
		
        $this->sql = "SELECT e.id, e.fullname, e.mobile, e.email, e.address, e.gender, e.user_ref, u.type FROM tb_employee e left outer join tb_user u on e.user_ref = u.id WHERE $condition";
		mysqli_query($con,"SET CHARACTER SET 'utf8'");
        $query = mysqli_query($con, $this->sql);		
        if ($query) {
            $result = array();
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
		
		$conn->close();
    }

    public function get_user($condition = " 1=1 ") {
        $this->sql = "SELECT * FROM tb_user WHERE {$condition} ";
        mysqli_query("SET NAMES 'utf8'");
		$query = mysqli_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
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

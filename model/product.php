<?php
header('Content-Type: text/html; charset=utf-8');
class Product {

    public $sql;

    public function insert_product_detail($data, $product_refID) {
        $this->sql = "INSERT INTO tb_product_detail (`id`, `product_ref_id`, `product_expire`, `quantity`, `price`) VALUES (NULL, '{$product_refID}', '{$data["product_expire"]}', '{$data["quantity"]}', '{$data["price"]}')";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

 public function insert_product_detail_recive($data) {
       $this->sql_pd = "UPDATE tb_product_detail SET quantity =  quantity + {$data["quantity"]} WHERE product_ref_id = {$data["id"]}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql_pd);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	 public function insert_product_detail_out($data) {
       $this->sql_pd = "UPDATE tb_product_detail SET quantity =  quantity - {$data["quantity"]} WHERE product_ref_id = {$data["id"]}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql_pd);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
    public function insert_product($data) {
        $this->sql = "INSERT INTO tb_product (`id`, `product_id`, `product_name`, `product_type_id`, `product_unit`) VALUES (NULL, '{$data["product_id"]}', '{$data["product_name"]}', '{$data["product_type_id"]}', '{$data["product_unit"]}')";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }
	
	 public function insert_product_recive($data) {
        $this->sql = "INSERT INTO tb_product_recive (`id`, `emp_user`, `product_ref_id`, `quantity`) VALUES (NULL, '{$data["emp_user"]}', '{$data["id"]}', '{$data["quantity"]}')";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            //return false;
			return $this->sql;
        }
    }
	
	public function insert_product_out($data) {
        $this->sql = "INSERT INTO tb_product_out (`id`, `emp_user`, `product_ref_id`, `quantity`) VALUES (NULL, '{$data["emp_user"]}', {$data["id"]}, {$data["quantity"]}) ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
		
        if ($query) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $condition_id, $condition_product_ref_id) {
        $this->sql = "UPDATE tb_product SET product_id = '{$data["product_id"]}', product_name = '{$data["product_name"]}', product_type_id = '{$data["product_type_id"]}' WHERE {$condition_id} ";     
		$query = mysql_query($this->sql);
        
        if ($query) {
			$this->sql = "UPDATE tb_product_detail SET product_expire = '{$data["product_expire"]}', quantity = '{$data["quantity"]}', price = '{$data["price"]}' WHERE {$condition_product_ref_id} ";     
			$query = mysql_query($this->sql);
			if($query){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
    }

    public function delete($condition_p, $condition_pd) {
        $this->sql_p = "DELETE FROM tb_product WHERE {$condition_p}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql_p);
		
		$this->sql_pd = "DELETE FROM tb_product_detail WHERE {$condition_pd}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql_pd);
		
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function delete_recive($condition_p, $condition_pd, $quantity) {
        $this->sql_p = "DELETE FROM tb_product_recive WHERE {$condition_p}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql_p);
		
		$this->sql_pd = "UPDATE tb_product_detail SET quantity =  quantity - {$quantity} WHERE {$condition_pd}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql_pd);
		
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

 public function delete_out($condition_p, $condition_pd, $quantity) {
        $this->sql_p = "DELETE FROM tb_product_out WHERE {$condition_p}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql_p);
		
		$this->sql_pd = "UPDATE tb_product_detail SET quantity =  quantity + {$quantity} WHERE {$condition_pd}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql_pd);
		
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
    public function read($condition = " 1=1") {
		 $conn = new createCon();
         $con = $conn->connect();
		   
        $this->sql = "SELECT p.id, p.product_id, p.product_name, p.product_type_id, t.type_name, p.product_unit, pd.product_expire, pd.quantity, pd.price FROM tb_product p LEFT OUTER JOIN tb_product_detail pd ON p.id = pd.product_ref_id LEFT OUTER JOIN tb_type t ON p.product_type_id = t.id WHERE $condition";
		mysqli_query($con, "SET NAMES 'utf8'");
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
		

    public function read_sale($condition = " 1=1 ") {
        $this->sql = " SELECT po.id, po.emp_user, po.out_date, po.product_ref_id, po.quantity, pd.price, p.product_id, p.product_name, po.quantity * pd.price AS sum_price 
FROM tb_product_out po LEFT OUTER JOIN tb_product_detail pd ON po.product_ref_id = pd.product_ref_id LEFT OUTER JOIN tb_product p ON pd.product_ref_id = p.id WHERE $condition ";
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
	
	public function read_out($condition = " 1=1") {
        $this->sql = "SELECT * FROM tb_product_out WHERE $condition";
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
	
		public function read_recive($condition = " 1=1") {
        $this->sql = "SELECT * FROM tb_product_recive WHERE $condition";
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
	public function read_type($condition = " 1=1") {
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

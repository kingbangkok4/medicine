<?php

class User {

    public $sql;

    public function insert($name, $picture, $price) {
        $this->sql = "INSERT INTO tb_user(`id`, `name`, `picture`, `price`) VALUES (NULL, '{$name}', '{$picture}', '{$price}')";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update($set, $condition) {
        $this->sql = "UPDATE tb_user SET {$set} WHERE {$condition}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($condition) {
        $this->sql = "DELETE FROM tb_user WHERE {$condition}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition) {
        $this->sql = "SELECT * FROM tb_user WHERE $condition";
        $query = mysql_query($this->sql);
        if ($query) {
            return mysql_fetch_array($query, MYSQL_ASSOC);
        } else {
            return false;
        }
    }

}

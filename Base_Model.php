<?php

/**
 * Base Model
 *
 * This is an code of a few basic methods to insert, mutiple insert, update, find and delete data from database without repetition of query.
 * Call following method for each time you want insert,update, find and delete data from database just by extending your model with Base_Model 
 * instead of CI_Model.
 * 
 * Include public variable in each of your model with table name (Ex. public $table = 'tbl_examples')
 *
 * @package     CodeIgniter
 * @subpackage  BaseModel
 * @category    Bse Model
 * @author      Viral Thakkar
 * @date        7th August 2015
 * @contact     viral.thakkar25@gmail.com
*/


class Base_Model extends CI_Model {


    public function insert($data) {
        $columns = '';
        $content = '';
        $i = 0;
        foreach($data as $key=>$value) {
            if($i == 0) {
                $columns = $key;
                $content = is_string($value) ? "'".$value."'" : $value;
            } else {
                $columns = $columns.",".$key;
                $content = $content.",".$value;
            }
            ++$i;
        }
        $query = "INSERT INTO ".$this->table."(".$columns.") VALUES (".$content.")";
        $this->db->query($query);
        return $this->db->insert_id();
    }

    public function insert_multiple($table,$data) {
        foreach($data as $insert) {
            $i = 0;
            $columns = '';
            $content = '';
            foreach($insert as $key=>$value) {
                if($i == 0) {
                    $columns = $key;
                    $content = is_string($value) ? "'".$value."'" : $value;
                } else {
                    $columns = $columns.",".$key;
                    $content = $content.",".$value;
                }
                ++$i;
            }
            $query = "INSERT INTO ".$this->table."(".$columns.") VALUES (".$content.")";
            $this->db->query($query);
        }
        return;
    }

    
    public function update($table,$set,$where=null) {
        $i = 0;
        $set_data = '';
        $condition = '';
        foreach($set as $key=>$value) {
            if($i==0) {
                $content = is_string($value) ? "'".$value."'" : $value;
                $set_data = $key."=".$content;
            } else {
                $content = is_string($value) ? "'".$value."'" : $value;
                $set_data = $set_data.",".$key."=".$content;
            }
            ++$i;
        }
        if($where == null) {
            $query = "UPDATE ".$this->table." SET ".$set_data;
        } else {
            $i = 0;
            foreach($where as $key=>$value) {
                if($i == 0) {
                    $content = is_string($value) ? "'".$value."'" : $value;
                    $condition = $key."=".$content;
                } else {
                    $content = is_string($value) ? "'".$value."'" : $value;
                    $condition = $condition." AND ".$key."=".$content;
                }
                ++$i;
            }           
            $query = "UPDATE ".$this->table." SET ".$set_data." WHERE ".$condition;
        }
        $this->db->query($query);
        return;     
    }

    public function find($table,$columns = null,$where=null,$order="null") {
        if($where != null) {
            $i = 0;
            $content = '';
            $keyword = "WHERE";
            foreach($where as $key=>$value) {
                if($i == 0) {
                    $content = $content.is_string($value) ? "'".$value."'" : $value;
                    $condition = $key."=".$content;
                } else {
                    $content = is_string($value) ? "'".$value."'" : $value;
                    $condition = $condition." AND ".$key."=".$content;
                }
                ++$i;
            }           
            $condition = $keyword." ".$condition;
        }
        if($columns == null) {
            $columns = '*';
        } else {
            $columns = implode(",",$columns);           
        }
        $query = "SELECT ".$columns." FROM ".$this->table." ".$condition;
        $fetch_data = $this->db->query($query);
        $results = $fetch_data->result_array();
        return $results;
    }

    public function remove_all($table,$field_name,$data) {
        $data = implode(",",$data);
        $query = "DELETE FROM ".$this->table." WHERE ".$field_name." IN (".$data.")";
        $this->db->query($query);
        return;
    }

}

?>
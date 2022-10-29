<?php 

class Category{
    function getAllCategory (){
        $db = new Database();
        
        $query = "select * from category";
        $data =$db->read($query);
        
        return $data;
    }
}


?>
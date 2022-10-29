<?php 

class Products {
    function __construct()
    {
        $this->db = new Database();
    }


    function getAllProduct(){
        $query = "select * from product p LEFT JOIN category c ON p.category_id = c.category_id";
		$data =$this->db->read($query);
        return $data;
    }

    function getProduct ($id){
        $query = "select * from product where id=:id limit 1";
        $arr["id"] = $id; 
		return $this->db->read($query, $arr);
    }

    function updateProduct ($id){
        $query = "UPDATE product SET barcode = :barcode, name = :name, count = :count, category_id = :category_id, price = :price WHERE id=$id";
        // $query = "UPDATE product SET (barcode, name, count, category_id, price) VALUES (:barcode, :name, :count, :category_id, :price) WHERE id=$id";
        $arr["barcode"] = $_POST["barcode"];
        $arr["name"] = $_POST["name"];
        $arr["count"] = $_POST["count"];
        $arr["category_id"] = $_POST["category"];
        $arr["price"] = $_POST["price"];
		$DB = new Database();
		$DB->write($query, $arr);
    }

    function deleteProduct($id){
        $query = "DELETE from product where id=$id";
		$DB = new Database();
		$DB->read($query);
    }

    function insertProduct(){
        $query = "INSERT INTO product (barcode, name, count, category_id, price) VALUES (:barcode, :name, :count, :category_id, :price)";
        $arr["barcode"] = $_POST["barcode"];
        $arr["name"] = $_POST["name"];
        $arr["count"] = $_POST["count"];
        $arr["category_id"] = $_POST["category"];
        $arr["price"] = $_POST["price"];
        
		$DB = new Database();
		$DB->read($query,$arr);
    }

}

?>
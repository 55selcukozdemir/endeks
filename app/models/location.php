<?php 

/*
İl-İlçe-Mahalle verilerini veren classdır.

Oturum gerektirmeden verileri çekmesine izin verir.
*/

class Location extends Database {
        
    // il ilçe mahalle listesini dönen fonksiyonlar
    function getIl(){
        $query = "SELECT * FROM iller";
        return $this->read($query);
    }
    
    function getIlce($ilID = 1){
        $query = "SELECT * FROM ilceler WHERE il_id = $ilID";
        return $this->read($query);
    }
    function getMahalle($ilceID = 1){
        $query = "SELECT * FROM mahalleler WHERE ilce_id = $ilceID";
        return $this->read($query);
    }

    function getAllMahalle (){
        $query = "SELECT * FROM mahalleler";
        return $this->read($query);
    }

    function getAllEmptyMahalle(){
        $query = "SELECT * FROM mahalleler";
        return $this->read($query);
    }
}

?>
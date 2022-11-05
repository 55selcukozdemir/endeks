<?php 

class Endeks extends Database {
    function getForm(){
        $this->il = 1;
        $this->ilce = 1;
        $this->mahalle = 1;
        // $this->il = $_POST["il_id"];
        // $this->ilce = $_POST["illce_id"];
        // $this->mahalle = $_POST["mahalle_id"];

        if($this->il != 0){
            if($this->ilce != 0){
                if($this->mahalle != 0){
                    $this->query = "SELECT mahalleler.id AS mahalleler_id, mahalleler.mahalle_adi FROM mahalleler WHERE mahalleler.id = $this->mahalle";

                } else {
                    
                    $this->query = "SELECT mahalleler.id AS mahalle_id, mahalleler.mahalle_adi FROM mahalleler WHERE mahalleler.ilce_id = $this->ilce";
                }
            } else {
                $this->query = "SELECT ilceler.id as ilce_id, ilceler.ilce_adi FROM ilceler WHERE ilceler.il_id = $this->il";
            }
        } else {
            $this->query = "SELECT iller.id as il_id, iller.il_adi FROM iller";
        }

        return $this->read($this->query);
    }
    
    
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


    // Bu kısım karmaşık oldu gibi
    // endeks tablosu
    // il_id    ilce_id     mahalle_id
    // 0        0           0
    // 1        0           0
    // 1        1           0
    // 1        1           1

    // tablolarda bu şekilde doluluk sıralaması vardır. 
    // yani kapsayıcı 0 ise diğer kalanlar da sıfır olmak zorunda ama 
    // 0 dan farklı ise alt kapsanan  hem sıfır olabilir hemde değer olabilir. 
    // anlatamadım ama :)

    function insertEndeks(){

        if($this->getMahalleEndeks()){
            $query = "UPDATE endeks SET 
                kiralik_konut = :kiralik_konut, 
                satilik_konut = :satilik_konut, 
                kiralik_ticari = :kiralik_ticari, 
                satilik_ticari = :satilik_ticari, 
                satilik_arazi = :satilik_arazi, 
                satilik_arsa = :satilik_arsa WHERE il_id = $this->il AND ilce_id = $this->ilce AND mahalle_id = $this->mahalle";

            $arr["kiralik_konut"] = $_POST["kiralik_konut"];
            $arr["satilik_konut"] = $_POST["satilik_konut"];
            $arr["kiralik_ticari"] = $_POST["kiralik_ticari"];
            $arr["satilik_ticari"] = $_POST["satilik_ticari"];
            $arr["satilik_arazi"] = $_POST["satilik_arazi"];
            $arr["satilik_arsa"] = $_POST["satilik_arsa"];
            $this->write($query, $arr);
           
        } else {
            // girilmemişse insert yap 
           
            $query = "INSERT INTO endeks (
                il_id, 
                ilce_id, 
                mahalle_id, 
                yil,
                kiralik_konut, 
                satilik_konut, 
                kiralik_ticari, 
                satilik_ticari, 
                satilik_arazi, 
                satilik_arsa
                ) VALUES (
                :il_id, 
                :ilce_id, 
                :mahalle_id, 
                :yil, 
                :kiralik_konut, 
                :satilik_konut, 
                :kiralik_ticari, 
                :satilik_ticari, 
                :satilik_arazi, 
                :satilik_arsa
                )";
            $arr["il_id"] = $_POST["il_id"];
            $arr["ilce_id"] = $_POST["ilce_id"];
            $arr["mahalle_id"] = $_POST["mahalle_id"];
            $arr["yil"] = date("Y");
            $arr["kiralik_konut"] = $_POST["kiralik_konut"];
            $arr["satilik_konut"] = $_POST["satilik_konut"];
            $arr["kiralik_ticari"] = $_POST["kiralik_ticari"];
            $arr["satilik_ticari"] = $_POST["satilik_ticari"];
            $arr["satilik_arazi"] = $_POST["satilik_arazi"];
            $arr["satilik_arsa"] = $_POST["satilik_arsa"];
    
    
            $this->write($query, $arr);
        }  
    }


    function getMahalleEndeks(){
        $this->il = $_POST["il_id"];
        $this->ilce = $_POST["illce_id"];
        $this->mahalle = $_POST["mahalle_id"];
        $query = "SELECT * FROM endeks WHERE il_id = $this->il AND ilce_id = $this->ilce AND mahalle_id = $this->mahalle";
        return $this->read($query);
    }

    function getEndeks () {
        if($this->getMahalleEndeks()){
            
        }
    }
}

?>
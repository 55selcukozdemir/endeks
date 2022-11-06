<?php 

class Endeks extends Database {
    function getForm(){
        $this->il = isset($_POST['il_id']) ? $_POST['il_id'] : 0;
        $this->ilce = isset($_POST['ilce_id']) ? $_POST['ilce_id'] : 0;
        $this->mahalle = isset($_POST['mahalle_id']) ? $_POST['mahalle_id'] : 0;

        if($this->il != 0){
            if($this->ilce != 0){
                if($this->mahalle != 0){

                    // tekil mahalle döner
                    $this->query = "SELECT
                    mahalleler.id as id, mahalleler.mahalle_adi AS adi, 
                    iller.il_adi, 
                    ilceler.ilce_adi,
                    mahalleler.mahalle_adi, 
                    endeks.* FROM endeks 
                    RIGHT JOIN mahalleler ON mahalleler.id = endeks.mahalle_id
                    LEFT JOIN ilceler ON ilceler.id = mahalleler.ilce_id
                    LEFT JOIN iller ON iller.id = ilceler.il_id
                    WHERE mahalleler.id = $this->mahalle";
                    // $this->query = "SELECT mahalleler.id AS id, mahalleler.mahalle_adi AS adi FROM mahalleler, endeks WHERE mahalleler.id = $this->mahalle";
                    // $this->query = "SELECT * FROM mahalleler LEFT JOIN endeks ON mahalleler.id = endeks.mahalle_id";

                } else {

                    // mahalleleri döner
                    
                    $this->query = "SELECT
                    mahalleler.id as id, mahalleler.mahalle_adi AS adi, 
                    iller.il_adi, 
                    ilceler.ilce_adi,
                    mahalleler.mahalle_adi, 
                    endeks.* FROM endeks 
                    RIGHT JOIN mahalleler ON mahalleler.id = endeks.mahalle_id
                    LEFT JOIN ilceler ON ilceler.id = mahalleler.ilce_id
                    LEFT JOIN iller ON iller.id = ilceler.il_id
                    WHERE ilceler.id = $this->ilce";
                    // $this->query = "SELECT mahalleler.id AS mahalle_id, mahalleler.mahalle_adi FROM mahalleler WHERE mahalleler.ilce_id = $this->ilce";
                }
            } else {

                // ilçeleri döner
                $this->query = "SELECT
                iller.id as id, iller.il_adi AS adi, iller.il_adi, 
                ilceler.ilce_adi,
                mahalleler.mahalle_adi, 
                endeks.* FROM endeks 
                RIGHT JOIN ilceler ON ilceler.il_id = endeks.ilce_id
                LEFT JOIN iller ON iller.id = ilceler.il_id
                LEFT JOIN mahalleler ON mahalleler.id = endeks.mahalle_id
                WHERE ilceler.il_id = $this->il";
            }
        } else {
            // $this->query = "SELECT iller.id as id, iller.il_adi AS adi, endeks.* FROM iller LEFT JOIN endeks ON iller.id = endeks.il_id AND endeks.ilce_id = 0 AND endeks.mahalle_id = 0 ";
            $this->query = "SELECT 
            iller.id as id, iller.il_adi AS adi, iller.il_adi, 
            ilceler.ilce_adi, 
            mahalleler.mahalle_adi, 
            endeks.* FROM endeks 
            RIGHT JOIN iller ON iller.id = endeks.il_id 
            LEFT JOIN ilceler ON ilceler.id = endeks.ilce_id 
            LEFT JOIN mahalleler ON mahalleler.id = endeks.mahalle_id ";
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
<?php 

class Endeks extends Database {
    function getForm(){
        $this->il           = isset($_POST['il_id'])        ? $_POST['il_id']       : 0;
        $this->ilce         = isset($_POST['ilce_id'])      ? $_POST['ilce_id']     : 0;
        $this->mahalle      = isset($_POST['mahalle_id'])   ? $_POST['mahalle_id']  : 0;

        if($this->il != 0){
            if($this->ilce != 0){
                if($this->mahalle != 0){

                    $arr["state"] = "mahalle";

                    // tekil mahalle döner
                    $this->query = "SELECT
                    iller.il_adi,               iller.id AS il_id,
                    ilceler.ilce_adi,           ilceler.id AS ilce_id,
                    mahalleler.id as id,        mahalleler.mahalle_adi AS adi,      mahalleler.id as mahalle_id,
                    mahalleler.mahalle_adi, 
                    endeks.il_id AS e_il_id,    endeks.ilce_id AS e_ilce_id,        endeks.ilce_id AS e_mahalle_id,
                    endeks.kiralik_konut,       endeks.satilik_konut,               endeks.kiralik_ticari,          endeks.satilik_ticari,      endeks.satilik_arazi,       endeks.satilik_arsa                    
                    FROM endeks 
                    RIGHT   JOIN mahalleler     ON mahalleler.id    = endeks.mahalle_id
                    LEFT    JOIN ilceler        ON ilceler.id       = mahalleler.ilce_id
                    LEFT    JOIN iller          ON iller.id         = ilceler.il_id
                    WHERE mahalleler.id = $this->mahalle";

                } else {

                    // mahalleleri döner
                    
                    $arr["state"] = "tum_mahalle";
                    
                    $this->query = "SELECT
                    mahalleler.id as id,        mahalleler.mahalle_adi AS adi,          mahalleler.id as mahalle_id,
                    iller.il_adi,               iller.id AS il_id,
                    ilceler.ilce_adi,           ilceler.id AS ilce_id,
                    mahalleler.mahalle_adi, 
                    endeks.il_id AS e_il_id,    endeks.ilce_id AS e_ilce_id,            endeks.ilce_id AS e_mahalle_id,
                    endeks.kiralik_konut,       endeks.satilik_konut,                   endeks.kiralik_ticari,          endeks.satilik_ticari,      endeks.satilik_arazi,       endeks.satilik_arsa                    
                    FROM endeks 
                    RIGHT   JOIN mahalleler     ON mahalleler.id    = endeks.mahalle_id
                    LEFT    JOIN ilceler        ON ilceler.id       = mahalleler.ilce_id
                    LEFT    JOIN iller          ON iller.id         = ilceler.il_id
                    WHERE ilceler.id =$this->ilce";
                }
            } else {

                
                $arr["state"] = "ilce";
                // ilçeleri döner
                $this->query = "SELECT
                iller.il_adi,               iller.id AS il_id, 
                ilceler.id as id,           ilceler.ilce_adi AS adi,        ilceler.id as ilce_id,
                ilceler.ilce_adi,
                endeks.il_id AS e_il_id,    endeks.ilce_id AS e_ilce_id,    endeks.ilce_id AS e_mahalle_id,
                endeks.kiralik_konut, endeks.satilik_konut, endeks.kiralik_ticari, endeks.satilik_ticari, endeks.satilik_arazi, endeks.satilik_arsa
                FROM endeks 
                RIGHT   JOIN ilceler    ON ilceler.id   = endeks.ilce_id
                LEFT    JOIN iller      ON iller.id     = ilceler.il_id
                WHERE ilceler.il_id = $this->il";
            }
        } else {
            
            $arr["state"] = "il";
            $this->query = "SELECT 
            iller.id as id,              iller.il_adi AS adi,            iller.il_adi, iller.id AS il_id, 
            endeks.il_id AS e_il_id,     endeks.ilce_id AS e_ilce_id,    endeks.ilce_id AS e_mahalle_id,
            endeks.kiralik_konut, endeks.satilik_konut, endeks.kiralik_ticari, endeks.satilik_ticari, endeks.satilik_arazi, endeks.satilik_arsa FROM endeks 
            RIGHT JOIN iller ON iller.id = endeks.il_id AND endeks.ilce_id = 0 AND endeks.mahalle_id = 0";
        }

        $arr["result"] = $this->read($this->query);
        
        return $arr ;
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

        $kiralik_konut      = $_POST["konut_kira"];
        $satilik_konut      = $_POST["konut_satis"];
        $kiralik_ticari     = $_POST["ticari_kira"];
        $satilik_ticari     = $_POST["ticari_satis"];
        $satilik_arazi      = $_POST["arazi_satis"];
        $satilik_arsa       = $_POST["arsa_satis"];
        $il                 = $_POST["il_id"];  
        $ilce               = $_POST["ilce_id"];
        $mahalle            = $_POST["mahalle_id"];

        for ($i = 0; $i < count($satilik_konut) ; $i++ ){


            // Değerlerden en az bir doluysa veriyi database yaz, boş değerleri de 0 (sıfır) al. 
            $deger_control = 
            $_POST["konut_kira"][$i]    != "" &&
            $_POST["konut_satis"][$i]   != "" &&
            $_POST["ticari_kira"][$i]   != "" &&
            $_POST["ticari_satis"][$i]  != "" &&
            $_POST["arazi_satis"][$i]   != "" &&
            $_POST["arsa_satis"][$i]    != "";

            // print($deger_control);
            print(!empty($_POST["arsa_satis"][$i]) );
            if($deger_control){

                $query = "SELECT * FROM endeks WHERE il_id = $il[$i] AND ilce_id = $ilce[$i] AND mahalle_id = $mahalle[$i]";
                $control = $this->read($query);

                if($control){

                    echo "if e girdi";
                    $query = "UPDATE endeks SET 
                        kiralik_konut   = :kiralik_konut, 
                        satilik_konut   = :satilik_konut, 
                        kiralik_ticari  = :kiralik_ticari, 
                        satilik_ticari  = :satilik_ticari, 
                        satilik_arazi   = :satilik_arazi, 
                        satilik_arsa    = :satilik_arsa 
                        WHERE il_id = $il[$i] AND ilce_id = $ilce[$i] AND mahalle_id = $mahalle[$i]";
        
                    $arr["kiralik_konut"]   = isset($kiralik_konut[$i])     ? $kiralik_konut[$i]    : 0;
                    $arr["satilik_konut"]   = isset($satilik_konut[$i])     ? $satilik_konut[$i]    : 0;
                    $arr["kiralik_ticari"]  = isset($kiralik_ticari[$i])    ? $kiralik_ticari[$i]   : 0;
                    $arr["satilik_ticari"]  = isset($satilik_ticari[$i])    ? $satilik_ticari[$i]   : 0;
                    $arr["satilik_arazi"]   = isset($satilik_arazi[$i])     ? $satilik_arazi[$i]    : 0;
                    $arr["satilik_arsa"]    = isset($satilik_arsa[$i])      ? $satilik_arsa[$i]     : 0;
                    $this->write($query, $arr);
                
                } else {
                    // girilmemişse insert yap 
                echo "else girdi";
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
                    $arr["il_id"]               = isset($il[$i])                ? $il[$i]                       : 0;
                    $arr["ilce_id"]             = isset($ilce[$i])              ? $ilce[$i]                     : 0;
                    $arr["mahalle_id"]          = isset($mahalle[$i])           ? $mahalle[$i]                  : 0;
                    $arr["yil"]                 = date("Y");
                    $arr["kiralik_konut"]       = isset($kiralik_konut[$i])     ? $kiralik_konut[$i]            : 0;
                    $arr["satilik_konut"]       = isset($satilik_konut[$i])     ? $satilik_konut[$i]            : 0;
                    $arr["kiralik_ticari"]      = isset($kiralik_ticari[$i])    ? $kiralik_ticari[$i]           : 0;
                    $arr["satilik_ticari"]      = isset($satilik_ticari[$i])    ? $satilik_ticari[$i]           : 0;
                    $arr["satilik_arazi"]       = isset($satilik_arazi[$i])     ? $satilik_arazi[$i]            : 0;
                    $arr["satilik_arsa"]        = isset($satilik_arsa[$i])      ? $satilik_arsa[$i]             : 0;
                
                
                    $this->write($query, $arr);
                        
                } 
            } 
        }
    }
}

?>
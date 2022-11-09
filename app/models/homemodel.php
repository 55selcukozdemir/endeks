<?php 

class HomeModel extends Database{


    function getEndeks (){
        

        // Post Değişkenleri 
        $il         = isset($_POST['il_id'])        ? $_POST['il_id']       : -1;
        $ilce       = isset($_POST['ilce_id'])      ? $_POST['ilce_id']     : -1;
        $mahalle    = isset($_POST['mahalle_id'])   ? $_POST['mahalle_id']  : -1;



        // if kontrolleri için database kontrolü - Belki farklı bir yöntem vardır şuan aklıma gelmiyor.
        $query_mahalle   =  "SELECT * FROM endeks WHERE il_id = $il AND ilce_id = $ilce AND mahalle_id = $mahalle";
        $control_mahalle =  $this->read($query_mahalle);

        $query_ilce      =  "SELECT * FROM endeks WHERE il_id = $il AND ilce_id = $ilce AND mahalle_id = 0";
        $control_ilce    =  $this->read($query_ilce);

        $query_il        =  "SELECT * FROM endeks WHERE il_id = $il AND ilce_id = 0 AND mahalle_id = 0";
        $control_il      =  $this->read($query_il);

        if($control_mahalle){
            $arr["state"] = "mahalle";

            // tekil mahalle döner
            $query = "SELECT
                mahalleler.id as id,        mahalleler.mahalle_adi AS adi,      mahalleler.id as mahalle_id,
                iller.il_adi,               iller.id AS il_id,
                ilceler.ilce_adi,           ilceler.id AS ilce_id,
                mahalleler.mahalle_adi, 
                endeks.il_id AS e_il_id,    endeks.ilce_id AS e_ilce_id,        endeks.ilce_id AS e_mahalle_id,
                endeks.kiralik_konut,       endeks.satilik_konut,               endeks.kiralik_ticari,              endeks.satilik_ticari,      endeks.satilik_arazi,       endeks.satilik_arsa                    
                FROM endeks 
                RIGHT JOIN mahalleler   ON mahalleler.id = endeks.mahalle_id
                LEFT JOIN ilceler       ON ilceler.id = mahalleler.ilce_id
                LEFT JOIN iller         ON iller.id = ilceler.il_id
                WHERE mahalleler.id = $mahalle";
        } else if($control_ilce) {

            $arr["state"] = "ilce";

            $query = "SELECT
                iller.il_adi,               iller.id AS il_id, 
                ilceler.id as id,           ilceler.ilce_adi AS adi,        ilceler.id as ilce_id,
                ilceler.ilce_adi,
                endeks.il_id AS e_il_id,    endeks.ilce_id AS e_ilce_id,    endeks.ilce_id AS e_mahalle_id,
                endeks.kiralik_konut,       endeks.satilik_konut,           endeks.kiralik_ticari,              endeks.satilik_ticari,      endeks.satilik_arazi,       endeks.satilik_arsa
                FROM endeks 
                RIGHT JOIN ilceler      ON ilceler.id = endeks.ilce_id
                LEFT JOIN iller         ON iller.id = ilceler.il_id
                WHERE ilceler.id = $ilce AND endeks.mahalle_id = 0";
        } else if ($control_il){

            $arr["state"] = "il";

            $query = "SELECT 
                iller.id as id,             iller.il_adi AS adi,                iller.il_adi,                       iller.id AS il_id, 
                endeks.il_id AS e_il_id,    endeks.ilce_id AS e_ilce_id,        endeks.ilce_id AS e_mahalle_id,
                endeks.kiralik_konut,       endeks.satilik_konut,               endeks.kiralik_ticari,              endeks.satilik_ticari,      endeks.satilik_arazi,       endeks.satilik_arsa 
                FROM endeks 
                RIGHT JOIN iller ON iller.id = endeks.il_id AND endeks.ilce_id = 0 AND endeks.mahalle_id = 0 
                WHERE iller.id = $il"; 
        }

        $arr["result"] = $this->read($query);
        return $arr ;
    }
} 

?>
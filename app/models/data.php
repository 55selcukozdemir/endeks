<?php 

class data extends Database{


    function loadIl (){


        echo file_get_contents("https://cbsservis.tkgm.gov.tr/megsiswebapi.v3/api/idariYapi/ilListe");

        // $query = "select * from product where id=:id limit 1";
		// return $this->db->read($query, $arr);
    }
}

?>
<?php

// Kullanım dışıdır.

class data extends Database{

    function __construct()
    {
        $this->db_connect();
    }


    function loadIldd (){


        $iller = file_get_contents("https://cbsservis.tkgm.gov.tr/megsiswebapi.v3/api/idariYapi/ilListe");
        $json = json_decode($iller);

        foreach ($json->features as $il){


            $query = "INSERT INTO province_table (province_name, province_id) VALUES (:province_name, :province_id)";

            $arr["province_name"] = $il->properties->text;
            $arr["province_id"] = $il->properties->id;

            $this->write($query, $arr);
        }

        print_r($query);


       
        // foreach ($iller as $il){

        //     print $il->properties->text;
        // }


    }

    function loaddistrict(){
        $query = "SELECT * FROM province_table";

        foreach ($this->read($query) as $il){
            $url = "https://cbsservis.tkgm.gov.tr/megsiswebapi.v3/api/idariYapi/ilceListe/" . $il["province_id"];
            $ilceler = file_get_contents($url);
            $json = json_decode($ilceler);

            foreach ($json->features as $ilce){

                $query = "INSERT INTO district_table (district_name, district_id, province_id) VALUES (:district_name, :district_id, :province_id)";

                $arr["district_name"] = $ilce->properties->text;
                $arr["district_id"] = $ilce->properties->id ;
                $arr["province_id"] = $il["id"];

                $this->write($query, $arr);
            }

        }
    }


    function loadneighbourhood(){
        $query = "SELECT * FROM district_table";

        $listIlce = $this->read($query);
        print_r( count($listIlce));

        $length = count($listIlce);

        $i = 962;
        $count=25;

        for ($i; $i < $i + $count; $i++){


            $url = "https://cbsservis.tkgm.gov.tr/megsiswebapi.v3/api/idariYapi/mahalleListe/" . $listIlce[$i]["district_id"];            
            $mahalleler = file_get_contents($url);
            $json = json_decode($mahalleler);



            foreach ($json->features as $mahalle){

                $query = "INSERT INTO neighbourhood_table (neighbourhood_name, neighbourhood_id, district_id, neighbourhood_latitude, neighbourhood_longitude) VALUES (:neighbourhood_name, :neighbourhood_id, :district_id, :neighbourhood_latitude, :neighbourhood_longitude)";

                $arr["neighbourhood_name"] = $mahalle->properties->text;
                $arr["neighbourhood_id"] = $mahalle->properties->id;
                $arr["district_id"] = $listIlce[$i]["id"];
                $arr["neighbourhood_latitude"] = $mahalle->geometry->coordinates[0][0][0];
                $arr["neighbourhood_longitude"] = $mahalle->geometry->coordinates[0][0][1];
                $this->write($query, $arr);
            }


        }
    }

        function getDeneme(){
            $url = "https://cbsservis.tkgm.gov.tr/megsiswebapi.v3/api/idariYapi/mahalleListe/6133";
            $mahalleler = file_get_contents($url);
            $json = json_decode($mahalleler);


            

            foreach ($json->features as $mahalle){

                $query = "INSERT INTO neighbourhood_table (neighbourhood_name, district_id) VALUES (:neighbourhood_name, :district_id)";

                // $arr["neighbourhood_name"] = $mahalle->properties->text;
                // $arr["district_id"] = $ilce["id"];

                print_r($mahalle->properties->text) ;
                print_r($mahalle->geometry->coordinates[0][0]) ;

                return;
            }

        
    }
}

?>
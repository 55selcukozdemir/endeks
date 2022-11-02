<?php 
class getdata extends Controller{

    function __construct()
    {
        $this->model = $this->loadModel("data");
    }

    function getIl (){
        // $this->model->loadIl();
    }

    function getilce(){
        // $this->model->loaddistrict();
    }

    function getmahalle(){
        // $this->model->loadneighbourhood();
    }

    function deneme(){
        // $this->model->getDeneme();
    }
}

?>
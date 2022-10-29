<?php 
class getdata extends Controller{
    function getIl (){
        $model = $this->loadModel("data");

        $model->loadIl();
    }
}

?>
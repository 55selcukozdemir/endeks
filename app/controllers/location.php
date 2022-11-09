<?php 

/*
Verileri çekip json formatında geri döndürür.
*/
class Location extends Controller{

    function __construct(){
		$this->endeks = $this->loadModel('location');
	}
    
    // il verilerini geri döner
	function getProvince(){
		echo ($this->endeks->getIl());
		header("Content-Type: application/json");
		echo json_encode($this->endeks->getIl());
		exit();
	}

    // ilçe verilerini geri döner
	function getDistrict(){
		header("Content-Type: application/json");
		echo json_encode($this->endeks->getIlce(isset($_POST['ilID']) ? $_POST['ilID'] : 1));
		exit();
	}

    // mahalle verilerini geri döner
	function getNeighbourhood(){
		header("Content-Type: application/json");
		echo json_encode($this->endeks->getMahalle(isset($_POST['ilceID']) ? $_POST['ilceID'] : 1));
		exit();
	}


    // buraya döneceğim
	function setendeks (){
		
		$this->endeks->insertEndeks($_POST); 
		header("location: /endeks/public/manage");
	}
}

?>
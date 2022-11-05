<?php 

class Manage extends Controller {

	function __construct(){
		$this->endeks = $this->loadModel('endeks');
	}

    function index()
	{
		
		$data ['iller'] =  $this->endeks->getIl();
		if(!isset($_POST['il_id'])){
			$data['form'] = $this->endeks->getForm();
		}
		$this->view("manage", $data);
	}

	function getForm(){
		print_r( $this->endeks->getForm());
	}



	function getProvince(){
		echo ($this->endeks->getIl());
		header("Content-Type: application/json");
		echo json_encode($this->endeks->getIl());
		exit();
	}

	function getDistrict(){
		header("Content-Type: application/json");
		echo json_encode($this->endeks->getIlce(isset($_POST['ilID']) ? $_POST['ilID'] : 1));
		exit();


	}

	function getNeighbourhood(){
		header("Content-Type: application/json");
		echo json_encode($this->endeks->getMahalle(isset($_POST['ilceID']) ? $_POST['ilceID'] : 1));
		exit();
	}

	function setendeks (){
		$this->endeks->insertEndeks($_POST);
		echo "eklendi";
	}
}
?>
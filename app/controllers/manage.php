<?php 

class Manage extends Controller {


	// modelleri yüklüyoruz.
	function __construct(){
		$this->endeks = $this->loadModel('endeks');
	}

    function index()
	{
		$data ['iller'] =  $this->endeks->getIl();
		// il-ilce-mahalle post edildiğinde kontrol ediyoruz ve $data'ya ekliyoruz.
		if(isset($_POST['il_id'])){
			$data['form'] = $this->endeks->getForm();
		}


		$this->view("manage", $data);
	}


	// tablo'da kaydet veya güncelle işlemini yapıyor.
	function setendeks (){
		
		$this->endeks->insertEndeks($_POST); 
		header("location: /endeks/public/manage");
	}
}
?>
<?php

Class Home extends Controller 

{

	function  __construct()
	{
		
		$this->endeks = $this->loadModel('endeks');
		$this->home = $this->loadModel('HomeModel');
	}

	function index()
	{
 	 	
		$data ['iller'] =  $this->endeks->getIl();

		// aslında direkt POST kontrolü yapabilirdik ama il_id'sini sorguladık çünkü
		// il_id'si her zaman ilçe ve mahalle id'lerinden önce gelmek zorundadır.
		if(isset($_POST['il_id'])){
			$data['form'] = $this->home->getEndeks();
		}
 	 	$data['page_title'] = "Home";

		$this->view("home",$data);
	}


}
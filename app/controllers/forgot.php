<?php 

class Forgot extends Controller{
    function index()
	{
 	 	
 	 	$data['page_title'] = "Home";

		$this->view("forgot",$data);
	}
}

?>
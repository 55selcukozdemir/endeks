<?php

Class App 
{

	private $controller = "home";
	private $method = "index";
	private $params = [];

	public function __construct()
	{
		$url = $this->splitURL();


		/*
		url = endeks/public/controller_ismi/controller_metodu/controller_parametresi/...
		şeklinde ilerlemektedir.
		
		Aşağıda controller'ı ve oturum bilgisini kontrol ediyor.
		1) her şey yolundaysa ilgili yere yönlendirir.
		2) oturum yoksa login ekranına yönlendirir.
		3) url location ise o controller açık olarak açılmıştır çünkü frontend'de javascript ile il,ilçe,mahalle 
		verisi çekerken oturum sorunu oluyor. Çözüm daha bende yok!! 

		*/


		// controller ve oturum kontrolü

 		if(file_exists("../app/controllers/". strtolower($url[0]) .".php") && isset($_SESSION["user_name"]))
 		{
 			$this->controller = strtolower($url[0]);
 			unset($url[0]);
 		}else if(!isset($_SESSION["user_name"])){
			$this->controller = "login";
		} else if(strtolower($url[0]) == "location") {
			$this->controller = "location";
		}

 		require "../app/controllers/". $this->controller .".php";
 		$this->controller = new $this->controller;


		// metod kontrolü
 		if(isset($url[1]))
 		{
 			if(method_exists($this->controller, $url[1]))
 			{
 				$this->method = $url[1];
 				unset($url[1]);
 			}
 		}

		// parametre alınması
 		$this->params = array_values($url);

		// metod çalıştırma
		call_user_func_array([$this->controller,$this->method], $this->params);

	}


	/*
	index.php?url=$1

	biz htaccess ile url'yi index.php'ye GET metodu olarak veriyoruz.
	url'yi kontrol ediyoruz, boş ise home'a yönlendiriyoruz. doluysa aynısını alıyoruz.

	en son da '/' işaretinden url'yi parçalayıp geri döndürüyoruz.
	*/
	private function splitURL()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : "home";
		return explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));
	}
}
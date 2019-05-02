<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>page-1</title>
</head>
<body>
	
	<?php

	class User{
		private $login;
		private $password;
		private $language;
		public function __construct($log, $pass, $lang='ru') {
											
			$this->login=$log;
			$this->password=$pass;
			$this->language=$lang;
		}
		public function getLang() {
			$users = [
				0 => ['login'=>'Vasisualiy', 'password' => '12345', 'lang'=>'ru'],
				1 => ['login'=>'Afanasiy', 'password' => '54321', 'lang'=>'en'],
				2 => ['login'=>'Petro', 'password'=>'EkUC42nzmu', 'lang'=>'ua'],
				3 => ['login'=>'Pedrolus', 'password'=>'Cogito_ergo_sum', 'lang'=>'it'],
				4 => ['login'=>'Sasha', 'password'=>'Alea_est_jacta']
			];
			if($_POST['Enter']){
				for ($i=0; $i < 5; $i++) {
					if (($_POST['login'] == $users[$i]['login'])&&($_POST['password']==$users[$i]['password'])) {
						if(isset($users[$i]['lang'])){
							$_SESSION['lang'] = $users[$i]['lang'];
							$_SESSION['user'] = $users[$i]['login'];
							$this->language = $_SESSION['lang'];
						}
					}
				}
			}
			return new User($_POST['login'], $_POST['password'], $this);
		}
	}
	class Tran{
		public $user;
		private $lang;
		public function __construct(){
			$this->$user = $_SESSION['user'];
			$this->lang = 'Привет';
		}
		public function funcTran(){
			$trans = [
				'hello'=>['ua'=>'Привiт', 'ru'=>'Привет', 'en'=>'Hello', 'it'=>'Ciao'],
				'bye' => ['ua'=>'До побачення', 'ru'=>'Пока', 'en'=>'Goodbye', 'it'=>'Ciao'],
			];
			foreach ($trans as $key => $value) {
				foreach ($value as $key2 => $value2) {
					if ($key2 == $_SESSION['lang']) {
						echo $this->lang = $value2.'! ';
					}
				}
			}
			return $this->lang;
		}
	}
	

	$user = new User($_POST['login'], $_POST['password']);
	$user->getLang();
	echo '<pre>';
	print_r($user);
	
	$phrase = new Tran();
	$phrase->funcTran();
	echo '<pre>';
	print_r($phrase);

	?>
	<a href="index.php?logout=true">logout</a>
</body>
</html>

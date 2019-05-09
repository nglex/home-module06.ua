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
							$_SESSION['user'] = $users[$i]['login'];
							$_SESSION['lang'] = $users[$i]['lang'];
							$this->language = $_SESSION['lang'];
						}else{
							$this->language = 'ru';
						}
					}
				}
			}
			return new User($_POST['login'], $_POST['password'], $this);
		}
	}

	class Tran{
		private $user;
		public function __construct(){
			$this->user = $_SESSION['user'];
		}
		public function funcTran($ph){
			$trans = [
				'hello'=>['ua'=>'Привiт', 'ru'=>'Привет', 'en'=>'Hello', 'it'=>'Salve'],
				'bye' => ['ua'=>'До побачення', 'ru'=>'Пока', 'en'=>'Goodbye', 'it'=>'Ciao']
			];
			foreach ($trans as $key => $value) {
				if ($ph == $key) {
					foreach ($value as $key2 => $value2) {
						if ($key2 == $_SESSION['lang']) {
							$this->lang = $value2.'! ';
						}
					}
				}
			}
			return $trans[$ph][$this->lang];
		}
	}

	$user = new User($_POST['login'], $_POST['password']);
	$user->getLang();
	echo '<pre>';
	print_r($user);
	
	$phrase = new Tran();
	
	echo '<pre>1)';
	$phrase->funcTran('hello');
	print_r($phrase);

	echo '<pre>2)';
	$phrase->funcTran('bye');
	print_r($phrase);
	
	?>
	<a href="index.php?logout=true">logout</a>
</body>
</html>
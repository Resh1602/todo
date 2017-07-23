<?php
session_start();

	class Home{
		
		function __construct(){
			
			if(!isset($_SESSION['items'])) $_SESSION['items'] =  array();
			
		}
		
		function getItem(){
			
			return isset($_GET['t1']) ? $_GET['t1'] :  false;
			
		}
		
		function addToList($title = ''){
			
			array_push( $_SESSION['items'], $title);
			
		}
		
		function display(){
			
			return isset($_SESSION['items']) ? $_SESSION['items'] :  array();
			
		}
		
		
	}
	
	$myApp = new Home();
	$item = $myApp->getItem();
	if($item!=false) $myApp->addToList($item);
	
?>

<html>
	<head>
		<title>Todo</title>
	</head>
	<body>
		<form name="f1" method="get" action="">
			Item <input type="text" name="t1" id="txt1">
			<input type="submit" value="Add"><br><br>
			<ul>
			<?php foreach($myApp->display() as $item){ ?>
				<?= '<li>' . $item . '</li>'; ?>
			<?php } ?>
			</ul>
		</form>
	</body>
</html>
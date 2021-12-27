<?php
@session_start();
$LangArray = array("ru", "en", "uk");
$DefaultLang = "uk";
if(@$_SESSION['NowLang']) {
	if(!in_array($_SESSION['NowLang'], $LangArray)) {
		$_SESSION['NowLang'] = $DefaultLang;
		setcookie('NowLang', $DefaultLang, time()+15552000);
	}
}
else {
	$_SESSION['NowLang'] = $DefaultLang;
	setcookie('NowLang', $DefaultLang, time()+15552000);
}
$language = addslashes($_GET['lang']);
if($language) {
	if(!in_array($language, $LangArray)) {
		$_SESSION['NowLang'] = $DefaultLang;
		setcookie('NowLang', $DefaultLang, time()+15552000);
	}
	else {
		$_SESSION['NowLang'] = $language;
		setcookie('NowLang', $language, time()+15552000);
	}
}
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");
require_once 'php/connect.php';
?>

<!DOCTYPE html>
<html lang="uk">
	<head>
		<link rel="stylesheet" type="text/css" href="style/main.css">
		<title>BMX SHOP</title>
		<meta charset="utf-8">
		
		
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
		<link rel = "stylesheet" href = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"> </script>
		<script type="text/javascript" src="js/script.js"></script>
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/brands.css" integrity="sha384-1KLgFVb/gHrlDGLFPgMbeedi6tQBLcWvyNUN+YKXbD7ZFbjX6BLpMDf0PJ32XJfX" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
	</head>
	<body>
		<div class="container lineline">
			<?php
			if (!isset($_SESSION['user'])) {
    			echo '<a href="registration/index.php?lang='.$_SESSION['NowLang'].'">'. $Lang['Ввійти'] .'</a>';
			}
			else{
				echo '<a href="#">'. $Lang['Вітаю'] .' '. $_SESSION['user']['login'] .'!</a>';
				echo '<a href="#" class="prof">'. $Lang['Профіль'] .'</a>';
				echo '<a href="php/logout.php">'. $Lang['Вийти'] .'</a>';
				echo '<div class="profinfo">
				<form class="profinfoform" method="POST">
					<div class="containerform">
						<h2>'.$Lang['Профіль'].'</h2>
						<p><b>Id: </b>'. $_SESSION['user']['id'] .'</p>
						<p><b>'.$Lang['name_1'].': </b>'. $_SESSION['user']['login'] .'</p>
						<p><b>Email: </b>'. $_SESSION['user']['email'] .'</p>
						<button type="button" class="closeinfobtn">'.$Lang['Закрити'].'</button>
					</div>
				</form>
			</div>';
			}
			?>
			<a href="index.php?lang=uk" class="langimg"><img src="img/uk.png"></a> 
			<a href="index.php?lang=en" class="langimg"><img src="img/en.png"></a> 
			<a href="index.php?lang=ru" class="langimg"><img src="img/ru.png"></a>
		</div>

		<div class="container line">
			<div>
				<a href="index.php?lang=<?= $_SESSION['NowLang']?>"><h1 align=center >BMX SHOP</h1></a>
			</div>

			<div class="container">
				<a href="#"><h2><?php echo $Lang['Корзина']; ?></h2></a>
			</div>
		</div>
		
		<div class="container menu">
				<a href="index.php?lang=<?= $_SESSION['NowLang']?>"><?php echo $Lang['Велосипеди_BMX']; ?></a>
				<a href="#"><?php echo $Lang['Запчастини']; ?></a>
				<a href="#"><?php echo $Lang['Про_нас']; ?></a>
				<a href="#"><?php echo $Lang['Команда']; ?></a>
				<a href="#"><?php echo $Lang['Контакти']; ?></a>
				<a href="#"><?php echo $Lang['Спонсори']; ?></a>
		</div>
		
		<h3 style="font-weight: bold;"><?php echo $Lang['Велосипеди_BMX']; ?></h3>
		<div class="container main">
			<?php
			$sql = "SELECT * FROM cItem";
			$result = sqlsrv_query($conn, $sql);

			while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
			{
				echo '<div>
					<a href=bikes/'.$row['WebFilePath'].'><img src="'.$row['PicturePath'].'"></a>
					<div><a href=bikes/'.$row['WebFilePath'].'>'. $Lang['bike_'.$row['Id'].''].'</a></div>
				</div>';
			}	
			?>
		</div>
		
		<hr>
		
		<h3 style="font-weight: bold;"><?php echo $Lang['Контакти']; ?></h3>
		<div class="container contacts">
			<h2 style="margin-bottom: 0;"><?php echo $Lang['Адреса']; ?>:</h2>
			<h3 style="margin-bottom: 0;"><?php echo $Lang['adress']; ?></h3>
			<h2 style="margin-bottom: 0;"><?php echo $Lang['conect_w_us']; ?>:</h2>
			<h3 style="margin-bottom: 0;">
			<input name="phoneNumber" type="button" onclick="showNumber()" value="<?php echo $Lang['show_number']; ?>"></h3>
			<h3 style="margin-bottom: 0;">info.bmxshop@gmail.com</h3>
			<h3><div id="shareBlock"></div></h3>
			
			<form method="post" name="form" id="form">
			<!-- <form action="php/post.php" method="post" name="form"> -->
				<p><b><?php echo $Lang['name']; ?>:</b><br>
					<input id="name" name="name" type="text" size="40" placeholder="<?php echo $Lang['name']; ?>" required></p>
				<p><b>Email:</b><br>
					<input id="email" name="email" type="e-mail" size="40" placeholder="<?php echo $Lang['input_email']; ?>" required></p>
				<p title="<?php echo $Lang['age_statistic']; ?>" style="max-width: 130px"><b><?php echo $Lang['age']; ?>: </b>
					<input id="result" name="age" style="border: 0; width: 25px;">
					<div id="slider" style="max-width: 200px"></div></p>
				<p><b><?php echo $Lang['question']; ?>:</b><br>
					<input id="quest" name="header" type="text" size="40" required></p>
				<p><?php echo $Lang['describe']; ?>:<Br>
				<textarea id="message" name="message" cols="40" rows="3"></textarea></p>
				<!-- <p><input type="submit" value="<?php echo $Lang['__question']; ?>" OnClick="alert('<?php echo $Lang['answer_save']; ?>')"></p> -->
				<p><input id="submit" type="submit" value="<?php echo $Lang['__question']; ?>"></p>
			</form>
		</div>
		
		<div class="container footer">
			<div><?php echo $Lang['share']; ?>
			</div>
			
			<div>
				<form method="post" name="Newsletter" id="callback">
					<input id="emailcall" type="e-mail" name="emailcall" placeholder="<?php echo $Lang['input_email']; ?>" required>
					<input id="submitcall" type="submit" value="OK">
				</form>
			</div>
			
			<div><?php echo $Lang['subscribe']; ?>
			</div>

			<div>
			<?php 
				if(isset($_COOKIE['NowLang']))
				{
					echo $Lang['show_lang'];
				}
			?>
			</div>
			
		</div>
		
		<script src="jquery/jquery.c-share.js"></script>
		<script src="jquery/script.js"></script>
	</body>
</html>
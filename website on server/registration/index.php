<?php
session_start();
?>

<!DOCTYPE html>
<html lang="uk">
	<head>
		<link rel="stylesheet" type="text/css" href="../style/main.css">
		<link rel="stylesheet" type="text/css" href="../style/register.css">
		<title>BMX SHOP</title>
		<meta charset="utf-8">
		
		<script type="text/javascript" src="js/script.js"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
		<link rel = "stylesheet" href = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"> </script>
		
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/brands.css" integrity="sha384-1KLgFVb/gHrlDGLFPgMbeedi6tQBLcWvyNUN+YKXbD7ZFbjX6BLpMDf0PJ32XJfX" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
	</head>
	<body>
		<?php
            /* $serverName = "DESKTOP-035M40Q";
            $connectionOptions = array("Database"=>"BMX_SHOP");
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            if($conn == false){
                echo "No connection to MsSQL Server";
            } */
        ?>
		<div class="container lineline">
			<a href="../registration/index.php?lang=<?= $_SESSION['NowLang']?>">Ввійти</a>
		</div>

		<div class="container line">
			<div>
				<a href="../index.php?lang=<?= $_SESSION['NowLang']?>"><h1 align=center >BMX SHOP</h1></a>
			</div>

			<div class="container">
				<a href="#"><h2>Корзина</h2></a>
			</div>
		</div>
		
		<div class="container menu">
				<a href="../index.php?lang=<?= $_SESSION['NowLang']?>">Велосипеди BMX</a>
				<a href="#">Запчастини</a>
				<a href="#">Про нас</a>
				<a href="#">Команда</a>
				<a href="#">Контакти</a>
				<a href="#">Спонсори</a>
		</div>
		
		<h3 style="font-weight: bold;">Авторизація</h3>
		<hr>

		<div class="container register">
			<div class="regform">
			<!-- <form id="formx" method="POST" onsubmit="call()"> -->
			<form method="POST" action="../php/register.php">
				<div class="containerform">
					<h2 style="text-align: left;">Реєстрація</h2>
					<p>Заповніть поля форми, щоб створити акаунт.</p>
					<hr>
					<label for="name"><b>Ім'я</b></label>
					<input type="text" placeholder="Введіть ім'я" name="name" required>

					<label for="email"><b>Email</b></label>
					<input type="text" placeholder="Введіть Email" name="email" required>

					<label for="psw"><b>Пароль</b></label>
					<input type="password" placeholder="Пароль" name="psw" required>

					<label for="psw-repeat"><b>Повторіть пароль</b></label>
					<input type="password" placeholder="Повторіть пароль" name="psw-repeat" required>
					<hr>
					<button type="submit" class="registerbtn">Зареєструватися</button>
					<?php
            		if (isset($_SESSION['message1'])) {
                		echo '<p class="msg"> ' . $_SESSION['message1'] . ' </p>';
            		}
            		unset($_SESSION['message1']);
        			?>
				</div>
			</form>
			</div>

			<div class="regform">
			
			<form method="POST" action="../php/signin.php">
				<div class="containerform">
					<h2>Вхід</h2>
					<hr>
					<label for="email"><b>Email</b></label>
					<input type="text" placeholder="Введіть Email" name="email-in" required>

					<label for="psw"><b>Пароль</b></label>
					<input type="password" placeholder="Введіть пароль" name="psw-in" required>
					<hr>
					<button type="submit" class="enterbtn">Ввійти</button>
					<div id="msg"></div>
					<?php
            		if (isset($_SESSION['message'])) {
                		echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            		}
            		unset($_SESSION['message']);
        			?>
				</div>
			</form>
			</div>
		</div>
		
		<div class="container footer">
			<div>Розсилка
			</div>
			
			<div>
				<form name="Newsletter" method="post" action="JavaScript: 
				result=confirm('Дійсно підписатись на розсилку?'); void(0);">
					<input type="e-mail" name="email" placeholder="Введіть ваш e-mail">
					<button type="submit" name="submitNewsletter">
						<span>OK</span>
					</button>
				</form>
			</div>
			
			<div>Підписуйтесь на наші оновлення
			</div>
		</div>
		
		<script src="jquery/jquery.c-share.js"></script>
		<script src="jquery/script.js"></script>
	</body>
</html>
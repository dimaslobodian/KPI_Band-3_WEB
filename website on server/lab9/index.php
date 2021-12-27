<html> 
<head> 

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
<link rel = "stylesheet" href = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"> </script>
<script type="text/javascript" src="js/script.js"></script> 
<link rel = "stylesheet" href = "style/main.css">


</head> 
<body> 
<head>

<!-- <form method="post" action="<?php //echo $_SERVER["PHP_SELF"];?>" class="cbf">

<div>

<input type="text" id="name" name="name" value="" placeholder="Name">
<input type="text" id="phone" name="phone" value="" placeholder="Phone">
<input type="email" id="email" name="email" value="" placeholder="Email Address">
<input type="submit" id="submit" name="submit" value="Get Call Back">

</div>
</form> -->

<div class="container register">
<div class="regform">
			<form method="POST" action="<?php /* echo $_SERVER["PHP_SELF"]; */?>" id="form" class="cbf">
				<div class="containerform">
					<h2 style="text-align: left;">Реєстрація</h2>
					<p>Заповніть поля форми, щоб створити акаунт.</p>
					<hr>
					<label for="name"><b>Ім'я</b></label>
					<input type="text" placeholder="Введіть ім'я" id="name" name="name" class="_req" required>

                    <label for="phone"><b>Phone</b></label>
					<input type="phone" placeholder="Введіть телефон" id="phone" name="phone" class="_req" required>

					<label for="email"><b>Email</b></label>
					<input type="text" placeholder="Введіть Email" id="email" name="email" class="_req _email" required>

					<label for="country"><b>Країна</b></label>
					<input type="text" placeholder="Введіть країну" id="country" name="country" class="_req" required>

					<label for="city"><b>Місто</b></label>
					<input type="text" placeholder="Введіть місто" id="city" name="city" class="_req" required>

					<label for="psw"><b>Пароль</b></label>
					<input type="password" placeholder="Пароль" id="psw" name="psw" class="_req" required>

					<label for="psw-repeat"><b>Повторіть пароль</b></label>
					<input type="password" placeholder="Повторіть пароль" id="psw-repeat" name="psw-repeat" class="_req" required>
					<hr>
					<button type="submit" id="submit" class="registerbtn">Зареєструватися</button>
					<div id="results"></div>
				</div>
			</form>
			</div>
</div>

<?php
if ( isset( $_POST["name"] ) ) 
{
	$dom = new DOMDocument();
	$dom = DOMDocument::load('data.xml');

	$name = $dom->createElement('name');

	$name_text = $dom->createTextNode($_POST['name']);
	$name->appendChild($name_text);
	$users->appendChild($name);

	$dom->documentElement->appendChild($users);
	$dom->save('data.xml');
}
/*session_start();

if ('POST' === $_SERVER['REQUEST_METHOD']) {

$_SESSION['posted'] = true;

$to = "myemail@gmail.com";
$subject = "Someone wants a Call Back!";

// data the visitor provided

//$name_field = $_POST['name'];
//$phone_field = $_POST['phone'];
//$email_field = $_POST['email'];

$name_field = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email_field = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_INT);

//constructing the message
$body = " From: $name_field\n\n Phone: $phone_field\n\n E-mail: $email_field\n\n";

// ...and away we go!
mail($to, $subject, $body);

} else {
// handle the error somehow
}*/
?>
</body> 
</html> 

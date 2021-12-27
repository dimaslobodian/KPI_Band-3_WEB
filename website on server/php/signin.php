<?php
        session_start();
        require_once 'connect.php';

        if($conn == false){
            echo "No connection to MsSQL Server";
        }
        try
        {
			if(isset($_POST["email-in"])){
				$email_in = $_POST["email-in"];
			}
			if(isset($_POST["psw-in"])){
				$psw_in = $_POST["psw-in"];
			}

			if(isset($_POST["email-in"])){
				$sql = "SELECT * FROM cUser WHERE Email='$email_in' AND Password='$psw_in'";
				$check_user = sqlsrv_query($conn, $sql);
                $user = sqlsrv_fetch_array($check_user);

				$fd = fopen("../SignIn.txt", 'a') or die("не удалось открить файл");
				$str = "";
				if(isset($user)){
					$str = $user['Id'];
					fwrite($fd, $str);
					$str = ' ';
					fwrite($fd, $str);
					$str = $user['Login'];
					fwrite($fd, $str);
					$str = ' ';
					fwrite($fd, $str);
					$str = $user['Email'];
					fwrite($fd, $str);
					$str = "\n";
					fwrite($fd, $str);
				}
				else{
					$str = "No such User in DB";
					fwrite($fd, $str);
					$str = "\n";
					fwrite($fd, $str);
				}
				fclose($fd);

                if(isset($user)){
					$_SESSION['user'] = [
						"id"=>$user['Id'],
						"login"=>$user['Login'],
						"email"=>$user['Email']
					];
					$_SESSION['message']='Вхід пройшов успішно!';
                    header('Location: ../index.php?lang='. $_SESSION['NowLang']);
				}
				else{
					$_SESSION['message']='Неправильний email або пароль!';
                    header('Location: ../registration/index.php?lang='. $_SESSION['NowLang']);
				}
            }
        }
        catch(Throwable $e)
        {
            echo("Error!");
        }
        ?>
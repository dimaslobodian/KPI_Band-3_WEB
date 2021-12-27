        
    <?php

        session_start();
        require_once 'connect.php';
        
        try
        {
			$psw='';
			$psw_repeat=' ';
			if(isset($_POST["name"])){
                $name = $_POST["name"];
            }
            if(isset($_POST["email"])){
                $email = $_POST["email"];
            }
            if(isset($_POST["psw"])){
                $psw = $_POST["psw"];
            }
            if(isset($_POST["psw-repeat"])){    
                $psw_repeat = $_POST["psw-repeat"];
            }
            
            if(isset($_POST["email"])){
                $sql = "SELECT * FROM cUser WHERE Email='$email'";
                $check_user = sqlsrv_query($conn, $sql);
                $user = sqlsrv_fetch_array($check_user);

                if(isset($user)){
                    $_SESSION['message1']='Обліковий запис з цьою електронною поштою вже зареєстрований!';
                    //echo 'Обліковий запис з цьою електронною поштою вже зареєстрований!';
                    //return;
                    header('Location: ../registration/index.php');
                }
                else{
			        if($psw === $psw_repeat){
                        //$insertReview = sqlsrv_query($conn, $tsql);
                        $tsql = "INSERT INTO cUser(Login, Email, Password) OUTPUT"
						. " INSERTED.ID VALUES ('$name', '$email', '$psw')";

                        $insertReview = sqlsrv_query($conn, $tsql);
                        if($insertReview == FALSE)
                            die(FormatErrors( sqlsrv_errors()));
                        $_SESSION['message1']='Реєстрація пройшла успішно!';
                        sqlsrv_free_stmt($insertReview);
                        //echo 'Реєстрація пройшла успішно!';
                        //return;
                        header('Location: ../registration/index.php?lang='. $_SESSION['NowLang']);
                    }
                    else{
                        $_SESSION['message1']='Паролі не співпадають!';
                        //echo 'Паролі не співпадають!';
                        //return;
                        header('Location: ../registration/index.php?lang='. $_SESSION['NowLang']);
                    }
				}
			}
        }
        catch(Throwable $e)
        {
            echo("Error!");
            //return;
        }
    ?>
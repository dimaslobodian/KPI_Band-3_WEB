<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['message']);
header('Location: ../index.php?lang='. $_SESSION['NowLang']);
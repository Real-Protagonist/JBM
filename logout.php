<?php

session_start();
ob_start();
unset($_SESSION['id'],$_SESSION['nome']);
unset($_SESSION['estado']);

header("Location: login.php");
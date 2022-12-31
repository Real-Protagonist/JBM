<?php
session_start();
session_abort();
session_destroy();

session_unset($_SESSION['estado']);
session_destroy($_SESSION['estado']);

header('Location: login.php');


?>
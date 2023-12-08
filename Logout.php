<?php
session_start();
session_destroy();
//unset($_SESSION['NOMEDASESSAOPARAVOLTAR']);
header('Location: index.php');
exit();
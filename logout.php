<?php
require 'connections.php';
?>
<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
session_destroy();
header('Location: index.php')
?>
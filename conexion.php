<?php
require_once 'parameters.php';
 

    $mysql = mysqli_connect($host,$username,$password) or die('Error mysql_connect: '.mysqli_error($mysql));
    mysqli_select_db($mysql, $dbname) or die('Error mysql_select_db: '.mysqli_error($mysql));

 ?>

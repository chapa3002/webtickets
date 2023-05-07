
<?php

use function PHPSTORM_META\map;

$login = (trim($_POST["login"]));
$pass = (trim($_POST["pass"]));
$name1 = trim($_POST["surname"]);
echo $login ."   ". $pass;
$connection= new mysqli("127.0.0.1","root","","tickets_db");
if ($connection!=true) {
       echo "error";
       echo mysqli_connect_error();
       exit();
}
$result = mysqli_query($connection, "SELECT * FROM `user` WHERE `name`==$login AND `password`==$pass" );


    
    if (mb_strlen($login)<4 or mb_strlen($pass)<4 or $result!=false) {
       
        echo "нічо не працює";

        exit();
    }
    else {
        $connection->query("INSERT INTO `user` (`name`, `surName`, `password`) VALUES('$login', '$name1', '$pass')");
        echo " працює";

    }
$connection->close();
header("Location: enter.html");
exit();




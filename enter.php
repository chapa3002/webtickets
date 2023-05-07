
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
$result = $connection->query("SELECT * FROM `user` WHERE `name`='$login' AND `password`='$pass'");
if ($result === false) {
    echo "wow";
    die("Error executing query: " . $connection->error);
}
$user = $result->fetch_assoc();
if ($user) {

setcookie("user",$user["id"], time()+300, "/");
$connection->close();

header("Location: main.php");
exit();
} else {
    echo "користувача не знайдено";
}



$connection->close();



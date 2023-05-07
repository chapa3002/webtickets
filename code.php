<?php
// Параметри підключення до бази даних

// Підключення до бази даних
$connection = mysqli_connect("127.0.0.1","root","","tickets_db");
if (!$connection) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Генерація випадкового 15-значного коду

$selectedEvent = $_POST['event'];
   // echo 'Ви вибрали подію: ' . $selectedEvent;


$code = generateRandomCode(15);

// Перевірка на унікальність коду
while (!isUniqueCode($code, $connection)) {
    $code = generateRandomCode(15);
}
$checkquantity="SELECT * FROM `event` WHERE `id`=$selectedEvent";
$checkquantityRes=mysqli_query($connection, $checkquantity);#перевіряємо чи є така к-сть білетів
$row3=mysqli_fetch_assoc($checkquantityRes);
if ($row3['tickets_quantity']>0) {
    $newquantity=$row3['tickets_quantity']-1;
    #echo $newquantity; працює
    $changequantity="UPDATE `event` SET `tickets_quantity`=$newquantity WHERE `id`=$selectedEvent";
    $changequantityres=mysqli_query($connection, $changequantity);#змінюємо
}
else {

    echo "білети закінчились";
    $connection->close();

    header("Location: main.php");

    exit();
}

// Вставка коду в базу даних
$query = "INSERT INTO `tickets`(`id_of_event`, `user_id`, `code`) VALUES ($selectedEvent, $_COOKIE[user], \"$code\")";
$result = mysqli_query($connection, $query);
if ($result) {
    $query = "SELECT * FROM `tickets` WHERE `user_id`=\"$_COOKIE[user]\"";

    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $query = "SELECT * FROM `event` WHERE `id`=\"$row[id_of_event]\"";
        $result2 = mysqli_query($connection, $query);

        $row2 = mysqli_fetch_assoc($result2);
        $text= $text . $row['id_of_event'] .$row2['name_of_event']. ' ' . $row['buy_date'] . ' ' . $row['code'] . "\n";
    }

   

    // Генерація унікального імені для файлу
    $fileName = 'file_' . uniqid() . '.txt';

    // Збереження текстового файлу
    $file = fopen($fileName, 'w');
    fwrite($file, $text);
    fclose($file);

    downloadFile($fileName);
} else {
    echo "Не вийшло: " . mysqli_error($connection);
}

// Ваш текст, який буде збережений у текстовому файлі

// Функція для завантаження файлу
function downloadFile($file) {
    header("Content-Disposition: attachment; filename=" . basename($file));
    header("Content-Type: application/octet-stream");
    header("Content-Length: " . filesize($file));
    readfile($file);
}






// Закриття підключення до бази даних
mysqli_close($connection);

// Функція для генерації випадкового коду
function generateRandomCode($length) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

// Функція для перевірки унікальності коду в базі даних
function isUniqueCode($code, $connection) {
    $query = "SELECT COUNT(*) as count FROM `tickets` WHERE `code` = '$code'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['count'] == 0;
}
?>

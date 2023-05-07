<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>tickets</title>
</head>
<body>
    
        <header>
            <div class="headertop">
                
                    <div class="brand">TicketsUA</div>
                <nav>
                    <ul class="menu">
                        <a href="#">tickets</a>
                        <a href="#">main</a>
                        <a href="#">about us</a>
                        <a href="#">Contact</a>
                    </ul>
  
                </nav>
            </div>
        </header>
       
       

            <div class="container mt-5">
                <form action="code.php" method="post">
                    <div class="input-group">
                        <select class="form-select wd-10" name="event" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option selected>Натисніть тут, щоб вибрати подію</option>
                                    <?php
                                    // Підключення до бази даних (припустимо, що ви вже маєте налаштоване з'єднання)
                                    $connection = mysqli_connect("127.0.0.1","root","","tickets_db");

                                    // Отримання даних з бази даних
                                    $query = "SELECT `id`, `name_of_event` FROM `event`";
                                    $result = mysqli_query($connection, $query);

                                    // Перебір результатів та створення елементів <option>
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['name_of_event'] . '</option>';
                                    }

                                    // Закриття з'єднання з базою даних
                                    mysqli_close($connection);
                                ?>
                        </select>
                        <button class="btn btn-primary" type="submit">Купити</button>
                    </div>
                    
                </form>
                </div>


        


       












</body>
</html>
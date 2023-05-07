<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <title>TicketsUA</title>
</head>
<body>
        <header>
            <div class="headertop">
                
                <div class="brand">TicketsUA</div>
                <nav>
                    <ul class="menu">
                        <a href="tickets.php">tickets</a>
                        <a href="#">main</a>
                        <a href="#">about us</a>
                        <a href="#">Contact</a>
                    </ul>
                </nav>
            </div>
        </header>
    <div class="container">
        <div class="enter">
            <h1>Вітаємо на сайті TicketsUA!</h1>
            <?php if ($_COOKIE["user"]==""):?>

            <button class="btn btn-success">          
                  <a href="enter.html">Натисніть, щоб увійти</a>
            </button>
        </div>
    </div>
    <?php endif;?> 
    <?php if ($_COOKIE["user"]!=""):?>

        <div class="container">



        </div>


    <?php endif;?> 

    
</body>
</html>
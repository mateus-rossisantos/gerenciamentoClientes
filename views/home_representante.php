<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <link rel="stylesheet" type="text/css" href="home.css">

    <title>Home</title>

</head>
<body>

<ul>
        <?php
        $menuItems = array(
            "Login" => "index.php",
            "Clientes" => "about.php",
            "Representantes" => "services.php",
            "Contact" => "contact.php"
        );

        foreach ($menuItems as $item => $url) {
            echo "<li><a href='$url'>$item</a></li>";
        }
     ?>

    <div class="menu">
        <ul>
            <li><a href="index.php">Login</a><li>
            <li><a href="#section1">Seção 1</a></li>
            <li><a href="#section2">Seção 2</a></li>
            <li><a href="#section3">Seção 3</a></li>
            <li><a href="logout.php">Logout</a><li>
        </ul>
    </div>

    <div class="content">
     
        <div id="section1" class="section" style="background-color: lightblue;">
            <h2>Seção 1</h2>
            <p>Conteúdo da seção 1...</p>
        </div>

        <div id="section2" class="section" style="background-color: lightgreen;">
            <h2>Seção 2</h2>
            <p>Conteúdo da seção 2...</p>
        </div>

        <div id="section3" class="section" style="background-color: lightyellow;">
            <h2>Seção 3</h2>
            <p>Conteúdo da seção 3...</p>
        </div>
    </div>
    
</body>
</html>
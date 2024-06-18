<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" onclick="jump()">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gaming with friends website">
    <meta name="keywords" content="Gaming, friends, fun, free">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/13f5e46cd8.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <script>
    let gebruiker_id = <?php echo $_SESSION['gebruiker_id']; ?>;
</script>
</head>

<body>
    

    <header>
        <section class="header">

            <section>
                <a href="img/bird.jpg">Logo</a>
            </section>

            <nav class="navbar">

                <a href="index.php">Home</a>
                <?php 
                if(isset($_SESSION['gebruikersnaam'])) {
                    ?>
                    <a href="games.php">Games</a>
                    <a href="highscores.php">Highscores</a>
                    <a href="logout.php">Uitloggen</a>
                    <?php

                }else {
                    ?>
                    <a href="#">About Us</a>
                    <a href="login2.php">Inloggen</a>
                <?php
                }
                ?>
            </nav>
    
            <section>
                <?php
                if (isset($_SESSION['gebruikersnaam'])) {

                    ?><a href="profile.php"><img src="img/Account.png" alt="profile"></a><?php
                }
                ?>
            </section>

        </section>
    </header>

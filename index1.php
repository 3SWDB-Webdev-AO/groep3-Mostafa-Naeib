<?php include 'lib/header.php'; ?>
<?php

if(!isset($_SESSION['gebruikersnaam'])) {
    // header('Location: login.php');
}
?>

<h1><?php echo $_SESSION['gebruikersnaam']; ?></h1>
<main>
    
    <h2>Welkom op de Pixel Playground</h2>
    <p>De Pixel Playground is een plek waar je je creativiteit de vrije loop kunt laten. Maak je eigen pixel art en deel het met anderen. Of bekijk de creaties van andere gebruikers en laat je inspireren.</p>
    <article class="container">

<section class="container_images">
    <img src="img/bird.jpg" alt="">
    <img src="img/dino.png" alt="">
    <img src="img/galgje.png" alt="">
</section>
<script src="js/home.js"></script>
</article>
</main>
<?php include 'lib/footer.php'; ?>

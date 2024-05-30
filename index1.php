<?php include 'lib/header.php'; ?>
<?php

if(!isset($_SESSION['gebruikersnaam'])) {
    header('Location: login.php');
}
echo $_SESSION['gebruikersnaam'];
?>

<main>
    <h1>Welkom op de Pixel Playground</h1>
    <p>De Pixel Playground is een plek waar je je creativiteit de vrije loop kunt laten. Maak je eigen pixel art en deel het met anderen. Of bekijk de creaties van andere gebruikers en laat je inspireren.</p>

</main>
<?php include 'lib/footer.php'; ?>

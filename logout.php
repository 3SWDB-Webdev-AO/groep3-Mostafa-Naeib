<?php include 'lib/header.php'; ?>
<?php


// Sessievariabelen wissen om uit te loggen
session_unset();
// Sessie beëindigen
session_destroy();
?>


<main>
    <h2>Je bent uitgelogd</h2>
    <a href="index.php">Terug naar de startpagina</a>
</main>
    <?php include 'lib/footer.php'; ?>

<?php include 'lib/header.php';
    require_once 'functions.php'; 
?>

<h1 class="h1-rg">Registreer</h1>
<main class="main-register">
    <form class="rg-form" action="register.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="secret_question" placeholder="Secret question" required>
        <input type="text" name="secret_answer" placeholder="Secret answer" required>
        <input type="submit" value="register">
    </form>
    <?php

    // Zo haal ik de functie van register
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        register($_POST);
    }
    ?>
</main>
<?php include 'lib/footer.php'; ?>

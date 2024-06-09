<?php include 'lib/header.php'; ?>
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
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['secret_question']) && isset($_POST['secret_answer'])){
        $gebruikersnaam = $_POST['username'];
        $password = $_POST['password'];
        $secretQuestion = $_POST['secret_question'];
        $secretAnswer = $_POST['secret_answer'];

    

        // Hash het wachtwoord en de antwoord van de geheime vraag
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $hashedSecretAnswer = password_hash($secretAnswer, PASSWORD_DEFAULT);

        // Connectie maken met de db
        require_once 'lib/db.php';

        // Query om de gebruiker toe te voegen
        $sql = $conn->prepare("INSERT INTO gebruikers (gebruikersnaam, wachtwoord, geheime_vraag, antwoord_geheime_vraag) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $gebruikersnaam, $hashedPassword, $secretQuestion, $hashedSecretAnswer);

        if($sql->execute()){
            header('Location: login.php');

        } else {
            echo "<div class='conclusie'>Er is iets fout gegaan: " . $conn->error . "</div>";
        }

        $sql->close();
        $conn->close();
    }
    ?>
</main>
<?php include 'lib/footer.php'; ?>

<?php include 'lib/header.php'; ?>

<main class="login-main">
    <form class="login-form" action="login.php" method="post">
        <div class="form-group">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" placeholder="Voer uw gebruikersnaam in" required>
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" placeholder="Voer uw wachtwoord in" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Inloggen" class="btn-login">
        </div>
        <section class="btn-group">
            <a href="register.php" class="btn-register">Registreer hier</a>
            <a href="new_pass.php" class="btn-forgot-password">Wachtwoord vergeten</a>
        </section>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gebruikersnaam = $_POST['username'];
        $password = $_POST['password'];
        
        // Database connectie
        require_once 'lib/db.php';
        
        // Query om gebruiker te zoeken op gebruikersnaam
        $sql = "SELECT * FROM gebruikers WHERE gebruikersnaam = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $gebruikersnaam);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Controleer het wachtwoord
            if (isset($password, $user['wachtwoord'])) {
                $_SESSION['gebruikersnaam'] = $gebruikersnaam;
                header('Location: index1.php'); 
            } else {
                echo "Verkeerd wachtwoord. Probeer het opnieuw.";
            }
        } else {
            echo "Gebruikersnaam niet gevonden. Probeer het opnieuw.";
        }
        
        $stmt->close();
        $conn->close();
    }
    ?>
</main>

<?php include 'lib/footer.php'; ?>

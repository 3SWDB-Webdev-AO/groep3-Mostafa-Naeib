<?php include 'lib/header.php'; ?>

<main class="login-main">
    <form class="login-form" action="login.php" method="post">
        <div class="form-group">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" placeholder="Voer uw gebruikersnaam in">
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" placeholder="Voer uw wachtwoord in">
        </div>
        <div class="form-group">
            <input type="submit" value="Inloggen" class="btn-login">
        </div>
        <section class="btn-group">
            <a href="register.php" class="btn-register">Registreer hier</a>
            <a href="newpassword.php" class="btn-forgot-password">Wachtwoord vergeten</a>
        </section>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Gebruikersnaam = $_POST['username'];
        $password = $_POST['password'];
        $conn = new mysqli('localhost', 'root', '', 'pixelplayground.sql');
        
        // Controleer of de databaseverbinding succesvol is
        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }
        
        // Gebruik parameterbinding om SQL-injectie te voorkomen
        $sql = "SELECT * FROM gebruikers WHERE gebruikersnaam = ? AND wachtwoord = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $Gebruikersnaam, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $aantal = $result->num_rows;
        
        if ($aantal == 1) {
            session_start();
            $_SESSION['gebruikersnaam'] = $Gebruikersnaam;
            header('Location: login.php');
        } else {
            echo "Login failed please try again.";
        }
        
        if ($result && $result->num_rows > 0) {
            $check = $result->fetch_array();
            // Voer hier verdere bewerkingen uit met $check
        }
        
        $stmt->close();
        $conn->close();
    } else {
        echo "Wrong username or password. Please try again.";
    }
    ?>
</main>

<?php include 'lib/footer.php'; ?>
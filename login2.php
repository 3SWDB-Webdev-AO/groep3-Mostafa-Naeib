<?php include 'lib/header.php'; ?>

<main class="container" id="container">
    <article class="form-container sign-up">
        <form>
            <h1>Create Account</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>or use your email for registeration</span>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="secret_question" placeholder="Secret question" required>
            <input type="text" name="secret_answer" placeholder="Secret answer" required>
            <button>Sign Up</button>
        </form>
    </article>

    <article class="form-container sign-in">
        <form method="POST"> 
            <h1>Sign In</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>or use your email password</span>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <a href="#">Forget Your Password?</a>
            <input type="submit" value="Inloggen" class="btn-login">
        </form>
    </article>
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gebruikersnaam = $_POST['username'];
        $password = $_POST['password'];

        // Debugging output
        echo "Gebruikersnaam: $gebruikersnaam<br>";
        echo "Wachtwoord: $password<br>";

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
            if (password_verify($password, $user['wachtwoord'])) {
                $_SESSION['gebruikersnaam'] = $gebruikersnaam;
                $_SESSION['gebruiker_id'] = $user['gebruiker_id'];
                header('Location: index1.php');
                exit();
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

    <article class="toggle-container">
        <section class="toggle">
            <section class="toggle-panel toggle-left">
                <h1>Welcome Back!</h1>
                <p>Enter your personal details to use all of site features</p>
                <button class="hidden" id="login">Sign In</button>
            </section>
            <section class="toggle-panel toggle-right">
                <h1>Hello, Friend!</h1>
                <p>Register with your personal details to use all of site features</p>
                <button class="hidden" id="register">Sign Up</button>
            </section>
        </section>
    </article>
</main>

<script src="script.js"></script>

<?php include 'lib/footer.php'; ?>
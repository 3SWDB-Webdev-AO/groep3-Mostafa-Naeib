<?php include 'lib/header.php'; ?>
<?php require_once 'functions.php'; ?>
<main class="container" id="container">
    <article class="form-container sign-up">
        <form method="POST">
            <h1>Create Account</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>or use your email for registration</span>

            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="secret_question" placeholder="Secret question" required>
            <input type="text" name="secret_answer" placeholder="Secret answer" required>
            <button type="submit">Sign Up</button>
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
            <a href="new_pass.php">Forget Your Password?</a>
            <input type="submit" value="Inloggen" name ='login' class="btn-login">
        </form>
    </article>

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

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        register($_POST);
    } else if (isset($_POST['login'])) {
        if(login($_POST)){
            header('Location: index1.php');
        
        }
    }
}
?>

<script src="script.js"></script>

<?php include 'lib/footer.php'; ?>

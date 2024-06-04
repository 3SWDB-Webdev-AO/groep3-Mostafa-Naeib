<?php include 'lib/header.php'; ?>
<main>
    <form action="new_pass.php" method="POST">
        <label for="user">Gebruikersnaam:</label>
        <input type="text" id="user" name="user" required>
        <br>
        <label for="secret_answer">Antwoord:</label>
        <input type="text" id="secret_answer" name="secret_answer" required>
        <label for="secret_answer">Antwoord:</label>
        <br>
        <input type="text" id="new_password" name="new_pasword" required>
        <br>
        <input type="submit" value="Verifiëren">
    </form>
</main>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gebruikersnaam = $_POST['user'];
    $geheime_antwoord = $_POST['secret_answer'];
    
    require_once 'lib/db.php';
    $sql = "SELECT * FROM gebruikers WHERE gebruikersnaam = ? AND antwoord_geheime_vraag = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $gebruikersnaam, $geheime_antwoord);
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        session_start();
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
        header('Location: verify_answer.php');
        exit();
    } else {
        echo "Verkeerde gebruikersnaam of antwoord. Probeer het opnieuw.";
    }

    $stmt->close();
    $conn->close();
}
?>
<?php include 'lib/footer.php'; ?>

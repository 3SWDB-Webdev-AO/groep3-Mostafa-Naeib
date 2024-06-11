<?php include 'lib/header.php'; ?>
<main>
    <form action="verify_answer.php" method="POST">
        <label for="secret_question">Geheime vraag:</label>
        <input type="text" id="secret_question" name="secret_question" required>
        <br>
        <label for="secret_answer">Antwoord:</label>
        <input type="text" id="secret_answer" name="secret_answer" required>
        <br>
        <input type="submit" value="Verifiëren">
    </form>
</main>
 <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $geheime_vraag = $_POST['secret_question'];
        $geheime_antwoord = $_POST['secret_answer'];
        
        $conn = new mysqli('localhost', 'root', '', 'pixelplayground');
        
        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }
        
        $sql = "Update gebruikers SET = $geheime_vraag WHERE gebruikersnaam = $geheime_antwoord";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $gebruikersnaam);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            if (isset($password, $user['wachtwoord'])) {
                session_start();
                $_SESSION['gebruikersnaam'] = $gebruikersnaam;
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
<?php include 'lib/footer.php'; ?>

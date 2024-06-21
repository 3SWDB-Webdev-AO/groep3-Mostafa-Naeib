<?php

function wachtwoordVergeten($data) {
    // Inclusief database connectie
    require_once 'lib/db.php';

    // Controleer of de aanvraag een POST-aanvraag is
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Haal de ingevoerde gegevens op
        $username = $data['username'];
        $geheime_vraag = $data['geheime_vraag'];
        $antwoord_geheime_vraag = $data['antwoord_geheime_vraag'];
        $nieuw_wachtwoord = $data['nieuw_wachtwoord'];
        $nieuw_wachtwoordCONF = $data['nieuw_wachtwoordCONF'];

        // Validatie van de invoer
        if (empty($username) || empty($geheime_vraag) || empty($antwoord_geheime_vraag) || empty($nieuw_wachtwoord) || empty($nieuw_wachtwoordCONF)) {
            die("Alle velden zijn verplicht.");
        }

        if ($nieuw_wachtwoord !== $nieuw_wachtwoordCONF) {
            die("De nieuwe wachtwoorden komen niet overeen.");
        }

        // Controleer of de gebruiker bestaat en de geheime vraag overeenkomt
        $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = ? AND geheime_vraag = ?");
        $stmt->bind_param('ss', $username, $geheime_vraag);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user) {
            // Verifieer het gehashte antwoord op de geheime vraag
            if (password_verify($antwoord_geheime_vraag, $user['antwoord_geheime_vraag'])) {
                // Hash het nieuwe wachtwoord voordat het wordt opgeslagen
                $hashed_password = password_hash($nieuw_wachtwoord, PASSWORD_DEFAULT);

                $update_stmt = $conn->prepare("UPDATE gebruikers SET wachtwoord = ? WHERE gebruikersnaam = ?");
                $update_stmt->bind_param('ss', $hashed_password, $username);

                if ($update_stmt->execute()) {
                    echo "Wachtwoord succesvol bijgewerkt.";
                } else {
                    echo "Er is een fout opgetreden bij het bijwerken van het wachtwoord.";
                }
                $update_stmt->close();
            } else {
                echo "Onjuist antwoord op de geheime vraag.";
            }
        } else {
            echo "Gebruiker niet gevonden of onjuiste geheime vraag.";
        }

        // Sluit de database verbinding
        $conn->close();
    }
}

function login($data) {
    // Haal de gebruikersnaam en wachtwoord op van de POST-aanvraag
    $gebruikersnaam = $_POST['username'];
    $password = $_POST['password'];

    // Maak verbinding met de database
    $conn = new mysqli('localhost', 'root', '', 'pixelplayground');

    // Query om de gebruiker te zoeken op basis van de gebruikersnaam
    $sql = "SELECT * FROM gebruikers WHERE gebruikersnaam = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gebruikersnaam);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Controleer het ingevoerde wachtwoord met het gehashte wachtwoord in de database
        if (password_verify($password, $user['wachtwoord'])) {
            // Sla gebruikersinformatie op in de sessie
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            $_SESSION['gebruiker_id'] = $user['id'];

            // Stuur de gebruiker naar de homepage of een andere beveiligde pagina
            return true;
        } else {
            echo "Verkeerd wachtwoord. Probeer het opnieuw.";
        }
    } else {
        echo "Gebruikersnaam niet gevonden. Probeer het opnieuw.";
    }

    $stmt->close();
    $conn->close();
}

function register($data) {
    if (isset($data['username']) && isset($data['password']) && isset($data['secret_question']) && isset($data['secret_answer'])) {
        $gebruikersnaam = $data['username'];
        $password = $data['password'];
        $secretQuestion = $data['secret_question'];
        $secretAnswer = $data['secret_answer'];

        // Hash het wachtwoord en het antwoord op de geheime vraag
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $hashedSecretAnswer = password_hash($secretAnswer, PASSWORD_DEFAULT);

        // Maak verbinding met de database
        require_once 'lib/db.php';

        // Query om de gebruiker toe te voegen
        $sql = $conn->prepare("INSERT INTO gebruikers (gebruikersnaam, wachtwoord, geheime_vraag, antwoord_geheime_vraag) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $gebruikersnaam, $hashedPassword, $secretQuestion, $hashedSecretAnswer);

        if ($sql->execute()) {
            // Stuur de gebruiker naar de inlogpagina
            header('Location: login2.php');
        } else {
            echo "<div class='conclusie'>Er is iets fout gegaan: " . $conn->error . "</div>";
        }

        $sql->close();
        $conn->close();
    }
}

function getHighscore($data) {
    // Maak verbinding met de database
    require_once 'lib/db.php';

    // Controleer de verbinding
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Haal de laatste highscores op van de ingelogde gebruiker
    $gebruiker_id = $_SESSION['gebruiker_id'];
    $sql = "SELECT highscore, game_id FROM highscores WHERE gebruiker_id = ? ORDER BY highscore DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $gebruiker_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<ul>";
        // Gebruik htmlspecialchars om te voorkomen dat gebruikerscode in de database kunnen injecteren
        while ($row = $result->fetch_assoc()) {
            echo "<li>Game ID: " . htmlspecialchars($row['game_id']) . " - Score: " . htmlspecialchars($row['highscore']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Je hebt nog geen highscores behaald.";
    }

    $stmt->close();
    $conn->close();
}
?>

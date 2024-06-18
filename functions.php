<?php

function wachtwoordVergeten($data) {
    require_once 'lib/db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $data['username'];
        $geheime_vraag = $data['geheime_vraag'];
        $antwoord_geheime_vraag = $data['antwoord_geheime_vraag'];
        $nieuw_wachtwoord = $data['nieuw_wachtwoord'];
        $nieuw_wachtwoordCONF = $data['nieuw_wachtwoordCONF'];

        // Input validation
        if (empty($username) || empty($geheime_vraag) || empty($antwoord_geheime_vraag) || empty($nieuw_wachtwoord) || empty($nieuw_wachtwoordCONF)) {
            die("Alle velden zijn verplicht.");
        }

        if ($nieuw_wachtwoord !== $nieuw_wachtwoordCONF) {
            die("De nieuwe wachtwoorden komen niet overeen.");
        }

        // Check if the user exists and the geheime vraag matches
        $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = ? AND geheime_vraag = ?");
        $stmt->bind_param('ss', $username, $geheime_vraag);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user) {
            // Verify the hashed secret answer
            if (password_verify($antwoord_geheime_vraag, $user['antwoord_geheime_vraag'])) {
                // Hash the new password before storing it
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

        $conn->close();
    }
}

function login($data) {
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gebruikersnaam = $_POST['username'];
        $password = $_POST['password'];
        // flush();
$conn = new mysqli('localhost', 'root', '', 'pixelplayground');
        // Database connectie
        // include_once './lib/db.php';

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
                
            // die(var_dump($));
                 // Make sure session is started
                $_SESSION['gebruikersnaam'] = $gebruikersnaam;
                $_SESSION['gebruiker_id'] = $user['id'];

                 // Hier gebruiker_id instellen vanuit de database
                // exit(header("Location: index1.php")); // Ensure script stops executing after the redirect
                return true;
            } else {
                echo "Verkeerd wachtwoord. Probeer het opnieuw.";
            }
        } else {
            echo "Gebruikersnaam niet gevonden. Probeer het opnieuw.";
        }

        $stmt->close();
    // }
}

function register($data){
    if(isset($data['username']) && isset($data['password']) && isset($data['secret_question']) && isset($data['secret_answer'])){
        $gebruikersnaam = $data['username'];
        $password = $data['password'];
        $secretQuestion = $data['secret_question'];
        $secretAnswer = $data['secret_answer'];

        // Hash het wachtwoord en de antwoord van de geheime vraag
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $hashedSecretAnswer = password_hash($secretAnswer, PASSWORD_DEFAULT);

        // Connectie maken met de db
        require_once 'lib/db.php';

        // Query om de gebruiker toe te voegen
        $sql = $conn->prepare("INSERT INTO gebruikers (gebruikersnaam, wachtwoord, geheime_vraag, antwoord_geheime_vraag) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $gebruikersnaam, $hashedPassword, $secretQuestion, $hashedSecretAnswer);

        if($sql->execute()){
            header('Location: login2.php');
        } else {
            echo "<div class='conclusie'>Er is iets fout gegaan: " . $conn->error . "</div>";
        }

        $sql->close();
        $conn->close();
    }
}
?>

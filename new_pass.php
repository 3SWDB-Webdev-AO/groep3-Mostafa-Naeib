<?php

require_once 'lib/db.php';

// wachtwoordVergeten($_POST);


if(!isset($_SESSION['gebruikersnaam'])) {
    header('Location: login2.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $geheime_vraag = $_POST['geheime_vraag'];
    $antwoord_geheime_vraag = $_POST['antwoord_geheime_vraag'];
    $nieuw_wachtwoord = $_POST['nieuw_wachtwoord'];
    $nieuw_wachtwoordCONF = $_POST['nieuw_wachtwoordCONF'];

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
?>

<main>
    <section class="formww">
        <h1>Reset je wachtwoord</h1>
        <form method="post" action="">
            <label for="username">Gebruikersnaam:</label><br>
            <input class="input" type="text" id="username" name="username" required><br>
            <label for="geheime_vraag">Geheime Vraag:</label><br>
            <input class="input" type="text" id="geheime_vraag" name="geheime_vraag" required><br>
            <label for="antwoord_geheime_vraag">Antwoord op Geheime Vraag:</label><br>
            <input class="input" type="text" id="antwoord_geheime_vraag" name="antwoord_geheime_vraag" required><br>
            <label for="nieuw_wachtwoord">Nieuw wachtwoord:</label><br>
            <input class="input" type="password" id="nieuw_wachtwoord" name="nieuw_wachtwoord" required><br>
            <label for="nieuw_wachtwoordCONF">Nieuw wachtwoord bevestigen:</label><br>
            <input class="input" type="password" id="nieuw_wachtwoordCONF" name="nieuw_wachtwoordCONF" required><br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </section>
</main>
<?php include 'lib/footer.php'; ?>
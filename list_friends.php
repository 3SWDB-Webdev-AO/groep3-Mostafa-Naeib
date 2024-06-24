<?php
include 'lib/db.php';

$gebruiker_id = isset($_GET['gebruiker_id']) ? (int)$_GET['gebruiker_id'] : 0; // ID of the user whose friends we want to display

if ($gebruiker_id == 0) {
    die("Invalid user ID");
}

$sql = "SELECT gebruikers.id, gebruikers.gebruikersnaam FROM vrienden
        JOIN gebruikers ON vrienden.vriend_id = gebruikers.id
        WHERE vrienden.gebruiker_id = ? AND vrienden.status = 'accepted'";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $gebruiker_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Friends List</h2>";
echo "<ul>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['gebruikersnaam']) . "</li>";
    }
} else {
    echo "<li>No friends found</li>";
}

echo "</ul>";

$stmt->close();
$conn->close();
?>

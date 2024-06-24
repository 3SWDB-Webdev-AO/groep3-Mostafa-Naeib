<?php include 'lib/header.php'; ?>
<?php
include 'lib/db.php';

$gebruiker_id = $_POST['gebruiker_id']; // ID of the user sending the request
$vriend_id = $_POST['vriend_id']; // ID of the user receiving the request

$sql = "INSERT INTO vrienden (gebruiker_id, vriend_id, status) VALUES (?, ?, 'pending')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $gebruiker_id, $vriend_id);

if ($stmt->execute()) {
    echo "Friend request sent.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

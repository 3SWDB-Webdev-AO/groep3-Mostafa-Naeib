<?php include 'lib/header.php'; ?>

<?php
include 'lib/db.php';

// Check if POST data is set
if (isset($_POST['gebruiker_id']) && isset($_POST['vriend_id'])) {
    $gebruiker_id = $_POST['gebruiker_id']; // ID of the user who sent the request
    $vriend_id = $_POST['vriend_id']; // ID of the user accepting the request

    // Prepare the SQL statement
    $sql = "UPDATE vrienden SET status='accepted' WHERE gebruiker_id=? AND vriend_id=?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ii", $gebruiker_id, $vriend_id);

    if ($stmt->execute()) {
        echo "Friend request accepted.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid input.";
}

$conn->close();
?>

<?php include 'lib/footer.php'; ?>

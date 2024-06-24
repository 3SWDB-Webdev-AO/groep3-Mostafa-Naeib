<?php include 'lib/header.php'; ?>
<body>
    <h2>Add Friend</h2>
    <form action="add_friend.php" method="POST">
        <label for="gebruiker_id">Your User ID:</label>
        <input type="text" id="gebruiker_id" name="gebruiker_id">
        <label for="vriend_id">Friend's User ID:</label>
        <input type="text" id="vriend_id" name="vriend_id">
        <input type="submit" value="Add Friend">
    </form>

    <h2>Accept Friend Request</h2>
    <form action="accept_friend.php" method="POST">
        <label for="gebruiker_id">Friend's User ID (who sent the request):</label>
        <input type="text" id="gebruiker_id" name="gebruiker_id">
        <label for="vriend_id">Your User ID:</label>
        <input type="text" id="vriend_id" name="vriend_id">
        <input type="submit" value="Accept Friend">
    </form>

    <h2>Friends List</h2>
    <form action="list_friends.php" method="GET">
        <label for="gebruiker_id">Your User ID:</label>
        <input type="text" id="gebruiker_id" name="gebruiker_id">
        <input type="submit" value="Show Friends">
    </form>
</body>
</html>

</main>
<?php include 'lib/footer.php'; ?>

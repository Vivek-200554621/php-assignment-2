<!-- User Dashboard -->
<h2>Welcome, User!</h2>

<!-- CRUD operations for regular users -->
<form action="create.php" method="post">
    <!-- Create form fields -->
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <button type="submit">Create</button>
</form>

<!-- Display existing items for read-only -->
<ul>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>{$row['name']} - {$row['description']}</li>";
    }
    ?>
</ul>

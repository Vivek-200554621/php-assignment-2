<!-- Admin Dashboard -->
<h2>Welcome, Admin!</h2>

<!-- CRUD operations for admin -->
<form action="create.php" method="post">
    <!-- Create form fields -->
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <label for="image">Image:</label>
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Create</button>
</form>

<!-- Display existing items with update and delete links -->
<ul>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>{$row['name']} - {$row['description']} 
                <a href='update.php?id={$row['id']}'>Update</a>
                <a href='delete.php?id={$row['id']}'>Delete</a></li>";
    }
    ?>
</ul>

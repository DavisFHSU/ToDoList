<?php
require('database.php');
$query = 'SELECT *
          FROM todoitems';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My To Do List</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>From List Manager</h1></header>

    <main>
        <h1>Add Item</h1>
        <form action="add_item.php" method="post"
              id="add_item_form">
            
            <label>Title:</label>
            <input type="text" name="title"><br>

            <label>Description:</label>
            <input type="text" name="description"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Item"><br>
        </form>
        <p><a href="index.php">View To Do List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My To Do List, Inc.</p>
    </footer>
</body>
</html>
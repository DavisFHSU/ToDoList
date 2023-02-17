<?php
require_once('database.php');


// Get items 
$query = 'SELECT * FROM todoitems
                  ORDER BY ItemNum';
$statement = $db->prepare($query);
$statement->execute();
$items = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My To Do List</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>To Do List</h1></header>
<main>
    
    <section>
        <!-- display a table -->
        <br>
        <br>
            <table>
            <tr>
                <th>Title</th>
                <th>Decription</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?php echo $item['Title']; ?></td>
                <td><?php echo $item['Description']; ?></td>
                <td><form action="delete_item.php" method="post">
                    <input type="hidden" name="item_id"
                           value="<?php echo $item['ItemNum']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_item_form.php">Add Item</a></p>
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> My To Do List, Inc.</p>
</footer>
</body>
</html>
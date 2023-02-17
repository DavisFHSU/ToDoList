<?php
require_once('database.php');

// Get IDs
$item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);

// Delete a to do item from the database
if ($item_id != false) {
    $query = 'DELETE FROM todoitems
              WHERE ItemNum = :item_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_id', $item_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the To DO List page
include('index.php');
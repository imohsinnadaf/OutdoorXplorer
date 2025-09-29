<?php
include('includes/config.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the user from the database
    $sql = "DELETE FROM tblusers WHERE id = :id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    // Redirect to the page after deletion
    header('Location: manage-users.php');
    exit();
} else {
    // Redirect if the user ID is not provided or not numeric
    header('Location: manage-users.php');
    exit();
}
?>

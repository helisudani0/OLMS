<?php
include 'db.php';

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO books (title, author, category, quantity) VALUES ('$title','$author','$category','$quantity')";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Add New Book</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Book Title" required>
    <input type="text" name="author" placeholder="Author Name" required>
    <input type="text" name="category" placeholder="Category" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <input type="submit" name="submit" value="Add Book">
</form>

<div style="text-align:center;">
    <a href="index.php" class="add-book" style="background-color:#0b47b3;">Back to Library</a>
</div>
</body>
</html>

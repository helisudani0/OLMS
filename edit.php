<?php
include 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE books SET title='$title', author='$author', category='$category', quantity='$quantity' WHERE id=$id";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Edit Book</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
    <input type="text" name="author" value="<?php echo $row['author']; ?>" required>
    <input type="text" name="category" value="<?php echo $row['category']; ?>" required>
    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required>
    <input type="submit" name="update" value="Update Book">
</form>

<div style="text-align:center;">
    <a href="index.php" class="add-book" style="background-color:#0b47b3;">Back to Library</a>
</div>
</body>
</html>

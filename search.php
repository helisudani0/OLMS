<?php
include 'db.php';
$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM books";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Search Library</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Enter Title or Author" value="<?php echo $search; ?>">
    <input type="submit" value="Search">
</form>

<div style="text-align:center; margin-bottom:20px;">
    <a href="index.php" class="add-book" style="background-color:#0b47b3;">Back to Library</a>
</div>

<table>
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Quantity</th>
    <th>Actions</th>
</tr>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["title"]."</td>
            <td>".$row["author"]."</td>
            <td>".$row["category"]."</td>
            <td>".$row["quantity"]."</td>
            <td>
                <a href='edit.php?id=".$row["id"]."'>Edit</a> | 
                <a href='delete.php?id=".$row["id"]."'>Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No books found</td></tr>";
}
?>
</table>
</body>
</html>

<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Library Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Library Book Records</h2>

<div style="text-align:center; margin-bottom:20px;">
    <a href="add.php" class="add-book">Add New Book</a>
    <a href="search.php" class="add-book" style="background-color:#0b47b3;">Search Books</a>
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
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
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

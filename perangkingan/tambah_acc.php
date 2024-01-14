<?php

$id=$_GET['id'];

$sql = "INSERT INTO acc VALUES (Null, '$id')";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=acc");
}
$conn->close();
?>
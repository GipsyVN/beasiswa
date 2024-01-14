<?php

$id=$_GET['id'];

$sql = "DELETE FROM acc WHERE idacc='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=acc");
}
$conn->close();
?>
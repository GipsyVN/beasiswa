<?php

$id=$_GET['id'];

$sql = "DELETE FROM mahasiswa WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=mahasiswa");
}
$conn->close();
?>
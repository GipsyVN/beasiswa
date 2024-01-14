<?php
$sql = "DELETE FROM acc";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=acc");
}
$conn->close();
?>
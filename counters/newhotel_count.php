<?php 
    include './db.php';
    $sql = "SELECT * FROM hotel";
    $query = $connection->query($sql);

    echo "$query->num_rows";

?>
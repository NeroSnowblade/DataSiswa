<?php
    include "lib/library.php";

    $nis            = $_GET["nis"];

    if(empty($nis)) header("location: index.php");
    
    $sql    = "DELETE FROM siswa WHERE nis = '$nis'";
    
    if($mysqli->query($sql))
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
    
    $query  = $mysqli->query($sql) or die ($mysqli->error);

    include "views/v_index.php";
?>
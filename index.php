<?php
    include "lib/library.php";
    $success    = flash('success');
    $error      = flash('error');
    LoginCheck();

    // Read Data
    $sql    = "SELECT * FROM siswa INNER JOIN kelas ON (siswa.id_kelas = kelas.id_kelas)";
    
    // Search Data
    $search = @$_GET["search"];
    $tipe   = @$_GET["tipe"];
    
    if (!empty($search) && $tipe == "") $sql .= " WHERE nama_lengkap LIKE '%$search%'";
    else if(!empty($search)) $sql .= " WHERE $tipe LIKE '%$search%'";
    
    // Sort Data
    $field  = @$_GET['sort'];
    $mode   = @$_GET['order'];

    function sorter($field,$mod)
    {
        $opt = "index.php?sort=$field&order=$mod";
        return $opt;
    }

    if(!empty($field) && !empty($mode)) $sql .= " ORDER BY $field $mode";
    
    $list   = $mysqli->query($sql);

    include "views/v_index.php";
?>
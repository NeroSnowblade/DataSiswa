<?php
    include "lib/library.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $nis            = $_POST["nis"];
        $nama_lengkap   = $_POST["nama_lengkap"];
        $jenis_kelamin  = $_POST["jenis_kelamin"];
        $golongan_darah = $_POST["golongan_darah"];
        $kelas          = $_POST["kelas"];
        $jurusan        = $_POST["jurusan"];
        $rombel         = $_POST["rombel"];
        $alamat         = $_POST["alamat"];
        $nama_ibu       = $_POST["nama_ibu"];
        $file           = $_POST["foto"];
        $foto           = $_FILES["foto"];
        $id_kelas       = $kelas.$jurusan.$rombel;

        //User Upload Foto?
        if(!empty($foto) && $foto["error"] == 0)
        {
            $path   = "./assets/img/";
            $upload = move_uploaded_file($foto["tmp_name"], $path . $foto["name"]);

            if(!$upload)
            {
                flash("error", "Failed to Upload File");
                header("location: index.php");
            }

            $file = $foto["name"];
        }
        
        $sql            =  "UPDATE `siswa` SET
                            nis             = '$nis',
                            nama_lengkap    = '$nama_lengkap',
                            jenis_kelamin   = '$jenis_kelamin',
                            id_kelas        = '$id_kelas',
                            alamat          = '$alamat',
                            golongan_darah  = '$golongan_darah',
                            nama_ibu        = '$nama_ibu',
                            file            = '$file' WHERE nis = '$nis'";

        $mysqli->query($sql) or die ($mysqli->error);

        header("location: index.php");
    }

    $nis = $_GET["nis"];

    if(empty($nis)) header("location: index.php");

    $sql    = "SELECT * FROM siswa WHERE nis = '$nis'";
    $query  = $mysqli->query($sql);
    $siswa  = $query->fetch_array();

    if(empty($siswa)) header("location: index.php");

    include "views/v_tambah.php";
?>
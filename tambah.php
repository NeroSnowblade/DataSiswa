<?php
    include "lib/library.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $nis            = @$_POST["nis"];
        $nama_lengkap   = @$_POST["nama_lengkap"];
        $jenis_kelamin  = @$_POST["jenis_kelamin"];
        $golongan_darah = @$_POST["golongan_darah"];
        $kelas          = @$_POST["kelas"];
        $jurusan        = @$_POST["jurusan"];
        $rombel         = @$_POST["rombel"];
        $alamat         = @$_POST["alamat"];
        $nama_ibu       = @$_POST["nama_ibu"];
        $foto           = @$_FILES["foto"];
        $id_kelas       = $kelas.$jurusan.$rombel;
        
        if(empty($nis))
        {
            flash("error","Kolom <b>NIS</b> masih kosong...");
        }
        else if(empty($nama_lengkap))
        {
            flash("error","Kolom <b>Nama Lengkap</b> masih kosong...");
        }
        else
        {
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
    
            $sql    =  "INSERT INTO siswa(nis,nama_lengkap,jenis_kelamin,id_kelas,alamat,golongan_darah,nama_ibu,file)
                        VALUES('$nis','$nama_lengkap','$jenis_kelamin','$id_kelas','$alamat','$golongan_darah','$nama_ibu','$file')";
    
            $mysqli->query($sql) or die ($mysqli->error);
            
            header("location: index.php");
        }
        $success = flash('success');
        $error = flash('error');
    }
    include "views/v_tambah.php";
?>
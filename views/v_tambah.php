<html>
    <head>
        <!-- FajarMustaqim XI-RPL 2 -->
        <title>Siswaku - Add Data</title>
        <link rel="stylesheet" type="text/css" href="v_tambah.css">
        <link rel="stylesheet" href="<?= base_url()?>/assets/plugin/Bootstrap 4.4.1/css/bootstrap.min.css">
        <script src="<?= base_url()?>/assets/plugin/jquery-3.4.1.min.js"></script>
        <script src="<?= base_url()?>/assets/plugin/Bootstrap 4.4.1/js/bootstrap.min.js"></script>
    </head>
<body>
    <?php
        $action = "tambah.php";
        if(!empty($siswa)) $action = "edit.php";
    ?>

    <?php if(!empty($success)) {?>
    <div class="alert alert-success">
        <p><?= $success ?></p>
    </div>
    <?php }?>
    
    <?php if(!empty($error)) {?>
    <div class="alert alert-danger">
        <p><?= $error ?></p>
    </div>
    <?php }?>
    
    <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td colspan="4"><input type="text" name="nis" value="<?= @$siswa["nis"] ?>" <?= $action == "edit.php" ? "readonly" : "" ?> ></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td colspan="4"><input type="text" name="nama_lengkap" value="<?= @$siswa["nama_lengkap"] ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td colspan="2"><input type="radio" name="jenis_kelamin" value="L" <?= @$siswa["jenis_kelamin"] == "L" ? "checked" : "" ?> >Laki Laki</td>
                <td colspan="2"><input type="radio" name="jenis_kelamin" value="P" <?= @$siswa["jenis_kelamin"] == "P" ? "checked" : "" ?>>Perempuan</td>
            </tr>
            <tr>
                <td>Golongan Darah</td>
                <td>:</td>
                <td><input type="radio" name="golongan_darah" value="A" <?= @$siswa["golongan_darah"] == "A" ? "checked" : "" ?> >A</td>
                <td><input type="radio" name="golongan_darah" value="B" <?= @$siswa["golongan_darah"] == "B" ? "checked" : "" ?> >B</td>
                <td><input type="radio" name="golongan_darah" value="AB" <?= @$siswa["golongan_darah"] == "AB" ? "checked" : "" ?> >AB</td>
                <td><input type="radio" name="golongan_darah" value="O" <?= @$siswa["golongan_darah"] == "O" ? "checked" : "" ?> >O</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td colspan="4">
                    <select name="kelas">
                        <option value="X" <?= @$siswa["kelas"] == "X" ? "selected" : "" ?> >X</option>
                        <option value="XI" <?= @$siswa["kelas"] == "XI" ? "selected" : "" ?> >XI</option>
                        <option value="XII" <?= @$siswa["kelas"] == "XII" ? "selected" : "" ?> >XII</option>
                        <option value="XIII" <?= @$siswa["kelas"] == "XIII" ? "selected" : "" ?> >XIII</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td colspan="4">
                    <select name="jurusan">
                        <option value="AV" <?= @$siswa["jurusan"] == "Audio Video" ? "selected" : "" ?> >Audio Video</option>
                        <option value="TOI" <?= @$siswa["jurusan"] == "Teknik Otomasi Industri" ? "selected" : "" ?> >Teknik Otomasi Industri</option>
                        <option value="TITL" <?= @$siswa["jurusan"] == "Teknik Instalasi Tenaga Listrik" ? "selected" : "" ?> >Teknik Instalasi Tenaga Listrik</option>
                        <option value="RPL" <?= @$siswa["jurusan"] == "Rekayasa Perangkat Lunak" ? "selected" : "" ?> >Rekayasa Perangkat Lunak</option>
                        <option value="TKJ" <?= @$siswa["jurusan"] == "Teknik Komputer Jaringan" ? "selected" : "" ?> >Teknik Komputer Jaringan</option>
                        <option value="MM" <?= @$siswa["jurusan"] == "Multimedia" ? "selected" : "" ?> >Multimedia</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Rombel</td>
                <td>:</td>
                <td colspan="4">
                    <select name="rombel">
                        <option value="1" <?= @$siswa["rombel"] == "1" ? "selected" : "" ?> >1</option>
                        <option value="2" <?= @$siswa["rombel"] == "2" ? "selected" : "" ?> >2</option>
                        <option value="3" <?= @$siswa["rombel"] == "3" ? "selected" : "" ?> >3</option>
                        <option value="4" <?= @$siswa["rombel"] == "4" ? "selected" : "" ?> >4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td colspan="4"><input type="text" name="alamat" value="<?= @$siswa["alamat"] ?>"></td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td>:</td>
                <td colspan="4"><input type="text" name="nama_ibu" value="<?= @$siswa["nama_ibu"] ?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td colspan="4">
                    <?php if($action == "edit.php") { ?>
                        <img src="<?= base_url()?>/assets/img/<?= @$siswa["file"]?>" width ="80px" alt="<?= @$siswa["file"]?>">
                        <input type="hidden" name="foto" value="<?= @$siswa["file"]?>">
                    <?php } ?>
                    <input type="file" name="foto">
                </td>
            </tr>
            <tr colspan="4">
                <td>
                    <input type="submit" value="<?= @$action == "tambah.php" ? "SUBMIT" : "EDIT" ?>">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<html>
    <head>
        <!-- FajarMustaqim XI-RPL 2 -->
        <title>Siswaku - Index</title>
        <link rel="stylesheet" type="text/css" href="assets/css/v_index.css">
        <link rel="stylesheet" href="<?= base_url()?>/assets/plugin/Bootstrap 4.4.1/css/bootstrap.min.css">
        <script src="<?= base_url()?>/assets/plugin/jquery-3.4.1.min.js"></script>
        <script src="<?= base_url()?>/assets/plugin/Bootstrap 4.4.1/js/bootstrap.min.js"></script>
    </head>
<body>
    <div id="body">
    <table>
    <tr>
        <td id="t1a">
            <form action="index.php" method="GET">
                <a href="tambah.php">Add Data</a>&emsp;
                <input type="text" name="search" value="<?= @$search ?>" placeholder="Search Data...">&emsp;
                Search by :
                <select name="tipe">
                <option value="" <?= @$tipe == "" ? "selected" : "" ?> >Select</option>
                <option value="nis" <?= @$tipe == "nis" ? "selected" : "" ?> >NIS</option>
                <option value="nama_lengkap" <?= @$tipe == "nama_lengkap" ? "selected" : "" ?> >Nama Lengkap</option>
                <option value="jenis_kelamin" <?= @$tipe == "jenis_kelamin" ? "selected" : "" ?> >Jenis Kelamin</option>
                <option value="golongan_darah" <?= @$tipe == "golongan_darah" ? "selected" : "" ?> >Golongan Darah</option>
                <option value="nama_kelas" <?= @$tipe == "nama_kelas" ? "selected" : "" ?> >Kelas</option>
                <option value="alamat" <?= @$tipe == "alamat" ? "selected" : "" ?> >Alamat</option>
                <option value="nama_ibu" <?= @$tipe == "nama_ibu" ? "selected" : "" ?> >Nama Ibu</option>
                </select>
                <button type="submit">Search</button>
                &emsp;<a href="index.php">Reset Filter</a>
            </form>
        </td>
        <td id="t1b">
            <form action="logout.php"><button type="submit">Logout</button></form>
        </td>
    </tr>
    </table>

    <table>
    <!-- Header & Sorter -->
    <tr>
        <th>#</th>
        <th>Foto</th>
        <th>NIS</th>
        <th>
            <a href="<?=@$mode == "desc" || "" ? sorter("nis","asc") : sorter("nis","desc") ?>"><?= @$mode == "asc" && $field == "nis" ? "▼" : "▲"?></a>
        </th>
        <th>Nama Lengkap</th>
        <th>
            <a href="<?=@$mode == "desc" || "" ? sorter("nama_lengkap","asc") : sorter("nama_lengkap","desc") ?>"><?= @$mode == "asc" && $field == "nama_lengkap" ? "▼" : "▲"?></a>
        </th>
        <th>Jenis Kelamin</th>
        <th>
            <a href="<?=@$mode == "desc" || "" ? sorter("jenis_kelamin","asc") : sorter("jenis_kelamin","desc") ?>"><?= @$mode == "asc" && $field == "jenis_kelamin" ? "▼" : "▲"?></a>
        </th>
        <th>Golongan Darah</th>
        <th>
            <a href="<?=@$mode == "desc" || "" ? sorter("golongan_darah","asc") : sorter("golongan_darah","desc") ?>"><?= @$mode == "asc" && $field == "golongan_darah" ? "▼" : "▲"?></a>
        </th>
        <th>Kelas</th>
        <th>
            <a href="<?=@$mode == "desc" || "" ? sorter("id_kelas","asc") : sorter("id_kelas","desc") ?>"><?= @$mode == "asc" && $field == "kelas" ? "▼" : "▲"?></a>
        </th>
        <th>Alamat</th>
        <th>
            <a href="<?=@$mode == "desc" || "" ? sorter("alamat","asc") : sorter("alamat","desc") ?>"><?= @$mode == "asc" && $field == "alamat" ? "▼" : "▲"?></a>
        </th>
        <th>Nama Ibu</th>
        <th>
            <a href="<?=@$mode == "desc" || "" ? sorter("nama_ibu","asc") : sorter("nama_ibu","desc") ?>"><?= @$mode == "asc" && $field == "nama_ibu" ? "▼" : "▲"?></a>
        </th>
        <th colspan="2">Aksi</th>
    </tr>
    
    <!-- Toast Dialog -->
    <div aria-live="polite" aria-atomic="true" style="position: relative;">
        <!-- Position it -->
        <div style="position: absolute; top: 0; right: 0;">
        <!-- Then put toasts within -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div class="toast-header">
                    <strong class="mr-auto"></strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body"></div>
            </div>
        </div>
    </div>

    <?php
        $i = 1;
        while($siswa = $list->fetch_array())
        {
    ?>
    <!-- Table Body -->
    <tr>
            <td><?= $i++ ?></td>
            <td><img src="<?= base_url()?>/assets/img/<?= $siswa["file"]?>" width="80px" alt="<?= $siswa["file"]?>"></td>
            <td colspan="2"><?= $siswa["nis"] ?></td>
            <td colspan="2"><?= $siswa["nama_lengkap"] ?></td>
            <td colspan="2"><?= $siswa["jenis_kelamin"] ?></td>
            <td colspan="2"><?= $siswa["golongan_darah"] ?></td>
            <td colspan="2"><?= $siswa["nama_kelas"] ?></td>
            <td colspan="2"><?= $siswa["alamat"] ?></td>
            <td colspan="2"><?= $siswa["nama_ibu"] ?></td>
            <td><a href="edit.php?nis=<?= $siswa["nis"] ?>">Edit</a></td>
            <td><a href="delete.php?nis=<?= $siswa["nis"] ?>" class="btnDelete">Delete</a></td>
    </tr>
    <?php } ?>
    </table>

    <!-- Modal Dialog -->
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger yes">Yes</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Script Showing the Modal and Toast -->
    <script type="text/javascript">
        $(function()
            {
                $(".btnDelete").on("click", function(e)
                {
                    // Membatalkan Aksi Default sebelumnya (Tombol Delete yang seharusnya ke Delete.php)
                    e.preventDefault();

                    var nama = $(this).parent().parent().children()[3];
                    nama = $(nama).html();

                    var tr = $(this).parent().parent();

                    $(".modal").modal("show");
                    $(".modal-title").html("Confirmation");
                    $(".modal-body").html("Are you sure want to delete <b>" + nama + "'s</b> Data?");
                    
                    var href = $(this).attr("href");

                    $(".yes").off();
                    $(".yes").on("click", function()
                    {
                        console.log(href);
                        // jQuery Slim doesn't Include the Ajax Function
                        $.ajax(
                        { 
                            "url": href,
                            "type": "POST",
                            "success": function()
                            {
                                $(".modal").modal("hide");
                                tr.fadeOut();

                                $('.toast').toast('show');
                                $('.mr-auto').html('Delete Report');
                                $('.toast-body').html("<b>"+ nama + "'s</b> Data Successfully Deleted");
                            }
                        });
                    }
                    );
                }
                );
            }
        );
    </script>
    </div>
</body>
</html>
<?php
    include 'header_dashboard.php';

    include 'connection.php';

    $cari;
    $query="SELECT * FROM peminjaman_masuk;"; //query vendor
    $result=mysql_query($query,$conn);
?>


<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                This is some text within a card body.
                            </div>
                        </div>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. Peminjaman</th>
                                    <th>Instansi</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tgl Ambil</th>
                                    <th>Tgl Keluar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0;
                                while ($row1=mysql_fetch_array($result)){
                                    $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row1["id_peminjaman_masuk"]; ?></td>
                                    <td><?php echo $row1["nama_instansi"]; ?></td>
                                    <td><?php echo $row1["nama_kegiatan"]; ?></td>
                                    <td><?php echo $row1["tgl_ambil"]; ?></td>
                                    <td><?php echo $row1["tgl_kembali"]; ?></td>
                                    <td><?php echo $row1["status"]; ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php
    include 'footer_dashboard.php';
?>

    
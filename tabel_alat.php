<?php 
    include 'connection.php';

    $cari;
    $query="SELECT * FROM alat;"; //query vendor

    if(isset($_GET["search"])){
        $cari=$_GET["text_search"];
        $query="SELECT * FROM alat WHERE `nama_instansi` LIKE '%$cari%' OR `id_alat` LIKE '%$cari%' OR `merk` LIKE '%$cari%' OR `type` LIKE '%$cari%' OR `id_kat` LIKE '%$cari%' OR `tgl_masuk` LIKE '%$cari%' OR `tgl_keluar` LIKE '%$cari%' OR `id_user` LIKE '%$cari%';";
    }

    // $per_hal=6;
    // $jumlah_record=mysql_query($queryProduct);
    // $jum=mysql_result($jumlah_record, 0);
    // $halaman=ceil($jum / $per_hal);
    // $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    // $start = ($page - 1) * $per_hal;
    // $queryProduct = $queryProduct." limit $start, $per_hal ";
    
    
    $result=mysql_query($query,$conn);

?>
<html>
    <?php
        include 'header_admin.php';
    ?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tabel Alat</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard_admin.php">Dashboard</a></li>
                                    <li><a href="#">Tabel</a></li>
                                    <li class="active">Tabel Alat</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Tabel</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Merk</th>
                                            <th>Tipe</th>
                                            <th>Kategori</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tgl Keluar</th>
                                            <th>User</th>
                                            <th>ACTION</th>
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
                                            <td><?php echo $row1["id_alat"]; ?></td>
                                            <td><?php echo $row1["merk"]; ?></td>
                                            <td><?php echo $row1["type"]; ?></td>
                                            <td><?php echo $row1["id_kat"]; ?></td>
                                            <td><?php echo $row1["tgl_masuk"]; ?></td>
                                            <td><?php echo $row1["tgl_keluar"]; ?></td>
                                            <td><?php echo $row1["id_user"]; ?></td>
                                            <td> 
                                            <div class="btn btn-outline-primary btn-sm"><a  href="form_alat.php?edit=true&id_alat=<?php echo $row1["id_alat"];?>"> <i class="fas fa-book-open fa-2x"></i> </a></div>
                                                <div class="btn btn-outline-primary btn-sm"><a  href="form_alat.php?edit=true&id_alat=<?php echo $row1["id_alat"];?>"> <i class='fa fa-pencil fa-2x'> </i> </a></div>
                                                <div class="btn btn-outline-danger btn-sm"><a  href="alat_delete.php?id_alat=<?php echo $row1["id_alat"];?>"> <i class='fa fa-trash-o fa-2x'> </i> </a></div>
                                            </td>
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


        <div class="clearfix"></div>

        <?php
            include 'footer_admin.php'
        ?>

</body>
</html>

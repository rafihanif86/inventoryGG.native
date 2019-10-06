<?php 
	include "connection.php";

    $conn = mysql_connect("localhost", "root", "") or die ("koneksi database gagal");
    mysql_select_db("inventorygg") or die ("database tidak ada");

    $merk = $type = $id_kat = $tgl_masuk = $tgl_keluar = $id_user =null;
    
    if(isset($_GET['edit']) and isset($_GET['id_alat'])){
        $edit=$_GET['edit'];
        $id_alat = $_GET['id_alat'];
        $result=mysql_query("SELECT * FROM alat;");
        while ($row1=mysql_fetch_array($result)){
            $merk = $row1["merk"];
            $type = $row1["type"];
            $id_kat = $row1["id_kat"];
            $tgl_masuk= $row1["tgl_masuk"];
            $tgl_keluar= $row1["tgl_keluar"];
            $id_user= $row1["id_user"];
        }
    }

    if(isset($_POST["submit"])){
        $merk = $_POST["merk"];
        $type = $_POST["type"];
        $id_kat = $_POST["id_kat"];
        $tgl_masuk= $_POST["tgl_masuk"];
        $tgl_keluar= $_POST["tgl_keluar"];
        $id_user= $_POST["id_user"];       
        $edit=$_POST['edit'];

        if($edit != true){
            if(($id_alat) != null){
                $query1="INSERT INTO alat (merk,type,id_kat,tgl_masuk,tgl_keluar,id_user) VALUES ('".$merk."','".$type."','".$id_kat."','".$tgl_masuk."','".$tgl_keluar."','".$id_user."');";
                $sql_insert1 = mysql_query($query1,$conn);
            }else{
                echo "<script>alert('Ada data yang kosong')</script>";
            }
    
            // $result=mysql_query("SELECT * FROM alat WHERE Id_Customer LIKE '%$id_customer%'");
            // while ($row=mysql_fetch_array($result)){
            //     $id_customer = $row["Id_Customer"];
            // }
            // if($idLogin != null){
            //     $query2="INSERT INTO vendor (Id_Login, Nama_vendor, Alamat_Vendor, Telp_Vendor, Email_vendor,Id_Admin,Instagram) VALUES ('".$id_login."','".$name."','".$alamat."','".$telp."','".$email."','".$id_admin."','".$ig."');";
            //     $sql_insert2 = mysql_query($query2,$conn);
            // }
        }else{
            $query1="UPDATE login set Username = '$user',Password = '$password', Email_login = '$email', Status = '$tgl_masuk' where Id_login = $id_login;";
            $sql_insert1 = mysql_query($query1,$conn);

            $query2="UPDATE vendor set Id_Login = '$id_login', Nama_Vendor = '$name', Alamat_Vendor = '$alamat', Telp_Vendor = '$telp', Email_vendor = '$email', Id_Admin = '$id_admin', Instagram = '$ig' where Id_Vendor = $id_vendor;";
            $sql_insert2 = mysql_query($query2,$conn);
        }


        if($sql_insert1 and $sql_insert2){
            $ekstensi_diperbolehkan	= array('png','jpg');
            $nama = $_FILES['image']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran	= $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
        
                move_uploaded_file($file_tmp, 'images/'.$nama);
                $query = mysql_query("UPDATE vendor SET Image_vendor = '$nama' where Email_vendor Like '%$email%'",$conn);
                if($query){
                    echo "<script>alert('Berhasil Mengupload Gambar')</script>";
                }else{
                    echo "<script>alert('Gagal Mengupload Gambar')</script>";
                }

        
            echo "<script>alert('Berhasil Membuat Akun')
                location.replace('vendor_tampildata.php?search=true&text_search=$email')</script>";
        }else{
            echo "<script>alert('Gagal Membuat Akun')</script>";
        }
    }

    if(isset($_POST["reset"])){
        $merk = $type = $id_kat = $tgl_masuk = $tgl_keluar = $id_user = null;
    }

    

?>
<SCRIPT LANGUAGE="JavaScript">
    if($id_vendor=null){
        document.frm.id1.hidden = "hidden";
        document.frm.id2.hidden = "hidden";
    }else{
        document.frm.id1.hidden = "";
        document.frm.id1.hidden = "";
    }
<!-- 	
function controlCK(str) {	
	document.frm.submit.disabled = !str;
}
//  End -->
</script>
<?php
        include 'header_admin.php';
    ?>
<body>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Form Alat</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard_admin.php">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Form Alat</li>
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
                    <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Isikan Data Alat</strong>
                                </div>
                                <div class="card-body card-block">
                                <form action="tabel_alat.php" method="post" name="frm" enctype="multipart/form-data" class="form-horizontal">
                                        
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Merk Alat</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="merk" placeholder="Merk Alat" class="form-control" value="<?php echo $merk; ?>"><small class="form-text text-muted">Masukkan Merk Alat</small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Tipe Alat</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="type" placeholder="type" class="form-control" value="<?php echo $type; ?>"><small class="form-text text-muted">Masukkan Tipe Alat</small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Kategori</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="id_kat" placeholder="Nama Kegiatan" class="form-control" value="<?php echo  $id_kat; ?>"><small class="help-block form-text">Masukkan Nama Kegiatan</small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Masuk</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="tgl_masuk" placeholder="Tanggal Masuk" class="form-control" value="<?php echo $tgl_masuk; ?>"><small class="help-block form-text">Masukkan Tanggal Masuk</small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Keluar</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="tgl_keluar" placeholder="Tanggal Keluar" class="form-control" value="<?php echo $tgl_masuk; ?>"><small class="help-block form-text">Masukkan Tanggal Keluar</small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id User</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="id_user" placeholder="Id User" class="form-control" value="<?php echo $tgl_masuk; ?>"><small class="help-block form-text">Masukkan ID User</small></div>
                                        </div>
                                            
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm" name="reset">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
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

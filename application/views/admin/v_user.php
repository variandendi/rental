<?php 
    $query=$this->db->query("SELECT * FROM dt_pesan WHERE status_pesan='1'");
    $jum_pesan=$query->num_rows();
    $query1=$this->db->query("SELECT * FROM dt_komentar WHERE status_komentar='0'");
    $jum_komentar=$query1->num_rows();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modish - Open Source Admin Dashboard Template</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/admin/assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/admin/assets/css/core.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/admin/assets/css/components.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/admin/assets/icons/fontawesome/styles.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/admin/lib/css/chartist.min.css'?>">

    <script type="text/javascript" src="<?php echo base_url().'assets/admin/lib/js/jquery.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/admin/lib/js/tether.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/admin/lib/js/bootstrap.min.js'?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'assets/admin/lib/js/chartist.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/admin/assets/js/app.min.js'?>"></script>
    <script type="text/javascript"></script>
</head>
<body>
    <?php $this->load->view('admin/v_header');?>
    <div class="page-container">
        <div class="page-content">
            <!-- inject:SIDEBAR -->

            <div id="sidebar-main" class="sidebar sidebar-default">
    <div class="sidebar-content">
        <ul class="navigation">
            <li class="navigation-header">
                <span>Main</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="navigation-header">
                <span>Pages</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="index.html"><i class="fa fa-file-o"></i> <span>Pages</span></a>
                <ul>
                    <li><a href="<?php echo base_url().'admin/berita/add_berita'?>">Tambah Berita</a></li>
                    <li><a href="<?php echo base_url().'admin/berita'?>">List Berita</a></li>
                    <li><a href="<?php echo base_url().'admin/kategori'?>">Kategori Berita</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url().'admin/user'?>"><i class="fa fa-file-o"></i> <span>User</span></a>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-file-o"></i> <span>Gallery</span></a>
                <ul>
                    <li><a href="<?php echo base_url().'admin/album'?>">Album</a></li>
                    <li><a href="<?php echo base_url().'admin/gallery'?>">Gallery</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url().'admin/pesan'?>"><i class="fa fa-file-o"></i> <span>Pesan</span></a>
            </li>
        </ul>
    </div>
</div>
 <!-- PAGE CONTENT -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-user-plus"></span> Add Pengguna</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Password</th>
                    <th>Kontak</th>
                    <th>Level</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data->result_array() as $i) :
                       $id=$i['id'];
                       $nama=$i['nama'];
                       $jenkel=$i['jenkel'];
                       $email=$i['email'];
                       $username=$i['username'];
                       $password=$i['password'];
                       $nohp=$i['nohp'];
                       $levelakses=$i['levelakses'];
                       $foto=$i['foto'];
                    ?>
                <tr>
                  <td><img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/gambar/'.$foto;?>"></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $email;?></td>
                  <?php if($jenkel=='L'):?>
                        <td>Laki-Laki</td>
                  <?php else:?>
                        <td>Perempuan</td>
                  <?php endif;?>
                  <td><?php echo $password;?></td>
                  <td><?php echo $nohp;?></td>
                  <?php if($levelakses=='1'):?>
                        <td>Administrator</td>
                  <?php else:?>
                        <td>Author</td>
                  <?php endif;?>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" href="<?php echo base_url().'admin/user/reset_password/'.$id;?>"><span class="fa fa-refresh"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/user/simpan_user'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                        <div class="col-sm-7">
                                            <input type="email" name="xemail" class="form-control" id="inputEmail3" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
                                           <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername" class="form-control" id="inputUserName" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xkontak" class="form-control" id="inputUserName" placeholder="Kontak Person" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel" required>
                                                <option value="1">Administrator</option>
                                                <option value="2">Author</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto" required/>
                                        </div>
                                    </div>
                               

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        
        <?php foreach ($data->result_array() as $i) :
              $id=$i['id'];
              $nama=$i['nama'];
              $jenkel=$i['jenkel'];
              $email=$i['email'];
              $username=$i['username'];
              $password=$i['password'];
              $nohp=$i['nohp'];
              $levelakses=$i['levelakses'];
              $foto=$i['foto'];
            ?>
    <!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/user/update_user'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                                            <input type="text" name="xnama" class="form-control" id="inputUserName" value="<?php echo $nama;?>" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                        <div class="col-sm-7">
                                            <input type="email" name="xemail" class="form-control" value="<?php echo $email;?>" id="inputEmail3" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
                                        <?php if($jenkel=='L'):?>
                                           <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                                        <?php else:?>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                                        <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername" class="form-control" value="<?php echo $username;?>" id="inputUserName" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xkontak" class="form-control" value="<?php echo $nohp;?>" id="inputUserName" placeholder="Kontak Person" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel" required>
                                            <?php if($levelakses=='1'):?>
                                                <option value="1" selected>Administrator</option>
                                                <option value="2">Author</option>
                                            <?php else:?>
                                                <option value="1">Administrator</option>
                                                <option value="2" selected>Author</option>
                                            <?php endif;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto"/>
                                        </div>
                                    </div>
                               

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    
    <?php foreach ($data->result_array() as $i) :
              $id=$i['id'];
              $nama=$i['nama'];
              $jenkel=$i['jenkel'];
              $email=$i['email'];
              $username=$i['username'];
              $password=$i['password'];
              $nohp=$i['nohp'];
              $levelakses=$i['levelakses'];
              $foto=$i['foto'];
            ?>
    <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/user/hapus_user'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                            <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $nama;?></b> ?</p>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    
    <!--Modal Reset Password-->
        <div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                    </div>
                    
                    <div class="modal-body">
                                
                            <table>
                                <tr>
                                    <th style="width:120px;">Username</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('uname');?></th>
                                </tr>
                                <tr>
                                    <th style="width:120px;">Password Baru</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('upass');?></th>
                                </tr>
                            </table>                     
                                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='warning'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Warning',
                    text: "Gambar yang Anda masukan terlalu besar.",
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FFC017'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Pengguna Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Pengguna berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Pengguna Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='show-modal'):?>
        <script type="text/javascript">
                $('#ModalResetPassword').modal('show');
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
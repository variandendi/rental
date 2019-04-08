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
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Album</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                            <th>Gambar</th>
                            <th>Album</th>
                            <th>Tanggal</th>
                            <th>Author</th>
                            <th>Jumlah</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no=0;
                            foreach ($data->result_array() as $i) :
                               $no++;
                               $id_album=$i['id_album'];
                               $nama_album=$i['nama_album'];
                               $album_tanggal=$i['tanggal'];
                               $author_album=$i['author_album'];
                               $cover_album=$i['cover_album'];
                               $album_jumlah=$i['jumlah_album'];
                       
                    ?>
                <tr>
                  <td><img src="<?php echo base_url().'assets/gambar/'.$cover_album;?>" style="width:80px;"></td>
                  <td><?php echo $nama_album;?></td>
                          <td><?php echo $album_tanggal;?></td>
                          <td><?php echo $author_album;?></td>
                          <td><?php echo $album_jumlah;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id_album;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_album;?>"><span class="fa fa-trash"></span></a>
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
                        <h4 class="modal-title" id="myModalLabel">Add Album</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/album/simpan_album'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama Album</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama_album" class="form-control" id="inputUserName" placeholder="Nama Album" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Cover Album</label>
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

  <!--Modal Edit Album-->
  <?php foreach ($data->result_array() as $i) :
              $id_album=$i['id_album'];
              $nama_album=$i['nama_album'];
              $album_tanggal=$i['tanggal'];
              $author_album=$i['author_album'];
              $cover_album=$i['cover_album'];
              $album_jumlah=$i['jumlah_album'];
            ?>
  
        <div class="modal fade" id="ModalEdit<?php echo $id_album;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Album</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/album/update_album'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                                <input type="hidden" name="kode" value="<?php echo $id_album;?>"/> 
                                <input type="hidden" value="<?php echo $cover_album;?>" name="gambar">
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama Album</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama_album" class="form-control" value="<?php echo $nama_album;?>" id="inputUserName" placeholder="Nama Album" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Cover Album</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto"/>
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
  <?php endforeach;?>
    <!--Modal Edit Album-->

    <?php foreach ($data->result_array() as $i) :
              $id_album=$i['id_album'];
              $nama_album=$i['nama_album'];
              $album_tanggal=$i['tanggal'];
              $author_album=$i['author_album'];
              $cover_album=$i['cover_album'];
              $album_jumlah=$i['jumlah_album'];
            ?>
    <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id_album;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Album</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/album/hapus_album'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                                   <input type="hidden" name="kode" value="<?php echo $id_album;?>"/> 
                     <input type="hidden" value="<?php echo $cover_album;?>" name="gambar">
                            <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $nama_album;?></b> ?</p>
                               
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
    
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Album Berhasil disimpan ke database.",
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
                    text: "Album berhasil di update",
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
                    text: "Album Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
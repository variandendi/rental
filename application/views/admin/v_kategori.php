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
            <div class="content-wrapper">
                <div class="content">
		          <div class="box box-success">
		            <div class="box-header with-border">

		              <table class="table">
		              <?php 
		                  $query=$this->db->query("SELECT * FROM dt_berita ORDER BY views_berita DESC");
		                  foreach ($query->result_array() as $i) :
		                      $id_berita=$i['id_berita'];
		                      $judul_berita=$i['judul_berita'];
		                      $view_berita=$i['views_berita'];
		              ?>
		                  <tr>
		                    <td><?php echo $judul_berita;?></td>
		                    <td><?php echo $view_berita.' Views';?></td>
		                  </tr>
		              <?php endforeach;?>
		              </table>
		            </div>
		           		  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Kategori</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
					<th style="width:100px;">#</th>
                    <th>Kategori</th>  
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
					foreach ($data->result_array() as $i) :
					   $no++;
                       $id_kategori=$i['id_kategori'];
                       $nama_kategori=$i['nama_kategori'];
                       
                    ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $nama_kategori;?></td>
                  
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id_kategori;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_kategori;?>"><span class="fa fa-trash"></span></a>
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
		            <!-- /.box-body -->
		          </div>
                </div>
            </div>
            <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Kategori</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/kategori/simpan_kategori'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xkategori" class="form-control" id="inputUserName" placeholder="Kategori" required>
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
              $id_kategori=$i['id_kategori'];
              $nama_kategori=$i['nama_kategori'];
            ?>
	<!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $id_kategori;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/kategori/update_kategori'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
                                        <div class="col-sm-7">
											<input type="hidden" name="kode" value="<?php echo $id_kategori;?>"/> 
                                            <input type="text" name="xkategori" class="form-control" id="inputUserName" value="<?php echo $nama_kategori;?>" placeholder="Kategori" required>
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
              $id_kategori=$i['id_kategori'];
              $nama_kategori=$i['nama_kategori'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id_kategori;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Kategori</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/kategori/hapus_kategori'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							<input type="hidden" name="kode" value="<?php echo $id_kategori;?>"/> 
                            <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $nama_kategori;?></b> ?</p>
                               
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
                    text: "Kategori Berhasil disimpan ke database.",
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
                    text: "Kategori berhasil di update",
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
                    text: "Kategori Berhasil dihapus.",
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
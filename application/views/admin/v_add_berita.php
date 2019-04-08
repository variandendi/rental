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

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Judul</h3>
        </div>
        
        <form action="<?php echo base_url().'admin/berita/simpan_berita'?>" method="post" enctype="multipart/form-data">
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-10">
              <input type="text" name="xjudul" class="form-control" placeholder="Judul berita atau artikel" required/>
            </div>
            <!-- /.col -->
            <div class="col-md-2">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>
      </div>
      <!-- /.box -->

      <div class="row">
        <div class="col-md-8">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Post</h3>
            </div>
            <div class="box-body">
            
            <textarea id="ckeditor" name="xisi" required></textarea>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pengaturan Lainnya</h3>
            </div>
            <div class="box-body">
             
              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control select2" name="xkategori" style="width: 100%;" required>
                  <option value="">-Pilih-</option>
                  <?php
                    $no=0;
                    foreach ($kat->result_array() as $i) :
                       $no++;
                       $kategori_id=$i['id_kategori'];
                       $kategori_nama=$i['nama_kategori'];
                       
                    ?>
                  <option value="<?php echo $kategori_id;?>"><?php echo $kategori_nama;?></option>
                  <?php endforeach;?>
                </select>
              </div>
              
              <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="filefoto" style="width: 100%;" required>
              </div>
              <!-- /.form group -->
        
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </form>
          
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
</body>
</html>
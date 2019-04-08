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
              <a class="btn btn-success btn-flat" href="<?php echo base_url().'admin/berita/add_berita'?>"><span class="fa fa-plus"></span> Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Author</th>
                        <th>Baca</th>
                    <th>Kategori</th>  
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no=0;
                            foreach ($data->result_array() as $i) :
                               $no++;
                               $id_berita=$i['id_berita'];
                               $berita_judul=$i['judul_berita'];
                               $berita_isi=$i['isi_berita'];
                               $berita_tanggal=$i['tanggal'];
                               $berita_author=$i['author_berita'];
                               $gambar_berita=$i['gambar_berita'];
                               $berita_views=$i['views_berita'];
                       $kategori_id=$i['id_kategori_berita'];
                       $kategori_nama=$i['nama_kategori_berita'];
                       
                    ?>
                <tr>
                  <td><img src="<?php echo base_url().'assets/img/car/'.$gambar_berita;?>" style="width:90px;"></td>
                  <td><?php echo $berita_judul;?></td>
                  
                          <td><?php echo $berita_tanggal;?></td>
                          <td><?php echo $berita_author;?></td>
                          <td><?php echo $berita_views;?></td>
                          <td><?php echo $kategori_nama;?></td>
                  <td style="text-align:right;">
                        <a class="btn" href="<?php echo base_url().'admin/berita/get_edit/'.$id_berita;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_berita;?>"><span class="fa fa-trash"></span></a>
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
    
    <?php foreach ($data->result_array() as $i) :
              $id_berita=$i['id_berita'];
              $berita_judul=$i['judul_berita'];
              $gambar_berita=$i['gambar_berita'];
            ?>
    <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id_berita;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Berita</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/berita/hapus_berita'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                                   <input type="hidden" name="kode" value="<?php echo $id_berita;?>"/> 
                     <input type="hidden" value="<?php echo $gambar_berita;?>" name="gambar">
                            <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $berita_judul;?></b> ?</p>
                               
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
</body>
</html>
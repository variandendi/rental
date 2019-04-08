    <?php
        error_reporting(0);
        $b=$data->row_array();
        $url=base_url().'artikel/'.$b['slug_berita'];
        $logo=base_url().'assets/img/logo.png';
        $img=base_url().'assets/img/car/'.$b['gambar_berita'];
        $title=$b['judul_berita'];
        $author=$b['author_berita'];
        $date=$b['tanggal'];
        $kategori=$b['nama_kategori_berita'];
        $deskripsi=strip_tags($b['isi_berita']);
        $isi=$b['isi_berita'];
        $views=$b['view_berita'];
        $rating=$b['rating_berita'];
    ?>

<?php $this->load->view('v_header');?>

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="<?php echo base_url().'home'?>" class="logo">
                            <img src="<?php echo $logo;?>" alt="JSOFT">
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li><a href="<?php echo base_url().'home'?>">Home</a>
                                </li>
                                <li><a href="<?php echo base_url().'about'?>">About</a></li>
                                <li><a href="<?php echo base_url().'services'?>">services</a></li>
                                <li><a href="<?php echo base_url().'cars'?>">Cars</a>
                                </li>
                                <li class="active"><a href="<?php echo base_url().'blog'?>">blog</a>
                                </li>
                                <li><a href="<?php echo base_url().'faq'?>">FAQ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>WLIQUAM SIT AMET URNA EULLAM</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-8">
                    <div class="car-details-content">
                        <h2><a href="<?php echo $url;?>"><?php echo $title;?></a></h2>
                        
                            <div class="single-car-preview">
                                <img src="<?php echo $img;?>" alt="JSOFT">
                            </div>
                            
                        
                        <div class="car-details-info blog-content">
                            <p><?php echo $isi;?></p>

                            <div class="review-area">
                                <h3>Write Your Comment</h3>
                                <div class="review-form">
                                    <form action="index.html">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="name-input">
                                                    <input type="text" placeholder="Full Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="email-input">
                                                    <input type="email" placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="message-input">
                                            <textarea name="review" cols="30" rows="5" placeholder="Message"></textarea>
                                        </div>

                                        <div class="input-submit">
                                            <button type="submit">Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Car List Content End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>For More Informations</h3>

                            <div class="sidebar-body">
                                <p><i class="fa fa-mobile"></i>  +62 812-7846-355</p>
                                <p><i class="fa fa-clock-o"></i> Senin-Jum'at 09.00 - 17.00</p>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->

                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Rental Tips</h3>
                            <?php foreach ($terbaru->result() as $row) : ?>
                            <div class="sidebar-body">
                                <ul class="recent-tips">
                                    <li class="single-recent-tips">
                                        <div class="recent-tip-thum">
                                            <a href="<?php echo base_url().'artikel/'.$row->slug_berita;?>"><img src="<?php echo base_url().'assets/img/car/'.$row->gambar_berita;?>" alt="JSOFT"></a>
                                        </div>
                                        <div class="recent-tip-body">
                                            <h4><a href="<?php echo base_url().'artikel/'.$row->slug_berita;?>"><?php echo $row->judul_berita;?></a></h4>
                                            <span class="date"><?php echo $row->tanggal;?></span>
                                        </div>
                                    </li>

                                    
                                </ul>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <!-- Single Sidebar End -->

                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Connect with Us</h3>

                            <div class="sidebar-body">
                                <div class="social-icons text-center">
                                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-behance"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

<?php $this->load->view('v_footer');?>
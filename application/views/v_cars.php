<?php $this->load->view('v_header');?>

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="home" class="logo">
                            <img src="assets/img/logo.png" alt="JSOFT">
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
                                <li class="active"><a href="<?php echo base_url().'cars'?>">Cars</a>
                                </li>
                                <li><a href="<?php echo base_url().'blog'?>">blog</a>
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
                        <h2>Our Gallery</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Gallery Page Content Start ==-->
    <section id="gallery-page-content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="popular-cars-wrap">


                        <div class="row popular-car-gird">
                            <!-- Single Popular Car Start -->
                            <?php   foreach ($data->result() as $row) : ?>
                            <div class="col-lg-4 col-md-6 con suv mpv">
                                <div class="single-popular-car">
                                    <div class="p-car-thumbnails">
                                        <a class="car-hover" href="<?php echo base_url().'assets/img/car/'.$row->gambar_gallery;?>">
                                          <img src="<?php echo base_url().'assets/img/car/'.$row->gambar_gallery;?>" alt="JSOFT">
                                       </a>
                                    </div>

                                    <div class="p-car-content">
                                        <h3>
                                            <a href="#">Dodge Ram 1500</a>
                                            <span class="price"><i class="fa fa-tag"></i> $55/day</span>
                                        </h3>

                                        <h5>HATCHBACK</h5>

                                        <div class="p-car-feature">
                                            <a href="#">2017</a>
                                            <a href="#">manual</a>
                                            <a href="#">AIR CONDITION</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <!-- Single Popular Car End -->

                        </div>
                    </div>
                    <!-- Page Pagination Start -->
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Page Pagination End -->
                </div>
            </div>
        </div>
    </section>
    <!--== Gallery Page Content End ==-->
        <?php $this->load->view('v_footer');?>
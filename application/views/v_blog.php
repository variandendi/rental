    <?php
            error_reporting(0);
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }

    ?>
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
                        <h2>Our Latest Articles</h2>
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
    <div id="blog-page-content" class="section-padding">
        <div class="container">
            <div class="row">
                <?php
                foreach ($data->result_array() as $j) :
                        $post_id=$j['id_berita'];
                        $post_judul=$j['judul_berita'];
                        $post_isi=$j['isi_berita'];
                        $post_author=$j['author_berita'];
                        $post_image=$j['gambar_berita'];
                        $post_tglpost=$j['tanggal_berita'];
                        $post_slug=$j['slug_berita'];
                ?>
                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5">
                                <div class="article-thumb">
                                    <img src="<?php echo base_url().'assets/img/car/'.$post_image;?>" alt="JSOFT">
                                </div>
                            </div>
                            <!-- Articles Thumbnail End -->

                            <!-- Articles Content Start -->
                            <div class="col-lg-7">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
                                            <h3><a href="<?php echo base_url().'artikel/'.$post_slug;?>"><?php echo $post_judul;?></a></h3>
                                            <div class="article-meta">
                                                <a href="#" class="author">By :: <span><?php echo $post_author;?></span></a>
                                                <a href="#" class="commnet">Date :: <span><?php echo $post_tglpost;?></span></a>
                                            </div>

                                            <p><?php echo limit_words($post_isi,10).'...';?></p>

                                            <a href="<?php echo base_url().'artikel/'.$post_slug;?>" class="readmore-btn">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Articles Content End -->
                        </div>
                    </article>
                </div>
                <!-- Single Articles End -->
                <?php endforeach;?>
            <div class="row">
                <!-- Page Pagination Start -->
                <div class="col-lg-12">
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
                </div>
                <!-- Page Pagination End -->
            </div>
        </div>
    </div>
    <!--== Car List Area End ==-->

            <?php $this->load->view('v_footer');?>
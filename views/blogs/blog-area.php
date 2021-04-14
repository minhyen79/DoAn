<!-- blog header-->
<section class="headDetail" data-bgimg="assets/images/banners/banner18.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="headDetail__title">Bài viết</h2>
                <div class="headDetail__item">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="trang-chu">Trang chủ</a></li>
                            <li class="breadcrumb-item " aria-current="page">Bài viết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog header -->

<!--blog area start-->
<div class="blog_page_section blog_fullwidth mt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="blog_wrapper" id="data-blog-area-sg">
                    <!-- PHP -->
                    <?php  
                        foreach ($arr_blog as $key => $blog) { ?>
                             <article class="single_blog">
                                <figure>
                                    <h4 class="post_title">
                                        <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['title']; ?></a>
                                    </h4>
                                    <div class="articles_date">
                                         <p><?php echo $blog['create_at']; ?> | <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['name']; ?></a> </p>
                                    </div>
                                    
                                    <figcaption class="blog_content">
                                        <div class="blog_thumb">
                                            <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><img src="assets/images/blogs/<?php echo $blog['main_image']; ?>" alt="<?php echo $blog['main_image']; ?>"></a>
                                        </div>
                                        <p class="post_desc"><?php echo $blog['main_content']; ?></p>
                                        <footer class="btn_more">
                                            <a class="btn btn--primary btn-hover-dark" href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>">Đọc thêm</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                    <?php
                        }
                    ?>
                    <!-- ./PHP -->
                </div>
            </div>  
            <!-- Tab right -->
            <div class="col-lg-3 col-md-12">
                <div class="blog_sidebar_widget">
                    <div class="widget_list widget_search">
                        <div class="widget_title">
                            <h3>Tìm kiếm</h3>
                        </div>
                        <form action="bai-viet/tim-kiem" class="form-search-blog" method="POST">
                            <div>
                                <input required placeholder="Tìm kiếm..." name="inp-search-blog" value="<?php if(isset($save)) { echo $save; } ?>" type="text" class="inp-search-blog">
                                <i class="fas fa-times icon-x"></i>
                            </div>
                            <button type="submit" name="btn-search-blog" class="btn btn--primary">Tìm kiếm</button>
                        </form>
                    </div>

                    <div class="widget_list widget_post">
                        <div class="widget_title">
                            <h3>BÀI ĐĂNG GẦN ĐÂY</h3>
                        </div>
                        <!-- data  RECENT POSTS-->
                        <!-- PHP -->
                        <?php  
                            foreach ($arr_blog_DESC as $key => $blog) { ?>
                                <div id="data-recent-post">
                                    <div class="post_wrapper">
                                        <div class="post_thumb post_thumb-za">
                                            <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><img class="img-fluid" src="assets/images/blogs/<?php echo $blog['main_image']; ?>" alt="<?php echo $blog['main_image']; ?>"></a>
                                        </div>
                                        <div class="post_info">
                                            <h4><a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['title']; ?></a></h4>
                                            <span><?php echo $blog['create_at']; ?></span>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        <!-- ./PHP -->
                        <!-- ./data  RECENT POSTS-->
                    </div>
                    <div class="widget_list widget_categories">
                        <div class="widget_title">
                            <h3>Danh mục Bài viết</h3>
                        </div>
                        <ul class="blog-cate-zc">
                            <!-- PHP -->
                            <?php  
                                foreach ($arr_cate as $key => $cate) { ?>
                                    <li>
                                        <a class="<?php if($id == $cate['id_category_new']) { echo 'active'; } ?>" href="bai-viet/danh-muc/<?php echo $cate['id_category_new']; ?>" ><?php echo $cate['name_cate']; ?></a>
                                    </li>
                            <?php
                                }
                            ?>
                            <!-- ./PHP -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ./Tab right -->
            
            <!-- Pagination -->
            <!-- PHP -->
            <?php  
                if (isset($index) && $index == 0) { ?>
                    <!-- shop-bottom -->
                    <div class="shop-toolbar shop-bottom">
                        <div class="pagination">
                            <ul class="pagination">
                                <?php  
                                if ($pages > 1) { ?>

                                    <li class="page-item">
                                        <a class="page-link" href="bai-viet/trang/<?php echo $pages = ($pages - 1); ?>">&laquo;</a>
                                    </li>

                               <?php
                                } else { ?>

                                    <li class="page-item disabled">
                                        <a class="page-link"><span class="disabled">&lsaquo;</span></a>
                                    </li>

                                <?php
                                    }
                                ?>
                            </li>

                            <?php  
                            for ($i = 1; $i  <= $pagination ; $i ++) { ?>

                                <li class="page-item"><a class="page-link <?php if($i === $abc){ echo 'active'; } ?>" href="bai-viet/trang/<?php echo $i; ?>"><?php echo $i ?></a></li>

                            <?php
                                }
                            ?>
                            <?php  
                            if (isset($_GET['pages'])) {
                                $pages = $_GET['pages'];
                            }
                            if ($pages < $pagination) { ?>
                                <li class="page-item ">
                                    <a class="page-link" href="bai-viet/trang/<?php echo $pages = ($pages + 1); ?>">&raquo;</a>
                                </li>
                            <?php
                            } else { ?>
                                <li class="page-item disabled">
                                    <a class="page-link " href="#">&rsaquo;</a>
                                </li>
                            <?php
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <!-- ./shop-bottom -->  
            <?php
            //tìm kiếm
                } elseif (isset($index) && $index == 1) { ?>
                    <!-- shop-bottom -->
                    <div class="shop-toolbar shop-bottom">
                        <div class="pagination">
                            <ul class="pagination">
                                <?php  
                                if ($pages > 1) { ?>

                                    <li class="page-item">
                                        <a class="page-link" href="bai-viet/tim-kiem/<?php echo $save;?>/<?php echo $save;?>/trang/<?php echo $pages = ($pages - 1); ?>">&laquo;</a>
                                    </li>

                               <?php
                                } else { ?>

                                    <li class="page-item disabled">
                                        <a class="page-link"><span class="disabled">&lsaquo;</span></a>
                                    </li>

                                <?php
                                    }
                                ?>
                            </li>

                            <?php  
                            for ($i = 1; $i  <= $pagination ; $i ++) { ?>

                                <li class="page-item"><a class="page-link <?php if($i === $abc){ echo 'active'; } ?>" href="bai-viet/tim-kiem/<?php echo $save;?>/trang/<?php echo $i;?>"><?php echo $i ?></a></li>

                            <?php
                                }
                            ?>
                            <?php  
                            if (isset($_GET['pages'])) {
                                $pages = $_GET['pages'];
                            }
                            if ($pages < $pagination) { ?>
                                <li class="page-item ">
                                    <a class="page-link" href="bai-viet/tim-kiem/<?php echo $save;?>/<?php echo $save;?>/trang/<?php echo $pages = ($pages + 1); ?>">&raquo;</a>
                                </li>
                            <?php
                            } else { ?>
                                <li class="page-item disabled">
                                    <a class="page-link " href="#">&rsaquo;</a>
                                </li>
                            <?php
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <!-- ./shop-bottom -->  
            <?php
            // danh mục
                } elseif (isset($index) && $index == 2) { ?>
                    <!-- shop-bottom -->
                    <div class="shop-toolbar shop-bottom">
                        <div class="pagination">
                            <ul class="pagination">
                                <?php  
                                if ($pages > 1) { ?>

                                    <li class="page-item">
                                        <a class="page-link" href="bai-viet/danh-muc/<?php echo $id;?>/trang/<?php echo $pages = ($pages - 1); ?>">&laquo;</a>
                                    </li>

                               <?php
                                } else { ?>

                                    <li class="page-item disabled">
                                        <a class="page-link"><span class="disabled">&lsaquo;</span></a>
                                    </li>

                                <?php
                                    }
                                ?>
                            </li>

                            <?php  
                            for ($i = 1; $i  <= $pagination ; $i ++) { ?>

                                <li class="page-item"><a class="page-link <?php if($i === $abc){ echo 'active'; } ?>" href="bai-viet/danh-muc/<?php echo $id;?>/trang/<?php echo $i;?>"><?php echo $i ?></a></li>

                            <?php
                                }
                            ?>
                            <?php  
                            if (isset($_GET['pages'])) {
                                $pages = $_GET['pages'];
                            }
                            if ($pages < $pagination) { ?>
                                <li class="page-item ">
                                    <a class="page-link" href="bai-viet/danh-muc/<?php echo $id;?>/trang/<?php echo $pages = ($pages + 1); ?>">&raquo;</a>
                                </li>
                            <?php
                            } else { ?>
                                <li class="page-item disabled">
                                    <a class="page-link " href="#">&rsaquo;</a>
                                </li>
                            <?php
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <!-- ./shop-bottom -->  
            <?php        
                }
            ?>
            <!-- ./PHP -->
            <!-- ./Pagination -->
        </div>
    </div>
</div>
<!--blog area end
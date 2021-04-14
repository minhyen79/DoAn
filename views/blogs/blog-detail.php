<!-- blog header-->
<section class="headDetail" data-bgimg="assets/images/banners/banner18.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="headDetail__title">bài viết</h2>
                <div class="headDetail__item">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="trang-chu">Trang chủ</a></li>
                            <li class="breadcrumb-item " aria-current="page">Chi tiết bài viết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog header -->

<!--blog area start-->
<div class="blog_page_section blog_details">
    <div class="container">
        <div class="row">
            <!-- PHP -->
            <?php  
                foreach ($arr_blog as $key => $blog) { ?>

                    <div class="col-lg-9 col-md-12" id="blog-detail-left">
                        <div class="blog_wrapper">
                            <article class="single_blog">
                                <div class="post_header">
                                 <h4 class="post_title">
                                    <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['title']; ?></a>
                                </h4>
                                <div class="blog_meta articles_date">   
                                     <p>Đăng bởi : <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['name']; ?></a> / Thời gian : <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['create_at']; ?></a> / Danh mục : <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['name_cate']; ?></a></p>                                     
                                </div>
                             </div>
                             <figure>
                                <div class="blog_thumb">
                                    <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><img class="img-fluid" src="assets/images/blogs/<?php echo $blog['main_image']; ?>" alt="<?php echo $blog['main_image']; ?>"></a>
                                </div>
                                <figcaption class="blog_content">
                                    <div class="post_content">
                                        <p class="post_desc"><?php echo $blog['description']; ?></p>
                                        <blockquote>
                                            <p class="post_desc"><?php echo $blog['main_content']; ?></p>
                                        </blockquote>
                                    </div>
                                    <div class="entry_content">
                                        <div class="social_sharing">
                                            <p>Chia sẻ bài viết:</p>
                                            <ul>
                                                <li class="fb-share-button" og:type="website" og:image="assets/images/blogs/<?php echo $blog['main_image']; ?>" og:description="<?php echo $blog['main_content']; ?>" og:title="<?php echo $blog['title']; ?>" og:url="http://php0320e2-2.itpsoft.com.vn/chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>" data-href="http://php0320e2-2.itpsoft.com.vn/chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>" data-layout="button" data-size="small">
                                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fphp0320e2-2.itpsoft.com.vn%2Fchi-tiet-bai-viet%2F<?php echo $blog['id_news']; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" title="chia sẻ bài viết lên facebook">
                                                        <i class="fa fa-facebook"></i> Facebook 
                                                    </a>
                                                </li>
                                          <!--       <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>

                            <div class="fb-comments" data-href="http://btsphim.online/chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>" data-numposts="5" data-width="100%"></div>
                            
                        </article>
                        <div class="related_posts">
                            <h3>Bài viết liên quan</h3>
                            <div class="row" id="data-blog-related">
                                <!-- PHP -->
                                <?php  
                                    foreach ($blog_related as $key => $blog) { ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <article class="single_related">
                                                <figure>
                                                    <div class="related_thumb">
                                                        <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><img class="img-fluid" src="assets/images/blogs/<?php echo $blog['main_image']; ?>" alt="<?php echo $blog['main_image']; ?>"></a>
                                                    </div>
                                                    <figcaption class="related_content">
                                                         <h4><a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['title']; ?></a></h4>
                                                         <div class="blog_meta">                                        
                                                            <span class="author">Đăng bởi : <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['name']; ?></a> / </span>
                                                            <span class="meta_date"><?php echo $blog['name']; ?></span>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </article>
                                        </div>
                                <?php
                                    }
                                ?>
                                <!-- ./PHP -->
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
            <!-- ./PHP -->
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
        </div>
    </div>
</div>
<!--blog area end
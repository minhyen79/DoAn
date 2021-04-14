<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog__title">
                    <p>Các bài viết mới nhất</p>
                    <h2>Bài đăng mới nhât của chúng tôi</h2>
                </div>
            </div>
        </div>
        <div class="row" id="data-blog-home">
            <!-- PHP -->
            <?php  
                foreach ($arr_blog as $key => $blog) { ?>
                     <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <article class="blog-single">
                            <figure>
                                <div class="blog-single__thumb">
                                    <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><img src="assets/images/blogs/<?php echo $blog['main_image']; ?>" alt="<?php echo $blog['main_image']; ?>"></a>
                                </div>
                                <figcaption class="blog-single-content">
                                    <div class="blog-single-content__date">
                                        <p><?php echo $blog['create_at']; ?><br/>
                                            <span class="mt-2 d-inline-block">Tác giả : </span> 
                                            <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>">
                                                <strong><?php echo $blog['name']; ?></strong>
                                            </a> 
                                        </p>
                                    </div>
                                    <h4 class="blog-single-content__title">
                                        <a href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>"><?php echo $blog['title']; ?></a>
                                    </h4>
                                    <footer class="blog-single-content__footer">
                                        <a class="bt bt--primary" href="chi-tiet-bai-viet/<?php echo $blog['id_news']; ?>">Đọc thêm</a>
                                    </footer>
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
</section>
<section class="slider">
    <div class="slider_area owl-carousel">
        <!-- PHP -->
        <?php  
            foreach ($arr_slider as $key => $slider) { ?>
                <article class="slider-single d-flex align-items-center" data-bgimg="assets/images/sliders/<?php echo $slider['slide_image']; ?>">
                    <figcaption class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-single__caption">
                                    <h1><?php echo $slider['slide_title']; ?></h1>
                                    <p>
                                        <?php echo $slider['slide_content']; ?>
                                    </p>
                                    <a class="bt bt--primary bt--circle" href="cua-hang">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                    </figcaption>
                </article>
        <?php                
            }
        ?>
        <!-- ./PHP -->
        
    </div>
</section>
<!-- headWishlist --> 
<section class="headWishlist headDetail" data-bgimg="assets/images/banners/banner18.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="headWishlist__title headDetail__title">Sản phẩm yêu thích</h2>
                <div class="headWishlist__item headDetail__item">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="trang-chu">Trang chủ</a></li>
                            <li class="breadcrumb-item " aria-current="page">Sản phẩm yêu thích</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./headWishlist -->

<!-- load wishlist -->
<div class="load-wishlish-detailPro">
    <div class="load-wishlish-detailPro__all">
    <!-- PHP -->
    <?php  
        if (isset($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) { ?>
            <!-- html -->
            <section class="product wishlist_products product-page-wishlist">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product__title product-res">
                                <h2>Sản phẩm yêu thích</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- PHP -->
                        <?php foreach ($_SESSION['wishlist'] as $key => $product): ?>
                            <!-- html -->
                            <div class="col-lgz-2 col-md-6 col-6">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="One">
                                        <article class="product__single">
                                            <figure>
                                                <div class="product-thumb">
                                                    <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--first">
                                                        <img class="img-fluid" alt="<?php echo $product['product_name'] ?>" src="assets/images/products/<?php echo $product['main_image'] ?>">
                                                    </a>
                                                    <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--second">
                                                        <img class="img-fluid" alt="<?php echo $product['product_name'] ?>" src="assets/images/hl-products/<?php echo $product['second_image'] ?>">
                                                    </a>
                                                    <div class="product-link">
                                                        <ul class="d-flex">
                                                            <li class="product-link__item product-link__item--cart">
                                                                <a id="<?php echo $product['id_product'] ?>" href="#">
                                                                    <span class="lnr lnr-cart"></span>
                                                                </a>
                                                            </li>
                                                            <li class="show-eye product-link__item--show">
                                                                <a id="<?php echo $product['id_product'] ?>" data-toggle="modal" href="#modalProduct" class="product-link__show" >
                                                                    <span class="lnr lnr-eye"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a id="<?php echo $product['id_product'] ?>" class="wishlish-btn-remove" href="#">
                                                                    <span class="lnr lnr-trash"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption>
                                                    <div class="product-content">
                                                        <h4><a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>"><?php echo $product['product_name'] ?></a></h4>
                                                        <p><a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>"><?php echo $product['classify'] ?></a></p>
                                                        <div class="d-flex align-items-center justify-content-center product-contentPrice">
                                                            <span class="product-content__price"><?php echo number_format($product['price']).'đ' ?></span>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <!-- ./html -->
                        <?php endforeach ?>
                        <!-- ./PHP -->
                    </div>       
                </div>
            </section>
            <!-- ./html -->
    <?php
        } else { ?>
            
            <div class="wishlist-empty">
                <div class="wishlist-content">
                    <h2>Thông báo</h2>
                    <p>Bạn chưa có sản phẩm yêu thích nào!</p>
                    <a href="trang-chu" class="btn btn--primary btn-hover-dark">Về trang chủ</a>
                </div>
            </div>
             
    <?php
        }
    ?>
    <!-- ./PHP -->
    </div>
</div>
<!-- ./load wishlist -->

<!-- modalProduct -->
<?php include_once 'modalProduct.php'; ?>
<!-- ./Product_area-->
<!-- newProduct -->
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product__title">
                    <p>Gần đây đã thêm vào cửa hàng</p>
                    <h2>Sản phẩm mới</h2>
                </div>
            </div>
        </div>
        <h2 class="product-tab-s"><?php echo $cateFruit ?></h2>
        <!-- fruit -->
        <div class="row" id="DataProduct">
            <!-- ajax json. -->
            <?php  
                foreach ($fruit as $key => $product) { ?>

                    <div class="col-lgz-2 col-md-6 col-6">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="One">
                                <article class="product__single">
                                    <figure>
                                        <div class="product-thumb">
                                            <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--first">
                                                <img class="img-fluid" src="assets/images/products/<?php echo $product['main_image'] ?>" alt="<?php echo $product['product_name'] ?>"></a>
                                            <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--second">
                                                <img class="img-fluid" src="assets/images/hl-products/<?php echo $product['second_image'] ?>" alt="<?php echo $product['product_name'] ?>">
                                            </a>
                                                <?php  
                                                    if ($product['quantity'] < 1) { ?>

                                                         <div class="product-thumb__label zero-product">
                                                            <span>Hết</span>
                                                        </div>  
                                                <?php
                                                    } else { ?>
                                                        <div class="product-thumb__label">
                                                            <span>New</span>
                                                        </div>
                                                <?php
                                                    }
                                                ?>
                                            <div class="product-link">
                                                <ul class="d-flex">
                                                    <li class="product-link__item product-link__item--cart">
                                                        <a id="<?php echo $product['id_product'] ?>" href="#">
                                                            <span class="lnr lnr-cart"></span>
                                                        </a>
                                                    </li>
                                                    <li class="show-eye product-link__item--show ">
                                                        <a id="<?php echo $product['id_product'] ?>" class="product-link__show" data-toggle="modal" href="#modalProduct">
                                                            <span class="lnr lnr-eye"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"  id="<?php echo $product['id_product'] ?>" class="product-link-wishlist">
                                                            <span class="lnr lnr-heart " ></span>
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
            <?php
                }
            ?>
        </div>
        <!-- ./fruit -->

        <div class="product-tab mt-5 mb-15">
            <ul id="tab-newProduct" class="nav justify-content-center" role="tablist">
                <li>
                    <a href="cua-hang/danh-muc/<?php echo $IDFruit; ?>" class="active">Xem thêm</a>
                </li>
            </ul>
        </div>

        <h2 class="product-tab-s"><?php echo $cateVegetable ?></h2>
        <!-- vegetable -->
        <div class="row" id="DataProduct">
            <!-- ajax json. -->
            <?php  
                foreach ($vegetable as $key => $product) { ?>

                    <div class="col-lgz-2 col-md-6 col-6">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="One">
                                <article class="product__single">
                                    <figure>
                                        <div class="product-thumb">
                                            <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--first">
                                                <img class="img-fluid" src="assets/images/products/<?php echo $product['main_image'] ?>" alt="<?php echo $product['product_name'] ?>"></a>
                                            <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--second">
                                                <img class="img-fluid" src="assets/images/hl-products/<?php echo $product['second_image'] ?>" alt="<?php echo $product['product_name'] ?>">
                                            </a>
                                                <?php  
                                                    if ($product['quantity'] < 1) { ?>

                                                         <div class="product-thumb__label zero-product">
                                                            <span>Hết</span>
                                                        </div>  
                                                <?php
                                                    } else { ?>
                                                        <div class="product-thumb__label">
                                                            <span>New</span>
                                                        </div>
                                                <?php
                                                    }
                                                ?>
                                            <div class="product-link">
                                                <ul class="d-flex">
                                                    <li class="product-link__item product-link__item--cart">
                                                        <a id="<?php echo $product['id_product'] ?>" href="#">
                                                            <span class="lnr lnr-cart"></span>
                                                        </a>
                                                    </li>
                                                    <li class="show-eye product-link__item--show ">
                                                        <a id="<?php echo $product['id_product'] ?>" class="product-link__show" data-toggle="modal" href="#modalProduct">
                                                            <span class="lnr lnr-eye"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"  id="<?php echo $product['id_product'] ?>" class="product-link-wishlist">
                                                            <span class="lnr lnr-heart " ></span>
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
            <?php
                }
            ?>
        </div>
        <!-- ./vegetable -->

        <div class="product-tab mt-5 mb-15">
            <ul id="tab-newProduct" class="nav justify-content-center" role="tablist">
                <li>
                    <a href="cua-hang/danh-muc/<?php echo $IDVegetable; ?>" class="active">Xem thêm</a>
                </li>
            </ul>
        </div>

        <h2 class="product-tab-s"><?php echo $cateSeed ?></h2>
        <!-- seed -->
        <div class="row" id="DataProduct">
            <!-- ajax json. -->
            <?php  
                foreach ($seed as $key => $product) { ?>

                    <div class="col-lgz-2 col-md-6 col-6">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="One">
                                <article class="product__single">
                                    <figure>
                                        <div class="product-thumb">
                                            <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--first">
                                                <img class="img-fluid" src="assets/images/products/<?php echo $product['main_image'] ?>" alt="<?php echo $product['product_name'] ?>"></a>
                                            <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--second">
                                                <img class="img-fluid" src="assets/images/hl-products/<?php echo $product['second_image'] ?>" alt="<?php echo $product['product_name'] ?>">
                                            </a>
                                                <?php  
                                                    if ($product['quantity'] < 1) { ?>

                                                         <div class="product-thumb__label zero-product">
                                                            <span>Hết</span>
                                                        </div>  
                                                <?php
                                                    } else { ?>
                                                        <div class="product-thumb__label">
                                                            <span>New</span>
                                                        </div>
                                                <?php
                                                    }
                                                ?>
                                            <div class="product-link">
                                                <ul class="d-flex">
                                                    <li class="product-link__item product-link__item--cart">
                                                        <a id="<?php echo $product['id_product'] ?>" href="#">
                                                            <span class="lnr lnr-cart"></span>
                                                        </a>
                                                    </li>
                                                    <li class="show-eye product-link__item--show ">
                                                        <a id="<?php echo $product['id_product'] ?>" class="product-link__show" data-toggle="modal" href="#modalProduct">
                                                            <span class="lnr lnr-eye"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"  id="<?php echo $product['id_product'] ?>" class="product-link-wishlist">
                                                            <span class="lnr lnr-heart " ></span>
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
            <?php
                }
            ?>
        </div>
        <!-- ./seed -->

        <div class="product-tab mt-5 mb-15">
            <ul id="tab-newProduct" class="nav justify-content-center" role="tablist">
                <li>
                    <a href="cua-hang/danh-muc/<?php echo $IDSeed; ?>" class="active">Xem thêm</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- newProduct -->
<!-- modalProduct -->
<?php include_once 'modalProduct.php'; ?>

<!-- headDetail -->
<?php //var_dump(12); die;?>
<section class="headDetail" data-bgimg="assets/images/banners/banner18.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="headDetail__title">Chi tiết sản phẩm</h2>
                <div class="headDetail__item">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="trang-chu">Trang chủ</a></li>
                            <li class="breadcrumb-item " aria-current="page">Chi tiết sản phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./headDetail -->
<!-- productDetail -->
<div class="productDetail">
	<div class="container">
        <div class="row">
        <!-- PHP -->
        <?php  

            foreach ($result as $key => $product) { ?>

    			<div class="col-lg-5 col-md-5">
    				<div class="productDetail-tab" >
                        <div class="productDetail-tab-tab-main" id="data-main-img">
                            <!-- main img -->
                            <div id="img-1">
                                <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>">
                                    <img id="zoom1" src="assets/images/products/<?php echo $product['main_image']; ?>" alt="<?php echo $product['product_name']; ?>">
                                </a>
                            </div>
                        </div>
                        <!-- ./main img -->
    					<!-- sub img -->
    					<div class="productDetail-thumb">
    						<ul class="d-flex justify-content-center align-items-center" id="data-sub-img">
                                <!-- PHP -->
                                <?php  
                                    foreach ($imgRelated as $key => $related) { ?>
                                    <li>
                                        <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>">
                                            <img alt="`+ val['sub_image'] +`" src="assets/images/products-childen/<?php echo $related['sub_image'] ?>" />
                                        </a>
                                    </li>
                                <?php
                                    }
                                ?>
                                <!-- ./PHP -->
    						</ul>
    					</div>
                        <!-- ./sub img -->
    				</div>
    			</div>

    			<div class="col-lg-7 col-md-7">

    				<div class="productDetail-r">
                        <div class="productDetail-show-rating">
                             <div class="data-rate-single">
                                <!-- PHP -->
                                <?php  
                                    if (!empty($rating)) { ?>
                                         <span class="font-weight-bold show-rate">Lượt đánh giá : (<?php echo floatval($rating); ?> <i class="fas fa-star text-success"></i>)</span>
                                <?php
                                    } else { ?>
                                        <span class="font-weight-bold show-rate">Chưa có lượt đánh giá nào!</span>
                                <?php
                                    }
                                ?>
                                <!-- ./PHP -->
                               
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <form action="#">
                       		<div class="product-isset">
                       			<p class="ct-count no-line m-0 font-weight-bold color-primary" id="data-quantity">
                       				<!-- mass -->
                                    <!-- PHP -->
                                    <?php  
                                        if ($product['quantity'] < 1) { ?>
                                            <span class="text-danger display-4 font-weight-bold">Hết hàng.</span>
                                    <?php 
                                        } else { ?>
                                            <span class="display-4 mr-2 font-weight-bold">Còn hàng</span>
                                    <?php
                                        }
                                    ?>
                                    <!-- ./PHP -->
                       			</p>
                                <!-- Kiểm tra số lượng tồn kho -->
                                <p class="check-qty-daxv">
                                    <!-- PHP -->
                                    <?php  
                                        if ($product['quantity'] < 1) { ?>
                                            <span class="title title-empty">hết hàng</span>
                                    <?php
                                        } else { ?>
                                            <span class="ct-count font-italic">(Còn <span class="count"><?php echo $product['quantity']; ?></span> Sản phẩm)</span>
                                    <?php
                                        }
                                    ?>
                                    <!-- ./PHP -->
                                </p>
                                 <!-- ./Kiểm tra số lượng tồn kho -->
                       		</div>
                            <h1 id="data-name-img">
                                <!-- name product -->
                                <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>"><?php echo $product['product_name']; ?></a>
                            </h1>
                            <div class="product-meta" id="data-cate-pro">
                                <!-- cate -->
                                <span>Danh mục : <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>"><?php echo $product['classify']; ?></a></span>
                            </div>
                            <!-- Rating. -->
                            <div class="product-rating">
                                <!-- PHP -->
                                <?php
                                    if (isset($_SESSION['id_member'])) {
                                        $id = $_SESSION['id_member'];
                                ?>
                                        <!-- Has account -->
                                        <div id="default" id-member="<?php echo $id; ?>" class="rating-star"><strong>(Mời bạn đánh giá)</strong>&nbsp;&nbsp;</div>
                                        <div id="data-rating-inp">
                                            <input hidden id-product="<?php echo $product['id_product']; ?>" type="text">
                                        </div>
                                        <!-- ./Has account -->
                                <?php
                                    } else { ?>
                                        <div id="default" class="rating-star no-action"><strong>(Mời bạn đánh giá)</strong>&nbsp;&nbsp;</div>
                                <?php
                                    }
                                ?>
                                <!-- ./PHP -->

                            </div>
                            <!-- ./Rating. -->
                            <div class="price-box" id="price-box">
                                <!-- price -->
								<?php if($product['price_sale'] != 0) { ?>
                                <span class="current-price font-weight-bold" style="text-decoration-line: line-through" ><?php echo number_format($product['price']).'đ' ?></span>
								<div class="current-price font-weight-bold" style="color:red; font-size:30px">Giá Còn:
                                <span class="current-price font-weight-bold" style="color:red; font-size:30px"><?php echo number_format($product['price_sale']).'đ' ?></span>
								</div>
								<?php } else {?>
								  <span class="current-price font-weight-bold" ><?php echo number_format($product['price']).'đ' ?></span>
								 <?php } ?>								 
                            </div>
                            <div class="product-desc" id="data-desc-pro">
                                <!-- desc -->
                                <p>
                                    <?php 
                                        if ($product['description'] == 'undefined' || $product['description'] == '') {
                                            echo "26 April Flowers chuyên cung cấp hoa tươi số 1 Hà Nội";
                                        }else{
                                            echo $product['description']; 
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="product-quantity" id="data-qty-pro">
                                <label>Số lượng : </label>
                                <input min="1" max="20" value="1" type="number" class="add-cart-inpx">
                                <button class="button" type="button" id="data-addtocart">
                                    <!-- ajax json button -->
                                    <a href="#" id="<?php echo $product['id_product']; ?>" class="add-cart-btnx">Thêm vào giỏ</a>
                                </button>
                            </div>

                            <div class="product-meta product-origins">
                                <span>Xuất xứ : <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>"><?php echo $product['origin']; ?></a></span>
                            </div>
                        </form>
                        <div class="product-social">
                            <h3>Chia sẻ sản phẩm</h3>
                            <ul>
                                <li class="fb-share-button" data-href="http://php0320e2-2.itpsoft.com.vn/chi-tiet-san-pham/<?php echo $product['id_product']; ?>" data-layout="button" data-size="small">
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fphp0320e2-2.itpsoft.com.vn%2Fchi-tiet-san-pham%2F<?php echo $product['id_product']; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" title="chia sẻ sản phẩm lên facebook">
                                        <i class="fa fa-facebook"></i> Facebook 
                                        <head>
                                            <meta property="og:url"           content="http://php0320e2-2.itpsoft.com.vn/chi-tiet-san-pham/<?php echo $product['id_product']; ?>" />
                                            <meta property="og:type"          content="website" />
                                            <meta property="og:title"         content="<?php echo $product['product_name']; ?>" />
                                            <meta property="og:description"   content="<?php echo $product['description']; ?>" />
                                            <meta property="og:image"         content="assets/images/products/<?php echo $product['main_image']; ?>" />
                                        </head>
                                    </a>
                                </li>

                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> Tweet</a></li>
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> Pinterest</a></li>
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                                <li><a class="youtube" href="#" title="linkedin"><i class="fa fa-youtube-play"></i> Youtube</a></li>
                            </ul>
                        </div>
                     </div>
    			</div>
         <?php        
            }
        ?>
        <!-- ./PHP -->
		</div>
	</div>
</div>
 <!-- ./productDetail -->
<!-- productInfo -->
<div class="product-d-info mb-65">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-d-inner">
                        <div class="product-info-button">
                            <ul class="nav nav-detailProduct" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Mô tả sản phẩm</a>
                                </li>
                                <li>
                                     <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Thông tin sản phẩm</a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product-info-content" id="data-info-pro">
                                    <!-- info -->
                                    <p><?php echo $product['description']; ?></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                <div class="product-d-table">
                                   <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Tên :</td>
                                                    <td id="data-style-name"><span><?php echo $product['product_name']; ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Danh mục :</td>
                                                    <td id="data-style-cate"><span><?php echo $product['classify']; ?></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product-info-content" id="data-info-desc-pro">
                                   <!-- info desc -->
                                   <p><?php echo $product['description']; ?></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews-wrapper">
                                    <!-- PHP -->
                                    <?php  
                                        foreach ($result as $key => $product) { ?>
                                            <div class="fb-comments" data-href="http://php0320e2-2.itpsoft.com.vn/chi-tiet-san-pham/<?php echo $product['id_product']; ?>" data-numposts="5" data-width="100%"></div>
                                    <?php
                                        }
                                    ?>
                                    <!-- ./PHP -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!---./productInfo -->
<!-- Product_area -->
<!-- wishlist_products -->
<!-- load wishlist -->
<div class="load-wishlish-detailPro">
    <div class="load-wishlish-detailPro__all">
    <!-- PHP -->
    <?php
        if (isset($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) { ?>
            <!-- html -->
            <section class="product wishlist_products">
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
                        <?php foreach ($_SESSION['wishlist'] as $key => $val): ?>
                            <!-- html -->
                            <div class="col-lgz-2 col-md-6 col-6">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="One">
                                        <article class="product__single">
                                            <figure>
                                                <div class="product-thumb">
                                                    <a href="chi-tiet-san-pham/<?php echo $val['id_product']; ?>" class="product-thumb__image product-thumb__image--first">
                                                        <img class="img-fluid" alt="<?php echo $val['product_name'] ?>" src="assets/images/products/<?php echo $val['main_image'] ?>">
                                                    </a>
                                                    <a href="chi-tiet-san-pham/<?php echo $val['id_product']; ?>" class="product-thumb__image product-thumb__image--second">
                                                        <img class="img-fluid" alt="<?php echo $val['product_name'] ?>" src="assets/images/hl-products/<?php echo $val['second_image'] ?>">
                                                    </a>
                                                    <div class="product-link">
                                                        <ul class="d-flex">
                                                            <li class="product-link__item product-link__item--cart">
                                                                <a id="<?php echo $val['id_product'] ?>" href="#">
                                                                    <span class="lnr lnr-cart"></span>
                                                                </a>
                                                            </li>
                                                            <li class="show-eye product-link__item--show">
                                                                <a id="<?php echo $val['id_product'] ?>" data-toggle="modal" href="#modalProduct" class="product-link__show">
                                                                    <span class="lnr lnr-eye"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a id="<?php echo $val['id_product'] ?>" class="wishlish-btn-remove" href="#">
                                                                    <span class="lnr lnr-trash"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption>
                                                    <div class="product-content">
                                                        <h4><a href="chi-tiet-san-pham/<?php echo $val['id_product']; ?>"><?php echo $val['product_name'] ?></a></h4>
                                                        <p><a href="chi-tiet-san-pham/<?php echo $val['id_product']; ?>"><?php echo $val['classify'] ?></a></p>
                                                        <div class="d-flex align-items-center justify-content-center product-contentPrice">
                                                            <span class="product-content__price"><?php echo number_format($val['price']).'đ' ?></span>
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
        }
    ?>
    <!-- ./PHP -->
    </div>
</div>
<!-- ./load wishlist -->

<!-- ./wishlist_products -->
<!-- related_products -->
<section class="product related_products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product__title product-res">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row" id="Data-conectPro">
            <!-- PHP -->
            <?php  
                foreach ($product_related as $key => $product) { ?>

                    <div class="col-lgz-2 col-md-6 col-6">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="One">
                                <article class="product__single">
                                    <figure>
                                        <div class="product-thumb">
                                            <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--first">
                                                <img class="img-fluid" alt="<?php echo $product['product_name']; ?>" src="assets/images/products/<?php echo $product['main_image']; ?>">
                                            </a>
                                            <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>" class="product-thumb__image product-thumb__image--second">
                                                <img class="img-fluid" alt="<?php echo $product['product_name']; ?>" src="assets/images/hl-products/<?php echo $product['second_image']; ?>">
                                            </a>
                                             <?php  
                                                if ($product['quantity'] < 1) { ?>

                                                     <div class="product-thumb__label zero-product">
                                                        <span>Hết</span>
                                                    </div>  
                                            <?php
                                                } else { ?>
                                                    <span class="has-pro-span">Còn hàng</span>
                                            <?php
                                                }
                                            ?>
                                            <div class="product-link">
                                                <ul class="d-flex">
                                                    <li class="product-link__item product-link__item--cart">
                                                        <a id="<?php echo $product['id_product']; ?>" href="#">
                                                            <span class="lnr lnr-cart"></span>
                                                        </a>
                                                    </li>
                                                    <li class="show-eye product-link__item--show">
                                                        <a id="<?php echo $product['id_product']; ?>" class="product-link__show" data-toggle="modal" href="#modalProduct">
                                                            <span class="lnr lnr-eye"></span>
                                                        </a>
                                                    </li> 
                                                    <li>
                                                        <a id="<?php echo $product['id_product']; ?>" class="product-link-wishlist" href="#">
                                                            <span class="lnr lnr-heart"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <figcaption>
                                            <div class="product-content">
                                                <h4><a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>"><?php echo $product['product_name']; ?></a></h4>
                                                <p><a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>"><?php echo $product['classify']; ?></a></p>
                                                <div class="d-flex align-items-center justify-content-center product-contentPrice">
                                                    <span class="product-content__price"><?php echo number_format($product['price']).'đ'; ?></span>
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
            <!-- ./PHP -->
            
         </div>
    </div>
</section>
<!-- ./related_products -->
<!-- modalProduct -->
<?php include_once 'modalProduct.php'; ?>
<!-- ./Product_area-->

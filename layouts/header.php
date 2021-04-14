<header>
    <!-- Header-top -->
    <div class="header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="header-top__nav">
                        <ul>
                            <!-- PHP -->
                            <?php  
                                if (isset($_SESSION['id_member'])) { ?>
                                   
                                    <li style="box-shadow: var(--shadow-primary); padding: .3rem">
                                        <a href="ca-nhan/<?php echo $_SESSION['id_member']; ?>" title="Thông tin cá nhân">
                                            <strong><?php echo $_SESSION['member_name']; ?></strong>
                                        </a>
                                    </li>
                                    <li><span>/</span></li>
                                    <li><a title="Đăng xuất" class="logout-btn" href="#"><i class="fas fa-sign-out-alt ml-2"></i></a></li>
                            <?php       
                                } else { ?>

                                     <li><a title="Đăng kí" href="dang-ky">Đăng ký</a></li>
                                     <li><span>/</span></li>
                                     <!-- indexHome => tức là đứng từ trang home gọi login -->
                                     <li><a title="Đăng nhập" href="dang-nhap">Đăng nhập</a></li>
                            <?php
                                }
                            ?>
                            <!-- ./PHP -->
                            <li class="header-top__item--sub header-top-lp">
                                <a href="#" style="padding: 0;">Tra cứu đơn hàng</a>
                                <ul class="header-top-lookup" style="color: #fe59c2 !important;">
                                    <?php  
                                        if (isset($_SESSION['id_member'])) { ?>
                                            <li class="account-lookup">
                                                <a href="ca-nhan/<?php echo $_SESSION['id_member']; ?>">Tài khoản</a>
                                            </li>
                                    <?php
                                        } else { ?>
                                            <li class="account-lookup">
                                                <a href="dang-nhap">Đăng nhập</a>
                                            </li>
                                    <?php
                                        }
                                    ?>
                                    <li class="fast-lookup"><a href="#">Tra cứu nhanh</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="header-top__nav text-center">
                        <ul>
                            <li class="header-top__item--sub header-top-lp">
                                
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="header-top__nav text-right">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="mailto:leminhyen199x@gmail.com" target="_top"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.facebook.com/26-April-108650617945404/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Header-top -->
    <!-- Header-middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                    <div class="header-middle__logo">
                        <a href="trang-chu"><img class="img-fluid" src="assets/images/logo/logo.png" alt="Logo Fresh Garden"></a>
                    </div>
                </div>   
                <div class="col-lg-10 col-md-6 col-sm-7 col-6 mr-auto">
                    <div class="header-middle-info d-flex align-items-center justify-content-end">
                        <form method="POST" action="cua-hang/tim-kiem" class="header-middle-info__form">
                            <div class="header-middle-info__categories">
                                <select class="nice-select select-option" name="select-seach-home">
                                    <option value="0">Chọn một danh mục</option>
                                    <!-- PHP -->
                                    <?php  
                                        foreach ($arr_cate as $key => $cate) { ?>
                                            <option value="<?php echo $cate['id_category']; ?>"><?php echo $cate['name_cate']; ?></option>
                                    <?php
                                        }
                                    ?>
                                    <!-- ./PHP -->
                                </select>
                            </div>
                            <div class="header-middle-info__search">
                                <input required type="text" name="inp-seach-home" placeholder="Tìm kiếm sản phẩm..."/>
                                <button type="submit" name="btn-seach-home" class="btn btn--primary btn-hover-dark">
                                    <span class="lnr lnr-magnifier"></span>
                                </button>
                            </div>
                        </form>
                        <div class="header-middle-info__account d-flex align-items-center">
                            <div class="header-middle-info__item">
                                <ul>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                            <!-- Load wishlist -->
                            <div class="load-wishlist">
                                <div class="load-wishlist-all">
                                    
                                    <div class="header-middle-info__item">
                                        <a href="san-pham-yeu-thich">
                                            <span class="lnr lnr-heart icon"></span>
                                            <!-- PHP -->
                                            <?php  
                                                if (isset($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) { 
                                                    $count_wishlist = count($_SESSION['wishlist']);
                                            ?>

                                                    
                                                    <span class="count"><?php echo $count_wishlist; ?></span>
                                            <?php 
                                                } else { ?>

                                                    <span class="count">0</span>
                                            <?php
                                                }
                                            ?>
                                            <!-- ./PHP -->
                                            
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- ./Load wishlist -->

                            <!-- Frofile -->
                            <?php  
                                if (isset($_SESSION['id_member'])) { ?>
                                    <div class="profile-sm header-middle-info__item">
                                        <a title="Thông tin cá nhân" href="ca-nhan/<?php echo $_SESSION['id_member']; ?>"><span class="lnr lnr-user icon"></span></a>
                                    </div>
                            <?php
                                } else { ?>
                                     <div class="profile-sm header-middle-info__item">
                                        <a title="Đăng nhập tài khoản" href="dang-nhap"><span class="lnr lnr-user icon"></span></a>
                                    </div>
                            <?php
                                }
                            ?>
                            
                            <!-- ./Frofile -->

                            <div class="header-middle-info__item header-middle-info__item--cart">
                                <a href="#">
                                    <span class="lnr lnr-cart icon"></span>
                                    <!-- load-mini-cart -->
                                    <div class="load-mini-cart">
                                        <!-- PHP -->
                                        <?php  
                                            $count_cart = 0;
                                            if (isset($_SESSION['cart1998']) && !empty($_SESSION['cart1998'])) { ?>
                                                <?php  
                                                    foreach ($_SESSION['cart1998'] as $key => $cart) {
                                                        $count_cart += $cart['qty'];
                                                    }
                                                ?>

                                                <span class="count"><?php echo $count_cart; ?></span>
                                        <?php
                                            } else { ?>

                                                <span class="count">0</span>
                                        <?php
                                            }
                                        ?>
                                        <!-- ./PHP -->
                                    </div>
                                    <!-- ./load-mini-cart -->
                                </a>
                                <!--mini cart-->
                                <div class="header-minicart">
                                    <div class="header-minicart-head d-flex align-items-center justify-content-between">
                                        <h3 class="header-minicart-head__title">
                                            Giỏ hàng của bạn
                                        </h3>
                                        <div class="header-minicart-head__btn">
                                            <a href="#"><span class="lnr lnr-cross"></span></a>
                                        </div>
                                    </div>

                                    <!-- Load ajax -->
                                    <div class="load-mega">
                                        <div class="load-all">
                                            <!-- PHP -->
                                            <?php  
                                                if (isset($_SESSION['cart1998']) && !empty($_SESSION['cart1998'])) { ?>
                                                    <!-- html -->
                                                    <!-- main -->
                                                    <?php 
                                                            $_SESSION['sumCart'] = 0; 
                                                        foreach ($_SESSION['cart1998'] as $key => $product) { 
                                                            $_SESSION['sumCart'] += $product['qty'] * $product['price'];
                                                    ?>
                                                        <!-- html -->
                                                        <div class="header-minicart-middle d-flex align-items-center justify-content-between">
                                                            <div class="header-minicart-middle__image" style="width: 8rem; height: 8rem;">
                                                                <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>">
                                                                    <img src="assets/images/products/<?php echo $product['main_image'] ?>" alt="<?php echo $product['product_name'] ?>">
                                                                </a>
                                                            </div>
                                                            <div class="header-minicart-middle__info">
                                                                <a href="chi-tiet-san-pham/<?php echo $product['id_product']; ?>">
                                                                    <?php echo $product['product_name'] ?>
                                                                 </a>
                                                                <p>
                                                                    <?php echo $product['qty'].' <span class="mx-3">x</span> ' ?>
                                                                    <span><?php echo number_format( $product['price']).'đ' ?></span>
                                                                </p>    
                                                            </div>
                                                            <div class="cart-body__remove">
                                                                <button class="btn header-minicart-middle__btn" value="<?php echo $product['id_product'] ?>">
                                                                    <span class="lnr lnr-cross"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- ./html -->
                                                    <?php } ?>
                                                    
                                                        <!-- total -->
                                                        <div class="header-minicart-payl">
                                                            <div class="header-minicart-payl__item d-flex align-items-center justify-content-between">
                                                                <span>Thành tiền :</span>
                                                                <span class="price color-primary font-weight-bold"><?php echo number_format($_SESSION['sumCart']).'đ'?></span>
                                                            </div>
                                                        </div>
                                                        <!-- ./html -->
                                            <?php
                                                } else { ?>
                                                    <div class="minicart-empty" style="padding: 6.5rem 0; margin: 0 auto;">
                                                        <div class="minicart-empty-content" style="width: 100%; height: 10rem;  border: .1rem solid var(--border-color); text-align: center; padding: 1.5rem;">
                                                            <h2 style="font-size: 2.6rem; text-transform: capitalize;">Thông báo</h2>
                                                            <p>Giỏ hàng bạn đang trống!</p>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                            <!-- ./PHP -->
                                        </div>
                                    </div>
                                    <!-- ./Load ajax -->
                                    <div class="header-minicart-bottom">
                                        <div class="header-minicart-bottom__btn header-minicart-bottom__btn--cart">
                                            <a class="btn btn--primary btn-hover-dark" href="gio-hang"><i class="fa fa-shopping-cart"></i> Giỏ hàng của bạn</a>
                                        </div>
                                        <div class="header-minicart-bottom__btn header-minicart-bottom__btn--payl">
                                            <a class="btn btn--primary btn-hover-dark" href="thanh-toan"><i class="fa fa-sign-in"></i> Thanh toán</a>
                                        </div>
                                    </div>
                                    <div class="header-minicart-fixed d-flex align-items-center justify-content-between">
                                        <div class="header-minicart-fixed__item d-flex align-items-center">
                                            <div class="header-minicart-fixed__image">
                                                <img src="assets/images/s-iconcart/shipping-tZV.svg" alt="icon shippings">
                                            </div>
                                            <div class="header-minicart-fixed__title">
                                                <p>
                                                    Freeship
                                                    <span>với đơn hàng trên 200.000đ</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="header-minicart-fixed__item d-flex align-items-center">
                                            <div class="header-minicart-fixed__image">
                                                <img src="assets/images/s-iconcart/warranty-81R.svg" alt="icon protected">
                                            </div>
                                            <div class="header-minicart-fixed__title">
                                                <p>
                                                    Được kiểm duyệt
                                                    <span>Đảm bảo chất lượng 100%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
						    <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Header-middle -->
    <!-- Header-bottom -->
    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="header-bottom-cate">
                        <h2 class="header-bottom-cate__title">Tất cả danh mục</h2>   
                        <div class="header-bottom-cate-toggle">
                            <ul>
                                <!-- PHP -->
                                <?php  
                                    foreach ($arr_cate as $key => $cate) {
                                        if ($cate['status'] == 1) { ?>
                                            <li class="menu-childen" id="name-cate-product">
                                                <a href="cua-hang/danh-muc/<?php echo $cate['id_category']; ?>"><?php echo $cate['name_cate']; ?></a>
                                            </li>
                                    <?php
                                        } else { ?>
                                            <li class="hidden" id="name-cate-product">
                                                <a href="cua-hang/danh-muc/<?php echo $cate['id_category']; ?>"><?php echo $cate['name_cate']; ?></a>
                                            </li>
                                    <?php
                                        }
                                    }   
                                ?>
                                <!-- ./PHP -->
                                <!-- hide -->
                                <div id="hide-cate-pro">
                                    <div class="hidden">
                                        <!-- ajax json. -->
                                    </div>
                                    <li><a href="#" class="more_btn"><i class="fa fa-plus" aria-hidden="true"></i> Mở rộng danh mục</a></li>
                                </div>
                                <!-- ./hide -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-bottom-menu">
                        <ul>
                            <li class="">
                                <a href="trang-chu" <?php if($_SESSION['pages'] == 'home'){ echo "class='active'"; } ?>> Trang chủ
                                </a>
                            </li>
                            <li class=""><a href="chung-toi" <?php if($_SESSION['pages'] == 'about'){ echo "class='active'"; } ?>>Chúng tôi</a></li>
                            <li class=""><a id="product-shop" <?php if($_SESSION['pages'] == 'product-shop'){ echo "class='active'"; } ?> href="cua-hang">Sản phẩm</a></li>
                            <li class="header-bottom--blog" <?php if($_SESSION['pages'] == 'blog-area'){ echo "class='active'"; } ?>><a href="bai-viet">Blog</a></li>
                            <li class=""><a href="lien-he" <?php if($_SESSION['pages'] == 'contact'){ echo "class='active'"; } ?>>Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="header-bottom__contact text-right">
                        <p>
                            <a href="tel:0977982881">0977 982 881</a>
                            hỗ trợ khách hàng
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Header-bottom -->
</header>
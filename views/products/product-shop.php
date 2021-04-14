<!-- headDetail  -->
<section class="shopPro" data-bgimg="assets/images/banners/banner18.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="shopPro__title">Cửa hàng</h2>
                <div class="shopPro__item">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="trang-chu">Trang chủ</a></li>
                            <li class="breadcrumb-item " aria-current="page">Cửa hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./headDetail -->
<!-- shopArea -->
<section class="shop mt-70 mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--sidebar widget start-->
                <aside class="sidebar-widget">
                    <div class="widget-inner">
                        <div class="widget-list widget-categories">

                            <div id="shop-title-cate">
                                <h3>Danh mục</h3>
                            </div>
                            <!-- nameCate -->
                            <ul id="show-cate-product">
                                <!-- PHP -->
                                <?php  
                                    foreach ($arr_cate as $key => $cate) { ?>
                                        <li class="sub-categories1 name-cate-product <?php if($id == $cate['id_category'] && $index == 1) { echo 'active'; } ?>">
                                            <a href="cua-hang/danh-muc/<?php echo $cate['id_category']; ?>"><?php echo $cate['name_cate']; ?></a>
                                        </li>
                                <?php
                                    }
                                ?>
                                <!-- ./PHP -->
                            </ul>
                            <!-- ./nameCate -->
                        </div>

                        <!-- Price -->
                        <div class="widget-list widget-filter" id="shop-title-price">
                            <h3>Lọc theo giá</h3>
                            <form method="POST" action="cua-hang/don-gia" class="form-search-price"> 
                                <div id="slider-range"></div>   
                                <button type="submit" class="btn btn-success" name="sm_price">Lọc</button>
                                <input readonly type="text" name="name_price" id="amount" />   
                            </form> 
                        </div>
                        <!-- ./Price -->

                        <!-- Brand -->
                        <div class="widget-list widget-menu" id="shop-title-brand">
                            <h3>Thương hiệu</h3>
                            <ul class="table-responsive" id="data-brand" style="max-height: 20rem;">
                                <!-- PHP -->
                                <?php  
                                    foreach ($arr_brand as $key => $brand) { ?>
                                        <li class="search-product-brand <?php if($id == $brand['id_brand'] && $index == 3) { echo 'active'; } ?>">
                                            <a href="cua-hang/thuong-hieu/<?php echo $brand['id_brand']; ?>"><?php echo $brand['brand_name']; ?></a>
                                        </li>
                                <?php
                                    }
                                ?>
                                <!-- ./PHP -->
                        </ul>
                        </div>
                        <!-- ./Brand -->

                        <div class="widget-list banner-widget">
                            <div class="banner-thumb">
                                <a href="cua-hang">
                                    <img class="img-fluid banner-widget--pc" src="assets/images/bg/banner17.jpg" alt="Banner shop flowers">
                                    <img class="img-fluid banner-widget--mobile" src="assets/images/bg/banner6.jpg" alt="Banner shop flowers">
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--./sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
                <!--shop toolbar-wrapper-->
                <div class="shop-toolbar-wrapper">
                    <div class="shop-toolbar-btn">

                        <button data-role="grid-3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3 sản phẩm / hàng"></button>

                        <button data-role="grid-4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4 sản phẩm / hàng"></button>

                        <button data-role="grid-list" type="button"  class="btn-list" data-toggle="tooltip" title="1 sản phẩm / hàng"></button>
                    </div>
                    <div class=" niceselect-option">
                        <form class="select-option-shop" action="cua-hang/sap-xep" method="POST">
                            <select name="orderby" id="short" class="nice-select">
                                <option selected <?php if(isset($keyw) && $keyw == 'moi-nhat') { echo 'selected'; } ?> value="moi-nhat">
                                    Sắp xếp theo : độ mới nhất
                                </option>
                                <option <?php if(isset($keyw) && $keyw == 'cu-nhat') { echo 'selected'; } ?> value="cu-nhat">
                                    Sắp xếp theo : độ cũ nhất
                                </option>
                                <option <?php if(isset($keyw) && $keyw == 'theo-a-z') { echo 'selected'; } ?> value="theo-a-z">
                                    Sắp xếp theo : tên từ A-Z
                                </option>
                                <option <?php if(isset($keyw) && $keyw == 'theo-z-a') { echo 'selected'; } ?> value="theo-z-a">
                                    Sắp xếp theo : tên từ Z-A
                                </option>
                                <option <?php if(isset($keyw) && $keyw == 'thap-cao') { echo 'selected'; } ?> value="thap-cao">
                                    Sắp xếp theo : giá thấp đến cao
                                </option>
                                <option <?php if(isset($keyw) && $keyw == 'cao-thap') { echo 'selected'; } ?> value="cao-thap">
                                    Sắp xếp theo : giá cao đến thấp
                                </option>
                            </select>
                            <button type="submit" name="sm_sort" class="btn btn--primary btn-hover-dark" style="height: 4.2rem;width: 4.2rem;border-radius: 50%;font-size: 1.4rem;margin-left: 1rem;">Lọc</button>
                        </form>
                    </div>
                    <div class="page-amount" id="data-count">
                       <p>Có <span class="font-weight-bold text-success"><?php echo $numb; ?></span> sản phẩm được tìm thấy</p>
                    </div>
                </div>
                <!-- ./shop toolbar-wrapper-->
                 <!-- shop-wrapper -->
                 <div class="row shop-wrapper" id="data-product-shop">
                    <!-- PHP -->
                    <?php  
                    foreach ($shop as $key => $product) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <article class="product__single">
                                <figure>
                                    <div class="product-thumb">
                                        <a href="chi-tiet-san-pham/<?php echo $product['id_product'];?>" class="product-thumb__image product-thumb__image--first">
                                            <img class="img-fluid" src="assets/images/products/<?php echo $product['main_image']; ?>" alt="<?php echo $product['product_name']; ?>">
                                        </a>
                                            <a href="chi-tiet-san-pham/<?php echo $product['id_product'];?>" class="product-thumb__image product-thumb__image--second">
                                                <img class="img-fluid" src="assets/images/hl-products/<?php echo $product['second_image']; ?>" alt="<?php echo $product['product_name']; ?>">
                                            </a>

                                            <!-- PHP -->
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
                                            <!-- ./PHP -->
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
                                        <h4><a href="chi-tiet-san-pham/<?php echo $product['id_product'];?>"><?php echo $product['product_name']; ?></a></h4>
                                        <p><a href="chi-tiet-san-pham/<?php echo $product['id_product'];?>"><?php echo $product['classify']; ?></a></p>

                                        <div class="d-flex align-items-center justify-content-center product-contentPrice">
                                            <span class="product-content__price"><?php echo number_format($product['price']).'đ'; ?></span>
                                        </div>
                                    </div>
                                    <div class="product-content list-content">
                                        <h4><a href="chi-tiet-san-pham/<?php echo $product['id_product'];?>"><?php echo $product['product_name']; ?></a></h4>
                                        <p><a href="chi-tiet-san-pham/<?php echo $product['id_product'];?>"><?php echo $product['classify']; ?></a></p>

                                        <div class="d-flex align-items-center justify-content-center product-contentPrice">
                                            <span class="product-content__price"><?php echo number_format($product['price']).'đ'; ?></span>
                                        </div>

                                        <div class="product-desc">
                                            <p><?php echo $product['description']; ?></p>
                                        </div>

                                        <div class="action-links">
                                            <ul>
                                                <li class="product-link__item--cart">
                                                    <a id="<?php echo $product['id_product']; ?>" class="addToCart" href="#" title="Thêm vào giỏ hàng">Thêm vào giỏ</a>
                                                </li>
                                                <li class="product-link__item--show">
                                                    <a href="#modalProduct" id="<?php echo $product['id_product']; ?>" class="btn btn-icon btn-outline-body btn-hover-primary btn-circle" href="#" data-toggle="modal"  title="hiển thị sản phẩm">
                                                        <span class="lnr lnr-eye"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="<?php echo $product['id_product']; ?>" class="btn btn-icon btn-outline-body btn-hover-primary btn-circle product-link-wishlist" href="#" title="Thêm vào sản phẩm yêu thích">
                                                        <span class="lnr lnr-heart"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <?php
                        }
                    ?>
                    <!-- ./PHP -->
                <!-- ./shop-wrapper -->
            <!-- Pagination -->
            </div>  
                <!-- PHP -->
                <?php  
                    // Của trang chính
                    if (isset($index) && $index == 0) { ?>
                        <!-- shop-bottom -->
                        <div class="shop-toolbar shop-bottom">
                            <div class="pagination">
                                <ul class="pagination">
                                    <?php  
                                    if ($pages > 1) { ?>

                                        <li class="page-item">
                                            <a class="page-link" href="cua-hang/trang/<?php echo $pages = ($pages - 1); ?>">&laquo;</a>
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

                                    <li class="page-item"><a class="page-link <?php if($i === $abc){ echo 'active'; } ?>" href="cua-hang/trang/<?php echo $i; ?>"><?php echo $i ?></a></li>

                                <?php
                                    }
                                ?>
                                <?php  
                                if (isset($_GET['pages'])) {
                                    $pages = $_GET['pages'];
                                }
                                if ($pages < $pagination) { ?>
                                    <li class="page-item ">
                                        <a class="page-link" href="cua-hang/trang/<?php echo $pages = ($pages + 1); ?>">&raquo;</a>
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
                    // Lọc theo danh mục         
                    } elseif (isset($index) && $index == 1) { ?>

                        <!-- shop-bottom -->
                        <div class="shop-toolbar shop-bottom">
                            <div class="pagination">
                                <ul class="pagination">

                                    <?php  
                                    if ($pages > 1) { ?>

                                        <li class="page-item">
                                            <a class="page-link" href="cua-hang/danh-muc/<?php echo $id;?>/trang/<?php echo $pages = ($pages - 1); ?>">&laquo;</a>
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

                                    <li class="page-item"><a class="page-link <?php if($i === $abc){ echo 'active'; } ?>" href="cua-hang/danh-muc/<?php echo $id;?>/trang/<?php echo $i;?>"><?php echo $i ?></a></li>
                                <?php
                                    }
                                ?>

                                <?php  

                                if (isset($_GET['pages'])) {
                                    $pages = $_GET['pages'];
                                }

                                if ($pages < $pagination) { ?>

                                    <li class="page-item ">
                                        <a class="page-link" href="cua-hang/danh-muc/<?php echo $id;?>/trang/<?php echo $pages = ($pages + 1); ?>">&raquo;</a>
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
                    //Lọc theo giá tiền.
                    } elseif (isset($index) && $index == 2) { ?>
                        <!-- shop-bottom -->
                        <div class="shop-toolbar shop-bottom">
                            <div class="pagination">
                                <ul class="pagination">

                                    <?php  
                                    if ($pages > 1) { ?>

                                        <li class="page-item">
                                            <a class="page-link" href="cua-hang/don-gia/<?php echo $priceFrom;?>:<?php echo $priceTo;?>/trang/<?php echo $pages = ($pages - 1); ?>">&laquo;</a>
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

                                    <li class="page-item"><a class="page-link <?php if($i == $abc) { echo 'active'; } ?>" href="cua-hang/don-gia/<?php echo $priceFrom;?>:<?php echo $priceTo;?>/trang/<?php echo $i;?>"><?php echo $i ?></a></li>
                                <?php
                                    }
                                ?>

                                <?php  

                                if (isset($_GET['pages'])) {
                                    $pages = $_GET['pages'];
                                }

                                if ($pages < $pagination) { ?>

                                    <li class="page-item ">
                                        <a class="page-link" href="cua-hang/don-gia/<?php echo $priceFrom;?>:<?php echo $priceTo;?>/trang/<?php echo $pages = ($pages + 1); ?>">&raquo;</a>
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
                    // Lọc theo thương hiệu.
                    } elseif (isset($index) && $index == 3) { ?>
                         <!-- shop-bottom -->
                        <div class="shop-toolbar shop-bottom">
                            <div class="pagination">
                                <ul class="pagination">

                                    <?php  
                                    if ($pages > 1) { ?>

                                        <li class="page-item">
                                            <a class="page-link" href="cua-hang/thuong-hieu/<?php echo $id;?>/trang/<?php echo $pages = ($pages - 1); ?>">&laquo;</a>
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

                                    <li class="page-item"><a class="page-link <?php if($i == $abc) { echo 'active'; } ?>" href="cua-hang/thuong-hieu/<?php echo $id;?>/trang/<?php echo $i; ?>"><?php echo $i ?></a></li>
                                <?php
                                    }
                                ?>

                                <?php  

                                if (isset($_GET['pages'])) {
                                    $pages = $_GET['pages'];
                                }

                                if ($pages < $pagination) { ?>

                                    <li class="page-item ">
                                        <a class="page-link" href="cua-hang/thuong-hieu/<?php echo $id;?>/trang/<?php echo $pages = ($pages + 1); ?>">&raquo;</a>
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
                    // lọc theo sắp xếp.
                    } elseif (isset($index) && $index == 4) { ?>
                         <!-- shop-bottom -->
                        <div class="shop-toolbar shop-bottom">
                            <div class="pagination">
                                <ul class="pagination">

                                    <?php  
                                    if ($pages > 1) { ?>

                                        <li class="page-item">
                                            <a class="page-link" href="cua-hang/sap-xep/<?php echo $keyw;?>/trang/<?php echo $pages = ($pages - 1); ?>">&laquo;</a>
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

                                    <li class="page-item"><a class="page-link <?php if($i == $abc) { echo 'active'; } ?>" href="cua-hang/sap-xep/<?php echo $keyw;?>/trang/<?php echo $i;?>"><?php echo $i ?></a></li>
                                <?php
                                    }
                                ?>

                                <?php  

                                if (isset($_GET['pages'])) {
                                    $pages = $_GET['pages'];
                                }

                                if ($pages < $pagination) { ?>

                                    <li class="page-item ">
                                        <a class="page-link" href="cua-hang/sap-xep/<?php echo $keyw;?>/trang/<?php echo $pages = ($pages + 1); ?>">&raquo;</a>
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
                    } elseif (isset($index) && $index == 5) { ?>
                         <!-- shop-bottom -->
                        <div class="shop-toolbar shop-bottom">
                            <div class="pagination">
                                <ul class="pagination">

                                    <?php  
                                    if ($pages > 1) { ?>

                                        <li class="page-item">
                                            <a class="page-link" href="cua-hang/tim-kiem/<?php echo $key_cate;?>/<?php echo $key_inpx;?>/trang/<?php echo $pages = ($pages - 1); ?>">&laquo;</a>
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

                                    <li class="page-item"><a class="page-link <?php if($i == $abc) { echo 'active'; } ?>" href="cua-hang/tim-kiem/<?php echo $key_cate;?>/<?php echo $key_inpx;?>/trang/<?php echo $i; ?>"><?php echo $i ?></a></li>
                                <?php
                                    }
                                ?>

                                <?php  

                                if (isset($_GET['pages'])) {
                                    $pages = $_GET['pages'];
                                }

                                if ($pages < $pagination) { ?>

                                    <li class="page-item ">
                                        <a class="page-link" href="cua-hang/tim-kiem/<?php echo $key_cate;?>/<?php echo $key_inpx;?>/trang/<?php echo $pages = ($pages + 1); ?>">&raquo;</a>
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
        </div>
    </div>
</section>
<!-- ./shopArea -->
<!-- modalProduct -->
<?php include_once 'modalProduct.php'; ?>

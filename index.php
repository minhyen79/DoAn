<?php 
    session_start();
    ob_start();

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'home';
    }
    $_SESSION['pages'] = $page;
?>



<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include_once 'layouts/head.php'; ?>
<!-- ./head -->
<body>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="108650617945404" theme_color="#fe59c2" logged_in_greeting="Xin chào ! 26 April Flowers có thể giúp gì cho bạn?" logged_out_greeting="Xin chào ! 26 April Flowers có thể giúp gì cho bạn?">
    </div>
    
    <!-- loader start -->
    <?php include_once 'layouts/loader-page.php'; ?>
    <!-- loader end -->
    
    <!-- (Notify) -->
    <?php include_once 'layouts/notify/notify.php'; ?>    
    <!-- ./(Notify) -->


    <!-- Wrapper -->
    <div class="wrapper">
        <!-- canvars -->
        <?php 
            if($page != "payl" && $page != "sentMailler" && $page != "login" && $page != "register") { 
                // include_once 'layouts/canvars.php'; 
                include_once 'controllers/cateProduct_c.php';
                $canvars =  new cateProduct_c();
                $canvars->show();
            } 
        ?>
        <!-- ./canvars -->
        <!-- Header -->
        <?php 
            if($page != "payl" && $page != "sentMailler"  && $page != "login" && $page != "register") { 
                include_once 'controllers/cateProduct_c.php';
                $cate =  new cateProduct_c();
                $cate->show();
            } 
        ?>
        <!-- ./Header -->
        <!-- slider -->
       <?php 
            if($page == "home") { 
                include_once 'controllers/slider_c.php';
                $slider = new slider_c();
                $slider->show();
            } 
        ?>
        <!-- ./slider -->
        <!-- shipping -->
        <?php if($page == "home") { include_once 'layouts/shipping.php'; } ?>
        <!-- ./shipping -->
        <!-- Main -->
        <main>

            <!-- (head-Page)product -->
                <?php

                   switch ($page) {

                        // trang chủ (sản phẩm mới).
                       case 'home':
                           // sản phẩm được bình chọn.
                           include_once 'controllers/rating_c.php';
                           $rating  = new rating_c;
                           $rating->showRating();

                            // sản phẩm mới.
                           include_once 'controllers/product_c.php';
                           $product = new product_c;
                           $product->newProduct();
                           break;

                        // trang giỏ hàng.
                        case 'cart':
                            include_once 'controllers/product_c.php';
                            $product = new product_c;
                            $product->pageCart();
                            break;

                        // trang thanh toán.
                        case 'payl':
                            include_once 'controllers/product_c.php';
                            $product = new product_c;
                            $product->pagePayl();
                            break;

                        // Trang gửi mail.
                        case 'sentMailler':
                            include_once 'controllers/product_c.php';
                            $product = new product_c;
                            $product->pagesentMailler();
                            break;

                        // trang đăng nhập
                        case 'login':
                            include_once 'controllers/member_c.php';
                            $member = new member_c();
                            $member->login();
                            break;
                        
                        // trang đăng ký
                        case 'register':
                            include_once 'controllers/member_c.php';
                            $member = new member_c();
                            $member->register();
                            break;

                        // trang đăng xuất
                        case 'logout':
                            include_once 'controllers/member_c.php';
                            $member = new member_c();
                            $member->logout();
                            break;

                        // trang chi tiết sản phẩm.
                        case 'product-detail':
                            include_once 'controllers/product_c.php';
                            $member = new product_c();
                            $member->productDetail();
                            break;

                        // Trang sản phẩm yêu thích.
                        case 'wishlist':
                            include_once 'controllers/product_c.php';
                            $member = new product_c();
                            $member->productWishlist();
                            break;

                        // Trang cửa hàng sản phẩm.
                        case 'product-shop':
                            include_once 'controllers/product_c.php';
                            $member = new product_c();
                            $member->productShop();
                            break;

                        // Trang chi tiết bài viết.
                        case 'blog-detail':
                            include_once 'controllers/blog_c.php';
                            $blog =  new blog_c();
                            $blog->blogDetail();
                            break;

                        // Trang hiển thị tất cả bài viết.
                        case 'blog-area':
                            include_once 'controllers/blog_c.php';
                            $blog =  new blog_c();
                            $blog->blogArea();
                            break;

                        // trang cá nhân.
                        case 'profile':
                            include_once 'controllers/profile_c.php';
                            $profile = new profile_c();
                            $profile->show();
                            break;

                        case 'contact':
                            include_once 'controllers/contact_c.php';
                            $contact = new contact_c();
                            $contact->show();
                            break;

                        case 'about':
                            include_once 'views/about.html';
                            break;

                       default:

                            header("Location: trang-chu");
                            break;
                   }

                ?>
            <!-- ./(head-Page)product -->


            <!-- banner -->
            <?php if($page == "home") { include_once 'layouts/banner.php'; } ?>
            <!-- ./banner -->

            <!-- bannerFull -->
            <?php if($page == "home") { include_once 'layouts/bannerfullwidth.php'; } ?>
            <!-- ./bannerFull -->

            <!-- blog (Đây là bài viết trưng bày ở trang chủ nên ít bị thay đổi mình để tạm vào layout)-->
            <?php 
                if($page == "home") { 
                    include_once 'controllers/blog_c.php';
                    $blog = new blog_c();
                    $blog->showBlog();
                } 
            ?>
            <!-- ./blog -->

            <!-- partner -->
            <?php if($page == "home") { include_once 'layouts/partner.php'; } ?>
            <!-- ./partner -->
        </main>
        <!-- ./Main -->

        <!-- Footer -->
       <?php if($page != "payl" && $page != "sentMailler" && $page != "login" && $page != "register") { include_once 'layouts/footer.php'; } ?>
        <!-- ./Footer -->
    </div>
    <!-- ./Wrapper -->

    <!-- ModalLookup -->
    <?php include_once 'views/mores/modal-lookup.php'; ?>
    <!-- ./ModalLookup -->

    <!-- footer -->
    <?php include_once 'layouts/java.php'; ?>
    <!-- ./footer -->    
</body>
</html>

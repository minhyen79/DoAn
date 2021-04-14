<!-- PHP -->
<?php  
    session_start();
    ob_start();

    // nếu phiên session['id_user'] không tồn tại chuyển thẳng đến trang đăng nhập.
    if (!isset($_SESSION['id_user'])) {
        echo "<script> location.href='../index.php'; </script>";
    } else {

        if (isset($_SESSION['role'])) {
            
            if ($_SESSION['role'] == 0) {
                
                echo "<script> location.href='../index.php'; </script>";
            }
        }
    }
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'home';
    }
?>
<!-- ./PHP -->
<!DOCTYPE html>
<html lang="en">
    <!-- head -->
    <?php include_once 'layouts/head.php'; ?>
    <!-- ./head -->

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <?php include_once 'layouts/top-navbar.php'; ?>
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <?php include_once 'layouts/left-navbar.php'; ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                       
                       <!-- PHP -->
                       <?php  

                            switch ($page) {
                                // home.
                                case 'home':
                                    include 'controllers/home_c.php';
                                    $home = new home_c();
                                    $home->getHome();
                                    break;
                                // user.
                                case 'user':
                                    include 'controllers/user_c.php';
                                    $user = new user_c();
                                    $user->getUser();
                                    break;
                                // member.
                                case 'member':
                                    include 'controllers/member_c.php';
                                    $member = new member_c();
                                    $member->getMember();
                                    break;

                                 case 'product':
                                    include 'controllers/product_c.php';
                                    $product = new product_c();
                                    $product->getProduct();
                                    break;

                                 case 'category':
                                    include 'controllers/category_c.php';
                                    $category = new category_c();
                                    $category->getCategory();
                                    break;   

                                case 'brand':
                                    include 'controllers/brand_c.php';
                                    $brand = new brand_c();
                                    $brand->getBrand();
                                    break; 

                                case 'order':
                                    include 'controllers/order_c.php';
                                    $order = new order_c();
                                    $order->getOrder();
                                    break; 

                                case 'new':
                                    include_once 'controllers/new_c.php';
                                    $new = new new_c();
                                    $new->getNews();
                                    break;

                                case 'cate_news':
                                    include_once 'controllers/cate_new_c.php';
                                    $cate_news = new cate_new_c();
                                    $cate_news->getCateNews();
                                    break;

                                 case 'slide':
                                    include_once 'controllers/slide_c.php';
                                    $slide = new slide_c();
                                    $slide->getSlide();
                                    break;

                                case 'rating':
                                    include_once 'controllers/rating_c.php';
                                    $rating = new rating_c();
                                    $rating->getRating();
                                    break;

                                 case 'contact':
                                    include_once 'controllers/contact_c.php';
                                    $contact = new contact_c();
                                    $contact->getContact();
                                    break;

                                case 'sub_image':
                                    include_once 'controllers/subImage_c.php';
                                    $sub_image = new subImage_c();
                                    $sub_image->subImage();
                                    break;

                                default:
                                    // code...
                                    break;
                            }
                       ?>
                       <!-- ./PHP -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->
                
                <!-- Footer Start -->
                <?php include_once 'layouts/footer.php'; ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- javas -->
      <?php if($page != "new") { include 'layouts/javas.php'; } ?>

      <!-- Đây là test -->
      <?php if($page == "new") { include 'layouts/javaCustom.php'; } ?>
    
       <!-- ./javas -->
    </body>
</html>


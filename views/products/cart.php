<section class="headCart" data-bgimg="assets/images/banners/banner18.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="headCart__tile">Giỏ hàng của bạn</h2>
                <div class="headCart__item">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="trang-chu">Trang chủ</a></li>
                            <li class="breadcrumb-item " aria-current="page">Giỏ hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./headCart -->

<!-- cart -->
<div class="shoppingCart">
    <div class="shoppingCart-omega">

    <!-- PHP -->
<?php 

    if (isset($_SESSION['cart1998']) && !empty($_SESSION['cart1998'])) {  ?>

    <section class="cart">
        <div class="container">
            <form action="" method="POST" class="cart-form">
                <table class="table cart-wishlist-table">
                    <thead>
                        <tr>
                            <th class="cart-head__name" colspan="2">Tên sản phẩm</th>
                            <th class="cart-head__price">Đơn giá</th>
                            <th class="cart-head__qty">Số lượng</th>
                            <th class="cart-head__subtotal">Thành tiền</th>
                            <th class="cart-head__remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- PHP -->
                    <?php 
                            $_SESSION['sumCart'] = 0;
                        foreach ($_SESSION['cart1998'] as $key => $product) { 
                            $_SESSION['sumCart'] += $product['qty'] * $product['price'];
                    ?>
                            <tr>
                                <td class="cart-body__thumb">
                                    <a href="#">
                                        <img alt="<?php echo $product['product_name']; ?>" src="assets/images/products/<?php echo $product['main_image']; ?>">
                                    </a>
                                </td>
                                <td class="cart-body__name"> 
                                    <a href="#"><?php echo $product['product_name'] ?></a>
                                </td>
                                <td class="cart-body__price">
                                    <span class="color-primary"><?php echo number_format($product['price']).'đ'; ?></span>
                                </td>
                                <td class="cart-body__qty">
                                    <div class="cart-qty">
                                        <input type="number" min="1" max="10" class="cart-qty__inp" name="" id="<?php echo $product['id_product'] ?>" value="<?php if($product['qty'] <= $product['quantity']) { echo $product['qty']; } else { echo $product['quantity']; }  ?>">
                                    </div>
                                </td>
                                <td class="cart-body__subtotal">
                                    <span class="color-primary"><?php echo number_format($subtotal = $product['qty'] * $product['price']).'đ'; ?></span>
                                </td>
                                <td class="cart-body__remove">
                                    <button value="<?php echo $product['id_product']; ?>" type="button" class="btn">×</button>
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                    <!-- ./PHP -->
                    </tbody> 
                </table>
                <div class="row justify-content-between cart-bottom">
                    <div class="col-auto">
                        <a class="btn btn--primary btn-hover-dark btn-non-circle" href="trang-chu">Tiếp tục mua hàng</a>
                    </div>
                    
                    <div class="col-auto mb-3">
                        <div class="cart-coupon">
                            <input type="text" class="giftcode-input" placeholder="Nhập vào mã giảm giá nếu có...">
                            <button type="submit" class="btn giftcode-btn"><span class="lnr lnr-gift"></span></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="cart-totals mt-5">
                <h2 class="cart-totals__title">Thanh toán</h2>
                <table>
                    <tbody>
                        <tr class="cart-totals-subtotal">
                            <th style="text-decoration: underline;">Mã quà tặng nếu có:</th>
                            <td class="cart-has-event">
                                <span class="cart-totals__amount cart-totals__amount-sale payl-tab-sale" style="color: inherit; font-weight: bold;">Giảm
                                    <!-- PHP -->
                                    <?php  
                                        $giftSale = 0;

                                        if (isset($_SESSION['giftCODE'])) { 

                                            $giftSale = $_SESSION['giftCODE']; // % giảm giá
                                            echo $_SESSION['giftCODE'].' %';

                                        } else {

                                            $giftSale = 0;
                                            echo '0 %';
                                        }
                                    ?>
                                    <!-- ./PHP -->
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 1rem;"></tr>
                        <tr class="total">
                            <th>Tổng tiền : </th>
                            <td>
                                <strong>
                                    <span class="cart-totals__amount color-primary">
                                        <!-- PHP -->
                                        <?php 

                                            if(isset($_SESSION['sumCart'])) {

                                                // echo number_format($_SESSION['sumCart']).'đ'; 

                                                $percent = (100 - $giftSale) / 100;
                                                $_SESSION['sumCartPreview'] = 0;

                                                $_SESSION['sumCartPreview'] = ($percent * $_SESSION['sumCart']);
                                                echo number_format($_SESSION['sumCartPreview']).'đ';
                                            } 
                                        ?>
                                        <!-- ./PHP -->    
                                    </span>
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="thanh-toan" class="btn btn--primary btn-hover-dark">Tiến hành thanh toán</a>
            </div>
        </div>
    </section>

<?php
    } else { ?>

    <!-- emptyCart -->
    <section class="emptyCart">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 ml-auto mr-auto">
                <h2>Thông báo</h2>
                    <div class="emptyCart-content">
                        <center>
                            <p>
                                Giỏ hàng của bạn trống!
                                <a href="trang-chu" title="Quay lại trang chủ">Quay lại trang chủ</a>
                            </p>
                        </center>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <!-- ./emptyCart -->

<?php
    }
?>
    <!-- ./PHP -->
    </div>
</div>
<!-- ./cart -->
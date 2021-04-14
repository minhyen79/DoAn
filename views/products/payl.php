<!-- headCart -->
<section class="headCart" data-bgimg="assets/images/banners/banner18.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="headCart__tile">Thông tin giao hàng</h2>
                <div class="headCart__item">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="gio-hang">Giỏ hàng</a></li>
                            <li class="breadcrumb-item " aria-current="page">Thông tin giao hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./headCart -->
<!-- payl -->
<!-- PHP -->
<?php  
    if (isset($_SESSION['cart1998']) && !empty($_SESSION['cart1998'])) { ?>
        <section class="payl">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="payl-top">
                            <h2>Thông tin giao hàng</h2>

                            <!-- titleBanner -->
                            <div class="payl-titlebanner">
                                <div>
                                    <h3>Sử dụng <span>tài khoản</span> mua hàng</h3>
                                    <h4>tích lũy, cơ hội giảm 50%</h4>
                                </div>
                                <div>
                                    <p>chi tiết khuyến mãi : <a href="javascript:void(0)">flowers.com/khuyenmaithang9</a></p>
                                </div>
                            </div>
                            <!-- ./titleBanner -->

                            <!-- redect order Form -->
                            <!-- PHP -->
                            <?php 

                                if (isset($_SESSION['member_name'])) { ?>
                                <!-- html -->
                                <p>
                                    <strong>Xin chào : </strong><span style="color: var(--primary-color);">"<?php echo $_SESSION['member_name']; ?>"</span>
                                    <a href="dang-xuat" class="logout">Đăng xuất<i class="fas fa-sign-out-alt ml-2"></i></a>
                                </p>  
                                 <!-- ./html -->
                            <?php
                                } else { ?>

                                    <!-- html -->
                                    <p>
                                        Bạn đã có tài khoản?
                                        <!-- indexPayl => tức là đứng từ trang payl gọi login -->
                                        <a href="dang-nhap">Đăng nhập</a>
                                    </p>
                                        
                                    <!-- ./html -->

                            <?php
                                }
                            ?>
                            <!-- ./PHP -->
                            <!-- ./redect order Form -->
                        </div>
                        <div class="payl-form">
                            <!-- PHP -->
                            <?php  
                                if (isset($_SESSION['id_member'])) { ?>
                                    <!-- has account -->   <!-- action="index.php?page=sentMailler"  -->
                                    <form method="POST" id="frm_validate" class="frm_validate" onsubmit="return orderForm_has_account();">
                            <?php
                                } else { ?>
                                    <!-- no account -->
                                    <form method="POST" id="frm_validate" class="frm_validate" onsubmit="return orderForm_not_account();">
                            <?php
                                }
                            ?>
                            <!-- ./PHP -->
                            
                                <div class="payl__info">

                                    <!-- ---------------Name------------------ -->
                                    <?php  
                                        if (isset($_SESSION['id_member'])) { ?>
                                             <!-- name noAction-->
                                            <a title="Bạn không thể sửa thông tin này!">
                                                <div class="account-form account-tab">
                                                    <label for="input-name">Họ và tên</label>
                                                    <div class="account-form-inp">
                                                        <input disabled class="input-name payl-input form-no-action" type="text" id="input-name" placeholder="Tên: <?php echo $_SESSION['member_name'] ?>">
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- ./name noAction-->
                                    <?php        
                                        } else { ?>

                                         <!-- name -->
                                            <div class="account-form account-tab">
                                                <label for="input-name">Họ và tên</label>
                                                <div class="account-form-inp">
                                                    <input onblur="checkNameRegister();" class="input-name payl-input payl-input-not-count" type="text" id="input-name" placeholder="Eg: Nguyễn Gia Bảo">
                                                    <div id="err-name" class="err-name error-email error-email-w4 error-email-animate label-email">
                                                        <svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
                                                    </div>
                                                </div>
                                                
                                                <span class="label-name payl-form-label" id="label-name"></span>
                                            </div>
                                        <!-- ./name -->

                                    <?php
                                        }
                                    ?>
                                   <!-- ---------------./Name------------------ -->

                                   <!-- ---------------Email------------------ -->
                                    <?php  
                                        if (isset($_SESSION['member_email'])) { ?>

                                            <!-- Email noAction-->
                                            <a title="Bạn không thể sửa thông tin này!">
                                                <div class="account-form account-tab">
                                                    <label for="email">Email</label>
                                                    <div class="account-form-inp">
                                                      <input disabled type="email" class="input-emai payl-input form-no-action" id="input-email"placeholder="Email: <?php echo $_SESSION['member_email'] ?>" autocomplete="current-email">
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- ./Email noAction-->

                                    <?php
                                        } else { ?>

                                            <!-- Email -->
                                            <div class="account-form account-tab">
                                                <label for="email">Email</label>
                                                <div class="account-form-inp">

                                                  <input onblur="checkEmailLogin();" type="email" class="input-emai payl-input" id="input-email" placeholder="Eg: flowers@gmail.com" autocomplete="current-email">
                                                  <div id="err-email" class="error-email error-email-w4 error-email-animate label-email">
                                                    <svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
                                                  </div>

                                                </div>
                                                <span class="label-email payl-form-label" id="label-email"></span>
                                            </div>
                                            <!-- ./Email -->

                                    <?php
                                        }
                                    ?>
                                    <!-- ---------------./Email------------------ -->

                                    <!-- ---------------Phone------------------ -->
                                    <?php  
                                        if (isset($_SESSION['member_phone'])) { ?>

                                            <!-- phone noAction-->
                                            <a title="Bạn không thể sửa thông tin này!">
                                                <div class="account-form account-tab">
                                                    <label for="input-phone">Số điện thoại</label>
                                                    <div class="account-form-inp">
                                                      <input disabled type="text" class="input-phone payl-input form-no-action" id="input-phone"  placeholder="Eg: <?php echo $_SESSION['member_phone'] ?>" autocomplete="current-phone">
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- ./phone noAction-->

                                    <?php
                                        } else { ?>

                                            <!-- phone -->
                                            <div class="account-form account-tab">
                                                <label for="input-phone">Số điện thoại</label>
                                                <div class="account-form-inp">

                                                  <input onblur="checkPhone();"  type="text" class="input-phone payl-input payl-input-not-count-numb" id="input-phone" placeholder="Eg: 0988889997" autocomplete="current-phone">
                                                  <div id="err-phone" class="err-phone error-email error-email-w4 error-email-animate label-email">
                                                    <svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
                                                  </div>

                                                </div>
                                                <span class="label-phone payl-form-label" id="label-phone"></span>
                                            </div>
                                            <!-- ./phone -->
                                    <?php
                                        }
                                    ?>
                                    <!-- ---------------./Phone------------------ -->
                                    
                                    <!-- ---------------address------------------ -->
                                    <?php  
                                        if (isset($_SESSION['member_address'])) { ?>
                                                <!-- Address noAction-->
                                            <a title="Bạn không thể sửa thông tin này!">
                                                <div class="account-form account-tab">
                                                    <label for="input-address">Địa chỉ</label>
                                                    <div class="account-form-inp">
                                                      <input disabled type="text" class="input-address payl-input form-no-action" id="input-address" placeholder="Eg: <?php echo $_SESSION['member_address'] ?>" autocomplete="current-address">
                                                    </div>
                                                </div>
                                            </a>
                                                <!-- ./Address noAction-->
                                    <?php
                                        } else { ?>
                                            <!-- address -->
                                            <div class="account-form account-tab">
                                                <label for="input-address">Địa chỉ</label>
                                                <div class="account-form-inp">

                                                  <input onblur="checkAddress()"  type="text" class="input-address payl-input" id="input-address" placeholder="Eg: số nhà 2 - quận tây hồ - HN" autocomplete="current-address">
                                                  <div id="err-address" class="err-address error-email error-email-w4 error-email-animate label-email">
                                                    <svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
                                                  </div>

                                                </div>
                                                <span class="label-address payl-form-label" id="label-address"></span>
                                            </div>
                                            <!-- ./address -->
                                    <?php
                                        }
                                    ?>
                                    
                                    <!-- ---------------./address------------------ -->

                                    <!-- note -->
                                    <div class="account-form account-tab">
                                        <label for="textarea-note">Lời nhắn</label>
                                        <div class="account-form-inp">

                                            <textarea onblur="checkNote();" class="textarea-note payl-input" name="note" id="textarea-note" cols="30" rows="10" placeholder="Eg: Bạn có thể thay đổi địa chỉ nhận hàng tại đây!"></textarea>
                                            <div id="err-note" class="err-note error-email error-email-w4 error-email-animate label-email">
                                                <svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
                                            </div>

                                        </div>
                                        <span class="label-textarea payl-form-label" id="label-note"></span>
                                    </div>
                                    <!-- ./note -->
                                </div>
                                <!-- payl-shippings  -->
                                <div class="payl-shippings">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="payl__title">Phương thức giao hàng</h2>
                                        </div>
                                    </div>
                                    <div class="row payl-shippings__item">
                                        <div class="col-lg-6 col-md-6 col-12 text-lg-right">
                                            <label class="payl-label">
                                                <input type="radio" name="ship" id="" checked value="shipone" class="payl-inp"> Giao tận nơi
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 text-lg-left">
                                            <label class="payl-label">
                                                <input type="radio" name="ship" id="" value="shiptwo" class="payl-inp"> Nhận tại cửa hàng
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="payl-address">
                                    <h3 class="payl__title">Địa chỉ cửa hàng</h3>
                                    <div class="payl-address__content payl-shippings__item">
                                        <label class="payl-label">
                                            <input type="radio" name="" id="" checked>
                                            <span> <span class="font-weight-bold">ShowRoom Flowers.com | VinCom Bà Triệu :</span> Showroom Flowers.com – Tháp G, Vincom Center Bà Triệu, Quận Hai Bà Trưng, Hà Nội</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="payl-method">
                                    <h3 class="payl__title">Phương thức thanh toán</h3>
                                    <div class="row payl-shippings__item">  
                                        <div class="col-lg-6 col-md-6 col-12 text-lg-right">
                                            <label class="payl-label">
                                                <input type="radio" name="payl" id="" checked value="paylone" class="payl-inp">Thanh toán khi giao hàng (COD)
                                            </label>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12 text-lg-left">
                                            <label class="payl-label">
                                                <input type="radio" name="payl" id="" value="payltwo" class="payl-inp">Chuyển khoản qua ngân hàng
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="payl-home">
                                    <center>
                                        <h3 class="payl__title">Thanh toán khi giao hàng</h3>
                                        <p class="payl-desc">
                                            Khách hàng sẽ nhận và kiểm tra hàng trước khi phải thanh toán!
                                        </p>
                                    </center>
                                </div>

                                <div class="payl-sent">
                                    <center>
                                        <h3 class="payl__title">Thông tin tài khoản ngân hàng</h3>
                                        <p class="payl-desc">
                                            <!-- PHP -->
                                            <?php  
                                                if (isset($_SESSION['id_member'])) { ?>

                                                    <strong style="color: var(--primary-color)">Người gửi : </strong> "<?php echo $_SESSION['member_name']; ?>"<br/>
                                                    <strong style="color: var(--primary-color)">Số điện thoại : </strong> "<?php echo $_SESSION['member_phone'] ?>"<br/>

                                            <?php
                                                } else { ?>

                                                    <strong style="color: var(--primary-color)">Người gửi : </strong> "<span class="sent-human"></span>"<br/>
                                                    <strong style="color: var(--primary-color)">Số điện thoại : </strong> "<span class="sent-phone"></span>"<br/>
                                            <?php
                                                }
                                            ?>
                                            <!-- ./PHP -->
                                           
                                            <strong style="color: var(--primary-color)">Nội dung : </strong> "Khách hàng của Flowers"<br/>
                                            <strong>Số tài khoản : </strong> 19031584403016<br/>
                                            <strong>Tài khoản Techcombank</strong> <br/>
                                            <strong>Chủ tài khoản:</strong> CÔNG TY TNHH FLowers <br/>
                                            Ngân hàng Techcombank Việt Nam <br/>
                                            Chi nhánh Nguyễn Trãi
                                        </p>
                                        <p class="payl-desc">
                                            <strong>Tài khoản Vietcombank: <br/></strong>  
                                            <strong>Số tài khoản : </strong> 1987945125489 <br/>
                                            <strong>Chủ tài khoản:</strong> CÔNG TY TNHH FLowers <br/>
                                            Ngân hàng Vietcombank Việt Nam <br/>
                                            Chi nhánh Nguyễn Trãi
                                        </p>
                                    </center>
                                </div>

                                <div class="payl-done d-flex align-items-center justify-content-between">
                                    <div class="payl-done__item">
                                        <a href="gio-hang" class="btn btn--primary btn-hover-dark">Quay lại giỏ hàng</a>
                                    </div>
                                    <div class="payl-done__item">
                                        <button name="sm_order_done" type="submit" class="btn btn--primary btn-hover-dark sm_order_done">Hoàn tất đơn hàng</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 payl-separate payl-right">
                        <div>
                            <!-- PHP -->
                            <?php 
                                foreach ($_SESSION['cart1998'] as $key => $product) { ?>
                                    <div class="d-flex align-items-center justify-content-between py-3 img-fluid">
                                        <div class="payl-thumb">
                                            <img class="img-fluid" src="assets/images/products/<?php echo $product['main_image'] ?>" alt="<?php echo $product['product_name'] ?>">
                                            <p class="payl-thumb__count"><?php echo $product['qty']; ?></p>
                                        </div>  
                                        <div class="payl__name"><?php echo $product['product_name'] ?></div>
                                        <div class="payl__price">
                                            <?php echo number_format($product['price']).'đ' ?>
                                        </div>
                                    </div>
                            <?php
                               }
                            ?>
                            <!-- ./PHP -->
                            <hr class="my-5"> 

                            <div class="d-flex align-items-center justify-content-between img-fluid">
                                <div class="payl-text">Tạm tính</div>
                                <div class="payl__price">
                                    <?php 
                                        if(isset($_SESSION['sumCart'])) { 
                                            echo number_format($_SESSION['sumCart']).'đ'; 
                                        } 
                                    ?>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between img-fluid">
                                <div class="payl-text">Phí vận chuyển</div>
                                <div class="payl-text payl-text--free" id="Content-shipping--sub">
                                    <p style="margin:0;" class="color-primary">
                                        <!-- Tạm thời là tính phí vận chuyển giá chung.(Không phân biệt khu vực). && đơn hàng trên 200.00k miễn phí-->
                                        <!-- PHP -->
                                    <?php 
                                        $_SESSION['ship'] = 25000; // Default ship 25.000đ

                                        if (isset($_SESSION['sumCart']) && !empty($_SESSION['sumCart'])) {

                                            if ($_SESSION['sumCart'] < 200000) {  
                                                echo number_format($_SESSION['ship'] -= 0).'đ';
                                            } elseif ($_SESSION['sumCart'] >= 200000) { 
                                                $_SESSION['ship'] -= 25000;

                                                if ($_SESSION['ship'] == 0) {
                                                    echo 'Miễn Phí';
                                                }
                                            }    
                                        }
                                    ?>
                                    <!-- ./PHP -->
                                </p>
                            </div> 
                        </div>
                        <hr class="my-5"> 

                        <!-- cumulative points here. | điểm tích lũy-->
                        <?php  
                            /*PHP*/
                            if (isset($_SESSION['id_member'])) { ?>

                                 <div class="payl-pointed">
                                    <label><input type="checkbox" name="usePoint" id="usePoint" class="mr-2">Sử dụng điểm tích lũy</label>
                                    <p class="float-right">Bạn đang có :
                                        <span class="color-primary font-weight-bold">
                                            <!-- PHP -->
                                            <?php  
                                                if (isset($_SESSION['point']) && !empty($_SESSION['point'])) {
                                                    echo $_SESSION['point'];
                                                } else {
                                                    echo '(0)';
                                                }
                                            ?>
                                            <!-- ./PHP -->
                                        </span> điểm</p>
                                    <hr>
                                    <ul>
                                        <li>
                                            <label><input type="radio" name="pointed" value="0"  id="0Point" class="mr-2">không sử dụng</label>
                                        </li>
                                        <li>
                                            <label><input type="radio" name="pointed" value="10" id="10Point" class="mr-2">10 điểm = giảm 10%</label>
                                        </li>
                                        <li>
                                            <label><input type="radio" name="pointed" value="20" id="20Point"  class="mr-2">20 điểm = giảm 20%</label>
                                        </li>
                                        <li>
                                            <label><input type="radio" name="pointed" value="30" id="30Point" class="mr-2">30 điểm = giảm 30%</label>
                                        </li>
                                        <li>
                                            <label><input type="radio" name="pointed" value="40" id="40Point" class="mr-2">40 điểm = giảm 40%</label>
                                        </li>
                                        <li>
                                            <label><input type="radio" name="pointed" value="50" id="50Point"  class="mr-2">50 điểm = giảm 50%</label>
                                        </li>
                                    </ul>
                                </div>
                        <?php
                            }
                            /*./PHP*/
                        ?>
                        
                        <!-- ./cumulative points here. | điểm tích lũy-->

                        <!-- giftCODE -->
                        <div class="giftCODE">
                            <div class="cart-coupon">
                                <input type="text" class="giftcode-input" placeholder="Nhập vào mã giảm giá nếu có...">
                                <button type="submit" class="btn giftcode-btn"><span class="lnr lnr-gift"></span></button>
                            </div>
                        </div>
                        <hr>
                        <!-- ./giftCODE -->
                        
                        <!-- TOTAL -->
                        <div class="d-flex align-items-center justify-content-between img-fluid" style="padding: 2rem 0;">
                            <div class="payl__title payl__title--textSale" style="border-right: .1rem solid grey; height: 20rem;line-height: 20rem; text-align: center; width: 40%;">Tổng cộng</div>
                            <div class="payl__price payl__price--total" id="Content-shipping--total">
                                <div>
                                    <!-- use point -->
                                    <p style="margin: 0; text-align: right; margin-right: 3rem; position: relative;">
                                        <!-- btn -->
                                        <span class="close-btn-percent" id="remove-Point"><i class="fas fa-times-circle"></i></span>
                                        <small class="font-weight-bold">sử dụng điểm : </small>
                                        <span class="use-Point">
                                            <span class="payl-tab-sale">
                                                Giảm 
                                                <!-- PHP -->
                                                <?php  
                                                    $pointSale = 0;

                                                    if (isset($_SESSION['usePoint'])) { 

                                                        $pointSale = $_SESSION['usePoint']; // % giảm giá
                                                        echo $_SESSION['usePoint'].' %';

                                                    } else {

                                                        $pointSale = 0;
                                                        echo '0 %';
                                                    }
                                                ?>
                                                <!-- ./PHP --> 
                                            </span>  
                                        </span>
                                    </p>
                                    <!-- ./use point -->

                                    <!-- use gift -->
                                    <p style="margin: 1rem 0 ; text-align: right;  margin-right: 3rem; position: relative;">
                                        <!-- btn -->
                                        <span class="close-btn-percent" id="remove-giftCODE"><i class="fas fa-times-circle"></i></span>
                                        <small class="font-weight-bold">sử dụng GiftCODE : </small>
                                        <span class="use-Gift">
                                            <span class="payl-tab-sale">
                                                Giảm 
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
                                        </span>
                                    </p>
                                    <!-- ./use gift -->

                                    <!-- priceTotal -->
                                    <div class="payl-priceTotal">
                                        <p class="color-primary mt-5" style="font-size: 2.6rem; text-align: right;">
                                            <!-- PHP -->
                                            <?php

                                                // Giảm giá nếu có : Số-tiền-sau-khi-giảm-giá = Giá-tiền x [(100 –  %-giảm-giá)/100].   
                                                $_SESSION['sumTotal'] = 0; // lấy là số tiền cuối cùng phải trả.

                                                if(isset($_SESSION['sumCart'])) { 

                                                    $total = $pointSale + $giftSale;
                                                    // lấy tổng số điểm % giảm giá nếu có lưu vào session hỗ trợ gửi mail.
                                                    $_SESSION['totalPercent'] = $total;
                                                    $percent = (100 - $total) / 100;

                                                   $_SESSION['sumTotal'] = ($_SESSION['sumCart'] * $percent) + $_SESSION['ship'];
                                                   echo number_format($_SESSION['sumTotal']).'đ';

                                                } 
                                            ?>
                                           <!-- ./PHP -->
                                        </p>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    } else { ?>
    <!-- emptyCart -->
    <section class="emptyCart">
        <div class="container">
            <div class="row">
                <div class="col-6 ml-auto mr-auto">
                <h2>Thông báo</h2>
                    <div class="emptyCart-content">
                        <center>
                            <p>
                                Bạn không có đơn hàng nào?
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
<!-- ./payl -->
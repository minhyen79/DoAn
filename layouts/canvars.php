<section class="canvars">
    <div class="canvars__overlay"></div>
    <div class="canvars-menu">
    	<div class="container">
    		<div class="row">
    			<div class="col-12">
    				<div class="canvas-open">
                        <a href="javascript:void(0)"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                    <div class="canvas-wrapper">
                        <div class="canvas-close">
                            <a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>  
                        </div>
                         <div class="canvars-account">
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
                                        <li><a title="Đăng xuất" class="logout logout-btn" href="#"><i class="fas fa-sign-out-alt ml-2"></i></a></li>
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
                            </ul>
                        </div>
                        <div class="header-top__nav">
	                        <ul>
                                <li class="header-top__item--sub header-top-lp">
                                    <a href="#" style="padding: 0;">Tra cứu đơn hàng</a>
                                    <ul class="header-top-lookup">
                                        <?php  
                                            if (isset($_SESSION['id_member'])) { ?>
                                                <li class="account-lookup">
                                                    <a href="ca-nhan/<?php echo $_SESSION['id_member']; ?>">Tài khoản</a>
                                                </li>
                                        <?php
                                            } else { ?>
                                                <li class="account-lookup">
                                                    <a href="dang-nhap">Tài khoản</a>
                                                </li>
                                        <?php
                                            }
                                        ?>
                                        <li class="fast-lookup"><a href="#">Tra cứu nhanh</a></li>
                                    </ul>
                                </li>
                            </ul>
	                        <ul>
	                            <li class="header-top__item--separate header-top__item--sub">
	                                <a href="#">Ngôn ngữ</a>
	                                <ul class="header-top__children">
	                                    <li><a href="#">Tiếng việt</a></li>
	                                    <li><a href="#">Tiếng anh</a></li>
	                                </ul>
	                            </li>
	                            <li class="header-top__item--sub">
	                                <a href="#">Tiền tệ</a>
	                                <ul class="header-top__children">
	                                    <li><a href="#">VNĐ</a></li>
	                                    <li><a href="#">$</a></li>
	                                </ul>
	                            </li>
                        	</ul>
                        </div>
                        <div class="header-top__nav text-right">
	                        <ul>
	                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
	                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	                            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
	                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
	                        </ul>
                        </div>
                         <form method="POST" action="cua-hang/tim-kiem" class="header-middle-info__form header-middle-info__form--mobile">
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
                        <div class="header-bottom__contact header-bottom__contact--mobile">
	                        <p>
	                            <a href="tel:(09) 728 534 98"> (09) 728 534 98 </a>
	                            hỗ trợ khách hàng
	                        </p>
                    	</div>
                    	<div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="trang-chu">Trang chủ</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a id="product-shop" href="cua-hang">cửa hàng</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="san-pham-yeu-thich">Sản phẩm&nbsp;<span class="lnr lnr-heart"></span></a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="bai-viet">Bài viết</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="lien-he">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="canvas-footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> flowers.staff@gmail.com</a></span>
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>
</section>
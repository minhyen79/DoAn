<!-- avatar -->
<!-- headDetail -->
<section class="headDetail" data-bgimg="assets/images/banners/banner18.jpg">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="headDetail__title">Tài khoản của bạn</h2>
				<div class="headDetail__item">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="trang-chu">Trang chủ</a></li>
							<li class="breadcrumb-item " aria-current="page">Tài khoản của bạn</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ./headDetail -->

<?php  
	if (isset($_SESSION['id_member'])) { ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12 ml-auto mr-auto profile">
					<h3 class="text-center display-4 my-5">Đổi mật khẩu</h3>
					<form action="" method="POST" role="form" class="profile-frm-update" getID="<?php echo $_SESSION['id_member']; ?>" onsubmit="return sm_formChange();">

		    			<div class="account-form account-tab">
		    				<label for="passw-old">Mật khẩu cũ :</label>

		    				<div class="account-form-inp">
		    					<input onblur="checkOldPass();"  type="password" id="passw-old" class="passw-old" placeholder="Nhập vào mật khẩu cũ..." />
		    					<div id="err-old-passw" class="error-old-passw error-passw-w4 label-pass">
			                    	<i class="fas fa-eye-slash"></i>
			                  	</div>
		    				</div>
		    				<span class="label-old-pass" id="label-old-pass"></span>
		    			</div>

		    			<!-- Password -->
			            <div class="account-form account-tab">
			                <label for="input-pass">Mật Khẩu Mới</label>
			                <div class="account-form-inp">

			                  <input onblur="checkPasswRegister();" type="password" class="input-pass" id="input-pass" name="password" id="password" placeholder="Nhập mật khẩu mới..." autocomplete="current-password">
			                  <div id="err-passw" class="error-passw error-passw-w4 label-pass">
			                    <i class="fas fa-eye-slash"></i>
			                  </div>

			                </div>
			                <span class="label-pass" id="label-pass"></span>
			            </div>
			            <!-- ./Password -->
			            <!-- notiValidate -->
			            <ul class="noti-validate">
			            	<li>
			            		<span>Sử dụng ít nhất là 8 kí tự</span>
			            	</li>
			            	<li>
			            		<span>Sử dụng ít nhât 1 chữ số</span>
			            	</li>
			            	<li>
			            		<span>Sử dụng ít nhất 1 chữ tiếng anh in hoa</span>
			            	</li>
			            </ul>
			            <!-- ./notiValidate -->


			            <div class="account-form account-tab">
		    				<label for="inp-repassw">Nhập lại mật khẩu mới :</label>

		    				<div class="account-form-inp">
		    					<input onblur="checkRepass();" type="password" id="inp-repassw" class="inp-repassw" placeholder="Nhập lại mật khẩu mới..." />
		    					<div id="err-repassw" class="error-repassw error-passw-w4 label-pass">
			                    	<i class="fas fa-eye-slash"></i>
			                  	</div>
		    				</div>
		    				<span class="label-repass" id="label-repass"></span>
		    			</div>

		    			<button type="submit" class="btn btn--primary btn-hover-dark">Cập nhật</button>
		    		</form>
				</div>
			</div>
		</div>
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
                                Bạn chưa sử dụng tài khoản
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



<!-- ./avatar -->
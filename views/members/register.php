<!-- sweet-alert -->
<!-- canvars -->
<section class="canvars">
	<div class="canvars__overlay register__overlay"></div>
</section>
<!-- ./canvars -->
<div class="register-alert register-alert-animate">
	<h2>Thông báo</h2>
	<p>Bạn đăng ký tài khoản thành công!</p>
	<a href="dang-nhap"><button>OK</button></a>
</div>
<!-- ./sweet-alert -->
<!-- account  -->
<section class="account">
	<!-- logo -->
	<div class="row account-box">
		<div class="col-12 text-center top-account-z">
			<p>
				<a href="trang-chu">Về trang chủ</a>
			</p>
			<a class="main-logo" href="trang-chu"><img src="assets/images/logo/logo.png" alt="Logo của Fresh Garden"></a>
		</div>
	</div>
	<!-- ./logo -->
	<!-- main-account -->
	<div class="main-account">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12 ml-auto mr-auto">
					<!-- account-content -->
					<div class="account-content">
						<!-- Form -->
						<form action="" method="POST" onsubmit="return registerForm();">

							<!-- title -->
							<div class="account-title">
								<h4>Đăng ký thành viên</h4>
								<p class="account-desc">Flowers là trang web bán hoa tươi uy tín số 1, Đăng nhập vào để nhập các ưu đãi lớn.</p>
								<a href="dang-nhap"><img class="img-fluid" src="assets/images/users/avatar.svg" alt="avatar admin Flowers"></a>
							</div>
							<!-- ./title -->

							<p class="account-or account-tab"><span>Hoặc</span></p>

							<!-- name -->
							<div class="account-form account-tab">
								<label for="input-name">Họ và tên</label>
								<div class="account-form-inp">
									<input onblur="checkNameRegister();" class="input-name" type="text" name="" id="input-name" placeholder="Eg: Nguyễn Gia Bảo">
									<div id="err-name" class="err-name error-email error-email-w4 error-email-animate label-email">
				                    	<svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
				                  	</div>
								</div>
								
								<span class="label-name" id="label-name"></span>
							</div>
							<!-- ./name -->

							<!-- Email -->
				            <div class="account-form account-tab">
				                <label for="input-email">Email</label>
				                <div class="account-form-inp">

				                  <input onblur="checkEmailRegister();"  type="email" class="input-email" id="input-email" name="" placeholder="Eg: flowers@gmail.com" autocomplete="current-email">
				                  <div id="err-email" class="error-email error-email-w4 error-email-animate label-email">
				                    <svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
				                  </div>

				                </div>
				                <span class="label-email" id="label-email"></span>
				            </div>
			              	<!-- ./Email -->

			              	<!-- phone -->
				            <div class="account-form account-tab">
				                <label for="input-phone">Số điện thoại</label>
				                <div class="account-form-inp">

				                  <input onblur="checkPhoneRegister();"  type="text" class="input-phone" id="input-phone" name="" placeholder="Eg: 0988889997" autocomplete="current-phone">
				                  <div id="err-phone" class="err-phone error-email error-email-w4 error-email-animate label-email">
				                    <svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
				                  </div>

				                </div>
				                <span class="label-phone" id="label-phone"></span>
				            </div>
			              	<!-- ./phone -->

				            <!-- Password -->
				            <div class="account-form account-tab">
				                <label for="input-pass">Mật Khẩu</label>
				                <div class="account-form-inp">

				                  <input onblur="checkPasswRegister();" type="password" class="input-pass" id="input-pass" name="password" id="password" placeholder="Nhập mật khẩu..." autocomplete="current-password">
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
				            <!-- register fast -->
				            <label class="fast-reg-label">
				            	<input type="checkbox" name="fast-reg" class="fast-reg mr-2" value="active"> Tạo nhanh mật khẩu
				            </label>
				            <!-- ./register fast -->
							<!-- btn -->
							<div class="account-form button account-tab">
								<button type="submit" class="btn fg-btn-primary">Đăng ký</button>
							</div>
							<!-- ./btn -->
							<p class="account-note noPass">
								Bằng cách đăng ký, bạn đồng ý với các <a href="#">điều khoản sử dụng</a> của chúng tôi
							</p>

						</form>
						<!-- ./Form -->
					</div>
					<!-- ./account-content -->
					<!-- tab-register -->
					<div class="account-t-register">
						<p>Bạn đã có tài khoản? <a href="dang-nhap" class="fg-text-primary">Đăng nhập</a></p>
					</div>
					<!-- ./tab-register -->
				</div>
			</div>
		</div>
	</div>
	<!-- ./main-account -->	

</section>
<!-- ./account  -->


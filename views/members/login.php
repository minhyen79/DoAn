<!-- noti Register -->
<section class="noti-login">
	<p>Đăng nhập thất bại!</p>
</section>
<!-- ./noti Register -->
<!-- account  -->
<section class="account">
	<!-- logo -->
	<div class="row account-box">
		<div class="col-12 text-center top-account-z">
			<p>
				<a href="trang-chu">Về trang chủ</a>
			</p>
			<a class="main-logo" href="trang-chu"><img src="assets/images/logo/logo.png" alt="Logo của 26 April Flowers"></a>
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
	            <form action="" method="POST" onsubmit="return loginForm();">
	            
	              <div class="account-title">
	                <h4>Thành viên đăng nhập</h4>
	                <p class="account-desc">26 April Flowers là trang web hoa tươi uy tín số 1, Đăng nhập vào để nhận các ưu đãi lớn.</p>
	                <a href="dang-nhap"><img class="img-fluid" src="assets/images/users/avatar.svg" alt="avatar admin 26 April Flowers"></a>
	              </div>

	              <p class="account-or account-tab"><span>Hoặc</span></p>

	              <!-- Email -->
	              <div class="account-form account-tab">
	                <label for="email">Email</label>
	                <div class="account-form-inp">

	                  <input onblur="checkEmailLogin();" type="email" class="input-emai" id="input-email" name="" id="email" placeholder="Eg: Flowers.com" autocomplete="current-email">
	                  <div id="err-email" class="error-email error-email-w4 error-email-animate label-email">
	                    <svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
	                  </div>

	                </div>
	                <span class="label-email" id="label-email"></span>
	              </div>
	              <!-- ./Email -->

	              <!-- Password -->
	              <div class="account-form account-tab">
	                <label for="password">Mật Khẩu</label>
	                <div class="account-form-inp">

	                  <input onblur="checkPasswordLogin();" type="password" class="input-pass" id="input-pass" name="password" id="password" placeholder="Nhập mật khẩu..." autocomplete="current-password">
	                  <div id="err-passw" class="error-passw error-passw-w4 label-pass">
	                    <i class="fas fa-eye-slash"></i>
	                  </div>

	                </div>
	                <span class="label-pass" id="label-pass"></span>
	              </div>
	               <!-- ./Password -->

	              <!-- btn -->
	              <div class="account-form button account-tab">
	                <button type="submit" class="btn fg-btn-primary">Đăng nhập</button>
	              </div>

	             <!--  <p class="account-note noPass">
	                <a href="#">Quên mật khẩu</a>
	              </p> -->

	            </form>
	            <!-- ./Form -->
	          </div>
	          <!-- ./account-content -->
	          <!-- tab-register -->
	          <div class="account-t-register">
	            <p>Bạn chưa có tài khoản?</p>
	            <a href="dang-ky" class="fg-text-primary">Đăng ký để nhận ưu đãi ngay!</a>
	          </div>
	          <!-- ./tab-register -->
	        </div>
	      </div>
	    </div>
  	</div>
	<!-- ./main-account -->	

</section>
<!-- ./account  -->


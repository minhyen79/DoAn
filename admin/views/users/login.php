<!-- account  -->
<section class="account">
  <!-- logo -->
  <div class="row account-box">
    <div class="col-12 text-center">
      <a class="main-logo" href="index.php"><img src="assets/images/logo/logo.png" alt="Logo của Fresh Garden"></a>
    </div>
  </div>
  <!-- ./logo -->
  <!-- main-account -->
  <div class="main-account">
    <div class="container">
      <div class="row">
        <div class="col-12 ml-auto col-md-6 col-lg-4 mr-auto">
          <!-- account-content -->
          <div class="account-content">
            <!-- Form -->
            <form action="" method="POST" onsubmit="return loginForm();">
            
              <div class="account-title">
                <h4>Thành viên đăng nhập</h4>
                <p class="account-desc">26 April Flowers xin chào!. </p>
                <a href="index.php"><img class="img-fluid" src="assets/images/users/avatar.svg" alt="avatar admin 26 April Flowers"></a>
              </div>

              <!-- Google -->
              <!-- <div class="account-acount google">
                <a href="#">Đăng nhập với Google</a>
              </div> -->
              <!-- ./Google -->

              <!-- Facebook -->
              <!-- <div class="account-acount facebook">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#3b5998" d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h8.61v-6.97h-2.34V11.3h2.34v-2c0-2.33 1.42-3.6 3.5-3.6 1 0 1.84.08 2.1.12v2.43h-1.44c-1.13 0-1.35.53-1.35 1.32v1.73h2.69l-.35 2.72h-2.34V21h4.59a1 1 0 0 0 .99-1V4a1 1 0 0 0-1-1z"></path></svg>Đăng nhập với Facebook</a>
              </div> -->
              <!-- ./Facebook

              <p class="account-note ">
                Mẹo: Đăng nhập nhanh hơn với Google hoặc Facebook!
              </p>  -->

              <p class="account-or account-tab"><span>Hoặc</span></p>

              <!-- Email -->
              <div class="account-form account-tab">
                <label for="email">Email</label>
                <div class="account-form-inp">

                  <input onblur="checkEmailLogin();" type="email" class="input-emai" id="input-email" name="" id="email" placeholder="Eg: flowers.vn" autocomplete="current-email">
                  <div id="err-email" class="error-email error-email-w4 error-email-animate label-email">
                    <svg class="Input_icon__3J2rm" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg>
                  </div>

                </div>
                <span class="label-email" id="label-email"></span>
              </div>
              <!-- ./Email -->

              <!-- Password -->
              <div class="account-form account-tab">
                <label for="password">Password</label>
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

              <!-- <p class="account-note noPass">
                <a href="#">Quên mật khẩu</a>
              </p> -->

            </form>
            <!-- ./Form -->
          </div>
          <!-- ./account-content -->
          <!-- tab-register -->
          <div class="account-t-register">
            <p>Bạn chưa có tài khoản?</p>
            <a href="index.php?mod=register" class="fg-text-primary">Đăng ký để nhận ưu đãi ngay!</a>
          </div>
          <!-- ./tab-register -->
        </div>
      </div>
    </div>
  </div>
  <!-- ./main-account --> 

</section>
<!-- ./account 
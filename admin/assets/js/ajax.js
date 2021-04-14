$(document).ready(function() {
	"use strict";


    //  khi click vào ovelay đóng thông báo và quay về login
    $('.register__overlay').click(function() {
        $(this).removeClass('active');
        $('.register-alert').slideUp('fast');
        window.location = "index.php?mod=login";
    });

    // Tạo nhanh mật khẩu.
    $('input[type="checkbox"]').click(function(){
        
        var str = 'Flowers@123';
        var fastReg = $('input[name="fast-reg"]:checked').val();
        var passw   = $('#input-pass');

        if (fastReg == "active") {
            passw.val(str);
        } else {
            passw.val("");
        }
    });

});

/*------------------------------------
	Validate.
------------------------------------*/
/*--------------------
    checkEmail.
---------------------*/
function checkEmailLogin() {

    var email = $('#input-email').val();
    var labelEmail = $('#label-email');
    var regexEmail = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
    
    if (email == "" || email == null) {
        labelEmail.html('Vui lòng nhập email!');
        $('#input-email').addClass('err');	
        $('#err-email').slideDown('fast'); //error email.

    } else if (!regexEmail.test(email)) {
        labelEmail.html('Địa chỉ email không hợp lệ!');
        $('#input-email').addClass('err');
        $('#err-email').slideDown('fast');

    } else {
        labelEmail.html('');
        $('#input-email').removeClass('err');
        $('#err-email').slideUp('fast');
        return email;
    }
}

/*--------------------
    checkPassword.
---------------------*/
function checkPasswordLogin() {

    var passw = $('#input-pass').val();
    var labelPassw = $('#label-pass');
    var regexPass = /^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/; 
    /*
    	- ít nhất 1 chữ tiếng anh in hoa.
    	- ít nhât 1 chữ số.
    	- chiều dài tối thiểu là 8.
    */

    if (passw == "" || passw == null) {
        labelPassw.html('Vui lòng nhập mật khẩu!');
        $('#input-pass').addClass('err');

    } else if (!regexPass.test(passw)) {
        $('#input-pass').addClass('err');
        labelPassw.html('Mật khẩu không hợp lệ!');

    } else {
        labelPassw.html('');
        $('#input-pass').removeClass('err');
        return passw;
    }
}

/*-------------------------
    loginForm (onSubmit).
-------------------------*/
function loginForm() {

	var action = 'login';

	if (checkEmailLogin() && checkPasswordLogin()) {

		$.post('server/users/account.php', {action: action, user: checkEmailLogin(), passw: checkPasswordLogin()}, function(data) {
			if (data == 1) {

                var action = 'check-role';

                $.post('server/users/check-role.php', {action: action}, function(data) {
                    
                    if (data == "tài khoản bị khóa") {

                        alert('xin lỗi tài khoản đã bị khóa');

                    } else {
                        
                        window.location = 'Admin_Up/index.php';
                    }
                });

			} else{
				alert('Email hoặc mật khẩu không đúng !');
			}

		});
	}

	return false;
}


// Đăng ký tài khoản.
function registerForm() {

    var action = 'by-register';

    if (checkNameRegister() && checkEmailRegister() && checkPhoneRegister() && checkPasswRegister()) {

        $.post('server/users/account.php', {action: action, name: checkNameRegister(), email: checkEmailRegister(), phone: checkPhoneRegister(),passw: checkPasswRegister()}, function(data) {

            data = parseInt(data);

            if (data === 1) {
                $('.register-alert').slideDown('fast');
                $('.register__overlay').addClass('active');
            }

        });
    }
    return false;
}

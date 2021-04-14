// validate

/*---------------------------
    checkName Register here.
---------------------------*/
function checkNameRegister() {

    var name = $('#input-name').val();
    var labelName = $('#label-name');
    var regexName = /^[^\d+]*[\d+]{0}[^\d+]*$/;

    if (name == "" || name == null) {
        labelName.html('Vui lòng nhập tên của bạn!');
        $('#input-name').addClass('err');
        $('#err-name').slideDown('fast'); //error name.

    } else if (!regexName.test(name)) {
        labelName.html('Họ tên của bạn không hợp lệ!');
        $('#input-name').addClass('err');
        $('#err-name').slideDown('fast'); //error name.

    } else {
        labelName.html('');
        $('#input-name').removeClass('err');
        $('#err-name').slideUp('fast');
        return name;
    }
}

/*----------------------------
    checkEmail Register here.
-----------------------------*/
function checkEmailRegister() {

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

        var action = 'check-email';

        $.post('server/users/account.php', {email: email, action: action}, function(data) {

            if (data == 1) {

                labelEmail.html('Địa chỉ email đã tồn tại!');
                $('#input-email').addClass('err');
                $('#err-email').slideDown('fast');

            } else {
                labelEmail.html('');
                $('#input-email').removeClass('err');
                $('#err-email').slideUp('fast');
            }

        });
        if (labelEmail.html() == '') {
            return email;
        }
    }
}


/*----------------------------
    checkPhone Register here.
-----------------------------*/
function checkPhoneRegister() {

    var phone = $('#input-phone').val();
    var labelPhone = $('#label-phone');
    var regexPhone = /((09|03|07|08|05)+([0-9]{8})\b)/g;


    if (phone == "" || phone == null) {

        labelPhone.html('Vui lòng nhập số điện thoại!');
        $('#input-phone').addClass('err');
        $('#err-phone').slideDown('fast'); //error email.

    } else if (!regexPhone.test(phone)) {

        labelPhone.html('Số điện thoại không hợp lệ!');
        $('#input-phone').addClass('err');
        $('#err-phone').slideDown('fast');

    } else {

        var action = 'check-phone';

        $.post('server/users/account.php', {phone: phone, action: action}, function(data) {

            if (data == 1) {

                labelPhone.html('Số điện thoại đã tồn tại!');
                $('#input-phone').addClass('err');
                $('#err-phone').slideDown('fast');

            } else {
                labelPhone.html('');
                $('#input-phone').removeClass('err');
                $('#err-phone').slideUp('fast');
            }

        });
        if (labelPhone.html() == '') {
            return phone;
        }
    }
}


/*-----------------------------
    checkPassw Register here.
------------------------------*/
function checkPasswRegister() {

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
        labelPassw.html('Mật khẩu chưa đủ an toàn!');

    } else {
        labelPassw.html('');
        $('#input-pass').removeClass('err');
        return passw;
    }
}


// kiểm tra mật khẩu cũ.
function checkOldPass() {

    var passw = $('#passw-old').val();
    var labelPassw = $('#label-old-pass');

    if (passw == "" || passw == null) {
        labelPassw.html('Vui lòng nhập mật khẩu cũ!');
        $('#passw-old').addClass('err');
    } else {
        labelPassw.html('');
        $('#passw-old').removeClass('err');
        return passw;
    }
}

// Kiểm tra nhập lại mật khẩu.
function checkRepass() {

    var passw       = $('#input-pass').val();
    var repassw     = $('#inp-repassw').val();
    var labelPassw  = $('#label-repass');

    if (repassw == "" || repassw == null) {
        labelPassw.html('Vui lòng nhập mật khẩu!');
        $('#inp-repassw').addClass('err');
    } else if (passw !== repassw) {
        labelPassw.html('Mật khẩu không trùng khớp!');
        $('#inp-repassw').addClass('err');
    } else {
        labelPassw.html('');
        $('#inp-repassw').removeClass('err');
        return passw;
    }
}



/*-------------------------
    notify Password here.
--------------------------*/
$('#input-pass').on('keyup',function(){

    var regex8Characters = /.{8,}/;
    var regexOneEngCap   = /(?=.*?[A-Z])/;
    var regexOneDigit    = /(?=.*?[0-9])/;
    var passw = $('#input-pass').val();

    /*--------------------check 8 characters-----------------*/
    if (regex8Characters.test(passw)) {

        $('ul.noti-validate li:nth-child(1)').css({
           'color': 'green',
           'font-weight': '500'
        });
        $('ul.noti-validate li:nth-child(1)').addClass('oke');

    } else {

        $('ul.noti-validate li:nth-child(1)').css({
           'color': 'grey',
           'font-weight': '400'
        });
        $('ul.noti-validate li:nth-child(1)').removeClass('oke');
    }

    /*------------------At least one digit-----------------*/
    if (regexOneDigit.test(passw)) {

        $('ul.noti-validate li:nth-child(2)').css({
           'color': 'green',
           'font-weight': '500'
        });
        $('ul.noti-validate li:nth-child(2)').addClass('oke');

    } else {

        $('ul.noti-validate li:nth-child(2)').css({
           'color': 'grey',
           'font-weight': '400'
        });
        $('ul.noti-validate li:nth-child(2)').removeClass('oke');

    }

    /*-----------At least one English capital letter-------------*/
    if (regexOneEngCap.test(passw)) {

         $('ul.noti-validate li:nth-child(3)').css({
           'color': 'green',
           'font-weight': '500'
        });
        $('ul.noti-validate li:nth-child(3)').addClass('oke');

    } else {

        $('ul.noti-validate li:nth-child(3)').css({
           'color': 'grey',
           'font-weight': '400'
        });
        $('ul.noti-validate li:nth-child(3)').removeClass('oke');
    }
});

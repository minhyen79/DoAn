$(document).ready(function() {
	"use strict";

	// hiển thị thông tin và ảnh chính sp. modals
    $(document).on('click','li.product-link__item--show > a', function(e){

        var id = $(this).attr('id');
        var action = 'index';

        $.ajax({
            url: 'servers/products/modal-product.php',
            type: 'POST',
            dataType: 'json',
            data: {action: action, id: id},
        })
        .done(function(data) {

            var result = '';
            var resultInfo = '';

            $.each(data,function(index, val) {
                result += `
                    <img src="assets/images/products/`+ val['main_image'] +`" alt="`+ val['product_name'] +`">`;

                resultInfo += `
                    <form action="">
                        <div class="mdProduct-isset">`;

                            if (val['quantity'] < 1) {
                                resultInfo += `<span class="title title-empty">hết hàng</span>`;
                            } else {
                                resultInfo += `
                                    <span class="title">Còn hàng</span>
                                <span class="ct-count">(<span class="count">`+ val['quantity'] +`</span> Sản phẩm)</span>`;
                            }

                            resultInfo +=`

                        </div>
                        <h3 class="mdProduct__title">`+ val['product_name'] +`</h3>
                        <div class="mdProduct-price d-flex align-items-center">
                            <div class="mdProduct__price mdProduct__price-new">`+ (new Intl.NumberFormat().format(val['price']))+'đ'+`</div>
                        </div>
                        <p class="mdProduct__desc">
                            `+ val['description'] +`
                        </p>
                        <table class="mdProduct-table">
                            <tbody>
                                <tr>
                                    <td class="mdProduct-qty__label"><span>Số lượng:</span></td>
                                    <td class="mdProduct__value">
                                        <div class="product-qty">
                                            <div class="cart-qty">
                                                <input type="number" min="1" max="10" class="cart-qty__inpmd" name="" id="" value="1">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mdProduct-buttons">
                            <a href="#" title="Thêm vào mục yêu thích" id="`+ val['id_product'] +`" class="btn btn-icon btn-outline-body btn-hover-primary btn-circle product-link-wishlist">
                                <span class="lnr lnr-heart"></span>
                            </a>
                            <a href="#" id="`+ val['id_product'] +`" class="btn btn--primary btn-hover-dark btn-non-circle mdProduct-buttons__btn">
                                <span class="lnr lnr-cart"></span> Thêm vào giỏ
                            </a>
                        </div>
                        <h3 class="mdProduct__label">Chia sẻ sản phẩm</h3>
                        <ul class="mdProduct__list">
                            
                            <li class="mdProduct__item fb-share-button" data-href="http://php0320e2-2.itpsoft.com.vn/chi-tiet-san-pham/`+ val['id_product'] +` data-layout="button" data-size="small">
                                <a title="chia sẻ sản phẩm lên facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fphp0320e2-2.itpsoft.com.vn%2Fchi-tiet-san-pham%2F`+ val['id_product'] +`&amp;src=sdkpreparse" class="mdProduct__link btn-icon btn-circle btn-facebook btn-hover-dark fb-xfbml-parse-ignore">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>

                            <li class="mdProduct__item"><a href="#" class="mdProduct__link btn-icon btn-circle btn-youtube btn-hover-dark">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </a></li>
                            <li class="mdProduct__item"><a href="#" class="mdProduct__link btn-icon btn-circle btn-google-plus btn-hover-dark">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a></li>
                            <li class="mdProduct__item"><a href="#" class="mdProduct__link btn-icon btn-circle btn-instagram btn-hover-dark">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a></li>
                        </ul>
                    </form>`;

            });
            // Data.
            $('.mdProduct-image-content__item--parent').html(result);
            $('.mdProduct-info').html(resultInfo);
        })
    });
 

    // hiển thị ảnh liên quan sp.
    $(document).on('click','li.product-link__item--show > a', function(e){

        var id = $(this).attr('id');
        var action = 'by-related';

        $.ajax({
            url: 'servers/products/modal-product.php',
            type: 'POST',
            dataType: 'json',
            data: {action: action, id: id},
        })
        .done(function(data) {

            var result = '';
            $.each(data,function(index, val) {
                result += `
                    <img src="assets/images/products-childen/`+ val['sub_image'] +`">`;
            });
            $('.mdProduct-image-content__item--child').html(result);
        })
        .fail(function() {
            console.log("error");
        })
    });

    // thêm vào giỏ hàng.
    $(document).on('click','li.product-link__item--cart > a',function(e){
       
        var id      = $(this).attr('id');
        var act     = 'check-qty';
        var action  = 'by-single';
        
        $.post('servers/products/check-qty.php', {id: id, act: act}, function(data) {
            if (data == 'empty') {
                $('.notiEmpty').slideDown('fast');
                $('.notiEmpty').delay(12000).slideUp();
            } else {
                data = parseInt(data); // ép kiểu data.
                // oke => I can post server. | tôi có thể gửi lên server.
                $.post('servers/products/action-product.php', {id: id, quantity: data, action: action}, function(data) { //quantity tức là số lượng còn tồn kho.
                    data = parseInt(data);
                    if (data === 1) {
                         $('.notiProduct').slideDown('fast');
                         $('.notiProduct').delay(15000).slideUp('medium');

                        // load mini cart.
                        $('.load-mini-cart').load(' .load-mini-cart > span');
                        $('.load-mega').load(' .load-all');
                    }
                });

            }
        });

        e.preventDefault();
    });

    // Thêm vào giỏ hàng trang chi tiết sản phẩm.
    $(document).on('click', '.add-cart-btnx', function(e) {

        var id      = $(this).attr('id');
        var qty     = $('.add-cart-inpx').val();
        var act     = 'check-qty';
        var action  = '';

        $.post('servers/products/check-qty.php', {id: id, act: act}, function(data) {

            if (data == 'empty') {
                $('.notiEmpty').slideDown('fast');
                $('.notiEmpty').delay(8000).slideUp();

            } else {

                data = parseInt(data); // ép kiểu data.

                if (qty < 1) {  // số lượng tối thiểu. |  min quantity.
                    $('.notiMin').slideDown('fast');
                    $('.notiMin').delay(4000).slideUp();

                } else if (qty > 20) { // số lượng tối đa. |  maximum quantity.
                    $('.notiMaximum').slideDown('fast');
                    $('.notiMaximum').delay(12000).slideUp();

                } else if (qty <= data) { // trường hợp số lg kh nhập nhỏ hơn hàng tồn kho.

                    action = 'by-multiple';
                    $.post('servers/products/action-product.php', {action: action, id: id, qty: qty, quantity: data}, function(data) {

                        data = parseInt(data);
                        if (data === 1) {
                            $('.notiProduct').slideDown('fast');
                            $('.notiProduct').delay(15000).slideUp('medium');

                            // load mini cart.
                            $('.load-mini-cart').load(' .load-mini-cart > span');
                            $('.load-mega').load(' .load-all');
                        }
                    });

                } else {

                    // default.
                    $('.buyall__overlay').addClass('active');
                    $('.buyall-alert').slideDown('fast');

                    // click overlay.
                    $('.buyall__overlay').click(function() {

                        $(this).removeClass('active');
                        $('.buyall-alert').slideUp('fast');
                    });
                    // string html.
                    var result = `<h2>Thông báo</h2>
                            <p>Cửa hàng còn `+ data + ` (sản phẩm) Bạn muốn mua hết chứ</p>
                            <a class="buyall-oke" href="#"><button>OK</button></a>
                            <a class="buyall-cancel" href="#"><button>Cancel</button></a>`;
                    // sub string.
                    $('.buyall-alert').html(result);
                    // action.
                    action = 'get-all';
                    // click OKE
                    $(document).on('click', '.buyall-oke', function(e) {

                        $('.buyall__overlay').removeClass('active');
                        $('.buyall-alert').slideUp('fast');

                       $.post('servers/products/action-product.php', {id: id, qty: data, quantity: data, action: action}, function(data) {  //quantity tức là số lượng còn tồn kho.
                            
                            data = parseInt(data);
                            if (data === 1) {
                                $('.notiProduct').slideDown('fast');
                                $('.notiProduct').delay(15000).slideUp('medium');

                                // load mini cart.
                                $('.load-mini-cart').load(' .load-mini-cart > span');
                                $('.load-mega').load(' .load-all');
                            }
                        });
                        e.preventDefault();
                    });
                    // click Cancel.
                    $(document).on('click', '.buyall-cancel', function(e) {

                        $('.buyall__overlay').removeClass('active');
                        $('.buyall-alert').slideUp('fast');
                        e.preventDefault();
                    });
                }
            }


        });

        e.preventDefault();
    });

    // thêm vào giỏ hàng bằng modals (sl nhiều).
    $(document).on('click','a.mdProduct-buttons__btn',function(e){

        var id = $(this).attr('id');
        var qty = $('.cart-qty__inpmd').val();
        var act     = 'check-qty';
        var action  = '';

        $.post('servers/products/check-qty.php', {id: id, act: act}, function(data) {

            if (data == 'empty') {
                $('.notiEmpty').slideDown('fast');
                $('.notiEmpty').delay(8000).slideUp();
                $('#modalProduct').modal('hide');

            } else {
                data = parseInt(data); // ép kiểu data.

                if (qty < 1) {  // số lượng tối thiểu. |  min quantity.
                    $('.notiMin').slideDown('fast');
                    $('.notiMin').delay(4000).slideUp();
                    $('#modalProduct').modal('hide');

                } else if (qty > 20) { // số lượng tối đa. |  maximum quantity.
                    $('.notiMaximum').slideDown('fast');
                    $('.notiMaximum').delay(8000).slideUp();
                    $('#modalProduct').modal('hide');

                } else if (qty <= data) { // trường hợp số lg kh nhập nhỏ hơn hàng tồn kho.

                    action = 'by-multiple';
                    $.post('servers/products/action-product.php', {action: action, id: id, qty: qty, quantity: data}, function(data) {

                        data = parseInt(data);
                        if (data === 1) {
                            $('.notiProduct').slideDown('fast');
                            $('.notiProduct').delay(15000).slideUp('medium');
                            $('#modalProduct').modal('hide');

                            // load mini cart.
                            $('.load-mini-cart').load(' .load-mini-cart > span');
                            $('.load-mega').load(' .load-all');
                        }
                    });

                } else {

                    // default.
                    $('.buyall__overlay').addClass('active');
                    $('.buyall-alert').slideDown('fast');

                    // click overlay.
                    $('.buyall__overlay').click(function() {

                        $(this).removeClass('active');
                        $('.buyall-alert').slideUp('fast');
                    });
                    // string html.
                    var result = `<h2>Thông báo</h2>
                            <p>Cửa hàng còn `+ data + ` (sản phẩm) Bạn muốn mua hết chứ</p>
                            <a class="buyall-oke" href="#"><button>OK</button></a>
                            <a class="buyall-cancel" href="#"><button>Cancel</button></a>`;
                    // sub string.
                    $('.buyall-alert').html(result);
                    // action.
                    action = 'get-all';
                    // click OKE
                    $(document).on('click', '.buyall-oke', function(e) {

                        $('.buyall__overlay').removeClass('active');
                        $('.buyall-alert').slideUp('fast');

                       $.post('servers/products/action-product.php', {id: id, qty: data, quantity: data, action: action}, function(data) {  //quantity tức là số lượng còn tồn kho.
                            
                            data = parseInt(data);
                            if (data === 1) {
                                $('.notiProduct').slideDown('fast');
                                $('.notiProduct').delay(15000).slideUp('medium');
                                $('#modalProduct').modal('hide');

                                // load mini cart.
                                $('.load-mini-cart').load(' .load-mini-cart > span');
                                $('.load-mega').load(' .load-all');
                            }
                        });
                        e.preventDefault();
                    });
                    // click Cancel.
                    $(document).on('click', '.buyall-cancel', function(e) {

                        $('.buyall__overlay').removeClass('active');
                        $('.buyall-alert').slideUp('fast');
                        e.preventDefault();
                    });
                }
            }
        });

        e.preventDefault();
    });
    
    // Xóa sản phẩm khỏi giỏ hàng.
    $(document).on('click','.cart-body__remove > button.btn',function(e){

        
        var id      = $(this).val();
        var action  = 'delete-cart';

        // confirm/
        $('.cart-confirm').slideDown('fast');
        $('.cart_confirm_overlay').addClass('active');
        // Yes.
        $('.frm-confirm-cart button.ok').click(function() {
            $.post('servers/products/action-product.php', {id: id, action: action}, function(data) {

                data = parseInt(data); // ép kiểu data.
                if (data === 1) {

                    $('.notiDelete').slideDown('fast');
                    $('.notiDelete').delay(2000).slideUp();
                    $('.shoppingCart').load(' .shoppingCart-omega'); // load cả giỏ hàng. | load all cart.
                    // load mini cart.
                    $('.load-mini-cart').load(' .load-mini-cart > span');
                    $('.load-mega').load(' .load-all');
                }
                // đóng thông báo.
                $('.cart-confirm').slideUp('fast');
                // đóng overlay.
                $('.cart_confirm_overlay').removeClass('active');
            });
        });
        // No.
        $('.frm-confirm-cart button.cancel').click(function() {
            // đóng thông báo.
            $('.cart-confirm').slideUp('fast');
            // đóng overlay.
            $('.cart_confirm_overlay').removeClass('active');
        });
        e.preventDefault();
    });

    // Cập nhật giỏ hàng.
    $(document).on('change','input.cart-qty__inp',function(){

        var id              = $(this).attr('id');
        var qty             = $('#' + id).val();
        var action          = '';

        if (qty < 1) {  // TH1 : nếu số lượng < 1. | if quantity  < 1
            var check = confirm('Bạn muốn loại bỏ sản phẩm này khỏi giỏ hàng?');

            if (check == true) { // tức là người ta ấn confirm vào xóa. | oke confirm -> delete that product.

                // Trường hợp khách nhập số lượng nhỏ hơn 1. => xóa sp khỏi giỏ.
                var action = 'update-cart-err';
                $.post('servers/products/action-product.php', { id : id, qty : qty, action: action }, function(data) {
                    
                    data = parseInt(data); // ép kiểu data.
                    if (data === 1) {
                        $('.notiDelete').slideDown('fast');
                        $('.notiDelete').delay(2000).slideUp();
                        $('.shoppingCart').load(' .shoppingCart-omega'); // load cả giỏ hàng. | load all cart.
                        // load mini cart.
                        $('.load-mini-cart').load(' .load-mini-cart > span');
                        $('.load-mega').load(' .load-all');
                    }
                });

            } else { // tức là ng ta bẩm vào hủy confirm -> đưa giá trị về ban đầu. |  return the value to the original.
                $('.shoppingCart').load(' .shoppingCart-omega'); // load cả giỏ hàng. | load all cart.
            }

        } else if (qty > 20) { // xin lỗi bạn mua tối đa 20 |sorry you buy a maximum of 20.

            $('.shoppingCart').load(' .shoppingCart-omega'); // load cả giỏ hàng. | load all cart.
            $('.notiMaximum').slideDown('fast');
            $('.notiMaximum').delay(8000).slideUp();

        } else { // TH2: nếu số lượng >= 1.

            var act     = 'check-qty';
            $.post('servers/products/check-qty.php', {act: act, id: id}, function(data) { // mục đính kiểm tra tồn kho còn bao nhiêu để sửa.

                 data = parseInt(data); // ép kiểu data.
                 action = 'update-cart';

                 $.post('servers/products/action-product.php', { id : id, qty : qty, quantity: data, action: action}, function(data) {

                    $('.shoppingCart').load(' .shoppingCart-omega'); // load cả giỏ hàng. | load all cart.

                    data = parseInt(data); // ép kiểu data.
                    if (data === 1) {
                        $('.notiUpdate').slideDown('fast');
                        $('.notiUpdate').delay(2000).slideUp();

                        // load mini cart.
                        $('.load-mini-cart').load(' .load-mini-cart > span');
                        $('.load-mega').load(' .load-all');
                    }

                    if (data === 0) {
                        $('.notiLimited').slideDown('fast');
                        $('.notiLimited').delay(12000).slideUp();
                    }
                });
            });
        }
    });

    // Thêm vào sản phẩm yêu thích.
     $(document).on('click', '.product-link-wishlist', function(e) {

        var id      = $(this).attr('id');
        var action  = 'add-Wishlist';

        $.post('servers/products/action-wishlist.php', {action: action, id: id}, function(data) {

            if (data == 'wishlist successfully!') {

                $('.wishlist-success').slideDown('fast');
                $('.wishlist-success').delay(12000).slideUp('fast');

                // load wishlist page product-detail here.
                $('.load-wishlist').load(' .load-wishlist-all');
                $('.load-wishlish-detailPro').load(' .load-wishlish-detailPro__all');
            }
        });
        e.preventDefault();
    });


    // Loại bỏ sản phẩm yêu thích.
    $(document).on('click', '.wishlish-btn-remove', function(e) {

        var id      = $(this).attr('id');
        var action  = 'remove-wishlist';

         // confirm/
        $('.wish-confirm').slideDown('fast');
        $('.wish_confirm_overlay').addClass('active');
        // Yes.
        $('.frm-confirm-wish button.ok').click(function() {
            $.post('servers/products/action-wishlist.php', {action: action, id: id}, function(data) {

                if (data == 'remove wishlist successfully') {

                    $('.remove-single-wishlist-success').slideDown('fast');
                    $('.remove-single-wishlist-success').delay(8000).slideUp('fast');
                     // load wishlist page product-detail here.
                    $('.load-wishlist').load(' .load-wishlist-all');
                    $('.load-wishlish-detailPro').load(' .load-wishlish-detailPro__all');
                }

                // đóng thông báo.
                $('.wish-confirm').slideUp('fast');
                // đóng overlay.
                $('.wish_confirm_overlay').removeClass('active');

            });
        });

        // No.
        $('.frm-confirm-wish button.cancel').click(function() {
            // đóng thông báo.
            $('.wish-confirm').slideUp('fast');
            // đóng overlay.
            $('.wish_confirm_overlay').removeClass('active');
        });
        
        e.preventDefault();
    });

    // khách hàng đánh giá sản phẩm.
    $('#default > i').click(function(e) {

        var rating      = $(this).attr('data-score');
        var id_member   = $('#default').attr('id-member');
        var id_product  = $('#data-rating-inp > input').attr('id-product');
        var action      = 'add-rating';

        if ($('#default').hasClass('no-action')) {
            $('.Rating-error').slideDown('fast');
            $('.payl__overlay').addClass('active');
        } 
        else {

            $.post('servers/ratings/action-rating.php', {rating: rating, id_member: id_member, id_product: id_product, action: action}, function(data) {

                if (data == "Thank you for rating") {
                    $('.Rating__overlay').addClass('active');
                    $('.Rating-success').slideDown('fast');
                    // Load.
                    $('.productDetail-show-rating').load(' .data-rate-single');
                }
            });
        }
    });


    // hiển thị lượt đánh giá / sp (Modal).
    $(document).on('click','li.product-link__item--show > a', function(e){

        var id = $(this).attr('id');

         var action      = 'show-rating';

        $.post('servers/ratings/action-rating.php', {action: action, id: id}, function(data) {

            var rate        = parseFloat(data);
            var show_rate   = '';

            if (!isNaN(rate)) {
                show_rate   = `<span class="font-weight-bold show-rate">Đánh giá sản phẩm : (`+ rate +` <i class="fas fa-star text-success"></i>)</span>`;
            } else {
                show_rate   = '<span class="font-weight-bold show-rate">Chưa có lượt đánh giá nào!</span>';
            }
            
            $('.data-rate-modal').html(show_rate);
        });

    });

    // Mã giảm giá.
    $('.giftcode-btn').click(function(e) {

        var action = 'checkGift';
        var giftCODE   = $('.giftcode-input').val();


        $.post('servers/gifts/action-gift.php', {action: action, giftCODE: giftCODE}, function(data) {

            if (data == 'using the gift code successfully') {

                $('.payl__overlay').addClass('active');
                $('.payl-alert').slideDown('medium');

            } else if (data == 'Coupon code is expired or not available') {

                $('.payl-alert-false').slideDown('fast');
                $('.payl-alert-false').delay(1500).slideUp('fast');

            } else {

                $('.payl-alert-false').slideDown('fast');
                $('.payl-alert-false').delay(1500).slideUp('fast');
            }


            $('.giftcode-input').val('');
            /*--------------Load page cart--------------*/
            $('.cart-has-event').load(' .cart-has-event > span');
            /*--------------Load page payl--------------*/
            $('.use-Gift').load(' .use-Gift > span');
            $('.payl-priceTotal').load(' .payl-priceTotal > p');
        });

        e.preventDefault();
    });

    // Loại bỏ sử dụng mã giảm giá.
    $('#remove-giftCODE').click(function() {

        var action = 'removeGift';
        
        // confirm.
       $('.gift-confirm').slideDown('fast');
       $('.gift_confirm_overlay').addClass('active');

       // Yes.
       $('.frm-confirm-gift button.ok').click(function() {
            $.post('servers/gifts/action-gift.php', {action: action}, function(data) {

                if (data == 'remove gift code successfully') {

                    $('.payl-alert-remove').slideDown('fast');
                    $('.payl-alert-remove').delay(1500).slideUp('fast');
                }
                /*--------------Load page--------------*/
                $('.use-Gift').load(' .use-Gift > span');
                $('.payl-priceTotal').load(' .payl-priceTotal > p');

                // Đóng thông báo.
                $('.gift-confirm').slideUp('fast');
                // Đóng overlay.
                $('.gift_confirm_overlay').removeClass('active');
            });
       });

       // No.
       $('.frm-confirm-gift button.cancel').click(function() {
           // Đóng thông báo.
            $('.gift-confirm').slideUp('fast');
            // Đóng overlay.
            $('.gift_confirm_overlay').removeClass('active');
       });

       
    });


                                    // Điểm tích lũy.
    // Sử dụng điểm tích lũy.
    $('.payl-pointed ul li input[type="radio"]').click(function() {
       
        var valueSale = $('input[name="pointed"]:checked').val();
        var action    = 'checkpoint';
       
        // check Point.
        $.post('servers/members/action-member.php', {action: action, point: valueSale}, function(data) {

            if (data == 'successfully use point') {

                $('.payl-alertPoint-success').slideDown('fast');
                $('.payl-alertPoint-success').delay(1500).slideUp('fast');

            } else if (data == 'Sorry you do not have enough points') {

                $('.payl-alertPoint-noAction').slideDown('fast');
                $('.payl-alertPoint-noAction').delay(1500).slideUp('fast');

            } else {

                $('.payl-alertPoint-empty').slideDown('fast');
                $('.payl-alertPoint-empty').delay(1500).slideUp('fast');
            }
            /*--------------Load page--------------*/
            $('.use-Point').load(' .use-Point > span');
            $('.payl-priceTotal').load(' .payl-priceTotal > p');
       });
    });

    // Loại bỏ việc sử dụng điểm tích lũy.
    $('.payl-pointed input[type="checkbox"]').click(function() {

        var checked = $('input[name="usePoint"]:checked').val();
        var action  = 'unsetPoint';
        $('.payl-pointed ul').slideToggle('medium');  

        if (checked != 'on') {

            $.post('servers/members/action-member.php', {action: action}, function(data) {
                
                /*--------------Load page--------------*/
                $('.use-Point').load(' .use-Point > span');
                $('.payl-priceTotal').load(' .payl-priceTotal > p');
            });
        }
    });

    // nút loại bỏ sd điểm.
    $('#remove-Point').click(function(event) {

       var action  = 'unsetPoint';
       // confirm.
       $('.point-confirm').slideDown('fast');
       $('.point_confirm_overlay').addClass('active');

       // Yes.
       $('.frm-confirm-point button.ok').click(function() {
           $.post('servers/members/action-member.php', {action: action}, function(data) {

                if (data = 'remove use point successfully') {

                    $('.payl-alertPoint-remove').slideDown('fast');
                    $('.payl-alertPoint-remove').delay(1500).slideUp('fast');
                }
                /*--------------Load page--------------*/
                $('.use-Point').load(' .use-Point > span');
                $('.payl-priceTotal').load(' .payl-priceTotal > p');

                // Đóng thông báo.
                $('.point-confirm').slideUp('fast');
                // Đóng overlay.
                $('.point_confirm_overlay').removeClass('active');
               
            });
       });

       // No.
       $('.frm-confirm-point button.cancel').click(function() {
           // Đóng thông báo.
            $('.point-confirm').slideUp('fast');
            // Đóng overlay.
            $('.point_confirm_overlay').removeClass('active');
       });

    });

                    // Tra cứu đơn hàng.
    // Tra cứu đơn hàng (hiển thị tab tra cứu).
    $('.header-top-lp > a').click(function(e) {
        $('.header-top-lookup').slideToggle('fast');   
        e.preventDefault();
    });

    // Tra cứu đơn hàng (hiển thị form tra cứu).
    $('.header-top-lookup > li.fast-lookup > a').click(function(e) {
        $('.fast-lookup-success').slideDown('fast');
        $('.lookup__overlay').addClass('active');
        e.preventDefault();
    });

    // Click vào lớp overlay để hủy form.
    $('.lookup__overlay, .fast-lookup-success > .div').click(function() {
        // bỏ lớp overlay
        $('.lookup__overlay').removeClass('active');
        // Đóng form nhập
        $('.fast-lookup-success').slideUp('fast');
        // Đóng thông báo lỗi.
        $('.fast-lookup-error').slideUp('fast');
        // Đóng Tab kiểm tra đơn.
        $('.header-top-lookup').slideUp('fast');
    });

    // Click vào overlay để đóng thông báo contact success.
    $('.contact__overlay').click(function() {
        $(this).removeClass('active');
        $('.noti-contact').slideUp('fast');
    });

    // đóng modal tra cứu => đóng cả tab tra cứu luôn!.
    $('.modalLookup-close, .modal').click(function() {
        // Đóng Tab kiểm tra đơn.
        $('.header-top-lookup').slideUp('fast');
    });

    // Bắt đầu tra cứu.
    $('form.form-lookup button[type="submit"]').click(function(e) {

        var keyw    = $('.form-fast-lookup > input').val();
        var action  = 'fast-lookup';

        if ($('.form-fast-lookup > input').val() == "" || $('.form-fast-lookup > input').val() == null) {
            alert('Vui lòng nhập email hoặc số điện thoại!');
            $('.form-fast-lookup > input').focus();
        } else {
            $.ajax({
                url: 'servers/mores/lookup.php',
                type: 'POST',
                dataType: 'json',
                data: {key: keyw, action: action},
            })
            .done(function(data) {
                // Là không có đơn hàng.
                if (data == 0) {
                    // form tìm kiếm bị ẩn tạm thời.
                    $('.fast-lookup-success').slideUp('fast');
                    // Mở thông báo lỗi lên.
                    $('.fast-lookup-error').slideDown('fast');
                } else {
                    // Có đơn hàng.
                    // Đóng form nhập
                    $('.fast-lookup-success').slideUp('fast');
                    // Mở modal hiển thị lên.
                    $('#modalLookup').modal('show');
                    // bỏ lớp overlay
                    $('.lookup__overlay').removeClass('active');
                    // Kết quả.
                    var result = "";
                    // lấy mã pin
                    var pinCode = "";
                    var stt    = 0;

                    $.each(data, function(index, el) {
                        stt    += 1;
                        result += `
                        <tr>
                            <td>`+ stt +`</td>
                            <td>`+ el['product_name'] +`</td>
                            <td class="img-thumb">
                                <img class="img-fluid" src="assets/images/products/`+ el['main_image'] +`" alt="`+ el['product_name'] +`">
                            </td>
                            <td>`+ el['quantity'] +`</td>
                            <td>`+ (new Intl.NumberFormat().format(el['price'])) +`đ</td>
                            <td>`+ (new Intl.NumberFormat().format(el['total'])) +`đ</td>
                            <td>`+ el['date_order'] +`</td>
                        </tr>`;

                        pinCode = `<span>#`+ el['pinCode'] +`</span>`;
                    });
                    // dữ liệu trả về.
                    $('#data-md-lookup').html(result);
                    $('#data-lookup-pinCode').html(pinCode);
                }
            })
        }
        e.preventDefault();
    });

    // Quay lại & đóng thông báo lỗi đơn hàng.
    // Quay lại.
    $('.redect-lookup').click(function() {
        // đóng thông báo lỗi
        $('.fast-lookup-error').slideUp('fast');
        // mở form kiểm tra đơn hàng.
        $('.fast-lookup-success').slideDown('fast');
        // trạng thái focus.
        $('.form-fast-lookup > input').focus();
    });
    // Đóng.
    $('.close-lookup').click(function() {
        // đóng thông báo lỗi
        $('.fast-lookup-error').slideUp('fast');
        // bỏ lớp overlay
        $('.lookup__overlay').removeClass('active');
        // Đóng tab.
        $('.header-top-lookup').slideUp('fast');
    });

    // Tra cứu đơn hàng trong trang cá nhân.
    $('.profile-see').click(function() {
        
        var action = 'account-lookup';
        var id     = $(this).attr('getID');

        $.ajax({
            url: 'servers/mores/lookup.php',
            type: 'POST',
            dataType: 'json',
            data: {action: action, id: id},
        })
        .done(function(data) {
           // Kết quả.
            var result = "";
            // lấy mã pin
            var pinCode = "";
            var stt    = 0;

            $.each(data, function(index, el) {
                stt    += 1;
                result += `
                <tr>
                    <td>`+ stt +`</td>
                    <td>`+ el['product_name'] +`</td>
                    <td class="img-thumb">
                        <img class="img-fluid" src="assets/images/products/`+ el['main_image'] +`" alt="`+ el['product_name'] +`">
                    </td>
                    <td>`+ el['quantity'] +`</td>
                    <td>`+ (new Intl.NumberFormat().format(el['price'])) +`đ</td>
                    <td>`+ (new Intl.NumberFormat().format(el['total'])) +`đ</td>
                    <td>`+ el['date_order'] +`</td>
                </tr>`;

                pinCode = `<span>#`+ el['pinCode'] +`</span>`;
            });
            // dữ liệu trả về.
            $('#data-md-mdProfile').html(result);
            $('#data-mdProfile-pinCode').html(pinCode);
        })
    });


    // Đóng thông báo đổi mật khẩu.
    // không Đổi được mk.
    $('.Change_err__overlay,.Change_err a').click(function(e) {
       $('.Change_err__overlay').removeClass('active');
       $('.Change_err').slideUp('fast');
       e.preventDefault();
    });
    // Đổi được mk.
    $('.Change__overlay,.Change-success a').click(function(e) {
       $('.Change__overlay').removeClass('active');
       $('.Change-success').slideUp('fast');
       $('#passw-old').val("");
       $('#input-pass').val("");
       $('#inp-repassw').val("");
       $('.noti-validate').slideUp('fast');
       e.preventDefault();
    });


    // đăng xuất.
    $('.logout-btn').click(function(e) {

        // confirm.
        $('.logout-confirm').slideDown('fast');
        $('.logout_confirm_overlay').addClass('active');

        // YEs.
        $('.frm-confirm-logout button.ok').click(function() {
            window.location = 'dang-xuat';
            // đóng thông báo.
            $('.logout-confirm').slideUp('fast');
            // đóng overlay.
            $('.logout_confirm_overlay').removeClass('active');
        });

        // No.
        $('.frm-confirm-logout button.cancel').click(function() {
            // đóng thông báo.
            $('.logout-confirm').slideUp('fast');
            // đóng overlay.
            $('.logout_confirm_overlay').removeClass('active');
        });

        e.preventDefault();
    });

    // Tắt overlay confirm.
    $('.gift_confirm_overlay').click(function() {
        $(this).removeClass('active');
        $('.gift-confirm').slideUp('fast');
    });

    $('.point_confirm_overlay').click(function() {
        $(this).removeClass('active');
        $('.point-confirm').slideUp('fast');
    });

    $('.wish_confirm_overlay').click(function() {
        $(this).removeClass('active');
        $('.wish-confirm').slideUp('fast');
    });

    $('.cart_confirm_overlay').click(function() {
        $(this).removeClass('active');
        $('.cart-confirm').slideUp('fast');
    });

    $('.logout_confirm_overlay').click(function() {
        $(this).removeClass('active');
        $('.logout-confirm').slideUp('fast');
    });





});
                                            // hết ready jQuery.

// không sử dụng tài khoản mua hàng.
function orderForm_not_account() {

    if (checkNameRegister() && checkEmailLogin() && checkPhone() && checkAddress() && checkNote()) {

        var action      = 'order-not-account';
        var ship_method = $('input[name="ship"]:checked').val();
        var payl_method = $('input[name="payl"]:checked').val();
        var passw       = 'Flowers@123*';

        $.post('servers/products/order-done.php', {action: action, name: checkNameRegister(), email: checkEmailLogin(), phone: checkPhone(), address: checkAddress(), note: checkNote(), passw: passw, ship_method: ship_method, payl_method: payl_method}, function(data) {

            if (data == 'order not account successfully!') {
                window.location = 'gui-thu';
            }

        });
    }
    return false;
}

// sử dụng tài khoản mua hàng.
function orderForm_has_account() {

    // checked validate note.
   if (checkNote()) {

        var ship_method = $('input[name="ship"]:checked').val();
        var payl_method = $('input[name="payl"]:checked').val();
        var action = 'order-has-account';

        $.post('servers/products/order-done.php', {action: action, note: checkNote(), ship_method: ship_method, payl_method: payl_method}, function(data) {

            if (data == 'order has account successfully!') {
                window.location = 'gui-thu';
            }

        });
   }

   return false;
}

// Đăng ký tài khoản.
function registerForm() {

    var action = 'by-register';

    if (checkNameRegister() && checkEmailRegister() && checkPhoneRegister() && checkPasswRegister()) {

        $.post('servers/members/action-member.php', {action: action, name: checkNameRegister(), email: checkEmailRegister(), phone: checkPhoneRegister(),passw: checkPasswRegister()}, function(data) {

            data = parseInt(data);

            if (data === 1) {
                $('.register-alert').slideDown('fast');
                $('.register__overlay').addClass('active');
            }

        });
    }
    return false;
}

// Đăng nhập tài khoản.
function loginForm() {

    var action = 'by-login';

    if (checkEmailLogin() && checkPasswordLogin()) {

        $.post('servers/members/action-member.php', {action: action, email: checkEmailLogin(), passw: checkPasswordLogin()}, function(data) {

            data = parseInt(data);
            if (data === 1) {
                window.location = 'trang-chu';
            } else {
                $('.noti-login').slideDown('fast');
                $('.noti-login').delay(5000).slideUp();
            }

        });
    }

    return false;
}

// Đổi mật khẩu.
function sm_formChange() {
    // đổi mật khẩu.
    var action = 'by-change';
    var id     = $('.profile-frm-update').attr('getID');


    if (checkOldPass() && checkPasswRegister() && checkRepass()) {

        $.post('servers/members/action-member.php', {action: action, oldPass: checkOldPass(), Passw: checkPasswRegister(), id: id}, function(data) {
            // chuyển sang number
            data = parseInt(data);
            // th: OKE
            if (data == 1) {
                // hiển thị thông báo.
                $('.Change__overlay').addClass('active');
                $('.Change-success').slideDown('fast');
            // Th: lỗi.
            } else {
                // hiển thị thông báo.
                $('.Change_err__overlay').addClass('active');
                $('.Change_err').slideDown('fast');
            }
        });
    }

    return false;
}


 //  Liên hệ khách hàng bằng modal.
function frm_contact() {

    var name    = $('#name_contact_md').val();
    var email   = $('#email_contact_md').val();
    var phone   = $('#phone_contact_md').val();
    var note    = $('#note_contact_md').val();
    var action  = 'contact-md';

    $.post('servers/contacts/action-contact.php', {action: action, name: name, email: email, phone: phone, note: note}, function(data) {
        
        data = parseInt(data);
        if (data === 1) {
            // Đóng modal.
            $('#contact-modal').modal('hide');
            // Hiển thị thông báo thành công!
            $('.noti-contact').slideDown('fast');
            // hiện thị overlay.
            $('.contact__overlay').addClass('active');
        }
    });
    return false;
}
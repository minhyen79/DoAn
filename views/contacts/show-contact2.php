<!-- contact -->
<section class="contact shopPro" data-bgimg="assets/images/banners/banner18.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="shopPro__title">Liên Hệ</h2>
                <div class="shopPro__item">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="trang-chu">Trang chủ</a></li>
                            <li class="breadcrumb-item " aria-current="page">Liên Hệ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./contact -->

<!--contact area start-->
<div class="contact_area">
    <div class="container"> 
    	<!-- alert -->
    	<?php  
    		if (isset($contact) && $contact == 'oke') { ?>
    			<div class="row">
		    		<div class="col-12">
		    			<div class="alert alert-success mb-5">
		    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    				<strong>Thông báo!</strong> Phản hồi của bạn đã được tiếp nhận!
		    			</div>
		    		</div>
		    	</div>
    	<?php
    		} 
    	?>
    	
    	<!-- ./alert -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
               <div class="contact_message content">
                    <h3>Liên Hệ</h3>    
                     <p>Flowers - Cửa hàng hoa tươi số 1 Việt Nam</p>
                    <ul>
                        <li><i class="fa fa-fax"></i>  Địa Chỉ: Số nhà 12 - Nguyễn Trãi - Thanh Xuân - Hà Nội</li>
                        <li><i class="fa fa-envelope-o"></i> <a href="#">leminhyen199x@gmail.com</a></li>
                        <li><i class="fa fa-phone"></i><a href="tel:0977982881">0977 982 881</a></li>
                    </ul>             
                </div> 
            </div>
            <div class="col-lg-6 col-md-6 col-12">
               <div class="contact_message form">
                    <h3 class="contact_message--pc">Flowers cảm ơn đóng góp của bạn!</h3>   
                    <h3 class="contact_message--mobile">Đóng góp ý kiến!</h3>
                    <form id="contact-form" method="POST">
                        <p>  
                           <label> Họ Và Tên <span class="text-danger font-weight-bold">(*)</span></label>
                            <input required name="name_contact" value="<?php if(isset($name)) { echo $name; } ?>" placeholder="Họ và tên *" type="text"> 
                        </p>
                        <p>       
                           <label>  Email <span class="text-danger font-weight-bold">(*)</span></label>
                            <input required name="email_contact" value="<?php if(isset($email)) { echo $email; } ?>" placeholder="Email *" type="email">
                        </p>
                        <p>       
                           <label>  Số Điện Thoại <span class="text-danger font-weight-bold">(*)</span></label>
                            <input required name="phone_contact" value="<?php if(isset($phone)) { echo $phone; } ?>" placeholder="Số điện thoại *" type="number">
                        </p>
                        <div class="contact_textarea">
                            <label>  Nội Dung </label>
                            <textarea placeholder="Nội dung *" name="message_contact" class="form-control2" ></textarea>     
                        </div>   
                        <button type="submit" name="sm_contact" class="btn btn--primary btn-hover-dark">Gửi</button>  
                    </form> 

                </div> 
            </div>
        </div>
    </div>    
</div>
    <!--contact area end-->
<div class="contact-map mb-65">
	<div class="col-lg-6 col-md-12 col-12 ml-auto">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7449.841053844351!2d105.85220664478399!3d20.995822593790177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac0d8c2d6f2f%3A0xb8675514153959fd!2sMinh%20Khai%2C%20Hai%20B%C3%A0%20Tr%C6%B0ng%20District%2C%20Hanoi%2C%20Vietnam!5e0!3m2!1sen!2s!4v1615040617530!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
</div>
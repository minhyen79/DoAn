<!-- PHP -->
<?php  
	/*----------------------------------------------------------------------------
				isset array_sent_mail_index here. Tồn tại session để gửi mail.
	----------------------------------------------------------------------------*/
	if (isset($_SESSION['array_sent_mail_index'])) { 

		foreach ($_SESSION['array_sent_mail'] as $key => $val) {

			$name 		= $val['name'];
			$email 		= $val['email'];
			$phone 		= $val['phone'];
			$password 	= $val['password'];
			$address 	= $val['address'];
			$pinCode 	= $val['pinCode'];
			$shipping  	= $val['shipping'];
			$payl 		= $val['payl'];
			$date_order = $val['date_order'];

		}
?>

<!-- PHP -->
<?php  
	$htmlMailler = '
	<section id="mailler" style="width: 100%; height: auto;background-color: #f2f2f2; padding: 18px 0; font-size: 12px;">
		<div class="mailler-box" style="width: 600px; min-height: 400px; margin: 0 auto; height: 100%;background-color: #fff;">
			<!-- bg-grren -->
			<div class="mailler-header" style="width: 100%;height: 90px;background-color: #fe59c2;text-align: center; color: #fff;">
				<h4 style="font-size: 23px;margin: 0 0 6px; padding-top: 6px;">Flowers</h4>
				<p style="margin: 0; font-size: 14px; font-style: italic;">"Khách hàng như một người bạn"</p>
			</div>

			<div class="mailler-main" style="padding: 18px; ">
				<strong style="font-size: 14px;font-weight: 600;">Đơn hàng đã sẵn sàng để giao đến quý khách '.$name.' !</strong>
				<p style="margin: 5px 0 45px;">Chúng tôi vừa bàn giao đơn hàng của quý khách đến đối tác vận chuyển Flowers Team. Đơn hàng của quý khách sẽ được giao trong ngày hôm nay '.$date_order.'</p>
				<strong style="font-weight: 600; color: #fe59c2; font-size: 14px;">THÔNG TIN ĐƠN HÀNG '.'#'.$pinCode.' <span style="font-size: 12px;color: #333; opacity: .9">( '.$date_order.' )</span></strong>
				<hr>

				<div style="display: flex; justify-content: space-between;">
					<div style="padding-right: 25px; width: 30%;">
						<strong style="font-size: 14px; margin-bottom: 3px; display: block;">Thông tin thanh toán</strong>
						<p style="margin: 0 0 2px;">'.$name.'</p>
						<a href="#" style="margin: 0 0 2px; display: block; color: #fe59c2;">'.$email.'</a>
						<p style="margin: 0 0 2px;">'.$phone.'</p>'; ?>

						<!-- Dùng tài khoản mua hàng -->
						<!-- PHP -->
						<?php  
							if (isset($_SESSION['array_sent_mail_index']) && $_SESSION['array_sent_mail_index'] == 1) {
								$htmlMailler .= '<p style="margin: 0 0 2px;">Tổng điểm thân thiết : <span style="color:red;">'.$_SESSION['pointAfter'].'</span></p>';
							}
						?>
						<!-- ./PHP -->
						<?php
							// PHP |array_sent_mail_index = 2 dùng cho mua hàng không cần tài khoản!
							if (isset($_SESSION['array_sent_mail_index']) && $_SESSION['array_sent_mail_index'] == 3) {

								$htmlMailler .= '
								<strong>Mật khẩu: <span>'.$password.'</span></strong><br/>
								<strong>link đăng nhập:</strong>
								<a href="http://btsphim.online/" style="color: #fe59c2;">flowers.com</a>';	

							} 
							// ./PHP
						?>
						<?php
						$htmlMailler .= '
					</div>
					<div style="border-left: 1px solid #ccc; padding-left: 25px; width: 70%;">
						<strong style="font-size: 14px; margin-bottom: 3px; display: block;">Đia chỉ giao hàng</strong>
						<p style="margin: 0 0 2px;">'.$name.'</p>
						<p style="margin: 0 0 2px;">'.$address.'</p> Việt Nam
						<p style="margin: 0 0 2px;">T: '.$phone.'</p>	
					</div>
				</div>

				<div style="margin: 35px 0;">
					<strong>Phí vận chuyển: <span style="font-weight: 400;">'.number_format($_SESSION['ship']).'đ'.'</span></strong><br/>
					<strong>Phương thức giao hàng: <span style="font-weight: 400;">'.$shipping.'</span></strong><br/>
					<strong>Phương thức thanh toán: <span style="font-weight: 400;">'.$payl.'</span></strong>
				</div>

				<div>
					<h6 style="margin: 0 0 15px; font-size: 14px; text-transform: uppercase; color: #fe59c2;">Chi tiết đơn hàng</h6>
					<table style="width: 100%; margin-bottom: 25px; border-collapse: collapse;">
						<thead>
							<tr style="background-color: #fe59c2; color: #fff; text-align: left;">
								<th style="padding-left: 2px; font-size: 12px; padding: 10px; white-space: nowrap;border-top: 0; border-bottom: 0; margin: 0;">SẢN PHẨM</th>
								<th style=" font-size: 12px; padding: 10px; white-space: nowrap;border-top: 0; border-bottom: 0; margin: 0;">ĐƠN GIÁ</th>
								<th style=" font-size: 12px; padding: 10px; white-space: nowrap;border-top: 0; border-bottom: 0; margin: 0;">SỐ LƯỢNG</th>
								<th style=" font-size: 12px; padding: 10px; white-space: nowrap;border-top: 0; border-bottom: 0; margin: 0;">GIẢM GIÁ</th>
								<th style=" font-size: 12px; padding: 10px; white-space: nowrap;border-top: 0; border-bottom: 0; margin: 0;">TỔNG TẠM</th>
							</tr>
						</thead>
						<tbody>';?>
							<!-- PHP -->
							<?php 
								foreach ($_SESSION['array_sent_mail'] as $key => $val) {

									$htmlMailler.= '  
									<tr style="background-color: #eeeeee;">
										<td style="min-width: 230px; width: 230px;padding: 15px 5px 15px 10px; vertical-align: middle; text-align: left; border-top: 0; text-transform: capitalize;"><strong>'.$val['product_name'].'</strong></td>
										<td style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: center; border-top: 0;"><span>'.number_format($val['price']).'đ'.'</span></td>
										<td style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: center; border-top: 0;">'.$val['quantity'].'</td>
										<td style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: center; border-top: 0;">';

										// PHP
											if (isset($_SESSION['totalPercent']) && !empty($_SESSION['totalPercent'])) {

												$htmlMailler.= $_SESSION['totalPercent'].'%';

											} else {
												$htmlMailler.= '0%';
											}
										// ./PHP
									$htmlMailler.= '
										</td>
										<td style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: center; border-top: 0;">'.number_format($val['total']).'đ'.'</td>
									</tr>
									';
								}
							?>
							<!-- ./PHP -->
							
						
							<?php
							$htmlMailler.= '
							<tr style="background-color: #f5f5f5;">
								<td colspan="4" style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: right; border-top: 0;"><span>Tổng giá trị sản phẩm chưa giảm</span></td>
								<td style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: center; border-top: 0;"><span>'.number_format($_SESSION['sumCart']).'đ'.'</span></td>
							</tr>

							<tr style="background-color: #f5f5f5;">
								<td colspan="4" style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: right; border-top: 0;"><span>Giảm giá điểm thân thiết</span></td>
								<td style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: center; border-top: 0;"><span>';
									// PHP
									if (isset($_SESSION['usePoint']) && !empty($_SESSION['usePoint'])) {

										$htmlMailler.= $_SESSION['usePoint'].'%';

									} else {
										$htmlMailler.= '0%';
									}
									// ./PHP

							$htmlMailler.= '
								</span></td>
							</tr>

							<tr style="background-color: #f5f5f5;">
								<td colspan="4" style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: right; border-top: 0;"><span>Giảm giá phiếu quà tặng</span></td>
								<td style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: center; border-top: 0;"><span>';
									// PHP
									if (isset($_SESSION['giftCODE']) && !empty($_SESSION['giftCODE'])) {

										$htmlMailler.= $_SESSION['giftCODE'].'%';

									} else {
										$htmlMailler.= '0%';
									}
									// ./PHP

							$htmlMailler.= '
								</span></td>
							</tr>

							<tr style="background-color: #f5f5f5;">
								<td colspan="4" style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: right; border-top: 0;"><span>Chi phí vận chuyển</span></td>
								<td style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: center; border-top: 0;"><span>'.number_format($_SESSION['ship']).'đ'.'</span></td>
							</tr>
							<tr style="background-color: #f5f5f5;">
								<td colspan="4" style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: right; border-top: 0;"><span>Phí xử lý đơn hàng</span></td>
								<td style="padding: 15px 5px 15px 10px; vertical-align: middle; text-align: center; border-top: 0;"><span>0đ</span></td>
							</tr>
						</tbody>
						<tfoot style="margin: 0;padding: 0;">
							<tr style="background-color: #eeeeee;"> 
								<th colspan="4" style="border-top: 0; padding: 10px; text-align: right;"><span>Tổng giá trị đơn hàng</span></th>
								<th style="border-top: 0; padding: 10px; text-align: center;"><span>'.number_format($_SESSION['sumTotal']).'đ'.'</span></th>
							</tr>
						</tfoot>
					</table>
					<div class="mailer-end">
						<p style="margin: 0 0 5px;">Xem thêm <a href="#" style="color: #fe59c2;">các câu hỏi thường gặp.</a></p>
						<p style="margin: 0 0 5px;">Truy cập <a href="http://btsphim.online/" style="color: #fe59c2;">hotro@flowers.com</a>, hoặc gọi số điện thoại <a href="tel:0977982881"></a>0977982881 (8-21h cả T7,CN) để gặp nhân viên chăm sóc khách hàng khi quý khách cần hỗ trợ.</p>
						<strong style="margin: 0 0 5px; display: block;">Flowers cảm ơn quý khách,</strong>
						<div>
							<strong style="text-align: right; width:100%;">Flowers</strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>';
	echo $htmlMailler;


	/*------------------------------------------
					Mailler here.
	-------------------------------------------*/
	include_once 'PHPMailer/class.phpmailer.php';
	include_once 'PHPMailer/class.smtp.php';

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {

	    //Server settings
	    $mail->CharSet = 'UTF-8';
	    $mail->SMTPDebug = 0; // Dev = 2 or default = 0;              // Enable verbose debug output
	    $mail->isSMTP();                                      // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';              // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
	    $mail->Username   = 'ustyle95@gmail.com'; // Mail của admin.              // SMTP username
	    $mail->Password   = 'yxdokclaogabztsk';    // Pass của admin.                        // SMTP password
	    $mail->SMTPSecure = 'tls'; 
	    $mail->Port       = 587;   

	    //Recipients
	    $mail->setFrom('flowers.staff@gmail.com', 'Flowers'); // 
	    $mail->addAddress($email, $name); // customer email.
	    $mail->addReplyTo('flowers.staff@gmail.com', 'Khách hàng của Flowers'); //customer replies to email

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Đơn hàng '.'#'.$pinCode.' đã sẵn sàng để giao cho khách';  // Title email.
	    $mail->Body    = $htmlMailler; // Content email.

	    $mail->send();
		/*------------------------------------------
					Unset all SESSION here.
		-------------------------------------------*/
		unset($_SESSION['cart1998']);
		unset($_SESSION['array_sent_mail']);
		unset($_SESSION['array_sent_mail_index']);
		unset($_SESSION['ship']);  
		unset($_SESSION['sumCart']);
		unset($_SESSION['sumTotal']); 
		unset($_SESSION['point']); 
		unset($_SESSION['usePoint']); 
		unset($_SESSION['pointAfter']); 
		unset($_SESSION['id_Gift']);
		unset($_SESSION['giftCODE']);
		unset($_SESSION['sumCartPreview']);

		/*------------------------------------------
					Java location here.
		-------------------------------------------*/
		echo "<script>alert('Đặt hàng thành công!');";
		echo "window.location = 'trang-chu';";
		echo "</script>";
		

	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

	}
?>
<?php 
	} else { ?>
		<center>
			<h1>ERROR 404, Trang không tồn tại!</h1>
			<a href="trang-chu">Quay về trang chủ</a>
		</center>
<?php
	}
?>

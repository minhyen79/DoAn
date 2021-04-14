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

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-12 ml-auto mr-auto profile">
			<h3 class="text-center display-4 my-5">Thông tin cá nhân</h3>
			<div class="profile-avatar">
				<div class="table-responsive">
					<table class="table table-bordered profile-avatar-table">
						<thead>
							<tr>
								<th>Thông tin</th>
								<th>Nội Dung</th>
							</tr>
						</thead>
												<!-- PHP -->
						<?php  
							foreach ($result as $key => $avatar) { ?>
								<tbody>
									<tr>
										<th>Họ và tên :</th>
										<td><?php echo $avatar['name']; ?></td>
									</tr>
									<tr>
										<th>Email :</th>
										<td><?php echo $avatar['email']; ?></td>
									</tr>
									<tr>
										<th>Số điện thoai :</th>
										<td><?php echo $avatar['phone']; ?></td>
									</tr>
									<tr>
										<th>Điểm tích lũy :</th>
										<td><?php echo $avatar['point']; ?></td>
									</tr>
									<tr>
										<th>Địa chỉ :</th>
										<td>
											<?php  
												if ($avatar['address'] == "" || $avatar['address'] == null) {
													echo '<p class="m-0 avatar-warning">Địa chỉ của bạn trống! <svg class="Input_icon__3J2rm text-danger mb-1" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0h16v16H0V0z" fill="none"></path><path d="M15.2 13.1L8.6 1.6c-.2-.4-.9-.4-1.2 0L.8 13.1c-.1.2-.1.5 0 .7.1.2.3.3.6.3h13.3c.2 0 .5-.1.6-.3.1-.2.1-.5-.1-.7zM8.7 12H7.3v-1.3h1.3V12zm0-2.7H7.3v-4h1.3v4z" fill="currentColor"></path></svg></p>';
												} else {
													echo $avatar['address'];
												}
											?>
												
										</td>
									</tr>
									<tr>
										<th>Ngày tạo tài khoản: </th>
										<td><?php echo $avatar['create_at']; ?></td>
									</tr>
								</tbody>
						<?php
							}
						?>
												<!-- ./PHP -->
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ./avatar-->

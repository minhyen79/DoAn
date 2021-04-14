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
	<!-- alert -->
	<?php  
		if (isset($_SESSION['noti']) && $_SESSION['noti'] == 1) { ?>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12 ml-auto mr-auto mt-5">
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> Cập nhật thành công!
					</div>
				</div>
			</div>
	<?php
		} unset($_SESSION['noti']);
	?>
	
	<!-- ./alert -->
	<div class="row">
		<div class="col-lg-6 col-md-6 col-12 ml-auto mr-auto profile">
			<h3 class="text-center display-4 my-5">Cập nhật thông tin</h3>
			<div class="profile-avatar">
				<form action="" method="POST" role="form" class="profile-frm-update">
        			<div class="form-group mb-5">
        				<label for="address">Thay đổi địa chỉ :</label>
        				<input required type="text" class="form-control" name="inp-update-profile"  id="address" placeholder="Nhập vào địa chỉ..." />
        			</div>

        			<button type="submit" name="sm-update-profile" class="btn btn--primary btn-hover-dark">Cập nhật</button>
        		</form>
			</div>
		</div>
	</div>
</div>


<!-- ./avatar -->
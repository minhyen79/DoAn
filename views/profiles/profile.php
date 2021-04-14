<!-- PHP -->
<?php  
	if (isset($_SESSION['id_member'])) { ?>
		<!-- my account start  -->
<section class="main_content_area">
    <div class="container">   
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3 mr-auto ml-auto">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list profile-list">
                            <li>
                            	<a href="ca-nhan/<?php echo $_SESSION['id_member']; ?>" class="nav-link <?php if($index == 0) { echo 'active'; } ?>">Thông tin cá nhân</a>
                            </li>
                            <li>
                            	<a href="ca-nhan/don-hang/<?php echo $_SESSION['id_member']; ?>" class="nav-link <?php if($index == 1) { echo 'active'; } ?>">Đơn hàng</a>
                            </li>
                            <li>
                            	<a href="ca-nhan/cap-nhat-dia-chi/<?php echo $_SESSION['id_member']; ?>" class="nav-link <?php if($index == 2) { echo 'active'; } ?>">cập nhật thông tin</a>
                            </li>
                            <li>
                            	<a href="ca-nhan/doi-mat-khau/<?php echo $_SESSION['id_member']; ?>" class="nav-link <?php if($index == 3) { echo 'active'; } ?>">Đổi mật khẩu</a>
                            </li>
                            <li>
                            	<a href="#" class="nav-link logout-btn">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>    
                </div>
            </div>
        </div>  
    </div>        	
</section>			
<!-- my account end--> 
<?php
	} 
?>
<!-- ./PHP -->


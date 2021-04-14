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
        <div class="col-6 col-md-6 col-12 ml-auto mr-auto profile">
            <h3 class="text-center display-4 my-5">Lịch sử đơn Hàng</h3>
            <div class="profile-avatar">
                <div class="table-responsive">
                    <table class="table table-bordered profile-avatar-table">
                         <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP -->
                            <?php  
                                $stt = 0;
                                foreach ($result as $key => $order) { ?>
                                    <tr id="data-profile-order">
                                        <td><?php echo $stt+=1; ?></td>
                                        <td><?php echo '#'.$order['pinCode']; ?></td>
                                        <td><a href="#mdProfile" data-toggle="modal" title="Xem chi tiết" getID="<?php echo $order['id_order']; ?>" class="profile-see"><i class="fas fa-eye"></i></a></td>
                                    </tr>  
                            <?php
                                }
                            ?>
                            <!-- ./PHP -->
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./avatar-->
<!-- mdProfile -->
<?php include_once 'modal-profile.php'; ?>
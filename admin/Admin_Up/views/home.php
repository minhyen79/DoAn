 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                    <li class="breadcrumb-item active">Statistic</li>
                </ol>
            </div>
            <h4 class="page-title">Statistic</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-layers float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Total Product</h6>
            <h3 class="my-3" data-plugin="counterup"><?php echo $countPro; ?></h3>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="fa fa-user-secret float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Total Member</h6>
            <h3 class="my-3"><span data-plugin="counterup"><?php echo $countMem; ?></span></h3>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-paypal float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Total Order</h6>
            <h3 class="my-3"><span data-plugin="counterup"><?php echo $countOrder; ?></span></h3>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="fa fa-credit-card float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Total Cast The Day</h6>
            <h3 class="my-3"><span data-plugin="counterup"><?php echo number_format($sum) ?></span></h3>
        </div>
    </div>
    
    

</div>
<!-- end row -->



                        <!-- end row -->
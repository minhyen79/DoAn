<!-- mdProduct --> 
<div class="mdProduct">
    <!-- Modal -->
    <div class="modal fade" id="modalProduct" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <button class="mdProduct__btn" data-dismiss="modal" aria-label="Close">&times;</button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="mdProduct-image">
                                <div class="mdProduct-image-content">
                                    <div class="mdProduct-image-content__item mdProduct-image-content__item--parent">
                                       <img src="assets/images/products/<?php echo $product['main_image'] ?>" alt="<?php echo $product['product_name'] ?>">
                                    </div>
                                    
                                    <div class="mdProduct-image-content__item mdProduct-image-content__item--child d-flex justify-content-center align-items-center ">
                                        <!-- ajax jQuery -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">

                            <div class="productDetail-show-rating mb-3">
                                 <div class="data-rate-modal">
                                    <!-- ajax json. -->
                                </div>
                            </div>

                            <div class="mdProduct-info">
                                <!-- mdProduct-ratings  nhớ xóa trong css -->   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./mdProduct -->
    
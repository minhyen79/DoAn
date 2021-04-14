<!-- modal Tra cứu đơn hàng. --> 
<div class="mdProduct mdLookup">
    <!-- Modal -->
    <div class="modal fade" id="modalLookup" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <button class="mdProduct__btn modalLookup-close" data-dismiss="modal" aria-label="Close">&times;</button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <h2 class="text-center">Thông tin đơn hàng</h2>
                            <h3 class="mb-4">Đơn hàng : <span id="data-lookup-pinCode" style="text-decoration: underline;"></span></h3>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mdLookup-table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày mua</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-md-lookup">
                                            <!-- ajax json. -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./modal Tra cứu đơn hàng. --> 
    
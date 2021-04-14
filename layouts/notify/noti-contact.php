<!-- modal Tra cứu đơn hàng. --> 
<div class="mdProduct mdLookup">
    <!-- Modal -->
    <div class="modal fade" id="contact-modal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <button class="mdProduct__btn modalLookup-close" data-dismiss="modal" aria-label="Close">&times;</button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <h2 class="text-center">Liên hệ khách hàng</h2>
                            <form class="frm-contact-md" action="" method="POST" onsubmit="return frm_contact();">
                                <div class="table-responsive">
                                    <table class="table table-bordered contact-table">
                                        <tbody>
                                            <tr>
                                                <th class="align-middle">Tên khách hàng <span class="text-danger">(*)</span></th>
                                                <td><input required type="text" id="name_contact_md" placeholder="Tên của bạn.*"></td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle">Email <span class="text-danger">(*)</span></th>
                                                <td><input required type="email" id="email_contact_md" placeholder="Email của bạn.*"></td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle">Số điện thoại <span class="text-danger">(*)</span></th>
                                                <td><input required type="number" id="phone_contact_md" placeholder="Số điện thoại của bạn.*"></td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle">Lời nhắn</th>
                                                <td>
                                                    <textarea style="font-size: 1.6rem;" cols="20" rows="5" class="form-control" id="note_contact_md" placeholder="Lời nhắn của bạn.*"></textarea>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>

                                    <div class="div-btn text-center" >
                                        <button type="submit" style="margin-top: 1rem; padding: 1rem 5rem; font-size: 1.6rem;border-radius: .4rem;" type="button" class="btn btn--primary btn-hover-dark">Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./modal Tra cứu đơn hàng. --> 
    
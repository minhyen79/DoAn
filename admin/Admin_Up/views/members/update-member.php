<!-- Modal -->
<div id="modal-member-update" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title bg-success">Update Member <i class="fas fa-pencil-alt"></i></h4>
    <div class="custom-modal-text text-muted">
        <div class="row">
            <div class="col-12">

                <form action="" class="parsley-examples form-update-member" data-parsley-validate="" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="name-member-update">User Name<span class="text-danger">*</span></label>
                        <span id="data-name-member">
                            <!-- input name -->
                        </span>
                        <span id="get-id-member">
                            <!-- lấy id user. -->
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="email-member-update">Email address<span class="text-danger">*</span></label>
                        <span id="data-email-member">
                            <!-- input email -->
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="phone-member-update">Phone<span class="text-danger">*</span></label>
                        <span id="data-phone-member">
                            <!-- input phone -->
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="point-member-update">Point<span class="text-danger">*</span></label>
                        <span id="data-point-member">
                            <!-- input phone -->
                        </span>
                    </div>

                    <!-- <div class="form-group">
                        <label for="pass1-member-update">Password<span class="text-danger">*</span></label>
                        <input id="pass1-member-update" type="password" placeholder="Password" required="" class="form-control">
                    </div> -->

                    <div class="form-group">
                        <label for="status-member-update">Status</label>
                        <select class="form-control" id="status-member-update">
                            <!-- select -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address-member-update">Address</label>
                        <div id="data-address-member">
                            <!-- textarea -->
                        </div>
                    </div>

                    <div class="form-group text-right mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect cancel-user">
                            Cancel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

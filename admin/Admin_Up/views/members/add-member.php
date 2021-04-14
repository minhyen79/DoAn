<!-- Modal -->
<div id="modal-member" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title bg-success">Create new member <i class="ion ion-md-add mr-2"></i></h4>
    <div class="custom-modal-text text-muted">
        <div class="row">
            <div class="col-12">

                <form action="" class="parsley-examples form-add-member" data-parsley-validate="" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="name-member">Full Name<span class="text-danger">*</span></label>
                        <input type="text" name="nick" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="name-member">
                    </div>

                    <div class="form-group">
                        <label for="email-member">Email address<span class="text-danger">*</span></label>
                        <input type="email" name="email" parsley-trigger="change" required="" placeholder="Enter email" class="form-control" id="email-member">
                    </div>

                    <div class="form-group">
                        <label for="phone-member">Phone<span class="text-danger">*</span></label>
                        <input type="number" name="phone" parsley-trigger="change" required="" placeholder="Enter phone" class="form-control" id="phone-member">
                    </div>

                    <div class="form-group">
                        <label for="pass1-member">Password<span class="text-danger">*</span></label>
                        <input id="pass1-member" type="password" placeholder="Password" required="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="pass2-member">Confirm Password <span class="text-danger">*</span></label>
                        <input data-parsley-equalto="#pass1-member" type="password" required="" placeholder="Password" class="form-control" id="pass2-member">
                    </div>

                    <div class="form-group">
                        <label for="address-member">Address</label>
                        <div>
                            <textarea required="" class="form-control" id="address-member" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1 add-member" type="submit">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect cancel-member">
                            Cancel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

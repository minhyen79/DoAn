<!-- Modal -->
<div id="modal-user" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title bg-success">Create new user <i class="ion ion-md-add mr-2"></i></h4>
    <div class="custom-modal-text text-muted">
        <div class="row">
            <div class="col-12">

                <form action="" class="parsley-examples form-add-user" data-parsley-validate="" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="userName">Full Name<span class="text-danger">*</span></label>
                        <input type="text" name="nick" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                    </div>

                    <div class="form-group">
                        <label for="position">Position</label>
                        <select class="form-control" id="position">
                            <?php 
                                if ($_SESSION['role'] == 3) {
                            ?>
                                <option value="1">Nhân viên</option>
                                <option value="2">Admin</option>
                                <option value="3">Supper Admin</option>
                            <?php
                                }else if ($_SESSION['role'] == 2) {
                            ?>
                                <option value="1">Nhân viên</option>
                            <?php
                                }
                             ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                        <input type="email" name="email" parsley-trigger="change" required="" placeholder="Enter email" class="form-control" id="emailAddress">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        <input type="number" name="phone" parsley-trigger="change" required="" placeholder="Enter phone" class="form-control" id="phone">
                    </div>

                    <div class="form-group">
                        <label for="pass1">Password<span class="text-danger">*</span></label>
                        <input id="pass1" type="password" placeholder="Password" required="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                        <input data-parsley-equalto="#pass1" type="password" required="" placeholder="Password" class="form-control" id="passWord2">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <div>
                            <textarea required="" class="form-control" id="address" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1 add-user" type="submit">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

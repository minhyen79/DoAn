<!-- Modal -->
<div id="modal-user-update" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title bg-success">Update user <i class="fas fa-pencil-alt"></i></h4>
    <div class="custom-modal-text text-muted">
        <div class="row">
            <div class="col-12">

                <form action="" class="parsley-examples form-update-user" data-parsley-validate="" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="userName-update">User Name<span class="text-danger">*</span></label>
                        <span id="data-name-user">
                            <!-- input name -->
                        </span>
                        <span id="get-id-user">
                            <!-- lấy id user. -->
                        </span>
                    </div>

                    <div class="form-group">
                        
                        <?php 
                            if ($_SESSION['role'] == 3) {
                        ?>
                            <label for="position-update">Position</label>
                            <select class="form-control" id="data-positon-user">
                                <!-- select -->
                            </select>
                        <?php
                            }else if ($_SESSION['role'] == 2) {
                        ?>
                            <select class="form-control" id="data-positon-user" hidden>
                                <!-- select -->
                            </select>
                        <?php
                            }

                         ?>
                       
                    </div>

                    <div class="form-group">
                        <label for="emailAddress-update">Email address<span class="text-danger">*</span></label>
                        <span id="data-email-user">
                            <!-- input email -->
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="phone-update">Phone<span class="text-danger">*</span></label>
                        <span id="data-phone-user">
                            <!-- input phone -->
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="pass1-update">Password<span class="text-danger">*</span></label>
                        <input id="pass1-update" type="password" placeholder="Password" required="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="status-update">Status</label>
                        <select class="form-control" id="data-status-user">
                            <!-- select -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address-update">Address</label>
                        <div id="data-address-user">
                            <!-- textarea -->
                        </div>
                    </div>

                    <div class="form-group text-right mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                            Submit
                        </button>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

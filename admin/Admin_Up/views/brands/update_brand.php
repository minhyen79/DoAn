<!-- Modal -->
<div id="modal-brand-update" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title bg-success">Update Brand <i class="fas fa-pencil-alt"></i></h4>
    <div class="custom-modal-text text-muted">
        <div class="row">
            <div class="col-12">

                <form action="" class="parsley-examples form-update-category" data-parsley-validate="" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="name-member-update">Brand Name<span class="text-danger">*</span></label>
                        <span id="data-name-brand">
                            <!-- input name -->
                        </span>
                        <span id="get-id-brand">
                            <!-- lấy id user. -->
                        </span>
                    </div>

                    <div class="form-group text-right mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1 md_update_brand" type="submit">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect cancel-brand">
                            Cancel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

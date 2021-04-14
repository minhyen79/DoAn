<!-- Modal -->
<div id="modal-slide-update" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title bg-success">Update Slide <i class="fas fa-pencil-alt"></i></h4>
    <div class="custom-modal-text text-muted">
        <div class="row">
            <div class="col-12">

                <form action="" class="parsley-examples form-update-category" enctype="multipart/form-data" data-parsley-validate="" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="name-member-update">Title Slide<span class="text-danger">*</span></label>
                        <span id="data-title-slide">
                            <!-- input name -->
                        </span>
                        <span id="get-id-slide">
                            <!-- lấy id user. -->
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="emailAddress-update">Slider<span class="text-danger">*</span></label>
                        <span id="data-slider">
                            <!-- input slider -->
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="emailAddress-update">Content Slider<span class="text-danger">*</span></label>
                        <span id="data-content">
                            <!-- input content -->
                        </span>
                    </div>

                    <div class="form-group text-right mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1 md_update_slide" type="submit">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect cancel-category-news">
                            Cancel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

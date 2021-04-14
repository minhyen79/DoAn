<!-- Modal -->
<div id="modal-slide" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title bg-success">Create new slide <i class="ion ion-md-add mr-2"></i></h4>
    <div class="custom-modal-text text-muted">
        <div class="row">
            <div class="col-12">

                <form action="" class="parsley-examples form-add-brand" enctype="multipart/form-data" data-parsley-validate="" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="title-slide">Title Slide<span class="text-danger">*</span></label>
                        <input type="text" name="nick" parsley-trigger="change" required="" placeholder="Enter brand name" class="form-control" id="title-slide">
                    </div>

                    <div class="form-group">
                        <label for="name-brand">Slider<span class="text-danger">*</span></label>
                        <input type="file" name="nick" parsley-trigger="change" required="" placeholder="Enter brand name" class="form-control"  accept="image/png, image/jpg, image/jpeg" id="slider">
                    </div>

                    <div class="form-group">
                        <label for="cotent-slide">Content Slide<span class="text-danger">*</span></label>
                        <input type="text" name="nick" parsley-trigger="change" required="" placeholder="Enter brand name" class="form-control" id="cotent-slide">
                    </div>

                   

                    <div class="form-group text-right mb-0">
                       <button type="submit" id="add_slide_md" value="" class="btn btn-info">Add Brand</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

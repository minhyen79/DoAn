<!-- Modal -->
<div id="modal-sub-image" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title bg-success">Create new Sub Image <i class="ion ion-md-add mr-2"></i></h4>
    <div class="custom-modal-text text-muted">
        <div class="row">
            <div class="col-12">

                <form action="" class="parsley-examples form-add-brand" enctype="multipart/form-data" data-parsley-validate="" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="name-brand">Main Product: <span class="text-danger">*</span></label>
                        <select class="form-control main_product" name="main_product">
                            <?php 
                                foreach ($pro_sub as $key => $value) {
                             ?>
                                <option value="<?php echo $value['id_product'] ?>"><?php echo $value['product_name'] ; ?></option>
                             <?php
                                }

                             ?>
                            
                        </select>
                    </div>

                     <div class="form-group">
                        <label for="">Sub Image:</label>
                        <input type="file" multiple accept="image/png, image/jpg, image/jpeg" required="" name="sub_image[]" class="form-control sub_image" value="">
                    </div>

                   

                    <div class="form-group text-right mb-0">
                       <button type="submit" id="add_subImage_md" name="add_subImage_md" value="" class="btn btn-info">Add Brand</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal-product" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title bg-success">Create new product <i class="ion ion-md-add mr-2"></i></h4>
    <div class="custom-modal-text text-muted">
        <div class="row">
            <div class="col-12">

                <form action="" method="POST" role="form" id="forms_md_user" enctype="multipart/form-data">
                  <div id="show_form_add">
                    <div class="form-group">
                        <label for="">Name product:</label>
                        <input type="text" required="" name="" class="form-control name_product" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Category:</label>
                        <select class="form-control category">
                        <?php 
                            foreach ($cate as $key => $val_cate) {
                        ?>
                            <option value="<?php echo $val_cate['id_category']; ?>"><?php echo $val_cate['name_cate']; ?></option>
                        <?php
                            }
                         ?>
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Brand:</label>
                        <select class="form-control brand">
                            <?php 
                                foreach ($brand as $key => $val_brand) {
                            ?>

                                <option value="<?php echo $val_brand['id_brand'] ?>"><?php echo $val_brand['brand_name']; ?></option>

                            <?php
                                }
                             ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Origin:</label>
                        <input type="text" required="" class="form-control origin_product" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Main image:</label>
                        <input type="file" required="" accept="image/png, image/jpg, image/jpeg" class="form-control main_img" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Second image:</label>
                        <input type="file" required="" accept="image/png, image/jpg, image/jpeg" class="form-control second_img" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Price:</label>
                        <input type="number" required="" min="0" class="form-control price_product" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity:</label>
                        <input type="number" required="" min="0" class="form-control quantity_product" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Mass:</label>
                        <input type="text" required="" class="form-control mass_product" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Classify:</label>
                        <input type="text" required="" class="form-control classify_product" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Sale:</label>
                        <input type="text" required="" class="form-control sale_product" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Price sale:</label>
                        <input type="number" required="" min="0" class="form-control price_sale" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Description:</label>
                        <textarea class="form-control desr " name="" id="" rows="10" ></textarea>
                    </div>
                    
                    <button type="submit" id="add_product_md" value="" class="btn btn-info">Add Product</button>
                  </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

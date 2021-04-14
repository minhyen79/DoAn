<div class="coltainer">
    <h2>Add News</h2>
    <form action="" method="POST" role="form" id="forms_md_user" enctype="multipart/form-data">
      <div id="show_form_add">
        <div class="form-group">
            <label for="">Title:</label>
            <input type="text" required="" name="title" class="form-control title" value="">
        </div>
        <div class="form-group">
            <label for="">Category News:</label>
            <select class="form-control category_news" name="category_news">
                <?php 
                foreach ($cate_news as $key => $val_cate) {
                    ?>
                    <option value="<?php echo $val_cate['id_category_new']; ?>"><?php echo $val_cate['name_cate']; ?></option>
                    <?php
                }
                ?>

            </select>
        </div>

        
            <div class="form-group">
             <label>Writer:</label>
             <input class="form-control id_user" id="<?php if(isset($_SESSION['id_user'])) {echo $_SESSION['id_user'];} ?>" type="text" name="" value="<?php if(isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>" readonly> 

             </div>

             <div class="form-group">
             <label>Classify:</label>
             <input class="form-control" type="text" name="classify"> 

             </div>

             <div class="form-group">
                <label for="">Main image:</label>
                <input type="file" required="" accept="image/png, image/jpg, image/jpeg" class="form-control main_img" value="" name="main_img">
            </div>

            <div class="form-group">
                <label for="">Main Content:</label>
                <textarea class="form-control content " name="content" id="" rows="5" ></textarea>
            </div>

            <div class="form-group">
                <label for="">Description:</label>
                <textarea class="form-control desr ckeditor"  name="ckeditor" id="" rows="10" ></textarea>
            </div>

            <button type="submit" id="add_news_md" name="add_news_md" value="" class="btn btn-info">Add News</button>
            <a href="index.php?page=new" class="btn btn-outline-danger ml-2">Back</a>
        </div>
    </form>

</div>

                

               


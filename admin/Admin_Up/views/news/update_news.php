<div class="container">
    <h2>Update News</h2>
   <?php 
        foreach ($update_news as $key => $news) {
    ?>
        <form action="" method="POST" role="form" id="forms_md_user" enctype="multipart/form-data">
      <div id="show_form_add">
            <div class="form-group">
                <label for="">Title:</label>
                <input type="text" required="" name="title" class="form-control title" value="<?php echo $news['title'] ?>">
            </div>
            <div class="form-group">
                <label for="">Category:</label>
                <select class="form-control cate" name="cate">
                    <?php 
                    // $result_cate = $cate_news->getCateforNews();
                    foreach ($cate_news as $key => $val_cate) {
                        ?>
                        <option <?php if ($news['id_category_new'] == $val_cate['id_category_new']) {echo "selected";} ?> value="<?php echo $val_cate['id_category_new']; ?>"><?php echo $val_cate['name_cate']; ?></option>
                        <?php
                    }
                    ?>

                </select>
            </div>

            <?php 
                if ($_SESSION['role'] == 3) {
             ?>
                 <div class="form-group">
                    <label for="">Writer:</label>
                    <select class="form-control " name="write">
                        <?php 
                        // $result_user = $user_news->getUserforNews();
                        foreach ($user_news as $key => $val_user) {
                            ?>
                            <option <?php if ($news['id_user'] == $val_user['id_user']) {echo "selected";} ?> value="<?php echo $val_user['id_user']; ?>"><?php echo $val_user['name']; ?></option>
                            <?php
                        }
                        ?>

                    </select>
                </div>
             <?php
                }else if ($_SESSION['role'] == 2 || $_SESSION['role'] == 1) {
            ?>
                <div class="form-group">
                 <label>Writer:</label>
                 <input class="form-control id_user" id="<?php if(isset($_SESSION['id_user'])) {echo $_SESSION['id_user'];} ?>" type="text" name="write" value="<?php if(isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>" readonly> 

                 </div>
            <?php
                }
             ?>

             <div class="form-group">
             <label>Classify:</label>
             <input class="form-control" type="text" name="classify" value="<?php echo $news['classify']; ?>"> 

             </div>
           

            <div class="form-group">
                <label for="">Main image:</label>
                <input type="file" required="" accept="image/png, image/jpg, image/jpeg" class="form-control main_img" value="<?php echo $news['main_image'] ?>" name="main_img">
            </div>

            <div class="form-group">
                <label for="">Main Content:</label>
                <textarea class="form-control content " name="content" id="" rows="10" >
                    <?php echo $news['main_content']; ?>
                </textarea>
            </div>

            <div class="form-group">
                <label for="">Description:</label>
                <textarea class="form-control desr ckeditor" name="ckeditor" id="" rows="10" ><?php echo $news['description']; ?></textarea>
            </div>

            <button type="submit" id="update_news_md" name="update_news_md" value="" class="btn btn-info">Update News</button>
            <a href="index.php?page=new" class="btn btn-outline-danger ml-2">Back</a>
        </div>
    </form>
    <?php
        }

    ?>
</div>

              

               


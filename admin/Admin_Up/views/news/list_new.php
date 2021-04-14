<!-- start page title -->
<div class="row">
 	<div class="col-12">
 		<div class="page-title-box">
 			<div class="page-title-right">
 				<ol class="breadcrumb m-0">
 					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 					<li class="breadcrumb-item active">Product</li>
 				</ol>
 			</div>
 			<h4 class="page-title">News data (News)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">News Data table (News)</h4>
 			<center>

 				<?php 
 					if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2 ||  $_SESSION['role'] == 1) {
 				?>
 					<a href="index.php?page=new&act=add_news" title="Create new product"  class="btn btn-success waves-effect waves-light" ><i class="ion ion-md-add mr-2"></i>Create News</a>
 				<?php
 					}
 				 ?>
 				
 			</center>
 			<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 				<thead>
 					<tr>
 						<th>STT</th>
 						<th>Action</th>
 						<th>Title</th>
 						<th>Image</th>
 						
 					</tr>
 				</thead>


 				<tbody>
 					<!-- PHP -->
 					<?php  
 						$stt = 0;
 						foreach ($result as $key => $val) { $stt += 1; ?>
 						 	<!-- html -->
 						 	<tr>
 						 		<td><?php echo $stt; ?></td>
		 						<td>
		 							<?php 
		 								if ($_SESSION['role'] == 3) {
		 							?>
		 								

			 							<a id="<?php echo $val['id_news'] ?>" class="update-news btn btn-outline-warning waves-effect waves-light"  href="index.php?page=new&act=update_news&id=<?php echo $val['id_news'] ?>" title="update product"  >
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							&nbsp;

			 							<a id="<?php echo $val['id_news'] ?>" href="#" title="delete product" class="delete-news btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
		 							<?php
		 								}else if ($_SESSION['role'] == 2) {
		 							?>
		 								

			 							<a id="<?php echo $val['id_news'] ?>" class="update-news btn btn-outline-warning waves-effect waves-light"  href="index.php?page=new&act=update_news&id=<?php echo $val['id_news'] ?>" title="update product"  >
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
		 							<?php
		 								}else if ($_SESSION['role'] == 1) {
		 							?>
		 								<a id="<?php echo $val['id_news'] ?>" class="update-news btn btn-outline-warning waves-effect waves-light"  href="index.php?page=new&act=update_news&id=<?php echo $val['id_news'] ?>" title="update product"  >
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							
		 							<?php
		 								}
		 							?>
		 							
		 						</td>
		 						<td><?php echo $val['title'] ?></td>
		 						<td>
		 							<img style="width: 100px; height: auto;" src="../../assets/images/blogs/<?php echo $val['main_image'] ?>">
		 						</td>
		 						<!-- <td><?//php echo $val['main_content'] ?></td>
		 						<td><?//php echo $val['description'] ?></td> -->
		 						
		 						
		 					</tr>
 						 	<!-- ./html -->
 					<?php
 						}
 					?>
 					<!-- ./PHP -->
 					
 				</tbody>
 			</table>

 			<!-- <textarea class="form-control ckeditor" name="ckeditor"></textarea> -->
 		</div>
 	</div>
 </div> <!-- end row -->

 <!--  Modal add news. -->
 <?php //include_once 'views/news/add_news.php'; ?>
<!--  Modal update news. -->
 <?php //include_once 'views/news/update_news.php'; ?>
 <!--  Modal detail news. -->
 <?php include_once 'views/news/detail_news.php'; ?>

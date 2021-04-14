<!-- start page title -->
<div class="row">
 	<div class="col-12">
 		<div class="page-title-box">
 			<div class="page-title-right">
 				<ol class="breadcrumb m-0">
 					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 					<li class="breadcrumb-item active">Category</li>
 				</ol>
 			</div>
 			<h4 class="page-title">Category data (Category)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">Category Data table (Category)</h4>
 			<center>
 				<?php 
 					if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
 				?>
 					<a href="#modal-category" title="Create new category" class="btn btn-success waves-effect waves-light" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a"><i class="ion ion-md-add mr-2"></i>Create New Category</a>
 				<?php
 					}
 				 ?>
 				
 			</center>
 			<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 				<thead>
 					<tr>
 						<th>STT</th>
 						<?php 
 							if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
 						?>
 							<th>Action</th>

 						<?php
 							}
 						?>
 						
 						<th>Name Category</th>
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
 						 		<?php 
 						 			if ($_SESSION['role'] == 3) {
 						 		?>
 						 			<td>
 						 				<a id="<?php echo $val['id_category'] ?>" class="update-category btn btn-outline-warning waves-effect waves-light"  href="#modal-category-update" title="update category" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							&nbsp;

			 							<a id="<?php echo $val['id_category'] ?>" href="#" title="delete category" class="delete-category btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
			 						</td>
 						 		<?php
 						 			}else if ($_SESSION['role'] == 2) {
 						 		?>
 						 			<td>
 						 				<a id="<?php echo $val['id_category'] ?>" class="update-category btn btn-outline-warning waves-effect waves-light"  href="#modal-category-update" title="update category" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							
			 						</td>
 						 		<?php
 						 			}else if ($_SESSION['role'] == 1) {
 						 				# code...
 						 			}
 						 		 ?>
		 						
		 						<td><?php echo $val['name_cate'] ?></td>
		 						
		 						
		 						
		 					</tr>
 						 	<!-- ./html -->
 					<?php
 						}
 					?>
 					<!-- ./PHP -->
 					
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div> <!-- end row -->

 <!--  Modal add member. -->
 <?php include_once 'views/categorys/add_category.php'; ?>
<!--  Modal update member. -->
 <?php include_once 'views/categorys/update_category.php'; ?>

<!-- start page title -->
<div class="row">
 	<div class="col-12">
 		<div class="page-title-box">
 			<div class="page-title-right">
 				<ol class="breadcrumb m-0">
 					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 					<li class="breadcrumb-item active">Sub Image</li>
 				</ol>
 			</div>
 			<h4 class="page-title">Sub Image data (Sub Image)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">Sub Image Data table (Sub Image)</h4>
 			<center>
 				<?php 
 					if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
 				?>
 					<a href="#modal-sub-image" title="Create new category" class="btn btn-success waves-effect waves-light" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a"><i class="ion ion-md-add mr-2"></i>Create New Sub Image</a>
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
 						
 						<th>Main Image</th>
 						<th>Sub Image</th>
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
 						 				<a id="<?php echo $val['id_detail_image'] ?>" class="update-subImage btn btn-outline-warning waves-effect waves-light"  href="#modal-subImage-update" title="update category" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							&nbsp;

			 							<a id="<?php echo $val['id_detail_image'] ?>" href="#" title="delete category" class="delete-subImage btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
			 						</td>
 						 		<?php
 						 			}else if ($_SESSION['role'] == 2) {
 						 		?>
 						 			<td>
 						 				<a id="<?php echo $val['id_detail_image'] ?>" class="update-subImage btn btn-outline-warning waves-effect waves-light"  href="#modal-subImage-update" title="update category" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							
			 						</td>
 						 		<?php
 						 			}else if ($_SESSION['role'] == 1) {
 						 				# code...
 						 			}
 						 		 ?>
		 						
		 						<td><img style="width: 100px; height: auto;" src="../../assets/images/products/<?php echo $val['main_image'] ?>"></td>
		 						<td><img style="width: 100px; height: auto;" src="../../assets/images/products-childen/<?php echo $val['sub_image'] ?>"></td>
		 						
		 						
		 						
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
 <?php include_once 'views/sub_images/add_subImage.php'; ?>
<!--  Modal update member. -->
 <?php include_once 'views/sub_images/update_subImage.php'; ?>

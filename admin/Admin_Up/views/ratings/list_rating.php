<!-- start page title -->
<div class="row">
 	<div class="col-12">
 		<div class="page-title-box">
 			<div class="page-title-right">
 				<ol class="breadcrumb m-0">
 					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 					<li class="breadcrumb-item active">Rating</li>
 				</ol>
 			</div>
 			<h4 class="page-title">Rating data (Rating)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">Rating Data table (Rating)</h4>
 			<center>
 				
 				
 				
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
 						
 						<th>Name Prodcut</th>
 						<th>Image</th>
 						<th>Member</th>
 						<th>Rating</th>
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
		 								

			 							<a id="<?php echo $val['id_rating'] ?>" href="#" title="delete brand" class="delete-rating btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
			 						</td>
		 							<?php
		 								}else if ($_SESSION['role'] == 2) {
		 							?>
		 							<td>
		 								<a id="<?php echo $val['id_rating'] ?>" href="#" title="delete brand" class="delete-rating btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
			 						</td>
		 							<?php
		 								}else if ($_SESSION['role'] == 1) {
		 									
		 								}
		 							 ?>
		 							
		 						
		 						<td><?php echo $val['product_name'] ?></td>
		 						<td><img style="width: 100px; height: auto;" src="../../assets/images/products/<?php echo $val['main_image'] ?>"></td>
		 						<td><?php echo $val['name'] ?></td>
		 						<td><?php echo $val['rate'].' <i class="fa fa-star text-danger"></i>'; ?></td>
		 						
		 						
		 						
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
 <?php include_once 'views/brands/add_brand.php'; ?>
<!--  Modal update member. -->
 <?php include_once 'views/brands/update_brand.php'; ?>

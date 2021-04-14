<!-- start page title -->
<div class="row">
 	<div class="col-12">
 		<div class="page-title-box">
 			<div class="page-title-right">
 				<ol class="breadcrumb m-0">
 					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 					<li class="breadcrumb-item active">Brand</li>
 				</ol>
 			</div>
 			<h4 class="page-title">Brand data (Brand)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">Brand Data table (Brand)</h4>
 			<center>
 				<?php 
 					if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
 				?>
 					<a href="#modal-brand" title="Create new category" class="btn btn-success waves-effect waves-light" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a"><i class="ion ion-md-add mr-2"></i>Create New Brand</a>
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
 						
 						<th>Name Brand</th>
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
		 								<a id="<?php echo $val['id_brand'] ?>" class="update-brand btn btn-outline-warning waves-effect waves-light"  href="#modal-brand-update" title="update brand" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
		 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							&nbsp;

			 							<a id="<?php echo $val['id_brand'] ?>" href="#" title="delete brand" class="delete-brand btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
			 						</td>
		 							<?php
		 								}else if ($_SESSION['role'] == 2) {
		 							?>
		 							<td>
		 								<a id="<?php echo $val['id_brand'] ?>" class="update-brand btn btn-outline-warning waves-effect waves-light"  href="#modal-brand-update" title="update brand" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
		 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 						</td>
		 							<?php
		 								}else if ($_SESSION['role'] == 1) {
		 									
		 								}
		 							 ?>
		 							
		 						
		 						<td><?php echo $val['brand_name'] ?></td>
		 						
		 						
		 						
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

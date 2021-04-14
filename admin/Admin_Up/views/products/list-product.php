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
 			<h4 class="page-title">Product data (Product)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">Product Data table (Product)</h4>
 			<center>

 				<?php 
 					if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
 				?>
 					<a href="#modal-product" title="Create new product" class="btn btn-success waves-effect waves-light" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a"><i class="ion ion-md-add mr-2"></i>Create New Product</a>
 				<?php
 					}
 				 ?>
 				
 			</center>
 			<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 				<thead>
 					<tr>
 						<th>STT</th>
 						<th>Action</th>
 						<th>Name Product</th>
 						<th>Image</th>
 						<th>Quantity</th>
 						<th>Price</th>
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
		 								<a id="<?php echo $val['id_product'] ?>" class="detail-product btn btn-outline-success waves-effect waves-light"  href=".modal-detail" title="detail product" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-toggle="modal">
		 								<i class="fa fa-eye" ></i>
			 							</a>
			 							&nbsp;

			 							<a id="<?php echo $val['id_product'] ?>" class="update-product btn btn-outline-warning waves-effect waves-light"  href="#modal-product-update" title="update product" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							&nbsp;

			 							<a id="<?php echo $val['id_product'] ?>" href="#" title="delete product" class="delete-product btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
		 							<?php
		 								}else if ($_SESSION['role'] == 2) {
		 							?>
		 								<a id="<?php echo $val['id_product'] ?>" class="detail-product btn btn-outline-success waves-effect waves-light"  href=".modal-detail" title="detail product" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-toggle="modal">
		 								<i class="fa fa-eye" ></i>
			 							</a>
			 							&nbsp;

			 							<a id="<?php echo $val['id_product'] ?>" class="update-product btn btn-outline-warning waves-effect waves-light"  href="#modal-product-update" title="update product" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
		 							<?php
		 								}else if ($_SESSION['role'] == 1) {
		 							?>
		 								<a id="<?php echo $val['id_product'] ?>" class="detail-product btn btn-outline-success waves-effect waves-light"  href=".modal-detail" title="detail product" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-toggle="modal">
		 								<i class="fa fa-eye" ></i>
			 							</a>
		 							<?php
		 								}
		 							?>
		 							
		 						</td>
		 						<td><?php echo $val['product_name'] ?></td>
		 						<td>
		 							<img style="width: 100px; height: auto;" src="../../assets/images/products/<?php echo $val['main_image'] ?>">
		 						</td>
		 						<td><?php echo $val['quantity'] ?></td>
		 						<td><?php echo number_format($val['price']).'<sup>đ<sup>' ?></td>
		 						
		 						
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
 <?php include_once 'views/products/add_product.php'; ?>
<!--  Modal update member. -->
 <?php include_once 'views/products/update_product.php'; ?>
 <!--  Modal detail member. -->
 <?php include_once 'views/products/detail_product.php'; ?>

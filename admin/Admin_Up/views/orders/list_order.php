<!-- start page title -->
<div class="row">
 	<div class="col-12">
 		<div class="page-title-box">
 			<div class="page-title-right">
 				<ol class="breadcrumb m-0">
 					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 					<li class="breadcrumb-item active">Member</li>
 				</ol>
 			</div>
 			<h4 class="page-title">Order data (Order)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">Order Data table (Order)</h4>
 			<center>
 				
 			</center>
 			<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 				<thead>
 					<tr>
 						<th>STT</th>
 						<th>Action</th>
 						<th>Name Member</th>
 						<th>Ship Method</th>
 						<th>Pay Method</th>
 						<th>Status</th>
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
 						 			if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
 						 		?>
 						 			<td>
			 							<a id="<?php echo $val['id_order'] ?>" class="update-order btn btn-outline-success waves-effect waves-light"  href=".bs-example-modal-xl" title="update order" data-animation="slidetogether" data-plugin="custommodal" data-toggle="modal" data-overlayspeed="100" >
			 								<i class="fa fa-eye" ></i>
			 							</a>
			 							
			 							
			 							&nbsp;
			 							<a id="<?php echo $val['id_order'] ?>" href="#" title="delete order" class="delete-order btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
			 						</td>
 						 		<?php
 						 			}else if ($_SESSION['role'] == 1) {
 						 		?>
 						 			<td>
			 							<a id="<?php echo $val['id_order'] ?>" class="update-order btn btn-outline-success waves-effect waves-light"  href=".bs-example-modal-xl" title="update order" data-animation="slidetogether" data-plugin="custommodal" data-toggle="modal" data-overlayspeed="100" >
			 								<i class="fa fa-eye" ></i>
			 							</a>
			 							
			 						</td>

 						 		<?php
 						 			}
 						 		 ?>
		 						
		 						<td><?php echo $val['name'] ?></td>
		 						<td><?php echo $val['ship_method'] ?></td>
		 						<td><?php echo $val['payl_method'] ?></td>
		 						<td>
		 							<?php  
		 								if ($val['status'] == 'Đã giao') {
		 									echo '<span class="font-weight-bold text-success">'.'Delivered'.'</span>';
		 								} else if($val['status'] == 'Chưa giao'){
		 									echo '<span class="font-weight-bold text-danger">'.'Not delivery'.'</span>';
		 								}
		 							?>
		 							
		 						</td>
		 						
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
<!--  <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl">Extra Large modal</button> -->

 
<!--  Modal update order. -->
 <?php include_once 'views/orders/update_order.php'; ?>

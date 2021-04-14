<!-- start page title -->
<div class="row">
 	<div class="col-12">
 		<div class="page-title-box">
 			<div class="page-title-right">
 				<ol class="breadcrumb m-0">
 					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 					<li class="breadcrumb-item active">User</li>
 				</ol>
 			</div>
 			<h4 class="page-title">User data (staff)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">User Data table (staff)</h4>
 			<center>
 				<?php 
 					if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
 				?>
 					<a href="#modal-user" title="Create new user" class="btn btn-success waves-effect waves-light" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a"><i class="ion ion-md-add mr-2"></i>Create new user</a>
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
 						<th>Full Name</th>
 						<th>Position</th>
 						<th>Email</th>
 						<th>Phone</th>
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
 						 			if ($_SESSION['role'] == 3) {
 						 		?>
 						 			<td>
			 							<a id="<?php echo $val['id_user'] ?>" class="update-user btn btn-outline-warning waves-effect waves-light"  href="#modal-user-update" title="update user" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							&nbsp;
			 							<a id="<?php echo $val['id_user'] ?>" href="#" title="delete user" class="delete-user btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
			 						</td>
 						 		<?php
 						 			}else if ($_SESSION['role'] == 2) {
 						 		?>
 						 			<td>
			 							<a id="<?php echo $val['id_user'] ?>" class="update-user btn btn-outline-warning waves-effect waves-light"  href="#modal-user-update" title="update user" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							
			 						</td>
 						 		<?php
 						 			}else if ($_SESSION['role'] == 1) {
 						 				# code...
 						 			}
 						 		 ?>
		 						
		 						<td><?php echo $val['name'] ?></td>
		 						<td><?php echo $val['role'] ?></td>
		 						<td><?php echo $val['email'] ?></td>
		 						<td><?php echo $val['phone'] ?></td>
		 						<td>
		 							<?php  
		 								if ($val['status'] == 'Active') {
		 									echo '<span class="font-weight-bold text-success">'.$val['status'].'</span>';
		 								} else {
		 									echo '<span class="font-weight-bold text-danger">'.$val['status'].'</span>';
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

<!--  Modal add user. -->
 <?php include_once 'views/users/add-user.php'; ?>
<!--  Modal update user. -->
 <?php include_once 'views/users/update-user.php'; ?>
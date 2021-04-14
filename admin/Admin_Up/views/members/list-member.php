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
 			<h4 class="page-title">Member data (Member)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">Member Data table (Member)</h4>
 			<center>

 				<?php 
 					if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
 				?>
 					<a href="#modal-member" title="Create new member" class="btn btn-success waves-effect waves-light" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a"><i class="ion ion-md-add mr-2"></i>Create New Member</a>
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
 						<th>Email</th>
 						<th>Phone</th>
 						<th>Point</th>
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
			 							<a id="<?php echo $val['id_member'] ?>" class="update-member btn btn-outline-warning waves-effect waves-light"  href="#modal-member-update" title="update member" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							&nbsp;
			 							<a id="<?php echo $val['id_member'] ?>" href="#" title="delete member" class="delete-member btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
			 						</td>
 						 		<?php
 						 			}else if ($_SESSION['role'] == 2) {
 						 		?>
 						 			<td>
			 							<a id="<?php echo $val['id_member'] ?>" class="update-member btn btn-outline-warning waves-effect waves-light"  href="#modal-member-update" title="update member" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
			 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 						</td>

 						 		<?php
 						 			}else if ($_SESSION['role'] == 1) {
 						 				# code...
 						 			}
 						 		 ?>
		 						
		 						<td><?php echo $val['name'] ?></td>
		 						<td><?php echo $val['email'] ?></td>
		 						<td><?php echo $val['phone'] ?></td>
		 						<td><?php echo $val['point'] ?></td>
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

 <!--  Modal add member. -->
 <?php include_once 'views/members/add-member.php'; ?>
<!--  Modal update member. -->
 <?php include_once 'views/members/update-member.php'; ?>

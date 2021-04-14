<!-- start page title -->
<div class="row">
 	<div class="col-12">
 		<div class="page-title-box">
 			<div class="page-title-right">
 				<ol class="breadcrumb m-0">
 					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 					<li class="breadcrumb-item active">Slide</li>
 				</ol>
 			</div>
 			<h4 class="page-title">Slide data (Slide)</h4>
 		</div>
 	</div>
 </div>     
 <!-- end page title --> 

 <div class="row">
 	<div class="col-12">
 		<div class="card-box">
 			<h4 class="header-title">Slide Data table (Slide)</h4>
 			<center>
 				<?php 
 					if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
 				?>
 					<a href="#modal-slide" title="Create new category-news" class="btn btn-success waves-effect waves-light" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a"><i class="ion ion-md-add mr-2"></i>Create Slider</a>
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
 						
 						<th>Title Slide</th>
 						<th>Content Slide</th>
 						<th>Slider</th>
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
		 								<a id="<?php echo $val['id_slide'] ?>" class="update-slide btn btn-outline-warning waves-effect waves-light"  href="#modal-slide-update" title="update brand" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
		 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 							&nbsp;

			 							<a id="<?php echo $val['id_slide'] ?>" href="#" title="delete slide" class="delete-slide btn btn-outline-danger waves-effect waves-light">
			 								<i class="fas fa-trash-alt"></i>
			 							</a>
			 						</td>
		 							<?php
		 								}else if ($_SESSION['role'] == 2) {
		 							?>
		 							<td>
		 								<a id="<?php echo $val['id_slide'] ?>" class="update-slide btn btn-outline-warning waves-effect waves-light"  href="#modal-slide-update" title="update brand" data-animation="slidetogether" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
		 								<i class="fas fa-pencil-alt"></i>
			 							</a>
			 						</td>
		 							<?php
		 								}else if ($_SESSION['role'] == 1) {
		 									
		 								}
		 							 ?>
		 							
		 						
		 						<td><?php echo $val['slide_title'] ?></td>
		 						<td><?php echo $val['slide_content'] ?></td>
		 						<td><img style="width: 400px; height: auto;" src="../../assets/images/sliders/<?php echo $val['slide_image'] ?>"></td>
		 						
		 						
		 						
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

 <!--  Modal add category news. -->
 <?php include_once 'views/slides/add_slide.php'; ?>
<!--  Modal update category news. -->
 <?php include_once 'views/slides/update_slide.php'; ?>

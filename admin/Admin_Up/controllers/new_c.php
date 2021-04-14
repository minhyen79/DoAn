<?php 
	// import model.
	include_once 'models/new_m.php';

	/**
	 * 
	 */
	class new_c extends new_m
	{
		
		private $new;

		function __construct()
		{
			$this->new = new new_m();
		}

		/*--------------------Get New--------------------*/

		public function getNews()
		{
			if (isset($_GET['act'])) {
	    		$act = $_GET['act'];
	    	} else {
	    		$act = 'index';
	    	}

	    	switch ($act) {

	    		case 'add_news':
	    			if (isset($_POST['add_news_md'])) {
	    				$title 			= $_POST['title'];
	    				$cate_news 		= $_POST['category_news'];
	    				$id_user 		= $_SESSION['id_user'];
	    				$classify       = $_POST['classify'];
	    				$main_img 		= $_FILES['main_img']['name'];
	    				$main_img_x 	= time().$main_img;
	    				$_SESSION['name_img'] = $main_img_x;
	    				$main_img_tmp 	= $_FILES['main_img']['tmp_name'];
	    				$desr 			= $_POST['ckeditor'];
	    				$content 		= $_POST['content'];
	    				// $content = $_POST['my_editor'];
	    				// $content = new FCKeditor('ckeditor');

	    				$result = $this->new->addNews($cate_news,$id_user,$classify,$title,$main_img_x,$desr,$content);

	    				if ($result) {
	    					move_uploaded_file($main_img_tmp, "../../assets/images/blogs/".time().$main_img);
	    					header('Location:index.php?page=new');
	    				}
	    			}
	    			$cate_news = $this->new->getCategoryforNews();
	    			include_once 'views/news/add_news.php';
	    			break;

	    		case 'update_news':
	    			if (isset($_GET['id'])) {
	    				$id = $_GET['id'];
		    			$update_news = $this->new->selectNews($id);
		    			$cate_news = $this->new->getCategoryforNews();
		    			$user_news = $this->new->getUserforNews();

		    			if (isset($_POST['update_news_md'])) {
		    				$id = $_GET['id'];
		    				$title = $_POST['title'];
		    				$cate = $_POST['cate'];
		    				
		    				if ($_SESSION['role'] == 3) {
		    					$id_user = $_POST['write'];
		    				}else if ($_SESSION['role'] == 2 || $_SESSION['role'] == 1) {
		    					$id_user = $_SESSION['id_user'];
		    				}
		    				
		    				$classify = $_POST['classify'];
		    				$main_img 	= $_FILES['main_img']['name'];
		    				$main_img_x = time().$main_img;
		    				$main_img_tmp = $_FILES['main_img']['tmp_name'];
		    				$desr 	= $_POST['ckeditor'];
		    				$content = $_POST['content'];

		    				$result = $this->new->updateNews($id,$cate,$id_user,$classify,$title,$main_img_x,
		    												$desr,$content);

		    				if ($result) {
		    					move_uploaded_file($main_img_tmp, "../../assets/images/blogs/".time().$main_img);
		    					header('Location:index.php?page=new');
		    					echo '<script type="text/javascript"> alert("Update successfull !!!") </script>';
		    				}else {
		    					echo '<script type="text/javascript"> alert("Update false !!!") </script>';
		    				}

		    			}


		    		}

		    		include_once 'views/news/update_news.php';
	    			break;
	    		
	    		// CRUD by ajax jQuery. | thêm, sửa, xóa => tôi làm ở ajax jQuery(folder server).
	    		default:

	    			if (isset($_SESSION['role'])) {
		
						if ($_SESSION['role'] == 1) {

							$role 	= 1;
						} elseif ($_SESSION['role'] == 2) {
							
							$role  = 2;
						} elseif ($_SESSION['role'] == 3) {
							
							$role  = 3;

						} else {

							$role  = 0;
						}
					}

	    			//result.
	    			$result = $this->new->getNews();

	    			// $cate_news = $this->new->getCategoryforNews();

	    			include 'views/news/list_new.php';
	    			break;
	    	}
		}
	}


 ?>
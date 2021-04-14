<?php

	// import config.
	include_once 'models/blog_m.php';


	class blog_c extends blog_m
	{

	   	private $blog;

	    function __construct()
	    {
	        $this->blog = new blog_m();
	    }

	    // hiển thị bài viết ở trang chủ.
	 	public function showBlog()
	 	{
	 		$arr_blog = $this->blog->showBlog_home();
	 		include_once 'layouts/blog.php';
	 	}

	 	// Trang chi tiết bài viết.
		public function blogDetail()
		{
			if (isset($_GET['id'])) {

				$id = (int)$_GET['id'];
				// Danh mục bài viết.
				$arr_cate           = $this->blog->cateBlog();
				// Chi tiết
				$arr_blog 	   		= $this->blog->blog_Detail($id);
				// bài viết gần đây.
				$arr_blog_DESC 		= $this->blog->showBlog_home();
				// Bài viết liên quan.
				$arr_classify   	= $this->blog->blog_getId($id);
				$classify			= $arr_classify['classify'];
				// => từ đó ta lấy được sản phẩm liên quan.
				$blog_related 		= $this->blog->blog_Related($classify, $id);
			} 
			include_once 'views/blogs/blog-detail.php';
		}

		// Trang hiển thị tất cả bài viết.
		public function blogArea()
		{
			if (isset($_GET['act'])) {
				$act = $_GET['act'];
			} else {
				$act = 'index';
			}

			// Danh mục bài viết.
			$arr_cate           = $this->blog->cateBlog();
			// bài viết gần đây.
			$arr_blog_DESC 		= $this->blog->showBlog_home();

			// Phân trang.
			if (isset($_GET['pages'])) {
				$pages 	= (int)$_GET['pages'];
				$abc 	= (int)$_GET['pages'];
			} else {
				// Mặc định sẽ là trang 1.
				$pages 	= 1;
				// biến abc sẽ giúp ta biết hiện tại đang ở trang nào.
				$abc    = 1;
			}
			$row 		= 3; // số tin 1 trang
			$from 		= ($pages - 1) * $row; // lấy bản ghi từ vị trí nào | mặc định lấy từ vị trí 0.

			switch ($act) {
				// Tìm kiếm bài viết theo tiêu đề.
				case 'tim-kiem':
					// lấy chỉ số để quyết định trang hiện tại là ở đâu.
					$index = 1;

					if (isset($_POST['btn-search-blog'])) {
						$key 		= $_POST['inp-search-blog'];
						$save       = $key;
						$keyw 		= '%'.$key.'%';
						$number 	= count($this->blog->blog_Seach($keyw)); // tổng số bản ghi
						$pagination = ceil($number / $row); // số trang				
						$arr_blog   = $this->blog->blog_Seach_Pagi($keyw,$from,$row);
						
					} elseif (isset($_GET['keyw'])) {
						$key 		= $_GET['keyw'];
						$save       = $key;
						$keyw 		= '%'.$key.'%';
						$number 	= count($this->blog->blog_Seach($keyw)); // tổng số bản ghi
						$pagination = ceil($number / $row); // số trang				
						$arr_blog   = $this->blog->blog_Seach_Pagi($keyw,$from,$row);
					}
					break;

				case 'danh-muc':
					// lấy chỉ số để quyết định trang hiện tại là ở đâu.
					$index = 2;
					
					if (isset($_GET['id'])) {
						$id = (int)$_GET['id'];
						$number 	= count($this->blog->blog_By_Cate($id)); // tổng số bản ghi
						$pagination = ceil($number / $row); // số trang				
						$arr_blog   = $this->blog->blog_By_Cate_Pagi($id,$from,$row);
					}

					break;
				
				default:
				// Mặc định sẽ là blog area.
					// lấy chỉ số để quyết định trang hiện tại là ở đâu.
					$index = 0;
					$number 	= count($this->blog->showBlog_Area()); // tổng số bản ghi
					$pagination = ceil($number / $row); // số trang				
					$arr_blog   = $this->blog->showBlog_Area_Pagi($from,$row);
					break;
			}


			include_once 'views/blogs/blog-area.php';
		}

	}

?>

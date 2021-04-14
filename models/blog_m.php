<?php  
	
	// import config.
	include_once 'config/myConfig.php';
	

	class blog_m extends Connect
	{
	   
	    function __construct()
	    {
	        parent::__construct();
	    }


	    // Hiển thị toàn bộ danh mục bài viết.
		public function cateBlog()
		{
			$sql = "SELECT id_category_new, name_cate FROM tbl_category_news";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

	    // Hiển thị 3 bài viết mới nhất ở trang chủ.
	    public function showBlog_home()
		{
			$sql = "
				SELECT 
					tbl_news.id_news, tbl_news.title, tbl_news.main_image, tbl_news.description, tbl_news.create_at,
				    tbl_users.name
				FROM 
					tbl_news, tbl_users
				WHERE 
					tbl_users.id_user = tbl_news.id_user
				ORDER BY
					tbl_news.id_news DESC LIMIT 3";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Hiển thị tất cả bài viết.
		public function showBlog_Area()
		{
			$sql = "
				SELECT 
					tbl_news.id_news, tbl_news.title, tbl_news.main_image, tbl_news.description, tbl_news.create_at,
				    tbl_users.name
				FROM 
					tbl_news, tbl_users
				WHERE 
					tbl_users.id_user = tbl_news.id_user
				ORDER BY
					tbl_news.id_news DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang tất cả bài viết.
		public function showBlog_Area_Pagi($from,$row)
		{
			$sql = "
				SELECT 
					tbl_news.id_news, tbl_news.title, tbl_news.main_image, tbl_news.main_content, tbl_news.description, tbl_news.create_at,
				    tbl_users.name
				FROM 
					tbl_news, tbl_users
				WHERE 
					tbl_users.id_user = tbl_news.id_user
				ORDER BY
					tbl_news.id_news DESC LIMIT :from, :row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':from', $from, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// chi tiết bài viết.
		public function blog_Detail($id)
		{
			$sql = "
				SELECT 
					tbl_news.id_news, tbl_news.title, tbl_news.main_image, tbl_news.description, tbl_news.main_content, tbl_news.create_at, 
					tbl_users.name, tbl_category_news.name_cate
				FROM 
					tbl_news, tbl_users, tbl_category_news
				WHERE 
					tbl_users.id_user = tbl_news.id_user
				AND
				 	tbl_news.id_category_new = tbl_category_news.id_category_new
				AND
					tbl_news.id_news = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Lấy 1 bài viết bằng ID.
		public function blog_getId($id)
		{
			$sql = "SELECT id_news, classify FROM tbl_news WHERE id_news = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);
		}

		// bài viết liên quan.
		public function blog_Related($classify, $id)
		{
			$sql = "
				SELECT 
					tbl_news.id_news, tbl_news.title, tbl_news.main_image, tbl_news.description, tbl_news.main_content, tbl_news.create_at, 
					tbl_users.name, tbl_category_news.name_cate
				FROM 
					tbl_news, tbl_users, tbl_category_news
				WHERE 
					tbl_users.id_user = tbl_news.id_user
				AND
				 	tbl_news.id_category_new = tbl_category_news.id_category_new
				AND
					tbl_news.classify = :classify 
				AND 
					tbl_news.id_news != :id
				ORDER BY tbl_news.id_news DESC LIMIT 3";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id, PDO::PARAM_INT);
			$pre->bindParam(':classify', $classify, PDO::PARAM_STR);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Tìm kiếm bài viết theo tiêu đề.
		public function blog_Seach($key)
		{
			$sql = "
				SELECT 
					tbl_news.id_news, tbl_news.title, tbl_news.main_image, tbl_news.description, tbl_news.create_at,
					tbl_users.name
				FROM 
					tbl_news, tbl_users
				WHERE 
					tbl_users.id_user = tbl_news.id_user
				AND
					tbl_news.title LIKE :key
				ORDER BY
					tbl_news.id_news DESC";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':key', $key);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang Tìm kiếm bài viết theo tiêu đề.
		public function blog_Seach_Pagi($key,$fromt,$row)
		{
			$sql = "
				SELECT 
					tbl_news.id_news, tbl_news.title, tbl_news.main_image, tbl_news.main_content, tbl_news.description, tbl_news.create_at,
					tbl_users.name
				FROM 
					tbl_news, tbl_users
				WHERE 
					tbl_users.id_user = tbl_news.id_user
				AND
					tbl_news.title LIKE :key
				ORDER BY
					tbl_news.id_news DESC LIMIT :fromt,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':key', $key);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Tìm kiếm bài viết dựa vào danh mục.
		public function blog_By_Cate($id)
		{
			$sql = "
				SELECT 
					tbl_news.id_news
				FROM 
					tbl_news
				WHERE 
					tbl_news.id_category_new = :id";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		// Phân trang bài viết dựa vào danh mục.
		public function blog_By_Cate_Pagi($id,$fromt,$row)
		{
			$sql = "
				SELECT 
					tbl_news.id_news, tbl_news.title, tbl_news.main_image, tbl_news.main_content, tbl_news.description, tbl_news.create_at,
					tbl_users.name
				FROM 
					tbl_news, tbl_users
				WHERE 
					tbl_users.id_user = tbl_news.id_user
				AND
					tbl_news.id_category_new = :id
				ORDER BY
					tbl_news.id_news DESC LIMIT :fromt,:row";

			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->bindParam(':fromt', $fromt, PDO::PARAM_INT);
			$pre->bindParam(':row', $row, PDO::PARAM_INT);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

	}

?>
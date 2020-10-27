<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../Helper/Format.php');


	class Post{
	private $db;
	private $fm;


	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function PostInsert($data, $file){
		$title   = $this->fm->validation($data['title']);
		$catId   = $this->fm->validation($data['catId']);
		$body   = $this->fm->validation($data['body']);
		$tag   = $this->fm->validation($data['tag']);
		$adID   = $this->fm->validation($data['adID']);

		$title   = mysqli_real_escape_string($this->db->link, $data['title'] );
		$catId   = mysqli_real_escape_string($this->db->link, $data['catId'] );
		$body   = mysqli_real_escape_string($this->db->link, $data['body'] );
		$tag   = mysqli_real_escape_string($this->db->link, $data['tag'] );
		$adID   = mysqli_real_escape_string($this->db->link, $data['adID'] );

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;		
	    $uploaded_image = "upload/Blog/".$unique_image;

	    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLink = $uploaded_image;

	    if ($title == "" || $catId == "" || $body == "" || $tag == "" || $adID == "" || $file_name == "") {
	    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Post Field Must Not Be Empty !</span>";
	    return $msg;
	    }elseif ($file_size>1048567) {
			     $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Image Size should be less then 1MB!
			    </span>";
			    return $msg;
		    } elseif (in_array($file_ext, $permited) === false) {
		      $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>You can upload only:-".implode(', ', $permited)."</span>";
		      return $msg;
		    } else{
		        move_uploaded_file($file_temp, $uploaded_image);
		        $query = "INSERT INTO tbl_post (title, catId, body, tag, adID, image, delImage) 

		        VALUES('$title', '$catId', '$body', '$tag', '$adID', '$InsertLink', '$uploaded_image')";

		        $inserted_rows = $this->db->insert($query);

		        if ($inserted_rows) {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Post Inserted Successfully.

		         </span>";

		         return $msg;

		        }else {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Post Not Inserted !</span>";

		          return $msg;

		    }

		}
	}
	Public function SelectAllPost(){
		$query = "SELECT tbl_post.*, tbl_admin.name, tbl_admin.pic, tbl_admin.Des, tbl_cat.cat_name FROM 
				  tbl_post
				  INNER JOIN tbl_admin
				  ON tbl_post.adID = tbl_admin.id
				  INNER JOIN tbl_cat
				  ON tbl_post.catId = tbl_cat.id
				  ORDER BY tbl_post.id DESC;

		";
		$result = $this->db->select($query);
		return $result;
	}
	Public function SelectAllPostByPagination($Start_from, $per_page){
		$query = "SELECT tbl_post.*, tbl_cat.cat_name FROM 
				  tbl_post
				  INNER JOIN tbl_cat
				  ON tbl_post.catId = tbl_cat.id
				  ORDER BY id DESC
				  LIMIT $Start_from, $per_page;

		";
		$result = $this->db->select($query);
		return $result;
	}
	Public function getPostByCategory($id){
		$query = "SELECT tbl_post.*, tbl_cat.cat_name FROM 
				  tbl_post
				  INNER JOIN tbl_cat
				  ON tbl_post.catId = tbl_cat.id
				  WHERE tbl_post.catId = $id
				  ORDER BY id DESC;

		";
		$result = $this->db->select($query);
		return $result;
	}
	Public function SelectTitlePost($postID){
		$query = "SELECT tbl_post.*, tbl_cat.cat_name FROM 
				  tbl_post
				  INNER JOIN tbl_cat
				  ON tbl_post.catId = tbl_cat.id
				  WHERE tbl_post.id = $postID
				  ORDER BY tbl_post.id DESC;

		";
		$result = $this->db->select($query);
		return $result;
	}
	Public function TabAllPost($catId){
		$query = "SELECT tbl_post.*, tbl_cat.cat_name FROM 
				  tbl_post
				  INNER JOIN tbl_cat
				  ON tbl_post.catId = tbl_cat.id
				  WHERE tbl_post.catId = $catId
				  ORDER BY id DESC;

		";
		$result = $this->db->select($query);
		return $result;
	}
	Public function getSinglePost($id){
		$query = "SELECT tbl_post.*, tbl_admin.name, tbl_admin.pic, tbl_admin.Des,  tbl_cat.cat_name FROM 
				  tbl_post
				  INNER JOIN tbl_admin
				  ON tbl_post.adID = tbl_admin.id
				  INNER JOIN tbl_cat
				  ON tbl_post.catId = tbl_cat.id

				  WHERE tbl_post.id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	Public function getNextPost($nextId){
		$query = "SELECT * FROM tbl_post WHERE id = '$nextId'";
		$result = $this->db->select($query);
		return $result;
	}
	Public function getPrePost($preId){
		$query = "SELECT * FROM tbl_post WHERE id = '$preId'";
		$result = $this->db->select($query);
		return $result;
	}
	Public function SelectTitlePostHea($postID){
		$query = "SELECT * FROM tbl_post WHERE id = '$postID'";
		$result = $this->db->select($query);
		return $result;
	}
	Public function getRelatedPost($catId){
		$query = "SELECT * FROM tbl_post WHERE catId = '$catId'";
		$result = $this->db->select($query);
		return $result;
	}
	Public function getSliderPost(){
		$query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	Public function getPostLimitBB(){
		$query = "SELECT tbl_post.*, tbl_admin.name, tbl_admin.pic, tbl_admin.Des,  tbl_cat.cat_name FROM 
				  tbl_post
				  INNER JOIN tbl_admin
				  ON tbl_post.adID = tbl_admin.id
				  INNER JOIN tbl_cat
				  ON tbl_post.catId = tbl_cat.id
				  ORDER BY tbl_post.id DESC

				  LIMIT 3";
		$result = $this->db->select($query);
		return $result;
	}
	Public function SelectAllBlogPost(){
		$query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	Public function viwePostById($id){
		$query = "SELECT * FROM tbl_post WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	Public function SidePost(){
		$query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 3";
		$result = $this->db->select($query);
		return $result;
	}
	Public function MostViwePost(){
		$query = "SELECT * FROM tbl_post ORDER BY RAND() LIMIT 5";
		$result = $this->db->select($query);
		return $result;
	}
	public function delPostById($id){
		$query = "SELECT * FROM tbl_post WHERE id = '$id'";
		$getData = $this->db->select($query);

		if ($getData) {
			while ($delimg = $getData->fetch_assoc()) {
				$dellink = $delimg['delImage'];
				unlink($dellink);
			}
		}

		$query = "DELETE FROM tbl_post WHERE id = '$id'";
		$del_Data = $this->db->delete($query);
  		if ($del_Data) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Post Deleted Successfully.</span>";
				return $msg;
  		}else{
  			$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Post Not Deleted Successfully !</span>";
				return $msg;
  		}
	}
	public function PostUpdate($data, $file, $id)	{
		$title   = $this->fm->validation($data['title']);
		$catId   = $this->fm->validation($data['catId']);
		$body   = $this->fm->validation($data['body']);
		$tag   = $this->fm->validation($data['tag']);

		$title   = mysqli_real_escape_string($this->db->link, $data['title'] );
		$catId   = mysqli_real_escape_string($this->db->link, $data['catId'] );
		$body   = mysqli_real_escape_string($this->db->link, $data['body'] );
		$tag   = mysqli_real_escape_string($this->db->link, $data['tag'] );

	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/Blog/".$unique_image;

	   	if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLink = $uploaded_image;

		if ($title == "" || $catId == "" || $body == "" || $tag == "") {
			    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Post Field Must Not Be Empty !</span>";
			    return $msg;
		    }else{
		    if (!empty($file_name)) {
		        if ($file_size >1048567) {
		         $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Image Size should be less then 1MB!
		         </span>";
		         return $msg;
		        } elseif (in_array($file_ext, $permited) === false) {
		         $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>You can upload only:-".implode(', ', $permited)."</span>";
		         return $msg;
		        } else{
		            move_uploaded_file($file_temp, $uploaded_image);
		            $query = "SELECT * FROM tbl_post WHERE id = '$id'";
					$getData = $this->db->select($query);

					if ($getData) {
						while ($delimg = $getData->fetch_assoc()) {
							$dellink = $delimg['delImage'];
							unlink($dellink);
						}
					}
		            $query = "UPDATE tbl_post
		                    SET	  
		                    title      = '$title',
		                    catId      = '$catId',
		                    body       = '$body',
		                    image      = '$InsertLink',
		                    delImage   = '$uploaded_image',
		                    tag        = '$tag'

		                    WHERE id = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Post Updated Successfully.

		             </span>";
		             return $msg;
		            }else {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Post Not Updated !</span>";
		             return $msg;

		        }

		        }

		    }else{

		        $query = "UPDATE tbl_post

		                    SET
		                    title      = '$title',
		                    catId      = '$catId',
		                    body       = '$body',
		                    tag        = '$tag'

		                    WHERE id   = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Post Updated Successfully.

		             </span>";
		             return $msg;

		            }else {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Post Not Updated !</span>";
		             return $msg;

		        }

		    }

		}
	}
	public function CountAllCat(){
		$query = "SELECT catId, id, COUNT(catId) FROM tbl_post GROUP BY catId ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getPostBySearchKey($id){
		$query = "SELECT tbl_post.*, tbl_cat.cat_name FROM 
				  tbl_post
				  INNER JOIN tbl_cat
				  ON tbl_post.catId = tbl_cat.id
				  WHERE title LIKE '%$id%' OR body LIKE '%$id%' OR tag LIKE '%$id%' OR adName LIKE '%$id%'";
		$result = $this->db->select($query);
		return $result;
	}

}
 ?>
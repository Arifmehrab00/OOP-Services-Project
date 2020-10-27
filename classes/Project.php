<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../Helper/Format.php');


	class Project{
	private $db;
	private $fm;


	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function ProInsert($data, $file){
		$title   = $this->fm->validation($data['title']);
		$catId   = $this->fm->validation($data['catId']);
		$link    = $this->fm->validation($data['link']);

		$title   = mysqli_real_escape_string($this->db->link, $data['title'] );
		$catId   = mysqli_real_escape_string($this->db->link, $data['catId'] );
		$link    = mysqli_real_escape_string($this->db->link, $data['link'] );

//Image One
		$permitedOne  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_nameOne = $_FILES['image']['name'];
	    $file_sizeOne = $_FILES['image']['size'];
	    $file_tempOne = $_FILES['image']['tmp_name'];

	    $divOne            = explode('.', $file_nameOne);
	    $file_extOne       = strtolower(end($divOne));
		$unique_imageOne   = substr(md5(time()), 0, 10).'s1.'.$file_extOne;		
	    $uploaded_imageOne = "upload/Project/".$unique_imageOne;

	    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLinkOne = $uploaded_imageOne;
//Image Two
		$permitedTwo  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_nameTwo = $_FILES['imageTwo']['name'];
	    $file_sizeTwo = $_FILES['imageTwo']['size'];
	    $file_tempTwo = $_FILES['imageTwo']['tmp_name'];

	    $divTwo            = explode('.', $file_nameTwo);
	    $file_extTwo       = strtolower(end($divTwo));
		$unique_imageTwo   = substr(md5(time()), 0, 10).'s2.'.$file_extTwo;		
	    $uploaded_imageTwo = "upload/Project/".$unique_imageTwo;

		$InsertLinkTwo = $uploaded_imageTwo;


if (empty($file_nameTwo)) {
	$InsertLinkTwo     = "";
	$uploaded_imageTwo = "";
}else{
	$file_nameTwo = $file_nameTwo; 
}

		if (empty($link) AND empty($file_nameTwo)) {
			    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Please Select Image/Link</span>";
			    return $msg;
		}elseif (!empty($link) AND !empty($file_nameTwo)) {
			    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Please Edit Image/Link</span>";
			    return $msg;
		}elseif($title == "" || $catId == "" || $file_nameOne == "") {
	    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Project Field Must Not Be Empty !</span>";
	    return $msg;
	    }elseif ($file_sizeOne>1048567 || $file_sizeTwo>1048567) {
			     $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Image Size should be less then 1MB!
			    </span>";
			    return $msg;
		    } elseif (in_array($file_extOne, $permitedOne) === false) {
		      $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>You can upload only:-".implode(', ', $permitedOne)."</span>";
		      return $msg;
		    } else{
		        move_uploaded_file($file_tempOne, $uploaded_imageOne);
		        move_uploaded_file($file_tempTwo, $uploaded_imageTwo);


		        $query = "INSERT INTO tbl_project (title, catId, image, delimage, imageTwo, delimageTwo, link) 

		        VALUES('$title', '$catId', '$InsertLinkOne', '$uploaded_imageOne', '$InsertLinkTwo', '$uploaded_imageTwo', '$link')";

		        $inserted_rows = $this->db->insert($query);

		        if ($inserted_rows) {
		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Project Inserted Successfully!</span>";

		          return $msg;
		        }else {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Project Not Inserted !</span>";

		          return $msg;

		    }

		}
	}
	public function selectAllPro(){
		$query = "SELECT tbl_project.*, tbl_ser_cat.catName FROM 
				  tbl_project
				  INNER JOIN tbl_ser_cat
				  ON tbl_project.catId = tbl_ser_cat.id
				  ORDER BY tbl_project.id DESC
				  ;";
		$result = $this->db->select($query);
		return $result;
	}
	public function selectAllProLimit(){
		$query = "SELECT tbl_project.*, tbl_ser_cat.catName FROM 
				  tbl_project
				  INNER JOIN tbl_ser_cat
				  ON tbl_project.catId = tbl_ser_cat.id
				  ORDER BY tbl_project.id DESC
				  LIMIT 10
				  ;";
		$result = $this->db->select($query);
		return $result;
	}

	public function SelectAllProject(){
		$query = "SELECT tbl_project.*, tbl_ser_cat.catName FROM 
				  tbl_project
				  INNER JOIN tbl_ser_cat
				  ON tbl_project.catId = tbl_ser_cat.id
				  ORDER BY tbl_project.id DESC
				  ;";
		$result = $this->db->select($query);
		return $result;
	}

	public function delPro($id){
		$query = "SELECT * FROM  tbl_project WHERE id = '$id'";
		$getData = $this->db->select($query);

		if ($getData) {
			while ($delimg = $getData->fetch_assoc()) {
				$dellink      = $delimg['delimage'];
				$dellinkTwo   = $delimg['delimageTwo'];

				unlink($dellink);
				unlink($dellinkTwo);
			}
		}

		$query = "DELETE FROM  tbl_project WHERE id = '$id'";
		$del_Data = $this->db->delete($query);
  		if ($del_Data) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Project Deleted Successfully.</span>";
				return $msg;
  		}else{
  			$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Project Not Deleted Successfully !</span>";
				return $msg;
  		}
	}
	public function getSingleProject($id){
		$query = "SELECT * FROM tbl_project WHERE id = $id"
				  ;
		$result = $this->db->select($query);
		return $result;
	}
	public function ProUpdate($data, $file, $id){
		$title   = $this->fm->validation($data['title']);
		$catId   = $this->fm->validation($data['catId']);
		$link   = $this->fm->validation($data['link']);

		$title   = mysqli_real_escape_string($this->db->link, $data['title'] );
		$catId   = mysqli_real_escape_string($this->db->link, $data['catId'] );
		$link   = mysqli_real_escape_string($this->db->link, $data['link'] );

//Image One
		$permitedOne  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_nameOne = $_FILES['image']['name'];
	    $file_sizeOne = $_FILES['image']['size'];
	    $file_tempOne = $_FILES['image']['tmp_name'];

	    $divOne            = explode('.', $file_nameOne);
	    $file_extOne       = strtolower(end($divOne));
		$unique_imageOne   = substr(md5(time()), 0, 10).'s1.'.$file_extOne;		
	    $uploaded_imageOne = "upload/Project/".$unique_imageOne;

	    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLinkOne = $uploaded_imageOne;
//Image Two
		$permitedTwo  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_nameTwo = $_FILES['imageTwo']['name'];
	    $file_sizeTwo = $_FILES['imageTwo']['size'];
	    $file_tempTwo = $_FILES['imageTwo']['tmp_name'];

	    $divTwo            = explode('.', $file_nameTwo);
	    $file_extTwo       = strtolower(end($divTwo));
		$unique_imageTwo   = substr(md5(time()), 0, 10).'s2.'.$file_extTwo;		
	    $uploaded_imageTwo = "upload/Project/".$unique_imageTwo;

		$InsertLinkTwo = $uploaded_imageTwo;


if (empty($file_nameTwo)) {
	$InsertLinkTwo     = "";
	$uploaded_imageTwo = "";
}else{
	$file_nameTwo = $file_nameTwo; 
}


		if (empty($link) AND empty($file_nameTwo)) {
			    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Please Select Image/Link</span>";
			    return $msg;
		}elseif (!empty($link) AND !empty($file_nameTwo)) {
			    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Please Edit Image/Link</span>";
			    return $msg;
		}elseif ($title == "" || $catId == "") {
			    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Project Field Must Not Be Empty !</span>";
			    return $msg;
		    }else{
		    if (!empty($file_nameOne)) {
		        if ($file_sizeOne>1048567 || $file_sizeTwo>1048567) {
		         $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Image Size should be less then 1MB!
		         </span>";
		         return $msg;
		        }  else{
			        move_uploaded_file($file_tempOne, $uploaded_imageOne);
			        move_uploaded_file($file_tempTwo, $uploaded_imageTwo);

			        // Image Deleted
					$query = "SELECT * FROM  tbl_project WHERE id = '$id'";
					$getData = $this->db->select($query);

					if ($getData) {
						while ($delimg = $getData->fetch_assoc()) {
						$dellink      = $delimg['delimage'];
						$dellinkTwo   = $delimg['delimageTwo'];

						unlink($dellink);
						unlink($dellinkTwo);
						}
					}

		            $query = "UPDATE tbl_project
		                    SET	  
		                    title       = '$title',
		                    catId       = '$catId',
		                    image       = '$InsertLinkOne',
		                    delimage    = '$uploaded_imageOne',
		                    imageTwo    = '$InsertLinkTwo',
		                    delimageTwo = '$uploaded_imageTwo',
		                    
		                    link        = '$link'

		                    WHERE id = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Project Updated Successfully.

		             </span>";
		             return $msg;
		            }else {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Project Not Updated !</span>";
		             return $msg;

		        }

		        }

		    }else{
		    	if (empty($file_nameTwo)) {
		    		$query = "SELECT * FROM  tbl_project WHERE id = '$id'";
					$getData = $this->db->select($query);

					if ($getData) {
						while ($delimg = $getData->fetch_assoc()) {
						$dellinkTwo   = $delimg['delimageTwo'];

						unlink($dellinkTwo);
						}
					}
		    	}elseif (!empty($file_nameTwo)) {
		    		move_uploaded_file($file_tempTwo, $uploaded_imageTwo);
		    	}

		        $query = "UPDATE tbl_project

		                    SET
		                    title       = '$title',
		                    catId       = '$catId',
		                    imageTwo    = '$InsertLinkTwo',
		                    delimageTwo = '$uploaded_imageTwo',
		                    link        = '$link'

		                    WHERE id   = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Service Updated Successfully.

		             </span>";
		             return $msg;

		            }else {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Service Not Updated !</span>";
		             return $msg;

		        }

		    }

		}
	}
}
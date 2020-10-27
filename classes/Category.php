<?php 

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../Helper/Format.php');

 ?>

<?php 

class Category{

	private $db;
	private $fm;	

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function selectAllCat(){
		$query  = "SELECT * FROM tbl_cat ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function selectAllSerCat(){
		$query  = "SELECT * FROM tbl_ser_cat ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function viewCatById($id){
		$query  = "SELECT * FROM tbl_cat WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function viewSerCatById($id){
		$query  = "SELECT * FROM tbl_ser_cat WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getPByCategory($id){
		$query  = "SELECT * FROM tbl_cat WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function delCatById($id){
		$query  = "DELETE FROM tbl_cat WHERE id = '$id'";
		$result = $this->db->delete($query);
		return $result;
	}
	public function delSerCatById($id){
		$query = "SELECT * FROM tbl_ser_cat WHERE id = '$id'";
		$getData = $this->db->select($query);

		if ($getData) {
			while ($delimg = $getData->fetch_assoc()) {
				$dellink = $delimg['delimage'];
				unlink($dellink);
			}
		}

		$query  = "DELETE FROM tbl_ser_cat WHERE id = '$id'";
		$result = $this->db->delete($query);
		return $result;
	}
	
	public function catInsert($catName){
		$catName = $this->fm->validation($catName);

		$catName = mysqli_real_escape_string($this->db->link, $catName );

			if (empty($catName)) {

				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Category Field Must Not Be Empty !</span>";

				return $msg;

			}else{

			$query = "INSERT INTO tbl_cat(cat_name) VALUES ('$catName')";

			$catInsert = $this->db->insert($query);

			if ($catInsert) {

				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Category Insertrd Successfully.</span>";

				return $msg;

			}else{

				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Category Not Insertrd Successfully !</span>";

				return $msg;

			}

		}
	}
	
	public function catSerInsert($data, $file){
		$catName   = $this->fm->validation($data['catName']);
		$des   = $this->fm->validation($data['des']);

		$catName   = mysqli_real_escape_string($this->db->link, $data['catName'] );
		$des   = mysqli_real_escape_string($this->db->link, $data['des'] );

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;		
	    $uploaded_image = "upload/Category/".$unique_image;

	    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLink = $uploaded_image;

	    if ($catName == "" || $des == "") {
	    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Category Field Must Not Be Empty !</span>";
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
		        $query = "INSERT INTO tbl_ser_cat (catName, image, delimage, des) 

		        VALUES('$catName', '$InsertLink', '$uploaded_image', '$des')";

		        $inserted_rows = $this->db->insert($query);

		        if ($inserted_rows) {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Category Inserted Successfully.

		         </span>";

		         return $msg;

		        }else {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Category Not Inserted !</span>";

		          return $msg;

		    }

		}
	}
	public function catUpdate($catName, $id){
		$catName = $this->fm->validation($catName);
		$id      = $this->fm->validation($id);

		$catName = mysqli_real_escape_string($this->db->link, $catName );
		$id      = mysqli_real_escape_string($this->db->link, $id );

			if (empty($catName)) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Category Field Must Not Be Empty !</span>";
				return $msg;
			}else{
				$query = "UPDATE tbl_cat 
						  SET 
						  cat_name = '$catName'
						  WHERE id = '$id'

						  ";

				$updated_row = $this->db->update($query);
				if ($updated_row) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Category Updated Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Category Not Updated Successfully !</span>";
				return $msg;
			}
		}
	}
	public function serCatUpdate($data, $file, $id){		
		$catName   = $this->fm->validation($data['catName']);
		$des       = $this->fm->validation($data['des']);

		$catName   = mysqli_real_escape_string($this->db->link, $data['catName'] );
		$des       = mysqli_real_escape_string($this->db->link, $data['des'] );

	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/Category/".$unique_image;

	   	if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLink = $uploaded_image;

		if ($catName == "" || $des == "") {
			    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Category Field Must Not Be Empty !</span>";
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
		            $query = "SELECT * FROM tbl_ser_cat WHERE id = '$id'";
					$getData = $this->db->select($query);

					if ($getData) {
						while ($delimg = $getData->fetch_assoc()) {
							$dellink = $delimg['delimage'];
							unlink($dellink);
						}
					}
		            $query = "UPDATE tbl_ser_cat
		                    SET	  
		                    catName      = '$catName',
		                    image        = '$InsertLink',
		                    delimage     = '$uploaded_image',
		                    des          = '$des'
		                    WHERE id = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Category Updated Successfully.

		             </span>";
		             return $msg;
		            }else {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Category Not Updated !</span>";
		             return $msg;

		        }

		        }

		    }else{

		        $query = "UPDATE tbl_ser_cat

		                    SET
		                    catName      = '$catName',
		                    des          = '$des'

		                    WHERE id   = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Category Updated Successfully.

		             </span>";
		             return $msg;

		            }else {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Category Not Updated !</span>";
		             return $msg;

		        }

		    }

		}
	}
}
<?php 

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../Helper/Format.php');

 ?>

<?php 

class Testimonials{

	private $db;
	private $fm;	

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}



	public function selectAllClient(){
		$query  = "SELECT * FROM tbl_clint_say ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function viewClientById($id){
		$query  = "SELECT * FROM tbl_clint_say WHERE id = $id";
		$result = $this->db->select($query);
		return $result;
	}

	public function delClint($id){
		$query = "SELECT * FROM tbl_clint_say WHERE id = '$id'";
		$getData = $this->db->select($query);

		if ($getData) {
			while ($delimg = $getData->fetch_assoc()) {
				$dellink = $delimg['delimage'];
				unlink($dellink);
			}
		}

		$query  = "DELETE FROM tbl_clint_say WHERE id = '$id'";
		$result = $this->db->delete($query);
		return $result;
	}
	

	
	public function clientInsert($data, $file){
		$cliName    = $this->fm->validation($data['cliName']);
		$cliTitle   = $this->fm->validation($data['cliTitle']);
		$cliSay     = $this->fm->validation($data['cliSay']);

		$cliName  = mysqli_real_escape_string($this->db->link, $data['cliName'] );
		$cliTitle      = mysqli_real_escape_string($this->db->link, $data['cliTitle'] );
		$cliSay      = mysqli_real_escape_string($this->db->link, $data['cliSay'] );

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;		
	    $uploaded_image = "upload/Testimonials/".$unique_image;

	    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLink = $uploaded_image;

	    if ($cliName == "" || $cliTitle == ""  || $cliSay == "" ) {
	    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Testimonials Field Must Not Be Empty !</span>";
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
		        $query = "INSERT INTO tbl_clint_say (cliName, cliTitle, image, delimage, cliSay) 

		        VALUES('$cliName', '$cliTitle', '$InsertLink', '$uploaded_image', '$cliSay')";

		        $inserted_rows = $this->db->insert($query);

		        if ($inserted_rows) {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Testimonials Inserted Successfully.

		         </span>";

		         return $msg;

		        }else {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Testimonials Not Inserted !</span>";

		          return $msg;

		    }

		}
	}

	public function clientUpdate($data, $file, $id){		
		$cliName    = $this->fm->validation($data['cliName']);
		$cliTitle   = $this->fm->validation($data['cliTitle']);
		$cliSay     = $this->fm->validation($data['cliSay']);

		$cliName  = mysqli_real_escape_string($this->db->link, $data['cliName'] );
		$cliTitle      = mysqli_real_escape_string($this->db->link, $data['cliTitle'] );
		$cliSay      = mysqli_real_escape_string($this->db->link, $data['cliSay'] );

	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/Testimonials/".$unique_image;

	   	if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLink = $uploaded_image;

		if ($cliName == "" || $cliTitle == "" || $cliSay == "") {
			    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Testimonials Field Must Not Be Empty !</span>";
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
		            $query = "SELECT * FROM tbl_clint_say WHERE id = '$id'";
					$getData = $this->db->select($query);

					if ($getData) {
						while ($delimg = $getData->fetch_assoc()) {
							$dellink = $delimg['delimage'];
							unlink($dellink);
						}
					}
		            $query = "UPDATE tbl_clint_say
		                    SET	  
		                    cliName      = '$cliName',
		                    cliTitle     = '$cliTitle',
		                    image        = '$InsertLink',
		                    delimage     = '$uploaded_image',
		                    cliSay       = '$cliSay'
		                    WHERE id = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Testimonials Updated Successfully.

		             </span>";
		             return $msg;
		            }else {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Testimonials Not Updated !</span>";
		             return $msg;

		        }

		        }

		    }else{

		        $query = "UPDATE tbl_clint_say

		                    SET	  
		                    cliName      = '$cliName',
		                    cliTitle     = '$cliTitle',
		                    cliSay       = '$cliSay'

		                    WHERE id   = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Testimonials Updated Successfully.

		             </span>";
		             return $msg;

		            }else {

		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Testimonials Not Updated !</span>";
		             return $msg;

		        }

		    }

		}
	}
}
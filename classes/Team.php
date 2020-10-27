<?php 

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../Helper/Format.php');

 ?>

<?php 

class Team{

	private $db;
	private $fm;	

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}



	public function selectAllTeamMem(){
		$query  = "SELECT * FROM tbl_team ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function selectHomeTeamMem(){
		$query  = "SELECT * FROM tbl_team ORDER BY id ASC";
		$result = $this->db->select($query);
		return $result;
	}
	public function viewMemberById($id){
		$query  = "SELECT * FROM tbl_team WHERE id = $id";
		$result = $this->db->select($query);
		return $result;
	}

	public function delTeam($id){
		$query = "SELECT * FROM tbl_team WHERE id = '$id'";
		$getData = $this->db->select($query);

		if ($getData) {
			while ($delimg = $getData->fetch_assoc()) {
				$dellink = $delimg['delimage'];
				unlink($dellink);
			}
		}

		$query  = "DELETE FROM tbl_team WHERE id = '$id'";
		$result = $this->db->delete($query);
		return $result;
	}
	

	
	public function teamInsert($data, $file){
		$memName     = $this->fm->validation($data['memName']);
		$memTitle    = $this->fm->validation($data['memTitle']);
		$memIcon     = $this->fm->validation($data['memIcon']);
		$memLink     = $this->fm->validation($data['memLink']);

		$memName      = mysqli_real_escape_string($this->db->link, $data['memName'] );
		$memTitle     = mysqli_real_escape_string($this->db->link, $data['memTitle'] );
		$memIcon      = mysqli_real_escape_string($this->db->link, $data['memIcon'] );
		$memLink      = mysqli_real_escape_string($this->db->link, $data['memLink'] );

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;		
	    $uploaded_image = "upload/Team/".$unique_image;

	    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLink = $uploaded_image;

	    if ($memName == "" || $memTitle == ""  || $memIcon == ""   || $memLink == "" ) {
	    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Team Member Field Must Not Be Empty !</span>";
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
		        $query = "INSERT INTO tbl_team (memName, memTitle, image, delimage, memIcon, memLink) 

		        VALUES('$memName', '$memTitle', '$InsertLink', '$uploaded_image', '$memIcon', '$memIcon')";

		        $inserted_rows = $this->db->insert($query);

		        if ($inserted_rows) {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Team Member Inserted Successfully.

		         </span>";

		         return $msg;

		        }else {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Team Member Not Inserted !</span>";

		          return $msg;

		    }

		}
	}

	public function teamUpdate($data, $file, $id){		
		$memName     = $this->fm->validation($data['memName']);
		$memTitle    = $this->fm->validation($data['memTitle']);
		$memIcon     = $this->fm->validation($data['memIcon']);
		$memLink     = $this->fm->validation($data['memLink']);

		$memName      = mysqli_real_escape_string($this->db->link, $data['memName'] );
		$memTitle     = mysqli_real_escape_string($this->db->link, $data['memTitle'] );
		$memIcon      = mysqli_real_escape_string($this->db->link, $data['memIcon'] );
		$memLink      = mysqli_real_escape_string($this->db->link, $data['memLink'] );

	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/Team/".$unique_image;

	   	if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLink = $uploaded_image;

		if ($memName == "" || $memTitle == "" || $memIcon == ""  || $memLink == "" ) {
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
		            $query = "SELECT * FROM tbl_team WHERE id = '$id'";
					$getData = $this->db->select($query);

					if ($getData) {
						while ($delimg = $getData->fetch_assoc()) {
							$dellink = $delimg['delimage'];
							unlink($dellink);
						}
					}
		            $query = "UPDATE tbl_team
		                    SET	  
		                    memName      = '$memName',
		                    memTitle     = '$memTitle',
		                    image        = '$InsertLink',
		                    delimage     = '$uploaded_image',
		                    memIcon      = '$memIcon',
		                    memLink      = '$memLink'
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

		        $query = "UPDATE tbl_team

		                    SET	  
		                    memName      = '$memName',
		                    memTitle     = '$memTitle',
		                    memIcon      = '$memIcon',
		                    memLink      = '$memLink'

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
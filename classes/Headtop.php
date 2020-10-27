<?php 
class  Headtop{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function SelectAllTop(){
		$query  = "SELECT * FROM  tbl_headtop WHERE id = 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function titleSloganUpdate($data){
		$slogan  = $this->fm->validation($data['slogan']);
		$email  = $this->fm->validation($data['email']);
		$phone  = $this->fm->validation($data['phone']);

		$slogan  = mysqli_real_escape_string($this->db->link, $data['slogan'] );
		$email   = mysqli_real_escape_string($this->db->link, $data['email'] );
		$phone   = mysqli_real_escape_string($this->db->link, $data['phone'] );


		if (empty($slogan) || empty($email) || empty($phone)) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Slogan/Email/Phone Field Must Not Be Empty !</span>";
				return $msg;
			}else{
				$query = "UPDATE tbl_headtop 
						  SET 
						  slogan  = '$slogan',
						  email = '$email',
						  phone  = '$phone'
						  WHERE id = 1
						  ";
				$updated_row = $this->db->update($query);
				if ($updated_row) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Slogan/Email/Phone Updated Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Slogan/Email/Phone Not Updated Successfully !</span>";
				return $msg;
			}
		}
	}

	public function SelectAllSocilaLink(){
		$query  = "SELECT * FROM  tbl_sociallink WHERE id = 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function SocialLinkUpdate($data){
		$icon  = $this->fm->validation($data['icon']);
		$link  = $this->fm->validation($data['link']);

		$icon  = mysqli_real_escape_string($this->db->link, $data['icon'] );
		$link  = mysqli_real_escape_string($this->db->link, $data['link'] );


		if (empty($icon) || empty($link)) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Social Link Field Must Not Be Empty !</span>";
				return $msg;
			}else{
				$query = "UPDATE tbl_sociallink 
						  SET 
						  icon  = '$icon',
						  link  = '$link'
						  WHERE id = 1
						  ";
				$updated_row = $this->db->update($query);
				if ($updated_row) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Social Link Updated Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Social Link Not Updated Successfully !</span>";
				return $msg;
			}
		}
	}

	public function SelectAllLogo(){
		$query  = "SELECT * FROM  tbl_logo WHERE id = 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function getLogoFavIcon(){
		$query  = "SELECT * FROM  tbl_logo WHERE id = 1";
		$result = $this->db->select($query);
		return $result;
   }

   public function LogoUpdated($file){

   	    $permited  = array('png');
        $file_name = $_FILES['logo']['name'];
        $file_size = $_FILES['logo']['size'];
        $file_temp = $_FILES['logo']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $same_image = 'Logo'.'.'.$file_ext;        
        //$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/Logo/".$same_image;

        if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLink = $base_url."/".$uploaded_image;


   	    $permited_Icon  = array('png');
        $file_name_Icon = $_FILES['favicon']['name'];
        $file_size_Icon = $_FILES['favicon']['size'];
        $file_temp_Icon = $_FILES['favicon']['tmp_name'];

        $div_Icon = explode('.', $file_name);
        $file_ext_Icon = strtolower(end($div_Icon));
        $same_image_Icon = 'Fav-icon'.'.'.$file_ext_Icon;
        //$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image_Icon = "upload/Logo/".$same_image_Icon;
        $InsertLinkIcon = $base_url."/".$uploaded_image_Icon;


        if (empty($file_name) || empty($file_name_Icon)) {
        $msg =  "<span class='error'>Please Select any PNG IMAGE !</span>";
        }elseif ($file_size >1048567 || $file_size_Icon > 1048567) {
        $msg = "<span class='error'>Image Size should be less then 1MB!
         </span>";
         return $msg;
        } elseif (in_array($file_ext, $permited) === false || in_array($file_ext_Icon, $permited_Icon) === false) {
        $msg = "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
         return $msg;
        } else{
        move_uploaded_file($file_temp, $uploaded_image);
        move_uploaded_file($file_temp_Icon, $uploaded_image_Icon);
        $query = "UPDATE tbl_logo
                SET  
                logo    = '$InsertLink',
                favicon = '$InsertLinkIcon'

                WHERE id = 1";

        $updated_rows = $this->db->update($query);
                if ($updated_rows) {
                $msg =  "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Logo Updated Successfully.</span>";
                return $msg;
            }else{
               $msg =  "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Logo Not Updated Successfully !</span>";
               return $msg; 
            }
        } 
   }

}


?>
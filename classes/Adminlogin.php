<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	Session::checkLogin();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../Helper/Format.php');
 ?>




<?php 
class  Adminlogin{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminLogin($username, $pass){
		$username = $this->fm->validation($username);
		$pass     = $this->fm->validation($pass);

		$username = mysqli_real_escape_string($this->db->link, $username );
		$pass     = mysqli_real_escape_string($this->db->link, $pass );
		if (empty($username) || empty($pass)) {
			$loginmsg = "<span style='    margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Username or Password must not be empty !</span>";
			return $loginmsg;
		}else{
			$query = "SELECT * FROM tbl_admin WHERE username = '$username' AND pass = '$pass' ";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("codingsolveadlogin", true);
				Session::set("id", $value['id']);
				Session::set("username", $value['username']);
				Session::set("name", $value['name']);
				Session::set("email", $value['email']);
				Session::set("pic", $value['pic']);
				header("Location:index.php");
				//echo "<script>window.location = 'catlist.php'</script>";			
			}else{
			$loginmsg = "<span style='    margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Username or Password Not match !</span>";
			return $loginmsg;
			}
		}
	}
}


 ?>
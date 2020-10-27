<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../Helper/Format.php');


	class Service{
	private $db;
	private $fm;


	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function SerInsert($data, $file){
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

//Image One
		$permitedOne  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_nameOne = $_FILES['image']['name'];
	    $file_sizeOne = $_FILES['image']['size'];
	    $file_tempOne = $_FILES['image']['tmp_name'];

	    $divOne            = explode('.', $file_nameOne);
	    $file_extOne       = strtolower(end($divOne));
		$unique_imageOne   = substr(md5(time()), 0, 10).'s1.'.$file_extOne;		
	    $uploaded_imageOne = "upload/Service/".$unique_imageOne;

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
	    $uploaded_imageTwo = "upload/Service/".$unique_imageTwo;

		$InsertLinkTwo = $uploaded_imageTwo;
//Image Three
		$permitedThree  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_nameThree = $_FILES['imageThree']['name'];
	    $file_sizeThree = $_FILES['imageThree']['size'];
	    $file_tempThree = $_FILES['imageThree']['tmp_name'];

	    $divThree            = explode('.', $file_nameThree);
	    $file_extThree       = strtolower(end($divThree));
		$unique_imageThree   = substr(md5(time()), 0, 10).'s3.'.$file_extThree;		
	    $uploaded_imageThree = "upload/Service/".$unique_imageThree;

		$InsertLinkThree = $uploaded_imageThree;


	    if ($title == "" || $catId == "" || $body == "" || $tag == "" || $adID == "" || $file_nameOne == "") {
	    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Post Field Must Not Be Empty !</span>";
	    return $msg;
	    }elseif ($file_sizeOne>1048567 || $file_sizeTwo>1048567 || $file_sizeThree>1048567) {
			     $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Image Size should be less then 1MB!
			    </span>";
			    return $msg;
		    } elseif (in_array($file_extOne, $permitedOne) === false || in_array($file_extTwo, $permitedTwo) === false || in_array($file_extThree, $permitedThree) === false) {
		      $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>You can upload only:-".implode(', ', $permitedOne)."</span>";
		      return $msg;
		    } else{
		        move_uploaded_file($file_tempOne, $uploaded_imageOne);
		        move_uploaded_file($file_tempTwo, $uploaded_imageTwo);
		        move_uploaded_file($file_tempThree, $uploaded_imageThree);


		        $query = "INSERT INTO tbl_service (title, catId, body, tag, adID, image, delImage, imageTwo, delimageTwo, imageThree, delimageThree, weDoQ, weDoA) 

		        VALUES('$title', '$catId', '$body', '$tag', '$adID', '$InsertLinkOne', '$uploaded_imageOne', '$InsertLinkTwo', '$uploaded_imageTwo', '$InsertLinkThree', '$uploaded_imageThree', '', '')";

		        $inserted_rows = $this->db->insert($query);

		        if ($inserted_rows) {
					$INSquery = "SELECT * FROM  tbl_service ORDER BY id DESC LIMIT 1";
					$getDataSID = $this->db->select($INSquery)->fetch_assoc();
					$InSerId      = $getDataSID['id'];

		        	echo "<script>window.location = 'WhatWeDo.php?addWhatWeDo=".$InSerId."'</script>'";

		        }else {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Service Not Inserted !</span>";

		          return $msg;

		    }

		}
	}

	public function UpadateWhatWeDo($data, $id){		
		$weDoQ   = $this->fm->validation($data['weDoQ']);
		$weDoA   = $this->fm->validation($data['weDoA']);

		$weDoQ   = mysqli_real_escape_string($this->db->link, $data['weDoQ'] );
		$weDoA   = mysqli_real_escape_string($this->db->link, $data['weDoA'] );

		$comaWeDoQ = ",".$weDoQ;
		$comaWeDoA = ",".$weDoA;


		$CHKquery  = "SELECT * FROM  tbl_service WHERE id = '$id'";
		$getwhatDo = $this->db->select($CHKquery)->fetch_assoc();
		$ChkWeDoQ      = $getwhatDo['weDoQ'];
		$ChkWeDoA      = $getwhatDo['weDoA'];

		$fiWeDoQ = $ChkWeDoQ.",".$weDoQ;
		$fiWeDoA = $ChkWeDoA.",".$weDoA;

		if (empty($ChkWeDoQ) AND empty($ChkWeDoA)) {
		        $query = "UPDATE tbl_service

		                    SET
		                    weDoQ      = '$comaWeDoQ',
		                    weDoA      = '$comaWeDoA'

		                    WHERE id   = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {
		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>What We do Added Successfully.

		             </span>";
		             return $msg;
		            }else {
		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>What We do Not Added Updated !</span>";
		             return $msg;
		       		}
		}else{
 					$query = "UPDATE tbl_service

		                    SET
		                    weDoQ      = '$fiWeDoQ',
		                    weDoA      = '$fiWeDoA'

		                    WHERE id   = '$id'
		                    ";

		            $updated_rows = $this->db->update($query);

		            if ($updated_rows) {
		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>What We do Added Successfully.

		             </span>";
		             return $msg;
		            }else {
		             $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>What We do Not Added Updated !</span>";
		             return $msg;
		         }
		}


	}


	Public function SelectAllService(){
		$query = "SELECT tbl_service.*, tbl_admin.name, tbl_admin.pic, tbl_admin.Des, tbl_ser_cat.catName FROM 
				  tbl_service
				  INNER JOIN tbl_admin
				  ON tbl_service.adID = tbl_admin.id
				  INNER JOIN tbl_ser_cat
				  ON tbl_service.catId = tbl_ser_cat.id
				  ORDER BY tbl_service.id DESC;

		";
		$result = $this->db->select($query);
		return $result;
	}

	Public function getSingleService($id){
		$query = "SELECT tbl_service.*, tbl_admin.name, tbl_admin.pic, tbl_admin.Des, tbl_ser_cat.catName FROM 
				  tbl_service
				  INNER JOIN tbl_admin
				  ON tbl_service.adID = tbl_admin.id
				  INNER JOIN tbl_ser_cat
				  ON tbl_service.catId = tbl_ser_cat.id
				  
				  WHERE tbl_service.id = '$id'
				  ORDER BY tbl_service.id DESC"
				  ;
		$result = $this->db->select($query);
		return $result;
	}

	Public function selectAllSerByCAt($id){
		$query = "SELECT tbl_service.*, tbl_admin.name, tbl_admin.pic, tbl_admin.Des, tbl_ser_cat.catName FROM 
				  tbl_service
				  INNER JOIN tbl_admin
				  ON tbl_service.adID = tbl_admin.id
				  INNER JOIN tbl_ser_cat
				  ON tbl_service.catId = tbl_ser_cat.id
				  
				  WHERE tbl_ser_cat.catName LIKE '%$id%'
				  ORDER BY tbl_service.id DESC"
				  ;
		$result = $this->db->select($query);
		return $result;
	}

	Public function selectAllSerByCAtLimit($category){
		$query = "SELECT tbl_service.*, tbl_admin.name, tbl_admin.pic, tbl_admin.Des, tbl_ser_cat.catName FROM 
				  tbl_service
				  INNER JOIN tbl_admin
				  ON tbl_service.adID = tbl_admin.id
				  INNER JOIN tbl_ser_cat
				  ON tbl_service.catId = tbl_ser_cat.id
				  
				  WHERE tbl_ser_cat.catName LIKE '%$category%'
				  ORDER BY tbl_service.id DESC LIMIT 5"
				  ;
		$result = $this->db->select($query);
		return $result;
	}

	Public function ServiceDetails($id){
		$query = "SELECT tbl_service.*, tbl_admin.name, tbl_admin.pic, tbl_admin.Des, tbl_ser_cat.catName FROM 
				  tbl_service
				  INNER JOIN tbl_admin
				  ON tbl_service.adID = tbl_admin.id
				  INNER JOIN tbl_ser_cat
				  ON tbl_service.catId = tbl_ser_cat.id
				  
				  WHERE tbl_service.id = '$id'

				  ORDER BY tbl_service.id DESC LIMIT 1"
				  ;
		$result = $this->db->select($query);
		return $result;
	}

	public function SelectAllWedoQAByID($id){
		$query  = "SELECT * FROM tbl_service WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}


	public function delServiceById($id){
		$query = "SELECT * FROM  tbl_service WHERE id = '$id'";
		$getData = $this->db->select($query);

		if ($getData) {
			while ($delimg = $getData->fetch_assoc()) {
				$dellink      = $delimg['delImage'];
				$dellinkTwo   = $delimg['delimageTwo'];
				$dellinkThree = $delimg['delimageThree'];

				unlink($dellink);
				unlink($dellinkTwo);
				unlink($dellinkThree);
			}
		}

		$query = "DELETE FROM  tbl_service WHERE id = '$id'";
		$del_Data = $this->db->delete($query);
  		if ($del_Data) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Service Deleted Successfully.</span>";
				return $msg;
  		}else{
  			$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Service Not Deleted Successfully !</span>";
				return $msg;
  		}
	}
	public function SerUpdate($data, $file, $id)	{
		$title   = $this->fm->validation($data['title']);
		$catId   = $this->fm->validation($data['catId']);
		$body   = $this->fm->validation($data['body']);
		$tag   = $this->fm->validation($data['tag']);

		$title   = mysqli_real_escape_string($this->db->link, $data['title'] );
		$catId   = mysqli_real_escape_string($this->db->link, $data['catId'] );
		$body   = mysqli_real_escape_string($this->db->link, $data['body'] );
		$tag   = mysqli_real_escape_string($this->db->link, $data['tag'] );

//Image One
		$permitedOne  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_nameOne = $_FILES['image']['name'];
	    $file_sizeOne = $_FILES['image']['size'];
	    $file_tempOne = $_FILES['image']['tmp_name'];

	    $divOne            = explode('.', $file_nameOne);
	    $file_extOne       = strtolower(end($divOne));
		$unique_imageOne   = substr(md5(time()), 0, 10).'s1.'.$file_extOne;		
	    $uploaded_imageOne = "upload/Service/".$unique_imageOne;

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
	    $uploaded_imageTwo = "upload/Service/".$unique_imageTwo;

		$InsertLinkTwo = $uploaded_imageTwo;
//Image Three
		$permitedThree  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_nameThree = $_FILES['imageThree']['name'];
	    $file_sizeThree = $_FILES['imageThree']['size'];
	    $file_tempThree = $_FILES['imageThree']['tmp_name'];

	    $divThree            = explode('.', $file_nameThree);
	    $file_extThree       = strtolower(end($divThree));
		$unique_imageThree   = substr(md5(time()), 0, 10).'s3.'.$file_extThree;		
	    $uploaded_imageThree = "upload/Service/".$unique_imageThree;

		$InsertLinkThree = $uploaded_imageThree;

		if ($title == "" || $catId == "" || $body == "" || $tag == "") {
			    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Post Field Must Not Be Empty !</span>";
			    return $msg;
		    }else{
		    if (!empty($file_nameOne)) {
		        if ($file_sizeOne>1048567 || $file_sizeTwo>1048567 || $file_sizeThree>1048567) {
		         $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Image Size should be less then 1MB!
		         </span>";
		         return $msg;
		        }  else{
			        move_uploaded_file($file_tempOne, $uploaded_imageOne);
			        move_uploaded_file($file_tempTwo, $uploaded_imageTwo);
			        move_uploaded_file($file_tempThree, $uploaded_imageThree);

			        // Image Deleted
					$query = "SELECT * FROM  tbl_service WHERE id = '$id'";
					$getData = $this->db->select($query);

					if ($getData) {
						while ($delimg = $getData->fetch_assoc()) {
							$dellink      = $delimg['delImage'];
							$dellinkTwo   = $delimg['delimageTwo'];
							$dellinkThree = $delimg['delimageThree'];

							unlink($dellink);
							unlink($dellinkTwo);
							unlink($dellinkThree);
						}
					}

		            $query = "UPDATE tbl_service
		                    SET	  
		                    title      = '$title',
		                    catId      = '$catId',
		                    body       = '$body',
		                    image      = '$InsertLinkOne',
		                    delImage   = '$uploaded_imageOne',
		                    imageTwo   = '$InsertLinkTwo',
		                    delimageTwo   = '$uploaded_imageTwo',
		                    imageThree   = '$InsertLinkThree',
		                    delimageThree   = '$uploaded_imageThree',
		                    
		                    tag        = '$tag'

		                    WHERE id = '$id'
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

		    }else{

			        move_uploaded_file($file_tempTwo, $uploaded_imageTwo);
			        move_uploaded_file($file_tempThree, $uploaded_imageThree);
			        // Image Deleted
					$query = "SELECT * FROM  tbl_service WHERE id = '$id'";
					$getData = $this->db->select($query);

					if ($getData) {
						while ($delimg = $getData->fetch_assoc()) {
							$dellinkTwo   = $delimg['delimageTwo'];
							$dellinkThree = $delimg['delimageThree'];

							unlink($dellinkTwo);
							unlink($dellinkThree);
						}
					}
			        
		        $query = "UPDATE tbl_service

		                    SET
		                    title      = '$title',
		                    catId      = '$catId',
		                    body       = '$body',
		                   	imageTwo   = '$InsertLinkTwo',
		                    delimageTwo   = '$uploaded_imageTwo',
		                    imageThree   = '$InsertLinkThree',
		                    delimageThree   = '$uploaded_imageThree',
		                    tag        = '$tag'

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

	public function getPostBySearchKey($id){
		$query = "SELECT tbl_post.*, tbl_cat.cat_name FROM 
				  tbl_post
				  INNER JOIN tbl_cat
				  ON tbl_post.catId = tbl_cat.id
				  WHERE title LIKE '%$id%' OR body LIKE '%$id%' OR tag LIKE '%$id%' OR adName LIKE '%$id%'";
		$result = $this->db->select($query);
		return $result;
	}

	public function RemoveSomthingText($textQ, $textA, $id){

		$comatextQ = ",".$textQ;
		$comatextA = ",".$textA;


		$CHKquery = "SELECT * FROM  tbl_service WHERE id = '$id'";
		$getData  = $this->db->select($CHKquery)->fetch_assoc();
		$weDoQ    = $getData['weDoQ'];
		$weDoA    = $getData['weDoA'];

		$query = "UPDATE  
				  tbl_service 
				  set 
				  weDoQ = (SELECT REPLACE('$weDoQ','$comatextQ','')),
				  weDoA = (SELECT REPLACE('$weDoA','$comatextA',''))
				  WHERE id = $id;";
		$updated_rows = $this->db->update($query);

        if ($updated_rows) {
         $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>We Do Deleted Successfully.

         </span>";
         return $msg;

        }else {

         $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>We Do  Not Deleted !</span>";
         return $msg;

    }

      

	}

	public function selectAllSerCat(){
		$query  = "SELECT * FROM tbl_ser_cat ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function SelectSerTag($SerID){
		$query  = "SELECT * FROM tbl_service WHERE id = $SerID";
		$result = $this->db->select($query);
		return $result;
	}
	public function SerStarInsert($data, $file, $Sid){
		$cliName   = $this->fm->validation($data['cliName']);
		$stars     = $this->fm->validation($data['stars']);
		$msg       = $this->fm->validation($data['msg']);

		$cliName   = mysqli_real_escape_string($this->db->link, $data['cliName'] );
		$stars     = mysqli_real_escape_string($this->db->link, $data['stars'] );
		$msg       = mysqli_real_escape_string($this->db->link, $data['msg'] );
//Image One
		$permitedOne  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_nameOne = $_FILES['image']['name'];
	    $file_sizeOne = $_FILES['image']['size'];
	    $file_tempOne = $_FILES['image']['tmp_name'];

	    $divOne            = explode('.', $file_nameOne);
	    $file_extOne       = strtolower(end($divOne));
		$unique_imageOne   = substr(md5(time()), 0, 10).'s1.'.$file_extOne;		
	    $uploaded_imageOne = "upload/ClientSay/".$unique_imageOne;

	    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    	$protocol = 'http://';
		} else {
    	$protocol = 'https://';
		}
		$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
		$InsertLinkOne = $uploaded_imageOne;

if (empty($file_nameOne)) {
	$InsertLinkOne = "";
	$uploaded_imageOne = "";
}else{
	$InsertLinkOne = $InsertLinkOne;
}

	    if ($cliName == "" || $stars == "" || $msg == "" ) {
	    $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Post Field Must Not Be Empty !</span>";
	    return $msg;
	    }elseif ($file_sizeOne>1048567) {
			     $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Image Size should be less then 1MB!
			    </span>";
			    return $msg;
		    } else{
		        move_uploaded_file($file_tempOne, $uploaded_imageOne);


		        $query = "INSERT INTO tbl_star (SerID, cliName, image, delimage, stars, msg) 

		        VALUES('$Sid', '$cliName', '$InsertLinkOne', '$uploaded_imageOne', '$stars', '$msg')";

		        $inserted_rows = $this->db->insert($query);

		        if ($inserted_rows) {
			         $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Feddback Send Successfully.</span>";
			         return $msg;

		        }else {

		          $msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Service Not Inserted !</span>";
		          return $msg;

		    }

		}
	}

	public function clintSayByID($id){
		$query  = "SELECT * FROM tbl_star WHERE SerID = '$id' ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function delClientSayByID($id){
		$query = "SELECT * FROM  tbl_star WHERE id = '$id'";
		$getData = $this->db->select($query);

		if ($getData) {
			while ($delimg = $getData->fetch_assoc()) {
				$dellink      = $delimg['delimage'];

				unlink($dellink);
			}
		}

		$query = "DELETE FROM  tbl_star WHERE id = '$id'";
		$del_Data = $this->db->delete($query);
  		if ($del_Data) {
				$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-success'>Client Say Deleted Successfully.</span>";
				return $msg;
  		}else{
  			$msg = "<span style='margin-bottom: 15px !important; padding-bottom: 8px; display: block;' class= 'alert alert-warning'>Client Say Not Deleted Successfully !</span>";
				return $msg;
  		}
	}

}
 ?>

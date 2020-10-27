<?php
/**
* Format Class
*/
class Format{
	 public function formatDate($date){
	  return date('F j, Y, g:i a', strtotime($date));
	 }
	 public function formatDate2nd($date){
	  return date('M jS, Y', strtotime($date));
	 }
	 public function formatDate3rd($date){
	  return date('F jS, Y', strtotime($date));
	 }
	 public function formatDate4th($date){
	  return date('j M Y', strtotime($date));
	 }
	 public function formatDate4thANDtime($date){
	  return date('j M Y, h:i a', strtotime($date));
	 }
	 public function OnlyDate($date){
	  return date('j', strtotime($date));
	 }
	 public function OnlyMonth($date){
	  return date('M', strtotime($date));
	 }
	 public function formatTime($date){
	  return date('h:i a', strtotime($date));
	 }

	 public function textShorten($text, $limit = 400){
	  $text = $text. " ";
	  $text = substr($text, 0, $limit);
	  $text = substr($text, 0, strrpos($text, ' '));
	  $text = $text.".....";
	  return $text;
	 }

	 public function validation($data){
	  $data = trim($data);
	  $data = stripcslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	 }

	 public function title(){
	  $path = $_SERVER['SCRIPT_FILENAME'];
	  $title = basename($path, '.php');
	  //$title = str_replace('_', ' ', $title);
	  if ($title == 'index') {
	   $title = 'home';
	  }elseif ($title == 'contact') {
	   $title = 'contact';
	  }
	  return $title = ucfirst($title);
	 }
}
?>
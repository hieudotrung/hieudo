<?php 
include_once('database.php');
class user extends database  {
	 protected $user_id =NULL;
	 protected $user_name=NULL;
	 protected $user_pass=NULL;
	 protected $user_lv=NULL;

public function __construct(){
	$this->connect();//truy xuaats toi phuong thuc connect cua lop database
}
public function set_user_id($user_id){
	$this->user_id=$user_id;
}
public function get_user_id(){
	$user_id=$this->user_id;
	return $user_id;
}

public function set_user_name($user_name){
	$this->user_name=$user_name;
}
public function get_user_name(){
	$user_name=$this->user_name;
	return $user_name;
}

public function set_user_pass($user_pass){
	$this->user_pass=$user_pass;
}
public function get_user_pass(){
	$user_pass=$this->user_pass;
	return $user_pass;
}

public function set_user_lv($user_lv){
	$this->user_lv=$user_lv;
}
public function get_user_lv(){
	$user_lv=$this->user_lv;
	return $user_lv;
}
public function login(){
	$sql="SELECT * FROM user WHERE user_name='$this->user_name' AND user_lv=2";

	$this->query($sql);
	$userData = $this->fetch();
	if($this->num_rows()>0){
		$_SESSION['user_name']=$this->user_name;
		$_SESSION['user_lv']=2;
		//return "user_valid";
		return TRUE;
	}
	return FALSE;
}
// THÊM MỚI TV VÀO HỆ THỐNG
public function add_user(){
	$sql="SELECT * FROM user WHERE user_name='$this->user_name'";
	$this->query($sql);
	if ($this->num_rows()>0) {
		return "User exist";
	} 
	else 
	{
		$sql="INSERT INTO user(user_name,user_pass,user_lv) 
		VALUES('$this->user_name','$this->user_pass','$this->user_lv')";
		$this->query($sql);
	}
}
public function edit_user(){
	$sql="SELECT * FROM user WHERE user_name='$this->user_name'AND user_id=$this->user_id";
	$this->query($sql);
	if ($this->num_rows()>0) {
		return "User exist";
	} 
	else {
		$sql="UPDATE user 
			  SET user_name='$this->user_name',
			  	  user_pass='$this->user_pass',
			  	  user_lv='$this->user_lv'
			  WHERE user_id='$this->user_id'";
		$this->query($sql);
	}
}
public function delete_user(){
 	$sql="DELETE FROM user WHERE user_id='$this->user_id'";
 	$this->query($sql);
} 
}
?>
<?php


class user {
   

//starting connection
public $login_user_id;
 public function __construct($id=""){
     $this->login_user_id=$id;
     $this->db=new database();
     $this->conn=$this->db->conn;

 }

 public function select($query){
   return $this->result=$this->db->select($query);
  }

//end dabtabase connection

public function get_user_info(){
	$info=array();
	$sql="select * from user";
	$res=$this->select($sql);
	while ($row=mysqli_fetch_array($res)) {
		$id=$row['id'];
		$sub=$this->db->process_mysql_array($row);
		$sub['photo_orginal']=$row['photo'];
		$sub['phone']='0'.$sub['phone'];
		$sub['photo']="upload/user_photo/".$sub['photo'];
		$info[$id]=$sub;
	}
	return $info;
}


public function cheikh_user($uid){
	$info=$this->get_user_info();
    foreach ($info as $key => $value) {
    	$id=$value['id'];
    	if($uid==$id)return 1;
    }
    return 0;
}

public function get_login_user(){
	$info=$this->get_user_info();
	return $info[$this->login_user_id];
}



}


?>


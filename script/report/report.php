<?php


class report {
   

//starting connection

 public function __construct(){
     
     $this->db=new database();
     $this->conn=$this->db->conn;

 }

 public function select($query){
   return $this->result=$this->db->select($query);
  }

//end dabtabase connection
  public function get_payment_report_list($data){
    $date1=$data['date1'];
	$date2=$data['date2'];
	$program_id=$data['program_id'];
	$type=$data['type'];
    $q_program="";
    $q_type="";
    $where="";

    if($program_id!=0)$q_program="student_payment.program_id=$program_id";
    if($type!=0)$q_type="student_payment.type=$type";
    
    if($q_program!="" && $q_type!=""){
    	$where="and $q_program and $q_type";
    }
    else if($q_program!="")$where="and $q_program";
    else if($q_type!="")$where="and $q_type";
    
    $sql="
    select 
    receive_payment.date,receive_payment.payment_id,receive_payment.pay,receive_payment.id,
    student.name as student_name,student.id as student_id,student.nick,
    program.name as program_name,
    student_payment.year,student_payment.month,student_payment.type,
    student_payment.total_fee,
    user.uname as add_by
    from receive_payment  
    INNER JOIN student_payment ON student_payment.id=receive_payment.payment_id 
    INNER JOIN program ON program.id=student_payment.program_id 
    INNER JOIN student ON student.id=student_payment.student_id 
    INNER JOIN user ON user.id=receive_payment.add_by
    where (receive_payment.date BETWEEN CAST('$date1' AS DATE) AND CAST('$date2' AS DATE)) $where
    ORDER BY receive_payment.id ASC
    
    ";
    $info=$this->db->get_sql_array($sql);

   return $info;
  }

   public function get_month_name($month){
  	
  	$month_array=array("January","February","March","April","May","June","July","August","September","October","November","December");
  	return $month_array[$month-1];
  }



}


?>


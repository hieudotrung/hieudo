<?php 
	class database
	{
		protected $db_host='localhost';
		protected $db_user='root';
		protected $db_pass='';
		protected $db_name='user_manager';

		protected $conn=NULL;
		protected $result=NULL;

		public function connect()
		{
			$this->conn=mysql_connect($this->db_host,$this->db_user,$this->db_pass);
			$select_db=mysql_select_db($this->db_name,$this->conn);
		}
		public function disconnect(){
			if($this->conn){
				mysql_close($this->conn);
			}
		}
		//query
		public function query($sql){
			$this->free_query();
			$this->result=mysql_query($sql);
			//return mysql_query($sql);
		}
		//giai phong query
		public function free_query(){
			if($this->result){
				mysql_free_result($this->result);
			}
		}
		public function num_rows(){
			if($this->result){
				$rows=mysql_num_rows($this->result);
				return $rows;
			}
		}
		public function fetch(){
			if($this->result){
				$rows=mysql_fetch_assoc($this->result);
				return $rows;
			}
		}
		public function abc(){
			$this->connect();
			$s="SELECT * FROM user";
			$q=$this->query($s);
			while ($this->fetch()){
				echo '5x';
			}
		}
		public function abc1(){
			$this->connect();
			$s="SELECT * FROM user";
			$q=$this->query($s);
			while ($this->fetch()){
				echo "<pre>";
				print_r($this->fetch());
				echo "</pre>";
			}
		}
		public function f2(){
			$this->connect();
			$s="SELECT * FROM user";
			$q=$this->query($s);
			return $this->fetch();
			
		}
		public function f(){
			$this->connect();
			$s="SELECT * FROM user";
			$q=$this->query($s);

			while ($rows = $this->fetch()){
				$data[] =$rows; 
			}
			return $data;
		}
		public function f4(){

			$array = array(
				array(1,2,3,4,5),
				array(1,2,3,4,5),
				array(1,2,3,4,5),
				array(1,2,3,4,5)
				);
			$this->connect();
			$s="SELECT * FROM user";
			$q=$this->query($s);
			var_dump($array); die();
			while ($rows = $array ){
				$data[] =$rows;
			}
			return $data;
		}
	}

	$a=new database();
	$a->abc();
	echo "<pre>";
	print_r($a->f2());
	echo "</pre>";

echo "<pre>";
	print_r($a->f());
	echo "</pre>";


	echo "<pre>";
	print_r($a->f4());
	echo "</pre>";
	//$a->abc2();
?>
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
	}
?>
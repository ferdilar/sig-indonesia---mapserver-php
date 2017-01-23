<?php
	class Conn{
		protected static $dbh = false;
		protected  $db_host = 'localhost';
		protected  $db_user = 'root';
		protected  $db_pass = '';
		protected  $db_name = 'sig_indonesia';
		function connect() {
			self::$dbh = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
			if (self::$dbh->connect_errno) {
				echo "Failed to connect to MySQL: " . self::$dbh->connect_error;
			}
		}
	}
?>

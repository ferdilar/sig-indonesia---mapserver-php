<?php
	include 'conn.php';
    class Database extends Conn{
		function select_by_name($parameter) {
			$nama_lokasi=$parameter['nama_lokasi'];
			if(!self::$dbh) $this->connect();
			$res = self::$dbh->query("select * from data where title like '%$nama_lokasi%'");
			return $res;
		}
		function select_by_desc($parameter) {
			$deskripsi=$parameter['deskripsi'];
			if(!self::$dbh) $this->connect();
			$res = self::$dbh->query("select * from data where description like '%$deskripsi%'");
			return $res;
		}
}
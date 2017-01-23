<?php
	include 'Database.php';
	if(isset($_POST['nama_lokasi'])){
		$db = new Database();
		$parameter['nama_lokasi']=$_POST['nama_lokasi'];
			$result=$db->select_by_name($parameter);
			if($cek = $result->fetch_assoc()){
				$myfile = fopen("data.txt", "w") or die("Unable to open file!");
				$txt = "point\ttitle\tdescription\ticon\n";
				fwrite($myfile, $txt);
				foreach($result as $row){
					$txt = $row['point_start'].",".$row['point_end']."\t".$row['title']."\t".$row['description']."\t".$row['icon']."\n";
					fwrite($myfile, $txt);
				}
				fclose($myfile);
				header('location:indonesia.php');
			}else{
				echo "<h3><blink>Not Found</h3>";
				echo "<a href='indonesia.php'>Kembali</a>";
			}
			// mysql_close();
	}
	if(isset($_POST['deskripsi'])){
		$db = new Database();
		$parameter['deskripsi']=$_POST['deskripsi'];
			$result=$db->select_by_desc($parameter);
			if($cek = $result->fetch_assoc()){
				$myfile = fopen("data.txt", "w") or die("Unable to open file!");
				$txt = "point\ttitle\tdescription\ticon\n";
				fwrite($myfile, $txt);
				foreach($result as $row){
					$txt = $row['point_start'].",".$row['point_end']."\t".$row['title']."\t".$row['description']."\t".$row['icon']."\n";
					fwrite($myfile, $txt);
				}
				fclose($myfile);
				header('location:indonesia.php');
			}else{
				echo "<h3><blink>Not Found</h3>";
				echo "<a href='indonesia.php'>Kembali</a>";
			}
			// mysql_close();
	}
	if($_SERVER['REQUEST_METHOD']!='POST'){
		header('location:indonesia.php');
	}
?>
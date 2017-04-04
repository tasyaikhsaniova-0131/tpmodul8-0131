<html>
	<h2>MASUKKAN DATA MAHASISWA</h2>
	<form method='post'>
		Nama : <input type='text' name='nama'/><br><br>
		NIM : <input type='text' name='nim'/><br><br>
		Kelas : <input type='text' name='kelas'/><br><br>
		<input type='submit' name='submit' value='Submit'/>
	</form>
		<?php
			if (isset($_POST['submit'])){
				$nama = $_POST['nama'];
				$nim = $_POST['nim'];
				$kelas = $_POST['kelas'];
				
				
			$conn = mysqli_connect("localhost", "root", "","6706154101");
			 
			$query = "insert into mhs values('$nama','$nim','$kelas')";
			$result = mysqli_query($conn, $query);
			
			if ($result){
				echo "Data Berhasil ditambahkan!<br>";
				
				$sql = "select * from mhs";
				$tampil = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($tampil)) {
					$temp[] = array("Nama" => $row["nama"], "NIM" => $row["nim"], "Kelas" => $row["kelas"]);
				}
				$data = json_encode($temp);
				$file = fopen("data_mhs.json","w");    
				fwrite($file,$data);
				fclose($file); 
			}
			}
		?>
</html>
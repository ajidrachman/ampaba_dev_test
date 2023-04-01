<?php 
		
		$query = mysqli_query($koneksi, "SELECT * FROM datamahasiswa ORDER BY namaLengkap ASC");

		if (mysqli_num_rows($query)==0) {
			
			echo "<h3>belum ada data di tabel data mahasiswa</h3>";
		}else{

			echo "<table>";

			echo "<tr class='header-list'>
						
						<th>nim</th>
						<th>nama lengkap</th>
						<th>jenis kelamin</th>
						<th>tempat,tanggal lahir</th>
						<th>jurusan</th>
						<th>action</th>
			      </tr>";

			      $no=1;
			      while ($row=mysqli_fetch_assoc($query)){

			      		$style=false;
			      		if ($no==2) {
			      			
			      			$style="style='background:#eaeaec'";
			      			$no=0;
			      		}
			      	echo "<tr class='body-list' $style>
			      				
			      				<td align='center'>$row[nim]</td>
			      				<td align='center'>$row[namaLengkap]</td>
			      				<td align='center'>$row[jenisKelamin]</td>
			      				<td align='center'>$row[ttl]</td>
			      				<td align='center'>$row[jurusan]</td>
			      				<td align='center' style='background:#eaeaec'> 
			      				<a class='edit' href='".URL."index.php?page=tambah&idmhs=$row[id_mhs]'>edit</a>
			      				<a class='hapus' href='".URL."datamhs.php?button=hapus&idmhs=$row[id_mhs]'>hapus</a>
			      				</td>
			      	      </tr>";

			      	      $no++;
			      }

			echo "</table>";
		}

?>
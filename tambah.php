<?php 
		$idmhs = isset($_GET['idmhs']) ? $_GET['idmhs'] : false;

		$nim ="";
		$namaLengkap ="";
		$jenisKelamin ="";
		$ttl ="";
		$jurusan ="";

		$button ="INPUT";

		if ($idmhs){
			
			$query = mysqli_query($koneksi,"SELECT * FROM datamahasiswa WHERE id_mhs='$idmhs'");
			$row = mysqli_fetch_assoc($query);

			$nim = $row['nim'];
			$namaLengkap = $row['namaLengkap'];
			$jenisKelamin = $row['jenisKelamin'];
			$ttl = $row['ttl'];
			$jurusan = $row['jurusan'];

			$button = "update";
		}
?>
<div id="tambah-data">
		
		<center><h3>DATA MAHASISWA</h3></center>

		  <form action="<?php echo URL."datamhs.php?idmhs=$idmhs"; ?>" method="post">

		    <div class="element-form">
		  	<label>NIM</label>
		  	<input class="input-text" type="text" name="nim" value="<?php echo $nim; ?>">
		  	</div>

		  	<div class="element-form">
		  	<label>NAMA LENGKAP</label>
		  	<input class="input-text" type="text" name="namaLengkap" value="<?php echo $namaLengkap; ?>">
		  	</div>

		  	<label>JENIS KELAMIN</label>
		  	<input type="radio" name="j_kelamin" value="laki-laki"<?php if($jenisKelamin=="laki-laki"){echo "checked=true";} ?> />laki-laki
		  	<input type="radio" name="j_kelamin" value="prempuan"<?php if($jenisKelamin=="prempuan"){echo "checked=true";} ?>/>prempuan

		  	<div class="element-form">
		  	<label>TEMPAT,TANGGAL LAHIR</label>
		  	<input class="input-text" type="text" name="ttl" value="<?php echo $ttl; ?>">
		  	</div>

		  	<div class="element-form">
		  	<label>JURUSAN</label>
		  	<select name="jurusan">
		  		<?php 
		  			if($jurusan=="TI"){

		  				echo "<option value='TI' selected='true'>TEKNOLOGI INFORMASI</option>";
		  				echo "<option value='TA'>TEKNIK ARSITEKTUR</option>";
		  				echo "<option value='TL'>TEKNIK LINGKUNGAN</option>";
		  			}elseif($jurusan == "TA"){

		  				echo "<option value='TI'>TEKNOLOGI INFORMASI</option>";
		  				echo "<option value='TA' selected='true'>TEKNIK ARSITEKTUR</option>";
		  				echo "<option value='TL'>TEKNIK LINGKUNGAN</option>";
		  			}elseif ($jurusan == "TL") {

		  				echo "<option value='TI'>TEKNOLOGI INFORMASI</option>";
		  				echo "<option value='TA'>TEKNIK ARSITEKTUR</option>";
		  				echo "<option value='TL' selected='true'>TEKNIK LINGKUNGAN</option>";
		  			}else{

		  				echo "<option value='TI'>TEKNOLOGI INFORMASI</option>";
		  				echo "<option value='TA'>TEKNIK ARSITEKTUR</option>";
		  				echo "<option value='TL'>TEKNIK LINGKUNGAN</option>";
		  			}
		  		?>
		  	</select>
		  	</div>

		  	<center><input type="submit" name="button" value="<?php echo $button; ?>"></center>
		  </form>
</div>
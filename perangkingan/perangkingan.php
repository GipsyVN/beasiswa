<?php 

if(isset($_POST['proses'])){
	$jenis = $_POST['jenis'];

	$sql = "SELECT * FROM pendaftaran WHERE jenis_beasiswa='$jenis'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// Mencari nilai max dan min
		$sql = "SELECT min(pendapatan_ortu) as mpendapatan, max(ipk) as mipk, max(jml_saudara) as msaudara FROM pendaftaran WHERE jenis_beasiswa='$jenis'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		//Mengambil nilai max dan min
		$mpendapatan = $row['mpendapatan'];
		$mipk = $row['mipk'];
		$msaudara = $row['msaudara'];

		//proses normalisasi
		$sql = "SELECT * FROM pendaftaran WHERE jenis_beasiswa='$jenis'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			$iddaftar = $row['iddaftar'];
			$pendapatan = $row['pendapatan_ortu'];
			$ipk = $row['ipk'];
			$saudara = $row['jml_saudara'];

			//Menghapus Data Perangkingan yang lama
			$sql = "DELETE FROM perangkingan WHERE iddaftar='$iddaftar'";
			$conn->query($sql);

			// Hitung normalisasi
			$npendapatan = $mpendapatan / $pendapatan;
			$nipk = $ipk / $mipk;
			$nsaudara = $saudara / $msaudara;

			//Hitung nilai Preferensi
			if($jenis == "Prestasi"){
				//Prestasi
				$preferensi = ($npendapatan*0.2)+($nipk*0.6)+($nsaudara*0.2);
			}elseif($jenis == "Kurang Mampu"){
				//Kurang Mampu
				$preferensi = ($npendapatan*0.5)+($nipk*0.2)+($nsaudara*0.3);
			}else{
				//Tugas Akhir
				$preferensi = ($npendapatan*0.2)+($nipk*0.5)+($nsaudara*0.3);
			}

			// Simpan Data Perangkingan
			$sql = "INSERT INTO perangkingan VALUES (Null, '$iddaftar','$npendapatan','$nipk', '$nsaudara', '$preferensi')";
			if ($conn->query($sql) === TRUE) {
				header("Location:?page=perangkingan&jenis=$jenis");
			}

		}

	}else{
		?>
		<div class="alert alert-danger alert-dismissible fade show">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Data Tidak Ditemukan</strong>
		</div>
		<?php
	}

}

?>

<div class="card">
	<div class="card-header bg-primary text-white border-dark"><strong>Perangkingan</strong></div>
	<div class="card-body">
		<form action="" method="POST">
			<div class="form-group">
				<label for="">Jenis</label>
				<select class="form-control chosen" data-placeholder="Pilih jenis beasiswa" name="jenis">
					<option value=""></option>	
					<option value="Prestasi">Prestasi</option>
					<option value="Kurang Mampu">Kurang Mampu</option>
					<option value="Tugas Akhir">Tugas Akhir</option>
				</select>
			</div>
			<input class="btn btn-primary mb-2" type="submit" name="proses" value="Proses">
		</form>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th style="text-align: center;" width="80">No</th>
					<th style="text-align: center;" width="80">NIM</th>
					<th style="text-align: center;" width="200">Nama Mahasiswa</th>
					<th style="text-align: center;" width="80">Jenis Beasiswa</th>
					<th style="text-align: center;" width="100">n_Pendapatan</th>
					<th style="text-align: center;" width="100">n_IPK</th>
					<th style="text-align: center;" width="100">n_Saudara</th>
					<th style="text-align: center;" width="100">Preferensi</th>
					<th style="text-align: center;" width="150">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- letakkan proses menampilkan disini -->
				<?php
				$jenis = $_GET['jenis'];
				$sql = "SELECT perangkingan.idperangkingan, perangkingan.iddaftar, pendaftaran.tgldaftar, pendaftaran.jenis_beasiswa, pendaftaran.nim, mahasiswa.nama_mahasiswa, perangkingan.n_pendapatan, perangkingan.n_ipk, perangkingan.n_saudara, perangkingan.preferensi FROM perangkingan INNER JOIN pendaftaran ON perangkingan.iddaftar = pendaftaran.iddaftar INNER JOIN mahasiswa ON pendaftaran.nim = mahasiswa.nim WHERE jenis_beasiswa = '$jenis' ORDER BY preferensi DESC";
				$result = $conn->query($sql);
				$i = 1;
				while($row = $result->fetch_assoc()) {
					?>
					<tr>
						<td style="text-align: center;" ><?php echo $i; ?></td>
						<td style="text-align: center;" ><?php echo $row['nim']; ?></td>
						<td><?php echo $row['nama_mahasiswa']; ?></td>
						<td style="text-align: center;" ><?php echo $row['jenis_beasiswa']; ?></td>
						<td style="text-align: center;" ><?php echo $row['n_pendapatan']; ?></td>
						<td style="text-align: center;" ><?php echo $row['n_ipk']; ?></td>
						<td style="text-align: center;" ><?php echo $row['n_saudara']; ?></td>
						<td style="text-align: center;" ><?php echo $row['preferensi']; ?></td>
						<td style="text-align: center;" >
							<a onclick="return confirm('Mahasiswa Yang Bersangkutan Akan Menjadi Penerima Beasiswa. Tetap Tambahkan?')" class="btn btn-warning" href="?page=perangkingan&action=tambah&&id=<?php echo $row['iddaftar']; ?>">
								<span class="fas fa-edit"></span>
							</a>
							<a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=pendaftaran&action=hapus&id=<?php echo $row['iddaftar']; ?>">
								<span class="fas fa-times"></span>
							</a>
						</td>
					</tr>
					<?php
					$i++;
				}
				$conn->close();
				?>
			</tbody>
		</table>
	</div>
</div>
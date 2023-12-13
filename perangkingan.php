<?php 

if(isset($_POST['proses'])){
	$tahun = $_POST['tahun'];

	$sql = "SELECT * FROM pendaftaran WHERE tahun='$tahun'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// Mencari nilai max dan min
		$sql = "SELECT min(pendapatan_ortu) as mpendapatan, max(ipk) as mipk, max(jml_saudara) as msaudara FROM pendaftaran WHERE tahun='$tahun'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		//Mengambil nilai max dan min
		$mpendapatan = $row['mpendapatan'];
		$mipk = $row['mipk'];
		$msaudara = $row['msaudara'];

		//proses normalisasi
		$sql = "SELECT * FROM pendaftaran WHERE tahun='$tahun'";
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
			$preferensi = ($npendapatan*0.5)+($nipk*0.3)+($nsaudara*0.2);

			// Simpan Data Perangkingan
			$sql = "INSERT INTO perangkingan VALUES (Null, '$iddaftar','$npendapatan','$nipk', '$nsaudara', '$preferensi')";
			if ($conn->query($sql) === TRUE) {
				header("Location:?page=perangkingan&thn=$tahun");
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
				<label for="">Tahun</label>
				<select class="form-control chosen" data-placeholder="Pilih Tahun" name="tahun">
					<option value="<?php echo $_GET['thn']; ?>"><?php echo $_GET['thn']; ?></option>
					<?php for($i = date("Y"); $i >= 2018; $i--) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php endfor ?>
				</select>
			</div>
			<input class="btn btn-primary mb-2" type="submit" name="proses" value="Proses">
		</form>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th width="80">No</th>
					<th width="100">NIM</th>
					<th width="200">Nama Mahasiswa</th>
					<th width="100">n_Pendapatan</th>
					<th width="100">n_IPK</th>
					<th width="100">n_Saudara</th>
					<th width="100">Preferensi</th>
				</tr>
			</thead>
			<tbody>
				<!-- letakkan proses menampilkan disini -->
				<?php
				$sql = "SELECT perangkingan.idperangkingan, perangkingan.iddaftar, pendaftaran.tgldaftar, pendaftaran.tahun, pendaftaran.nim, mahasiswa.nama_mahasiswa, perangkingan.n_pendapatan, perangkingan.n_ipk, perangkingan.n_saudara, perangkingan.preferensi FROM perangkingan INNER JOIN pendaftaran ON perangkingan.iddaftar = pendaftaran.iddaftar INNER JOIN mahasiswa ON pendaftaran.nim = mahasiswa.nim ORDER BY preferensi DESC";
				$result = $conn->query($sql);
				$i = 1;
				while($row = $result->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['nim']; ?></td>
						<td><?php echo $row['nama_mahasiswa']; ?></td>
						<td><?php echo $row['n_pendapatan']; ?></td>
						<td><?php echo $row['n_ipk']; ?></td>
						<td><?php echo $row['n_saudara']; ?></td>
						<td><?php echo $row['preferensi']; ?></td>
						
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
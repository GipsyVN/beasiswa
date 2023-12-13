<?php

if(isset($_POST['simpan'])){

	// ambil data dari input
	$id = "";
	$tgl = date("Y-m-d");
	$tahun=$_POST['tahun'];
	$nama=$_POST['nama'];
	$pendapatan=$_POST['pendapatan'];
	$ipk=$_POST['ipk'];
	$saudara=$_POST['saudara'];
	
    // validasi
	$sql = "SELECT * FROM pendaftaran WHERE nim='$nama' AND tahun='$tahun'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		?>
		<div class="alert alert-danger alert-dismissible fade show">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Data Sudah Ada</strong>
		</div>
		<?php
	}else{
	//proses simpan
		$sql = "INSERT INTO pendaftaran VALUES ('$id', '$tgl','$tahun','$nama', '$pendapatan', '$ipk', '$saudara')";
		if ($conn->query($sql) === TRUE) {
			header("Location:?page=pendaftaran");
		}
	}
}
?>


<div class="row">
	<div class="col-sm-12">
		<form action="" method="POST">
			<div class="card border-dark">
				<div class="card">
					<div class="card-header bg-primary text-white border-dark"><strong>INPUT DATA PENDAFTARAN</strong></div>
					<div class="card-body">
						<div class="form-group">
							<label for="">Tahun</label>
							<select class="form-control chosen" data-placeholder="Pilih Tahun" name="tahun">
								<?php for($i = date("Y"); $i >= 2018; $i--) : ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php endfor ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Nama Mahasiswa</label>
							<select class="form-control chosen" data-placeholder="Nama Mahasiswa" name="nama">
								<?php
								$sql = "SELECT * FROM mahasiswa ORDER BY nama_mahasiswa ASC";
								$result = $conn->query($sql);
								while($row = $result->fetch_assoc()) {
									?>
									<option value="<?php echo $row['nim']; ?>"><?php echo $row['nim'] . " - " . $row['nama_mahasiswa']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Pendapatan Orangtua</label>
							<input type="number" class="form-control" name="pendapatan" min="0" max="9999999999" required>
						</div>
						<div class="form-group">
							<label for="">IPK</label>
							<input type="number" class="form-control" name="ipk" value="1.00" step="0.01" min="1" max="4" required>
						</div>
						<div class="form-group">
							<label for="">Jumlah Saudara</label>
							<input type="number" class="form-control" name="saudara" min="0" max="100" required>
						</div>

						<input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
						<a class="btn btn-danger" href="?page=pendaftaran">Batal</a>

					</div>
				</div>
			</form>
		</div>
	</div>
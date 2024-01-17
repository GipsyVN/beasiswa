<?php
$id=$_GET['id'];

if(isset($_POST['verif']) || isset($_POST['batal_verif'])){

	global $id;
	if (isset($_POST['verif'])) {
		$verif = "Terverifikasi";
	} else {
		$verif = "Belum";
	}
	
    // proses update
	$sql = "UPDATE pendaftaran SET verifikasi = '$verif' WHERE iddaftar='$id'";
	if ($conn->query($sql) === TRUE) {
		header("Location:?page=pendaftaran");
	}
}

// Autocompletes
$sql = "SELECT pendaftaran.iddaftar,pendaftaran.jenis_beasiswa,pendaftaran.tahun,mahasiswa.nama_mahasiswa,pendaftaran.nim,pendaftaran.nik,pendaftaran.no_kk,pendaftaran.tempat_lahir,mahasiswa.tanggal_lahir,pendaftaran.jenis_kelamin,pendaftaran.fakultas,pendaftaran.program_studi,pendaftaran.semester,pendaftaran.ipk,pendaftaran.golongan_darah,pendaftaran.agama,mahasiswa.telp,pendaftaran.email,mahasiswa.alamat,pendaftaran.pendapatan_ortu,pendaftaran.jml_saudara FROM mahasiswa INNER JOIN pendaftaran ON mahasiswa.nim = pendaftaran.nim WHERE iddaftar='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<div class="row">
	<div class="col-sm-12">
		<form action="" method="POST">
			<div class="card border-dark">
				<div class="card">
					<div class="card-header bg-primary text-white border-dark"><strong>DATA PENDAFTAR</strong></div>
					<div class="card-body">
						<div class="form-group">
							<label for="">Jenis Beasiswa:</label>
							<input type="text" class="form-control" value="<?php echo $row['jenis_beasiswa']; ?>" readonly>
						</div>

						<div class="form-group">
							<label for="">Tahun</label>
							<input type="text" class="form-control" value="<?php echo $row['tahun']; ?>" readonly>
						</div>

						<div class="form-group">
							<label for="">Nama Mahasiswa</label>
							<input type="text" class="form-control" value="<?php echo $row['nama_mahasiswa']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">NIM</label>
							<input type="text" class="form-control" value="<?php echo $row['nim']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">NIK</label>
							<input type="text" class="form-control" value="<?php echo $row['nik']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Nomor KK</label>
							<input type="text" class="form-control" value="<?php echo $row['no_kk']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Tempat Lahir</label>
							<input type="text" class="form-control" value="<?php echo $row['tempat_lahir']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Tanggal Lahir </label>
							<input type="text" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>" readonly>
						</div>

						<div class="form-group">
							<label for="">Jenis Kelamin</label>
							<input type="text" class="form-control" value="<?php echo $row['jenis_kelamin']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Fakultas </label>
							<input type="text" class="form-control" value="<?php echo $row['fakultas']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Program Studi</label>
							<input type="text" class="form-control" value="<?php echo $row['program_studi']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Semester</label>
							<input type="text" class="form-control" value="<?php echo $row['semester']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">IPK</label>
							<input type="text" class="form-control" value="<?php echo $row['ipk']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Golongan Darah:</label>
							<input type="text" class="form-control" value="<?php echo $row['golongan_darah']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Agama:</label>
							<input type="text" class="form-control" value="<?php echo $row['agama']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">No Handphone</label>
							<input type="text" class="form-control" value="<?php echo $row['telp']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" value="<?php echo $row['email']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<input type="text" class="form-control" value= "<?php echo $row['alamat']; ?>" name="alamat"  readonly>
						</div>
						<div class="form-group">
							<label for="">Pendapatan Orangtua</label>
							<input type="text" class="form-control" value="<?php echo $row['pendapatan_ortu']; ?>" readonly>
						</div>
						
						<div class="form-group">
							<label for="">Jumlah Saudara</label>
							<input type="text" class="form-control" value="<?php echo $row['jml_saudara']; ?>" readonly>
						</div>

						<input class="btn btn-primary" type="submit" name="verif" value="Verifikasi">
						<input class="btn btn-danger" type="submit" name="batal_verif" value="Batalkan Verifikasi">
						<a class="btn btn-danger" href="?page=pendaftaran">Batal</a>

					</div>
				</div>
			</form>
		</div>
	</div>
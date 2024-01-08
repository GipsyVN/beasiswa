<?php
$nim = $_SESSION['username'];
$sql = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(isset($_POST['simpan'])){

	// ambil data dari input
	$id = "";
	$jb = $_POST['jb'];
	$tgl = date("Y-m-d");
	$tahun=$_POST['tahun'];
	$nim = $_POST['nim'];
	$nik = $_POST['nik'];
	$kk = $_POST['nomor_kk'];
	$tmp_lahir = $_POST['tp_lahir'];
	$jk = $_POST['jk'];
	$fakultas = $_POST['fakultas'];
	$prodi = $_POST['program_studi'];
	$semester = $_POST['semester'];
	$ipk=$_POST['ipk'];
	$golongan = $_POST['gol_dar'];
	$agama = $_POST['agama'];
	$email = $_POST['email'];
	$pendapatan=$_POST['pendapatan'];
	$saudara=$_POST['saudara'];
	
    // validasi
	$sql = "SELECT * FROM pendaftaran WHERE nim='$nim' AND jenis_beasiswa='$jb'";
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
		$sql = "INSERT INTO pendaftaran VALUES ('$id','$jb', '$tgl','$tahun','$nim','$nik','$kk','$tmp_lahir','$jk','$fakultas','$prodi','$semester','$golongan','$agama','$email','$pendapatan','$ipk','$saudara', 'Belum')";
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
							<label for="">Jenis Beasiswa:</label>
							<select class="form-control chosen" data-placeholder="Pilih Jenis Beasiswa" name="jb">
								<option value=""></option>
								<option value="Prestasi">Prestasi</option>
								<option value="Kurang_mampu">Kurang mampu</option>
								<option value="Tugas_akhir">Tugas akhir</option>
							</select>
						</div>

						<div class="form-group">
							<label for="">Tahun</label>
							<input type="text" class="form-control" value="<?php echo date("Y"); ?>" name="tahun" readonly>
						</div>

						<div class="form-group">
							<label for="">Nama Mahasiswa</label>
							<input type="text" class="form-control" value= "<?php echo $row['nama_mahasiswa']; ?>" name="nama" readonly>
						</div>
						<div class="form-group">
							<label for="">NIM</label>
							<input type="text" class="form-control" value= "<?php echo $nim; ?>" name="nim" readonly>
						</div>
						<div class="form-group">
							<label for="">NIK</label>
							<input type="number" class="form-control" name="nik" min="0000000000000000" max="9999999999999999" required>
						</div>
						<div class="form-group">
							<label for="">Nomor KK</label>
							<input type="number" class="form-control" name="nomor_kk" min="0000000000000000" max="9999999999999999" required>
						</div>
						<div class="form-group">
							<label for="">Tempat Lahir</label>
							<input type="text" class="form-control" name="tp_lahir" required>
						</div>
						<div class="form-group">
							<label for="">Tanggal Lahir </label>
							<input type="text" class="form-control" value= "<?php echo $row['tanggal_lahir']; ?>" name="tgl_lahir" readonly>
						</div>

						<div class="form-group">
							<label for="">Jenis Kelamin</label>
							<select class="form-control chosen" data-placeholder="Pilih Jenis Kelamin" name="jk">
								<option value=""></option>		
								<option value="Laki-Laki">Laki - Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Fakultas </label>
							<input type="text" class="form-control" data-placeholder="Fakultas" name="fakultas" required>
						</div>
						<div class="form-group">
							<label for="">Program Studi</label>
							<input type="text" class="form-control" data-placeholder="jurusan" name="program_studi" required>
						</div>
						<div class="form-group">
							<label for="">Semester</label>
							<select class="form-control chosen" data-placeholder="Pilih Semester" name="semester">
								<option value=""></option>		
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">IPK</label>
							<input type="number" class="form-control" name="ipk" value="1.00" step="0.01" min="1" max="4" required>
						</div>
						<div class="form-group">
							<label for="">Golongan Darah:</label>
							<select class="form-control chosen" data-placeholder="Pilih Golongan Darah" name="gol_dar">
								<option value=""></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="O">O</option>
								<option value="AB">AB</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Agama:</label>
							<select class="form-control chosen" data-placeholder="Pilih agama" name="agama">
								<option value=""></option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Protestan">Protestan</option>
								<option value="hindu">hindu</option>
								<option value="Budha">Budha</option>
								<option value="konghuchu">konghuchu</option>
								<option value="lainya">lainya</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">No Handphone</label>
							<input type="number" class="form-control" value= "<?php echo $row['telp']; ?>" name="no_hp" readonly>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" name="email" required>
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<input type="text" class="form-control" value= "<?php echo $row['alamat']; ?>" name="alamat"  readonly>
						</div>
						<div class="form-group">
							<label for="">Pendapatan Orangtua</label>
							<input type="number" class="form-control" name="pendapatan" min="0" max="9999999999" required>
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
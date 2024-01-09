<?php 
$id=$_GET['id'];

if(isset($_POST['update'])){

    global $id;
    $tahun = $_POST['tahun'];
    $jb = $_POST['jb'];
    $tahun=$_POST['tahun'];
    $nik = $_POST['nik'];
    $kk = $_POST['nomor_kk'];
    $tmp_lahir = $_POST['tp_lahir'];
    $jk = $_POST['jk'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['program_studi'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $goldar = $_POST['gol_dar'];
    $agama = $_POST['agama'];
    $email = $_POST['email'];
    $pendapatan=$_POST['pendapatan'];
    $saudara=$_POST['saudara'];

    // proses update
    $sql = "UPDATE pendaftaran SET jenis_beasiswa='$jb',nik='$nik',no_kk='$kk',tempat_lahir='$tmp_lahir',jenis_kelamin='$jk',fakultas='$fakultas',program_studi='$prodi',semester='$semester',ipk='$ipk',golongan_darah='$goldar',agama='$agama',email='$email',pendapatan_ortu='$pendapatan',jml_saudara='$saudara' WHERE iddaftar='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=pendaftaran");
    }
}

// Autocompletes
$sql = "SELECT pendaftaran.jenis_beasiswa,pendaftaran.tahun,mahasiswa.nama_mahasiswa,pendaftaran.nim,pendaftaran.nik,pendaftaran.no_kk,pendaftaran.tempat_lahir,mahasiswa.tanggal_lahir,pendaftaran.jenis_kelamin,pendaftaran.fakultas,pendaftaran.program_studi,pendaftaran.semester,pendaftaran.ipk,pendaftaran.golongan_darah,pendaftaran.agama,mahasiswa.telp,pendaftaran.email,mahasiswa.alamat,pendaftaran.pendapatan_ortu,pendaftaran.jml_saudara FROM mahasiswa INNER JOIN pendaftaran ON mahasiswa.nim = pendaftaran.nim WHERE iddaftar='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>UBAH DATA PENDAFTARAN</strong></div>
                    <div class="card-body">
                       <div class="form-group">
                        <label for="">Jenis Beasiswa:</label>
                        <select class="form-control chosen" name="jb">
                            <option value="Prestasi" <?php echo ($row['jenis_beasiswa'] == 'Prestasi') ? 'selected' : ''; ?>>Prestasi</option>
                            <option value="Kurang_Mampu" <?php echo ($row['jenis_beasiswa'] == 'Kurang_Mampu') ? 'selected' : ''; ?>>Kurang Mampu</option>
                            <option value="Tugas_Akhir" <?php echo ($row['jenis_beasiswa'] == 'Tugas_Akhir') ? 'selected' : ''; ?>>Tugas Akhir</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" class="form-control" value="<?php echo $row['tahun']; ?>" name="tahun" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" class="form-control" value= "<?php echo $row['nama_mahasiswa']; ?>" name="nama" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">NIM</label>
                        <input type="text" class="form-control" value= "<?php echo $row['nim']; ?>" name="nim" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="number" class="form-control" name="nik" value= "<?php echo $row['nik']; ?>" min="0000000000000000" max="9999999999999999" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor KK</label>
                        <input type="number" class="form-control" name="nomor_kk" value= "<?php echo $row['no_kk']; ?>" min="0000000000000000" max="9999999999999999" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tp_lahir" value= "<?php echo $row['tempat_lahir']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir </label>
                        <input type="text" class="form-control" value= "<?php echo $row['tanggal_lahir']; ?>" name="tgl_lahir" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control chosen" name="jk">     
                            <option value="Laki-Laki" <?php echo ($row['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki - Laki</option>
                            <option value="Perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Fakultas </label>
                        <input type="text" class="form-control" name="fakultas" value= "<?php echo $row['fakultas']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Program Studi</label>
                        <input type="text" class="form-control" name="program_studi" value= "<?php echo $row['program_studi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select class="form-control chosen" name="semester">    
                            <option value="1" <?php echo ($row['semester'] == '1') ? 'selected' : ''; ?>>1</option>
                            <option value="2" <?php echo ($row['semester'] == '2') ? 'selected' : ''; ?>>2</option>
                            <option value="3" <?php echo ($row['semester'] == '3') ? 'selected' : ''; ?>>3</option>
                            <option value="4" <?php echo ($row['semester'] == '4') ? 'selected' : ''; ?>>4</option>
                            <option value="5" <?php echo ($row['semester'] == '5') ? 'selected' : ''; ?>>5</option>
                            <option value="6" <?php echo ($row['semester'] == '6') ? 'selected' : ''; ?>>6</option>
                            <option value="7" <?php echo ($row['semester'] == '7') ? 'selected' : ''; ?>>7</option>
                            <option value="8" <?php echo ($row['semester'] == '8') ? 'selected' : ''; ?>>8</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">IPK</label>
                        <input type="number" class="form-control" name="ipk" value="<?php echo $row['ipk'] ?>" step="0.01" min="1" max="4" required>
                    </div>
                    <div class="form-group">
                        <label for="">Golongan Darah:</label>
                        <select class="form-control chosen" name="gol_dar">
                            <option value="A" <?php echo ($row['golongan_darah'] == 'A') ? 'selected' : ''; ?>>A</option>
                            <option value="B" <?php echo ($row['golongan_darah'] == 'B') ? 'selected' : ''; ?>>B</option>
                            <option value="O" <?php echo ($row['golongan_darah'] == 'O') ? 'selected' : ''; ?>>O</option>
                            <option value="AB" <?php echo ($row['golongan_darah'] == 'AB') ? 'selected' : ''; ?>>AB</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Agama:</label>
                        <select class="form-control chosen" data-placeholder="Pilih agama" name="agama">
                            <option value=""></option>
                            <option value="Islam" <?php echo ($row['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                            <option value="Kristen" <?php echo ($row['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                            <option value="Katolik" <?php echo ($row['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                            <option value="Hindu" <?php echo ($row['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                            <option value="Budha" <?php echo ($row['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                            <option value="Konghuchu" <?php echo ($row['agama'] == 'Konghuchu') ? 'selected' : ''; ?>>Konghuchu</option>
                            <option value="Lainnya" <?php echo ($row['agama'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No Handphone</label>
                        <input type="number" class="form-control" value= "<?php echo $row['telp']; ?>" name="no_hp" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value= "<?php echo $row['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" value= "<?php echo $row['alamat']; ?>" name="alamat" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Pendapatan Orangtua</label>
                        <input type="number" class="form-control" name="pendapatan" value= "<?php echo $row['pendapatan_ortu']; ?>" min="0" max="9999999999" required>
                    </div>

                    <div class="form-group">
                        <label for="">Jumlah Saudara</label>
                        <input type="number" class="form-control" name="saudara" value= "<?php echo $row['jml_saudara']; ?>" min="0" max="100" required>
                    </div>

                    <input class="btn btn-primary" type="submit" name="update" value="Update">
                    <a class="btn btn-danger" href="?page=pendaftaran">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>
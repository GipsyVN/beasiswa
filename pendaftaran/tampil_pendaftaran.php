<div class="card">
	<div class="card-header bg-primary text-white border-dark"><strong>Data Pendaftaran</strong></div>
	<div class="card-body">
		<?php if($_SESSION['level'] == "Mahasiswa"): ?>
			<a class="btn btn-primary mb-2" href="?page=pendaftaran&action=tambah">Tambah</a>
		<?php endif ?>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th style="text-align: center;" width="20">No</th>
					<th style="text-align: center;" width="80">Jenis Beasiswa</th>
					<th style="text-align: center;" width="80">NIM</th>
					<th style="text-align: center;" width="150">Nama</th>
					<th style="text-align: center;" width="50">Program Studi</th>
					<th style="text-align: center;" width="50">Semester</th>
					<th style="text-align: center;" width="100">Pendapatan</th>
					<th style="text-align: center;" width="50">IPK</th>
					<th style="text-align: center;" width="80">Jumlah Saudara</th>
					<th style="text-align: center;" width="150">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- letakkan proses menampilkan disini -->
				<?php
				if($_SESSION['level'] == "Admin"){
					$sql = "SELECT pendaftaran.semester,pendaftaran.program_studi,pendaftaran.jenis_beasiswa,pendaftaran.iddaftar,pendaftaran.nim,mahasiswa.nama_mahasiswa,pendaftaran.pendapatan_ortu,pendaftaran.ipk,pendaftaran.jml_saudara FROM mahasiswa INNER JOIN pendaftaran ON mahasiswa.nim = pendaftaran.nim ORDER BY iddaftar ASC";
				}else{
					$nim = $_SESSION['username'];
					$sql = "SELECT pendaftaran.semester,pendaftaran.program_studi,pendaftaran.jenis_beasiswa,pendaftaran.iddaftar,pendaftaran.nim,mahasiswa.nama_mahasiswa,pendaftaran.pendapatan_ortu,pendaftaran.ipk,pendaftaran.jml_saudara,pendaftaran.verifikasi FROM mahasiswa INNER JOIN pendaftaran ON mahasiswa.nim = pendaftaran.nim WHERE pendaftaran.nim = '$nim' ORDER BY iddaftar ASC";
				}
				$result = $conn->query($sql);
				$i = 1;
				while($row = $result->fetch_assoc()) {
					?>
					<tr>
						<td style="text-align: center;" ><?php echo $i; ?></td>
						<td style="text-align: center;" ><?php echo $row['jenis_beasiswa']; ?></td>
						<td style="text-align: center;" ><?php echo $row['nim']; ?></td>
						<td><?php echo $row['nama_mahasiswa']; ?></td>
						<td style="text-align: center;" ><?php echo $row['program_studi']; ?></td>
						<td style="text-align: center;"><?php echo $row['semester']; ?></td>
						<td style="text-align: center;" ><?php echo $row['pendapatan_ortu']; ?></td>
						<td style="text-align: center;" ><?php echo $row['ipk']; ?></td>
						<td style="text-align: center;" ><?php echo $row['jml_saudara']; ?></td>
						<td style="text-align: center;" >
							<?php if($_SESSION['level'] == "Admin"){ ?>
								<a class="btn btn-warning" href="?page=pendaftaran&action=verif&id=<?php echo $row['iddaftar']; ?>">
									<span class="fas fa-edit"></span>
								</a>
								<a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=pendaftaran&action=hapus&id=<?php echo $row['iddaftar']; ?>">
									<span class="fas fa-times"></span>
								</a>
							<?php }else{ ?>
								<?php if($row['verifikasi'] == "Terverifikasi"){ ?>
									<a onclick="return confirm('Tidak Dapat Mengubah Karena Data Sudah Diverifikasi')" class="btn btn-warning" disabled>
										<span class="fas fa-edit"></span>
									</a>
									<a onclick="return confirm('Tidak Dapat Menghapus Karena Data Sudah Diverifikasi')" class="btn btn-danger" disabled>
										<span class="fas fa-times"></span>
									</a>
								<?php }else{ ?>
									<a class="btn btn-warning" href="?page=pendaftaran&action=update&id=<?php echo $row['iddaftar']; ?>">
										<span class="fas fa-edit"></span>
									</a>
									<a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=pendaftaran&action=hapus&id=<?php echo $row['iddaftar']; ?>">
										<span class="fas fa-times"></span>
									</a>
								<?php } ?>	
							<?php } ?>
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
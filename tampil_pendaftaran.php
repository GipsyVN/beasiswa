<div class="card">
	<div class="card-header bg-primary text-white border-dark"><strong>Data Pendaftaran</strong></div>
	<div class="card-body">
		<?php if($_SESSION['level'] == "Mahasiswa"): ?>
			<a class="btn btn-primary mb-2" href="?page=pendaftaran&action=tambah">Tambah</a>
		<?php endif ?>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th width="50">No</th>
					<th width="80">Tanggal</th>
					<th width="50">Tahun</th>
					<th width="80">NIM</th>
					<th width="150">Nama</th>
					<th width="100">Pendapatan</th>
					<th width="100">IPK</th>
					<th width="100">Jml Saudara</th>
					<th width="80"></th>
				</tr>
			</thead>
			<tbody>
				<!-- letakkan proses menampilkan disini -->
				<?php
				if($_SESSION['level'] == "Admin"){
					$sql = "SELECT pendaftaran.iddaftar,pendaftaran.tgldaftar,pendaftaran.tahun,pendaftaran.nim,mahasiswa.nama_mahasiswa,pendaftaran.pendapatan_ortu,pendaftaran.ipk,pendaftaran.jml_saudara FROM mahasiswa INNER JOIN pendaftaran ON mahasiswa.nim = pendaftaran.nim ORDER BY iddaftar ASC";
				}else{
					$nim = $_SESSION['username'];
					$sql = "SELECT pendaftaran.iddaftar,pendaftaran.tgldaftar,pendaftaran.tahun,pendaftaran.nim,mahasiswa.nama_mahasiswa,pendaftaran.pendapatan_ortu,pendaftaran.ipk,pendaftaran.jml_saudara,pendaftaran.verifikasi FROM mahasiswa INNER JOIN pendaftaran ON mahasiswa.nim = pendaftaran.nim WHERE pendaftaran.nim = '$nim' ORDER BY iddaftar ASC";
				}
				$result = $conn->query($sql);
				$i = 1;
				while($row = $result->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['tgldaftar']; ?></td>
						<td><?php echo $row['tahun']; ?></td>
						<td><?php echo $row['nim']; ?></td>
						<td><?php echo $row['nama_mahasiswa']; ?></td>
						<td><?php echo $row['pendapatan_ortu']; ?></td>
						<td><?php echo $row['ipk']; ?></td>
						<td><?php echo $row['jml_saudara']; ?></td>
						<td>

							
							<?php if($_SESSION['level'] == "Admin"){ ?>
								<a class="btn btn-warning" href="?page=pendaftaran&action=verif&id=<?php echo $row['iddaftar']; ?>">
									<span class="fas fa-edit"></span>
								</a>
								<a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=pendaftaran&action=hapus&id=<?php echo $row['iddaftar']; ?>">
									<span class="fas fa-times"></span>
							<?php }else{ ?>
								<?php if($row['verifikasi'] == "Terverifikasi"){ ?>
									<a class="btn btn-warning" disabled>
										<span class="fas fa-edit"></span>
									</a>
									<a class="btn btn-danger" disabled>
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
<div class="card">
	<div class="card-header bg-primary text-white border-dark"><strong>Data Penerima</strong></div>
	<div class="card-body">
		<a onclick="return confirm('Yakin menghapus semua data dalam tabel ini ?')" class="btn btn-primary mb-2" href="?page=acc&action=hapus_data">Hapus Semua Data</a>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th style="text-align: center;" width="20">No</th>
					<th style="text-align: center;" width="80">Jenis Beasiswa</th>
					<th style="text-align: center;" width="80">NIM</th>
					<th style="text-align: center;" width="150">Nama</th>
					<th style="text-align: center;" width="100">Prefrensi</th>
					<th style="text-align: center;" width="50">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- letakkan proses menampilkan disini -->
				<?php
                $sql = "SELECT pendaftaran.jenis_beasiswa,pendaftaran.iddaftar,pendaftaran.nim,mahasiswa.nama_mahasiswa,perangkingan.preferensi,acc.idacc FROM mahasiswa INNER JOIN pendaftaran ON mahasiswa.nim = pendaftaran.nim INNER JOIN perangkingan ON pendaftaran.iddaftar = perangkingan.iddaftar INNER JOIN acc ON perangkingan.iddaftar = acc.iddaftar ORDER BY jenis_beasiswa ASC";
				$result = $conn->query($sql);
				$i = 1;
				while($row = $result->fetch_assoc()) {
					?>
					<tr>
						<td style="text-align: center;"><?php echo $i; ?></td>
						<td style="text-align: center;"><?php echo $row['jenis_beasiswa']; ?></td>
						<td style="text-align: center;"><?php echo $row['nim']; ?></td>
						<td><?php echo $row['nama_mahasiswa']; ?></td>
						<td style="text-align: center;"><?php echo $row['preferensi']; ?></td>
						<td style="text-align: center;">

                            <a class="btn btn-warning" href="?page=acc&action=terima&id=<?php echo $row['iddaftar']; ?>">
								<span class="far fa-clipboard"></span>
							</a>
							<a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=acc&action=hapus&id=<?php echo $row['idacc']; ?>">
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
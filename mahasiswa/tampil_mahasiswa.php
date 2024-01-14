<div class="card">
	<div class="card-header bg-primary text-white border-dark"><strong>Data Mahasiswa</strong></div>
	<div class="card-body">
		<a class="btn btn-primary mb-2" href="?page=mahasiswa&action=tambah">Tambah</a>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th style="text-align: center;" width="80">No</th>
					<th style="text-align: center;" width="100">NIM</th>
					<th style="text-align: center;" width="200">Nama Mahasiswa</th>
					<th style="text-align: center;" width="120">Tanggal Lahir</th>
					<th style="text-align: center;" width="300">Alamat</th>
					<th style="text-align: center;" width="80">No. Telp</th>
					<th style="text-align: center;" width="100"></th>
				</tr>
			</thead>
			<tbody>
				<!-- letakkan proses menampilkan disini -->
				<?php
				$sql = "SELECT * FROM mahasiswa";
				$result = $conn->query($sql);
				$i = 1;
				while($row = $result->fetch_assoc()) {
					?>
					<tr>
						<td style="text-align: center;" ><?php echo $i; ?></td>
						<td style="text-align: center;" ><?php echo $row['nim']; ?></td>
						<td><?php echo $row['nama_mahasiswa']; ?></td>
						<td style="text-align: center;" ><?php echo $row['tanggal_lahir']; ?></td>
						<td style="text-align: center;" ><?php echo $row['alamat']; ?></td>
						<td style="text-align: center;" ><?php echo $row['telp']; ?></td>
						<td style="text-align: center;" >
							<a class="btn btn-warning" href="?page=mahasiswa&action=update&id=<?php echo $row['id']; ?>">
								<span class="fas fa-edit"></span>
							</a>
							<a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=mahasiswa&action=hapus&id=<?php echo $row['id']; ?>">
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
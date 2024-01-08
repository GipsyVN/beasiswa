<div class="card">
	<div class="card-header bg-primary text-white border-dark"><strong>Data Mahasiswa</strong></div>
	<div class="card-body">
		<a class="btn btn-primary mb-2" href="?page=mahasiswa&action=tambah">Tambah</a>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th width="80">No</th>
					<th width="100">NIM</th>
					<th width="200">Nama Mahasiswa</th>
					<th width="120">Tanggal Lahir</th>
					<th width="300">Alamat</th>
					<th width="80">No. Telp</th>
					<th width="100"></th>
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
						<td><?php echo $i; ?></td>
						<td><?php echo $row['nim']; ?></td>
						<td><?php echo $row['nama_mahasiswa']; ?></td>
						<td><?php echo $row['tanggal_lahir']; ?></td>
						<td><?php echo $row['alamat']; ?></td>
						<td><?php echo $row['telp']; ?></td>
						<td>
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
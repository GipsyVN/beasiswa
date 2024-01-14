<div class="card">
	<div class="card-header bg-primary text-white border-dark"><strong>Data User</strong></div>
	<div class="card-body">
		<a class="btn btn-primary mb-2" href="?page=user&action=tambah">Tambah</a>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th style="text-align: center;" width="80">No</th>
					<th style="text-align: center;" width="200">Username</th>
					<th style="text-align: center;" width="200">Password</th>
					<th style="text-align: center;" width="100">Level</th>
					<th style="text-align: center;" width="80">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- letakkan proses menampilkan disini -->
				<?php
				$sql = "SELECT * FROM users";
				$result = $conn->query($sql);
				$i = 1;
				while($row = $result->fetch_assoc()) {
					?>
					<tr>
						<td style="text-align: center;" ><?php echo $i; ?></td>
						<td style="text-align: center;" ><?php echo $row['username']; ?></td>
						<td style="text-align: center;" ><?php echo $row['pass']; ?></td>
						<td style="text-align: center;" ><?php echo $row['level']; ?></td>
						<td style="text-align: center;" >
							<a class="btn btn-warning" href="?page=user&action=update&id=<?php echo $row['id']; ?>">
								<span class="fas fa-edit"></span>
							</a>
							<a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=user&action=hapus&id=<?php echo $row['id']; ?>">
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
<div class="card">
	<div class="card-header bg-primary text-white border-dark"><strong>Data User</strong></div>
	<div class="card-body">
		<a class="btn btn-primary mb-2" href="?page=user&action=tambah">Tambah</a>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th width="80">No</th>
					<th width="200">Username</th>
					<th width="200">Password</th>
					<th width="100">Level</th>
					<th width="80"></th>
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
						<td><?php echo $i; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['pass']; ?></td>
						<td><?php echo $row['level']; ?></td>
						<td>
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
<?php

if(isset($_POST['simpan'])){

	// ambil data dari input
    $username=$_POST['username'];
    $pass=md5($_POST['pass']);
    $level=$_POST['level'];
	
    // validasi
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Username Sudah Digunakan</strong>
            </div>
        <?php
    }else{
	//proses simpan
        $sql = "INSERT INTO users VALUES (Null, '$username','$pass','$level')";
        if ($conn->query($sql) === TRUE) {
            header("Location:?page=user");
        }
    }
}
?>


<div class="row">
	<div class="col-sm-12">
		<form action="" method="POST">
			<div class="card border-dark">
				<div class="card">
					<div class="card-header bg-primary text-white border-dark"><strong>INPUT DATA USER</strong></div>
					<div class="card-body">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control" name="username" maxlength="20" required>
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" name="pass" maxlength="100" required>
						</div>
						<div class="form-group">
							<label for="">Level</label>
							<select class="form-control chosen" data-placeholder="Pilih Level" name="level">
								<option value=""></option>		
								<option value="Admin">Admin</option>
								<option value="Mahasiswa">Mahasiswa</option>
							</select>
						</div>
						<input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
						<a class="btn btn-danger" href="?page=user">Batal</a>

					</div>
				</div>
			</form>
		</div>
	</div>
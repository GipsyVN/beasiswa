<?php 
$id=$_GET['id'];

if(isset($_POST['update'])){

    global $id;
    $nim=$_POST['nim'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];

    // proses update
    $sql = "UPDATE mahasiswa SET nim='$nim',nama_mahasiswa='$nama',alamat='$alamat',telp='$telp' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=mahasiswa");
    }
}

// Autocompletes
$sql = "SELECT * FROM mahasiswa WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>UBAH DATA MAHASISWA</strong></div>
                    <div class="card-body">

                     <div class="form-group">
                            <label for="">NIM</label>
                            <input type="text" class="form-control" value="<?php echo $row['nim']; ?>" name="nim" maxlength="10" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" class="form-control" value="<?php echo $row['nama_mahasiswa']; ?>" name="nama" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" value="<?php echo $row['alamat']; ?>" name="alamat" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label for="">No. Telp</label>
                            <input type="text" class="form-control" value="<?php echo $row['telp']; ?>" name="telp" maxlength="15" required>
                        </div>

                     <input class="btn btn-primary" type="submit" name="update" value="Update">
                     <a class="btn btn-danger" href="?page=mahasiswa">Batal</a>

                 </div>
             </div>
         </form>
     </div>
 </div>
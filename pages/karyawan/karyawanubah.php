<div id="top" class="row mb-3 col">
    <div class="col">
        <h3>Ubah Data Karyawan</h3>
    </div>
    <div class="col">
        <a href="?page=karyawan" class="btn btn-primary float-end">
            <i class="fa fa-arrow-cicle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        include "database/connetion.php";

        if (isset($_POST['simpan_button'])) {
            $nik = $_POST["nik"];
            $nama = $_POST['nama'];
            $tanggal_mulai = $_POST['tanggal_mulai'];
            $gaji_pokok = $_POST['gaji_pokok'];
            $status_karyawan = $_POST['status_karyawan'];
            $bagian_id = $_POST['bagian_id'];
        
            $updateSQL ="UPDATE karyawan SET 
            nama = '$nama',
            tanggal_mulai='$tanggal_mulai',
            gaji_pokok=$gaji_pokok,
            status_karyawan='$status_karyawan',
            bagian_id=$bagian_id 
            WHERE nik = '$nik'";
                $result = mysqli_query($connection, $sql);
                if (!$result) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-exclamation-circle"></i>
                        <?php echo mysqli_error($connection) ?>
                    </div>
                <?php        
                } else {
                ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check-circle"></i>
                        Ubah Data Berhasil Disimpan
                    </div>
            <?php
                }    
            }
        
        $id = $_GET['nik'];
        $selectSQL = "SELECT * FROM karyawan WHERE nik = $nik";
        $result = mysqli_query($connection, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo '<meta http-equiv="refresh" content="0;url?page=bagian">';
        }
        $row = mysqli_fetch_assoc($result);
        ?>
    </div>
</div>
<div id="inputan" class="row mb-3">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="id" class="form-label">ID</label>
                  <input type="text" class="form-control" id="id" name="id" 
                    value="<?php echo $id ?>" required>
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Bagian</label>
                  <input type="text" class="form-control" id="nama" name="nama" 
                  placeholder="misal: HRD"
                  value="<?php echo $row['nama'] ?>"  
                  required>
                </div>
                <div class="col mb-3">
                    <button class="btn btn-success" type="submit" name="simpan_button">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
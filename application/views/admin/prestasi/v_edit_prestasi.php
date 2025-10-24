<!-- /.col-lg-4 -->
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Prestasi
        </div>
        <div class="panel-body">
            <?php
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
            }
            echo form_open_multipart('prestasi/edit/' . $prestasi->id_prestasi);
            ?>

            <div class="form-group">
                <label>Nama Prestasi</label>
                <input class="form-control" value="<?= $prestasi->nama_prestasi ?>" type="text" name="nama_prestasi" placeholder="Nama Prestasi" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" value="<?= $prestasi->ket_prestasi ?>" type="text" name="ket_prestasi" placeholder="Keterangan Prestasi" required>
            </div>

            <div class="form-group">
                <label>Foto Prestasi</label>
                <input type="file" class="form-control" name="foto_prestasi">
                <?php if (!empty($prestasi->foto_prestasi)) { ?>
                    <p>Foto saat ini: <img src="<?= base_url('foto_prestasi/' . $prestasi->foto_prestasi) ?>" width="100" height="100"></p>
                    <!-- Menambahkan input hidden untuk mengirim foto lama -->
                    <input type="hidden" name="foto_prestasi_lama" value="<?= $prestasi->foto_prestasi ?>">
                    <small>Kosongkan jika tidak ingin mengganti foto</small>
                <?php } ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-success">Reset</button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>


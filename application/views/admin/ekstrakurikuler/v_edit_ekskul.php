<!-- /.col-lg-4 -->
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Ekstrakurikuler
        </div>
        <div class="panel-body">
            <?php
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
            }
            echo form_open_multipart('ekstrakurikuler/edit/' . $ekskul->id_ekstrakurikuler);
            ?>

            <div class="form-group">
                <label>Nama Ekstrakurikuler</label>
                <input class="form-control" value="<?= $ekskul->nama_ekstrakurikuler ?>" type="text" name="nama_ekstrakurikuler" placeholder="Nama Ekstrakurikuler" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" value="<?= $ekskul->ket_ekstrakurikuler ?>" type="text" name="ket_ekstrakurikuler" placeholder="Keterangan Ekstrakurikuler" required>
            </div>

            <div class="form-group">
                <label>Foto Ekstrakurikuler</label>
                <input type="file" class="form-control" name="foto_ekstrakurikuler">
                <?php if (!empty($ekskul->foto_ekskul)) { ?>
                    <p>Foto saat ini: <img src="<?= base_url('foto_ekstrakurikuler/' . $ekskul->foto_ekstrakurikuler) ?>" width="100" height="100"></p>
                    <!-- Menambahkan input hidden untuk mengirim foto lama -->
                    <input type="hidden" name="foto_ekstrakurikuler_lama" value="<?= $ekskul->foto_ekstrakurikuler ?>">
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


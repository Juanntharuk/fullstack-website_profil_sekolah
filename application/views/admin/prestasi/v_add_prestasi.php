<!-- /.col-lg-4 -->
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">        
            Tambah Prestasi
        </div>
        <div class="panel-body">
            <?php

                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
                }
                echo form_open_multipart('prestasi/add_prestasi');
            ?>

            <div class="form-group">
                <label>Nama Prestasi</label>
                <input class="form-control" type="text" name="nama_prestasi" placeholder="Nama Prestasi" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" type="text" name="ket_prestasi" placeholder="Keterangan Prestasi" required>
            </div>

            <div class="form-group">
                <label>Foto Prestasi</label>
                <input type="file" class="form-control" name="foto_prestasi" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset"  class="btn btn-success">Reset</button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>

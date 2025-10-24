<!-- /.col-lg-4 -->
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Pengumuman</div>
        <div class="panel-body">
            <?= form_open('pengumuman/add'); ?>

            <div class="form-group">
                <label>Judul Pengumuman</label>
                <input class="form-control" type="text" name="judul_pengumuman" placeholder="Judul Pengumuman" required>
            </div>

            <div class="form-group">
                <label>Isi Pengumuman</label>
                <textarea class="form-control" name="isi_pengumuman" placeholder="Isi Pengumuman" rows="6" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>

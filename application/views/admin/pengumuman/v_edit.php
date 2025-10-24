<!-- /.col-lg-4 -->
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Edit Pengumuman</div>
        <div class="panel-body">
            <?= form_open('pengumuman/edit/' . $pengumuman->id_pengumuman); ?>

            <div class="form-group">
                <label>Judul Pengumuman</label>
                <input class="form-control" type="text" name="judul_pengumuman" 
                       value="<?= set_value('judul_pengumuman', $pengumuman->judul_pengumuman); ?>" required>
            </div>

            <div class="form-group">
                <label>Isi Pengumuman</label>
                <textarea class="form-control" name="isi_pengumuman" rows="6" required><?= set_value('isi_pengumuman', $pengumuman->isi_pengumuman); ?></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>

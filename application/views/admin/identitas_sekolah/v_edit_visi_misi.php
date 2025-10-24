<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Form Edit Visi & Misi Sekolah</div>
            <div class="panel-body">

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>

                <?= form_open('identitas_sekolah/update_visi_misi'); ?>
                    <input type="hidden" name="id_identitas_sekolah" value="<?= $identitas['id_identitas_sekolah']; ?>">

                    <div class="form-group">
                        <label>Visi Sekolah</label>
                        <textarea name="visi" class="form-control ckeditor" rows="5"><?= $identitas['visi']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Misi Sekolah</label>
                        <textarea name="misi" class="form-control ckeditor" rows="5"><?= $identitas['misi']; ?></textarea>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?= base_url('identitas_sekolah/visi_misi'); ?>" class="btn btn-secondary">Batal</a>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

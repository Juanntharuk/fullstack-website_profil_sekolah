<div class="row">
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Form Edit Sejarah Sekolah</div>
        <div class="panel-body">
            <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <?= form_open_multipart('identitas_sekolah/update_sejarah'); ?> 
                <input type="hidden" name="id_identitas_sekolah" value="<?= $identitas['id_identitas_sekolah']; ?>">

                <div class="row">
                    <div class="col-md-4 text-center">
                        <?php if (!empty($identitas['foto_sekolah'])): ?>
                            <img src="<?= base_url('foto_sekolah/' . $identitas['foto_sekolah']); ?>" class="img-thumbnail mb-2" width="200">
                        <?php endif; ?>

                        <div class="form-group mt-2">
                            <label>Upload Foto Baru</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" value="<?= $identitas['nama_sekolah']; ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Sejarah</label>
                            <textarea name="sejarah" class="form-control" id="editor" rows="10"><?= $identitas['sejarah']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('identitas_sekolah/sejarah_sekolah'); ?>" class="btn btn-secondary">Batal</a>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</div>

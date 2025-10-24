<!-- /.col-lg-4 -->
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">        
            Add Foto Gallery
        </div>
        <div class="panel-body">

            <!-- ✅ Pesan Flashdata -->
            <?php if ($this->session->flashdata('pesan')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= $this->session->flashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <!-- ✅ Error Upload -->
            <?php
                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
                }

                echo validation_errors('<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

                echo form_open_multipart('gallery/add_foto/'.$gallery->id_gallery);
            ?>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Keterangan Foto</label>
                    <input class="form-control" type="text" name="ket_foto" placeholder="Keterangan Foto" required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" name="foto" required>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('gallery') ?>"  class="btn btn-success">Kembali</a>
            </div>
            
            <?php echo form_close(); ?>
            <hr>
            
            <div class="row">
                <?php foreach ($foto as $key => $value) { ?>
                    <div class="col-sm-3 text-center" style="margin-bottom: 20px;">
                        <label><?= $value->ket_foto ?></label>
                        <img src="<?= base_url('foto/'.$value->foto) ?>" width="232px" height="240px">
                        <a href="<?= base_url('gallery/delete_foto/'.$value->id_gallery.'/'.$value->id_foto) ?>" class="btn btn-danger btn-sm btn-block mt-2" onclick="return confirm('Yakin ingin hapus foto ini?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>

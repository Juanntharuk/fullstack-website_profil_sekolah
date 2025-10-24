<div class="row">
    <div class="col-lg-12">
        <a href="<?= base_url('identitas_sekolah/edit_sejarah'); ?>" class="btn btn-success mb-3">
            <i class="fa fa-edit"></i> Edit Sejarah Sekolah
        </a>

        <div class="panel panel-primary">
            <div class="panel-heading">Sejarah Sekolah</div>
            <div class="panel-body">
                <div class="row">
                    <!-- Kolom kiri: identitas -->
                    <div class="col-md-4">
                        
                        <?php if (!empty($identitas['foto_sekolah'])): ?>
                            <img src="<?= base_url('foto_sekolah/' . $identitas['foto_sekolah']); ?>" 
                                 class="img-thumbnail mt-2" width="200">
                        <?php endif; ?>
                        
                        <p><br><h5><strong>Nama Sekolah:</strong> <?= !empty($identitas['nama_sekolah']) ? $identitas['nama_sekolah'] : '-'; ?></h5></br></p>
                    </div>

                    <!-- Kolom kanan: sejarah -->
                    <div class="col-md-8">
                        <p><strong>Sejarah:</strong><br><?= !empty($identitas['sejarah']) ? $identitas['sejarah'] : '-'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

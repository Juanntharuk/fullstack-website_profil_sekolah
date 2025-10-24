
<div class="row">
    <div class="col-lg-12">
        <a href="<?= base_url('identitas_sekolah/edit_kepsek'); ?>" class="btn btn-success mb-3">
            <i class="fa fa-edit"></i> Edit Data Kepsek
        </a>

        <div class="panel panel-primary">
            <div class="panel-heading">Data Kepala Sekolah</div>
            <div class="panel-body">
                <div class="row">
                    <!-- Kolom kiri: foto dan nama -->
                    <div class="col-md-4 text-center">
                        <?php if (!empty($kepala['foto_kepsek'])): ?>
                            <img src="<?= base_url('foto_kepsek/' . $kepala['foto_kepsek']); ?>" width="200" class="img-thumbnail mb-3">
                        <?php else: ?>
                            <img src="<?= base_url('foto_kepsek/default.png'); ?>" width="200" class="img-thumbnail mb-3">
                        <?php endif; ?>

                        <h4><?= $kepala['nama_kepsek']; ?></h4>
                    </div>

                    <!-- Kolom kanan: sambutan -->
                    <div class="col-md-8">
                        <h4>Sambutan Kepala Sekolah:</h4>
                        <p><?= $kepala['sambutan_kepsek']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Visi & Misi Sekolah</div>
            <div class="panel-body">

                <?php if ($this->session->flashdata('pesan')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div>
                <?php endif; ?>

                <h4>Visi</h4>
                <p><?= $identitas['visi']; ?></p>

                <h4>Misi</h4>
                <p><?= $identitas['misi']; ?></p>

                <a href="<?= base_url('identitas_sekolah/edit_visi_misi'); ?>" 
                   class="btn btn-primary"><i class="fa fa-edit"></i> Edit Visi & Misi
                </a>
            </div>
        </div>
    </div>
</div>

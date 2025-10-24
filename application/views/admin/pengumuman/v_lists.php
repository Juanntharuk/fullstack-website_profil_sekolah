<!-- /.col-lg-4 -->
<?php
// tampilkan response fonnte jika ada
foreach ($pengumuman as $p) {
    if ($this->session->flashdata('fonnte_response_' . $p->id_pengumuman)) {
        echo '<div class="alert alert-info">';
        echo 'Response Fonnte: ' . $this->session->flashdata('fonnte_response_' . $p->id_pengumuman);
        echo '</div>';
    }
}
?>

<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?= base_url('pengumuman/add'); ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah Pengumuman
            </a>
        </div>
        <div class="panel-body">
            <?php if ($this->session->flashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= $this->session->flashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Pengumuman</th>
                        <th>Isi Pengumuman</th>
                        <th>Tanggal Pengumuman</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pengumuman as $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($value->judul_pengumuman, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= nl2br(htmlspecialchars($value->isi_pengumuman, ENT_QUOTES, 'UTF-8')); ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($value->tgl_pengumuman)); ?></td>
                            <td>
                                <a href="<?= base_url('pengumuman/edit/' . $value->id_pengumuman) ?>" 
                                   class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                <a href="<?= base_url('pengumuman/delete/' . $value->id_pengumuman) ?>" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" 
                                   class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

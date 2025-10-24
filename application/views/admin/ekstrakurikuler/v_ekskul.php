<!-- /.col-lg-4 -->
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
        <a href="<?= base_url('ekstrakurikuler/add_ekskul'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Ekstrakurikuler</a>
        </div>
        <div class="panel-body">
            <?php

            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
        ?>
        <form action="<?= base_url('ekstrakurikuler/tambah') ?>" method="post" enctype="multipart/form-data">

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ekstrakurikuler</th>
                        <th>Keterangan</th>
                        <th>Foto</th>
                        <th>Tanggal Input</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($ekskul as $key => $value) {?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->nama_ekstrakurikuler ?></td>
                        <td><?= $value->ket_ekstrakurikuler ?></td>
                        <td><img src="<?= base_url('foto_ekstrakurikuler/' . $value->foto_ekstrakurikuler) ?>" width="100"></td>
                        <td><?= $value->tgl_input ?></td>
                        <td>
                            <a href="<?= base_url('ekstrakurikuler/edit/'.$value->id_ekstrakurikuler) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="<?= base_url('ekstrakurikuler/delete/'.$value->id_ekstrakurikuler) ?>" onclick="return confirm('Apakah Anda yakin ingin Menghapus Data ini..?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

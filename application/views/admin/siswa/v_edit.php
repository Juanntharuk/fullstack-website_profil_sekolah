<!-- /.col-lg-4 -->
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Data Siswa
        </div>
        <div class="panel-body">
            <?php
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
            }
            echo form_open_multipart('siswa/edit/' . $siswa->id_siswa);
            ?>

            <div class="form-group">
                <label>NIS</label>
                <input class="form-control" value="<?= $siswa->nis ?>" type="text" name="nis" placeholder="NIS" required>
            </div>

            <div class="form-group">
                <label>Nama Siswa</label>
                <input class="form-control" value="<?= $siswa->nama_siswa ?>" type="text" name="nama_siswa" placeholder="Nama Siswa" required>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" value="<?= $siswa->tempat_lahir ?>" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="form-control" value="<?= $siswa->tgl_lahir ?>" type="text" name="tgl_lahir" id="tanggal" placeholder="Tanggal Lahir" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Nomor WA</label>
                    <input class="form-control" value="<?= $siswa->no_wa ?>" type="text" name="no_wa" placeholder="Nomor WA" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="<?= $siswa->status ?>"><?= $siswa->status ?></option>
                        <option value="aktif">Aktif</option>
                        <option value="non-aktif">Non-Aktif</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Foto Siswa</label>
                    <input type="file" class="form-control" name="foto_siswa">
                    <?php if (!empty($siswa->foto_siswa)) { ?>
                        <p>Foto saat ini: <img src="<?= base_url('foto_siswa/' . $siswa->foto_siswa) ?>" width="100" height="100"></p>
                        <!-- Menambahkan input hidden untuk mengirim foto lama -->
                        <input type="hidden" name="foto_siswa_lama" value="<?= $siswa->foto_siswa ?>">
                    <?php } ?>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-success">Reset</button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>


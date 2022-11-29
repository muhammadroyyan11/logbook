<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list"></i> <?= $title ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="pull-right">
                <a href="<?= site_url('Pelatihan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('Pelatihan/proses'); ?>
                    <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                        <label>Nama Pelatihan *</label>
                        <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control">
                        <span class="help-block"><?= form_error('nama') ?></span>
                    </div>
                    <div class="form-group <?= form_error('tanggal') ? 'has-error' : null ?>">
                        <label>Tanggal Pelatihan *</label>
                        <input type="date" name="tanggal" value="<?= set_value('tanggal') ?>" class="form-control">
                        <span class="help-block"><?= form_error('tanggal') ?></span>
                    </div>
                    <div class="form-group <?= form_error('skp') ? 'has-error' : null ?>">
                        <label>SKP *</label>
                        <input type="number" name="skp" value="<?= set_value('skp') ?>" class="form-control">
                        <span class="help-block"><?= form_error('skp') ?></span>
                    </div>
                    <div class="form-group <?= form_error('skp') ? 'has-error' : null ?>">
                        <label>Sertifikat *</label>
                        <input type="file" name="sertif" value="<?= set_value('sertif') ?>" class="form-control">
                        <small style="color: red;">Jika ada</small>
                        <span class="help-block"><?= form_error('skp') ?></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                        <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
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
                <a href="<?= site_url('Logbook') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="" method="post" autocomplete="off">
                        <div class="form-group <?= form_error('kompetensi') ? 'has-error' : null ?>">
                            <label>Kompetensi *</label>
                            <input type="text" name="kompetensi" value="<?= set_value('kompetensi') ?>" class="form-control">
                            <span class="help-block"><?= form_error('name') ?></span>
                        </div>
                        <div class="form-group <?= form_error('kode') ? 'has-error' : null ?>">
                            <label>Kode PK *</label>
                            <input type="text" name="kode" value="<?= $generate ?>" class="form-control" readonly>
                            <span class="help-block"><?= form_error('kode') ?></span>
                        </div>
                        <div class="form-group <?= form_error('kewenangan') ? 'has-error' : null ?>">
                            <label>Kewenangan *</label>
                            <!-- <input type="text" name="kewenangan" value="<?= set_value('kewenangan') ?>" class="form-control"> -->
                            <textarea name="kewenangan" id="kewenangan" class="form-control" cols="30" rows="10"></textarea>
                            <span class="help-block"><?= form_error('kewenangan') ?></span>
                        </div>
                        <div class="form-group <?= form_error('keterangan') ? 'has-error' : null ?>">
                            <label>Metode *</label>
                            <select name="metode" class="form-control">
                                <option value="Mandiri">Mandiri</option>
                                <option value="Supervisi">Supervisi</option>
                            </select>
                            <span class="help-block"><?= form_error('keterangan') ?></span>
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
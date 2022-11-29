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
        <table id="" class="table table-bordered table-hover">
            <tr>
                <th>Kompetensi</th>
                <td><?= $row->kompetensi ?></td>
            </tr>
            <tr>
                <th>Kode</th>
                <td><?= $row->kode ?></td>
            </tr>
            <tr>
                <th>Kewenangan</th>
                <td><?= $row->kewenangan ?></td>
            </tr>
            <tr>
                <th>Metode</th>
                <td><?= $row->metode ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <?php
                    if ($row->status == 1) { ?>
                       <small class="label bg-red">Belum diverifikasi</small>
                    <?php } else { ?>
                       <small class="label bg-red">Belum diverifikasi</small>
                    <?php }
                    ?>
                </td>
            </tr>
        </table>
    </div>

    </div>

</section>
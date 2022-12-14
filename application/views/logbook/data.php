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
            <?php
            if (userdata('role') == 2) { ?>
                <div class="pull-right">
                    <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            <?php }
            ?>
        </div>

        <?php
        if (userdata('role') == 2) { ?>
            <div class="box-body table-responsive">
                <?= $this->session->flashdata('pesan'); ?>
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kompetensi</th>
                            <th>Kode</th>
                            <th>Kewenangan</th>
                            <th>Metode</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($log as $key => $data) {
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->kompetensi ?></td>
                                    <td><?= $data->kode ?></td>
                                    <td><?= $data->kewenangan ?></td>
                                    <td>
                                        <?= $data->metode ?>
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                <button href="<?= site_url('logbook/verify/' . $data->id_pilih) ?>" class="btn btn-circle btn-sm btn-secondary" dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= site_url('logbook/changeM/' . $data->id_pilih) ?>">Mandiri</a></li>
                                                    <li><a href="<?= site_url('logbook/changeS/' . $data->id_pilih) ?>">Supervisi</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    if ($data->status == 1) { ?>
                                        <td>
                                            <center><small class="label bg-red">Belum diverifikasi</small></center>
                                        </td>
                                    <?php } elseif ($data->status == 2) { ?>
                                        <td>
                                            <center><small class="label bg-green">Telah diverifikasi</small></center>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <center>Status error</center>
                                        </td>
                                    <?php }
                                    ?>
                                </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kompetensi</th>
                            <th>Kode</th>
                            <th>Kewenangan</th>
                            <th>Metode</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($log as $key => $data) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->kompetensi ?></td>
                                <td><?= $data->kode ?></td>
                                <td><?= $data->kewenangan ?></td>
                                <td>
                                    <?= $data->metode ?>
                                </td>
                                <?php
                                if ($data->status == 1) { ?>
                                    <td>
                                        <center><small class="label bg-red">Belum diverifikasi</small></center>
                                    </td>
                                <?php } elseif ($data->status == 2) { ?>
                                    <td>
                                        <center><small class="label bg-green">Telah diverifikasi</small></center>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <center>Status error</center>
                                    </td>
                                <?php }
                                ?>
                                <td>
                                    <?php
                                    if ($data->status == 1) { ?>
                                        <a href="<?= site_url('logbook/verify/' . $data->id_pilih) ?>" class="btn btn-circle btn-sm btn-success" title="Verifikasi logbook">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= site_url('logbook/cancel/' . $data->id_pilih) ?>" class="btn btn-danger btn-flat" title="Tolak logbook">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        <?php }
        ?>

    </div>

</section>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Silahkan pilih log</h4>
            </div>
            <div class="modal-body">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kompetensi</th>
                                <th>Kode</th>
                                <th>Kewenangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($logbook as $key => $data) {

                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->kompetensi ?></td>
                                    <td><?= $data->kode ?></td>
                                    <td><?= $data->kewenangan ?></td>
                                    <td>
                                        <a href="<?= site_url('logbook/pilih/' . $data->id_log) ?>" class="btn btn-circle btn-sm btn-primary" title="Detail logbook">
                                            Pilih
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
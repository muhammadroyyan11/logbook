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
                    <a href="<?= site_url('Pelatihan/add') ?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
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
                            <th>Nama Pelatihan</th>
                            <th>Tanggal</th>
                            <th>SKP</th>
                            <th>Sertifikat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pelatihan as $key => $data) {
                            if ($data->user_id == userdata('id_user')) {
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->nama_pelatihan ?></td>
                                    <td><?= $data->tanggal; ?></td>
                                    <td><?= $data->skp ?></td>
                                    <?php
                                    if ($data->sertifikat != null) { ?>
                                        <td><a download="<?= $data->sertifikat ?>" href="<?= base_url() ?>assets/upload/sertifikat/<?= $data->sertifikat ?>"><i class="fa fa-download" aria-hidden="true"></i> <?= $data->sertifikat ?></a></td>
                                    <?php } else { ?>
                                        <td>Data tidak ada</td>
                                    <?php }
                                    ?>
                                    <td>
                                        <a href="<?= site_url('Pelatihan/edit/' . $data->id_pelatihan) ?>" class="btn btn-warning btn-flat" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?= site_url('Pelatihan/delete/' . $data->id_pelatihan) ?>"  onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-flat" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php }
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
                            <th>Nama Pelatihan</th>
                            <th>Tanggal</th>
                            <th>SKP</th>
                            <th>Sertifikat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pelatihan as $key => $data) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->nama_pelatihan ?></td>
                                <td><?= $data->tanggal; ?></td>
                                <td><?= $data->skp ?></td>
                                <?php
                                if ($data->sertifikat != null) { ?>
                                    <td><a href=""><i class="fa fa-download" aria-hidden="true"></i> <?= $data->sertifikat ?></a></td>
                                <?php } else { ?>
                                    <td>Data tidak ada</td>
                                <?php }
                                ?>
                                <td>
                                    <a href="<?= site_url('pelatihan/delete/' . $data->id_pelatihan) ?>" class="btn btn-warning btn-flat" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?= site_url('pelatihan/delete/' . $data->id_pelatihan) ?>" class="btn btn-danger btn-flat" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
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
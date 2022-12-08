<section class="content-header">
  <h1>Dashboard
    <small>smart logbook</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Dashboard</li>
  </ol>
  <hr>
</section>

<section class="content">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">
    <div class="col-md-3">
      <div class="box box-default">


        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="chart-responsive text-center">
              <img src="<?= base_url() ?>assets/foto/logo.png" alt="" style="max-width: 10rem;">
            </div>
            <!-- /.col -->

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body --> 

        <!-- /.footer -->
      </div>
    </div>
    <div class="col-md-9  ">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= date('H:i'); ?></h3>

          <p><?= date('Y-m-d') ?></p>
        </div>
        <div class="icon">
          <i class="ion ion-android-calendar"></i>
        </div>
        <a href="#" class="small-box-footer">Tanggal dan Waktu Hari Ini </i></a>
      </div>
    </div>
    <!-- ./col -->
    <!-- /.col -->
  </div>

  <?php
  if (userdata('role') == 2 && userdata('kode_pk') == NULL) { ?>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Pilih jenis PK</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>

            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <form action="<?= site_url('dashboard/pilih') ?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="pilih">Pilih PK</label>
                    <select name="pilih" id="" class="form-control">
                      <option value="">-- Silahkan Pilih PK--</option>
                      <?php
                      foreach ($pk as $key => $data) { ?>
                        <option value="<?= $data->id_kode ?>"><?= $data->value ?></option>
                      <?php }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  <?php  }
  ?>

</section>
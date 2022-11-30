<section class="content">


    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Cetak rekap data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= form_open(); ?>
            <div class="box-body">
                <?= $this->session->flashdata('pesan'); ?>  
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Pilih laporan</label>
                    <div class="col-sm-10 form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="logbook" name="transaksi" checked>
                                Logbook
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="pelatihan" name="transaksi">
                                Pelatihan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="inputPassword3" class="col-sm-2 control-label">Periode Tanggal</label>

                    <div class="col-sm-10">
                        <input type="text" id="reservation" class="form-control" name="tanggal" placeholder="Pilih Range Tanggal">
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Cetak</button>
            </div>
            <!-- /.box-footer -->
            <?= form_close(); ?>
        </div>
    </div>
    <!-- /.col -->

</section>
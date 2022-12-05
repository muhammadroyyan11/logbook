<div class="register-box">
    <div class="register-logo">
        <img src="<?= base_url() ?>assets/foto/logo.png" alt="" style="max-width: 10rem;"><br>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register akun baru</p>

        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="ttl" placeholder="Tanggal Lahir">
                <!-- <input type="text" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir"> -->
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" maxlength="5" name="nip" placeholder="Nomor Induk Pegawai">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <small> (Masukkan NIP maksimal 5 digit)</small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password2" placeholder="Masukkan ulang password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <select name="dept" class="form-control">
                    <option value="NULL">-- Pilih Ruang --</option>
                    <?php
                    foreach ($dept as $key => $data) { ?>
                        <option value="<?= $data->id_dept ?>"><?= $data->nama_dept ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="<?= site_url('auth') ?>" class="text-center">Saya sudah punya akun</a>
    </div>
    <!-- /.form-box -->
</div>
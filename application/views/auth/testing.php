<section class="row flexbox-container">
    <div class="col-xl-8 col-10 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                    <img src="<?= base_url() ?>assets/app-assets/images/pages/register.jpg" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 p-2">
                        <div class="card-header pt-50 pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Create Account</h4>
                            </div>
                        </div>
                        <p class="px-2">Fill the below form to create a new account.</p>
                        <div class="card-content">
                            <?= $this->session->flashdata('pesan'); ?>
                            <form action="<?= site_url('auth/email') ?>" method="post">
                                <div class="card-body pt-0">
                                    < <div class="form-label-group">
                                        <input value="<?= set_value('email'); ?>" required type="text" name="email" class="form-control form-control-user" placeholder="Email">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <fieldset class="checkbox">
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" checked>
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class=""> I accept the terms & conditions.</span>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <a href="<?= site_url('auth') ?>" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
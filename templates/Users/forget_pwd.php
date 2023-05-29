
<style>
    img.vekpro-logo {
    width: 100px;
}
img.ft-icon {
    width: 40px;
    margin-right: -5px;
}
.vendorTemps.content {
    width: 30%;
    margin: 0 auto;
    background-color: #f5f7fd;
    margin-top: 20px;
}
span.otp-send-email {
    font-size: 14px;
}
.form-control{
    font-size:14px;
}
label {
    font-size: 11px;
    color: #999;
}
</style>
<div class="container">
<div class="row">
    <div class="column-responsive">
        <div class="vendorTemps forget-pwd content">
        <h3 class="mb-2 text-info"><?= __('Reset Password') ?></h3>
        <form>
            <input type="password" class="form-control" placeholder="password">
            <input type="password" class="form-control mt-3" placeholder="confirm password">
            <button type="button" class="btn btn-custom-2 mt-3">Submit</button>
        </form>
        <img src="<?= $this->Url->build('/') ?>img/ft-icon.png" class="ft-icon">
            <img src="<?= $this->Url->build('/') ?>img/logo_s.png" class="vekpro-logo" widht="50">
        </div>
    </div>
</div>
</div>

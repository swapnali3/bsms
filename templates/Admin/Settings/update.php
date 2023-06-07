<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
?>
<?= $this->Html->css('admin-style') ?>
<div class="card setting-update">
    <div class="card-header">
        <h5>Settings</h5>
    </div>
    <div class="row">
    <div class="card-body p-0">
       
            <div class="col-md-12">
                <div class="settings form content">
                    <form method="post" accept-charset="utf-8" action="/bsms/admin/settings/update">
                        <div style="display:none;"><input type="hidden" name="_method" value="PUT"><input type="hidden"
                                name="_csrfToken" autocomplete="off"
                                value="QHPE9oRzqNipo31TSZCZCPAg7PGpdxR3cdNlNXQiOTbRpXnc805rp/penuPNILFZN47r0rDStDYLOg67aDmFiEPCQai+cMlFyRKNl5BPI0FJ4FRRQRABV+mWHL/GLQifzjuv2q8Qg2oGt9ziievRBw==">
                        </div>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="input text"><label for="sms-url">Sms Url</label><input type="text"
                                            name="sms_url" class="custom-select rounded-0" div="form-group" id="sms-url"
                                            value="https://www.fast2sms.com/dev/bulkV2"></div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input text"><label for="sms-api-key">Sms Api Key</label><input
                                            type="text" name="sms_api_key" class="custom-select rounded-0"
                                            div="form-group" id="sms-api-key"
                                            value="TUJOiyzGtxRpCSM5wu4QvFgs2onN19mAecDPZ37Y6XHWkjlE8K3VEDCRNMLb02gX1pYFqn5mo9vIke6J">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input text"><label for="sap-url">Sap Url</label><input type="text"
                                            name="sap_url" class="custom-select rounded-0" div="form-group" id="sap-url"
                                            value="http://123.108.46.252">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">

                                    <div class="input text"><label for="sap-segment">Sap Segment</label><input
                                            type="text" name="sap_segment" class="custom-select rounded-0"
                                            div="form-group" id="sap-segment" value="sap/bc/sftmob/VENDER_UPD"></div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input text"><label for="sap-client">Sap Client</label><input type="text"
                                            name="sap_client" class="custom-select rounded-0" div="form-group"
                                            id="sap-client" value="300"></div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input text"><label for="sap-port">Sap Port</label><input type="text"
                                            name="sap_port" class="custom-select rounded-0" div="form-group"
                                            id="sap-port" value="8000"></div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input text"><label for="sap-username">Sap Username</label><input
                                            type="text" name="sap_username" class="custom-select rounded-0"
                                            div="form-group" id="sap-username" value="vcsupport1"></div>
                                </div>
                                <div class="col-md-3 mb-3">

                                    <div class="input text"><label for="sap-password">Sap Password</label><input
                                            type="text" name="sap_password" class="custom-select rounded-0"
                                            div="form-group" id="sap-password" value="aarti@123"></div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-custom" type="submit">Submit</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
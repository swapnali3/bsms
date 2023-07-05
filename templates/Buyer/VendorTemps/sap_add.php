<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var \Cake\Collection\CollectionInterface|string[] $purchasingOrganizations
 * @var \Cake\Collection\CollectionInterface|string[] $accountGroups
 * @var \Cake\Collection\CollectionInterface|string[] $schemaGroups
 */
?>

<?= $this->Html->css('custom') ?>
<div class="row sap-vendor">

    <div class="col-12">
        <div class="card">
            <?= $this->Form->create(null, ['type' => 'file', 'id' => 'sapvendorcodeform']); ?>
            <div class="card-body ">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <?php echo $this->Form->control('sap_vendor_code', array('class' =>
                        'form-control rounded-0', 'div' => 'form-group', 'autocomplete' => "off"));
                        ?>
                    </div>
                    <div class="errorSubmit mt-2" style="color: red; display: none">
                        Please enter a vendor code or select a file.
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-2 col-md-2 mt-3">
                        <?= $this->Form->control('vendor_code', ['type' => 'file', 'label' =>
                        false, 'class' => 'pt-1 rounded-0', 'style' => 'visibility: hidden;
                        position: absolute;', 'div' => 'form-group', 'id' => 'vendorCodeInput']);
                        ?>

                        <?= $this->Form->button('Import File', ['id' => 'OpenImgUpload', 'type' =>
                        'button', 'class' => 'd-block btn btn-secondary mb-0 file-upld-btn']); ?>
                        <span id="filessnames"></span>
                    </div>
                    <div class="col-sm-2 col-md-2 mt-3 d-flex justify-content-end align-items-baseline">
                        <button class="btn btn-custom" id="sapvendorcode" type="button">
                            Submit
                        </button>
                    </div>

                </div>
                <div class="row">
                    <!-- <div class="col-sm-3">
                        <p style="font-weight: 500;">Sample File Excel:
                            <a href="<?= $this->Url->build('/') ?>webroot/img/sample file.xlsx" style="color: #204489;text-decoration: underline;" download>
                                Click
                            </a>
                        </p>
                    </div> -->

                    <div class="col-3">
                        <i style="color: black;">
                            <a href="<?= $this->Url->build('/') ?>webroot/templates/SAP_Vendor_Import.xlsx" download>SAP
                                Import Template</a>
                        </i>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<div class="card-body vendor-list">
    <div class="table-responsive">
        <table class="table table-hover" id="example1">
            <thead>
                <tr>
                    <th>Vendor Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($vendorData)) : ?>
                    <?php foreach ($vendorData as $vendorTemp) :
                            // print_r($vendorData);
                            // exit;                    
                            switch ($vendorTemp["status"]) {
                                case 0:
                                    $status = '<span class="badge bg-warning">Sent to Vendor</span>';
                                    break;
                                case 1:
                                    $status = '<span class="badge bg-info">Pending for approval</span>';
                                    break;
                                case 2:
                                    $status = '<span class="badge bg-info">Sent to SAP</span>';
                                    break;
                                case 3:
                                    $status = '<span class="badge bg-success">Approved</span>';
                                    break;
                                case 4:
                                    $status = '<span class="badge bg-danger">Rejected</span>';
                                    break;
                                case 5:
                                    $status = '<span class="badge bg-info">Sap Import</span>';
                                    break;
                            }
                        ?>
                        <?php if ($vendorTemp['status']) : ?>

                        <tr>
                            <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp['data']["id"]) ?>">
                                <?= h($vendorTemp['data']["sap_vendor_code"]) ?>
                            </td>
                            <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp['data']["id"]) ?>">
                                <?= h($vendorTemp['data']["name"]) ?>
                            </td>
                            <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp['data']["id"]) ?>">
                                <?= h($vendorTemp['data']["email"]) ?>
                            </td>
                            <td>
                                <?= h($vendorTemp['data']["mobile"]) ?>
                            </td>
                            <td class="statusVendor"
                                redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp['data']["id"]) ?>">
                                <?= $status ?>
                            </td>
                            <td>
                                <a href="" data-id="<?= $vendorTemp['data'][" id"] ?>" class="btn btn-info btn-sm mb-0 notify">Send Credentials</a>
                            </td>
                        </tr>

                        <?php else : ?>
                        <tr>
                            <td>
                                <?= h($vendorTemp['data']["sap_vendor_code"]) ?>
                            </td>
                            <td colspan="4"></td>
                            <td class="text-danger text-left">
                                <?= h($vendorTemp["msg"]) ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>



<script>
    $(document).ready(function () {
        $('#OpenImgUpload').click(function () { $('#vendorCodeInput').trigger('click'); });
        $('#vendorCodeInput').change(function () { var file = $(this).prop('files')[0].name; $("#filessnames").append(file); });

        // Users crendential send api
        $('.notify').click(function (e) {
            e.preventDefault();
            var $id = $(this).attr('data-id');
            $.ajax({
                type: "GET",
                url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/VendorTemps', 'action' => 'user-credentials')); ?>/" + $id,
                dataType: 'json',
                success: function (response) {
                    if (response.status == "1") {
                        Toast.fire({ icon: "success", title: response.message });

                        $(".statusVendor span").text("Approved");
                        $(".notify").text("sended credential").removeClass("notify");
                    } else {
                        Toast.fire({ icon: "error", title: response.message });
                    }
                },
                error: function (xhr, status, error) {}
            });
        });

        var Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
        });

        $('#sapvendorcode').click(function () {

            var vendorCode = $("input[name='sap_vendor_code']").val();
            var file = $('#filessnames').text();

            if (vendorCode.trim() === '' && file.trim() === '') { $('.errorSubmit').show(); console.log(vendorCode); }
            else { $('.errorSubmit').hide(); $('#sapvendorcodeform').trigger('submit'); }

        });

        $('#example1').on('click', 'tbody tr td', function (event) {
            event.preventDefault();
            var redirectUrl = $(this).closest('td').attr('redirect');

            console.log(redirectUrl);
            if (redirectUrl !== undefined && redirectUrl !== "") { window.open(redirectUrl, '_blank'); }
        });
    });
</script>
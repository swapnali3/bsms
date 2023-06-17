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
            <?= $this->Form->create(null, ['type' => 'file']); ?>
            <!-- <div class="card-header";
>
            <h5 style="color:white"><b><?= __('IMPORT SAP VENDOR') ?></b></h5>
            </div> -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <?php echo $this->Form->control('sap_vendor_code', array('class' => 'form-control rounded-0', 'div' => 'form-group', 'autocomplete' => "off")); ?>
                    </div>
                    <div class="col-sm-2 col-md-2 mt-2">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-custom mt-4', 'id' => 'cform']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 col-md-2 mt-3">
                        <?= $this->Form->control('vendor_code', [
                            'type' => 'file', 'label' => false, 'class' => 'pt-1 rounded-0', 'style' => 'visibility: hidden; position: absolute;', 'div' => 'form-group', 'id' => 'vendorCodeInput'
                        ]); ?>
                        <?= $this->Form->button('Import File', [
                            'id' => 'OpenImgUpload',
                            'type' => 'button',
                            'class' => 'd-block btn btn-secondary mb-0 file-upld-btn'
                        ]); ?>
                        <span id="filessnames"></span>
                    </div>

                </div>
                <?= $this->Form->end() ?>
            </div>
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
                    //  print_r($vendorTemp[2]["status"]);exit;
                    
                        
                        switch($vendorTemp[2]["status"]) {
                            case 0 : $status = '<span class="badge bg-warning">Sent to Vendor</span>'; break;
                            case 1 : $status = '<span class="badge bg-info">Pending for approval</span>'; break;
                            case 2 : $status = '<span class="badge bg-info">Sent to SAP</span>'; break;
                            case 3 : $status = '<span class="badge bg-success">Approved</span>'; break;
                            case 4 : $status = '<span class="badge bg-danger">Rejected</span>'; break;
                        }
                        ?>
                        <tr>
                            <?php if ($vendorTemp[0] == 1) : ?>
                                <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp[2]["id"]) ?>">
                                    <?= h($vendorTemp[2]["sap_vendor_code"]) ?>
                                </td>
                                <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp[2]["id"]) ?>">
                                    <?= h($vendorTemp[2]["name"]) ?>
                                </td>
                                <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp[2]["id"]) ?>">
                                    <?= h($vendorTemp[2]["email"]) ?>
                                </td>
                                <td>
                                    <?= h($vendorTemp[2]["mobile"]) ?>
                                </td>
                                <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp[2]["id"]) ?>">
                                   <?= $status ?>
                             
                                </td>

                                <td>  <?= $this->Html->link(__('Notification'), ['action' => 'approve-vendor', $vendorTemp[2]["id"], 'app'], ['class' => 'btn btn-info btn-sm mb-0']) ?></td>
                            <?php else : ?>
                                <td>
                                    <?= h($vendorTemp[2][0]) ?>
                                </td>
                                <td>
                                    <?= h($vendorTemp[2][1]) ?>
                                </td>
                                <td>
                                    <?= h($vendorTemp[2][2]) ?>
                                </td>
                                <td>
                                    <?= h($vendorTemp[2][3]) ?>
                                </td>
                                <td>
                                    <?= h($vendorTemp[1]) ?>
                                </td>
                                <td><span class="badge bg-info">Notification</span></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#OpenImgUpload').click(function() {
            $('#vendorCodeInput').trigger('click');
        });

        $('.onbording').click(function() {
            alert("sdcf");




        });



        $('#vendorCodeInput').change(function() {
            var file = $(this).prop('files')[0].name;
            $("#filessnames").append(file);
        });

        $("#example1").DataTable({
            "responsive": false,
            "lengthChange": false,
            "autoWidth": true,
            "ordering": false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        $('#example1').on('click', 'tbody tr td', function() {
            var redirectUrl = $(this).closest('td').attr('redirect');
            var isDraftButton = $(this).find('.badge').hasClass('bg-info');

            if (!isDraftButton) {
                window.location = redirectUrl;
            }
        });

        // $('#example1').on('click', 'tbody tr', function() {
        //     window.location = $(this).closest('tr').attr('redirect');

        // });


        




    });
</script>
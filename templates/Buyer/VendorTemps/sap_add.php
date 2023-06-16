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
                </div>
                <div class="row">
                    <div class="col-sm-2 col-md-2 mt-3">
                        <?= $this->Form->control('vendor_code', [
                            'type' => 'file', 'label' => false, 'class' => 'pt-1 rounded-0', 'style' => 'visibility: hidden; position: absolute;', 'div' => 'form-group', 'required' => true, 'id' => 'vendorCodeInput'
                        ]); ?>
                        <?= $this->Form->button('Import File', [
                            'id' => 'OpenImgUpload',
                            'type' => 'button',
                            'class' => 'd-block btn btn-secondary mb-0 file-upld-btn'
                        ]); ?>
                    </div>
                    <div class="col-sm-2 col-md-2 mt-3">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-custom']) ?>
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
                    <th><?= h('Name') ?></th>
                    <th><?= h('Email') ?></th>
                    <th><?= h('Mobile') ?></th>
                    <th><?= h('Status') ?></th>
                    <!-- <th><?= h('Action') ?></th> -->
                </tr>
            </thead>
            <tbody>
                <?php if (isset($vendorData)) : ?>
                    <?php foreach ($vendorData as $vendorTemp) :
                        if ($vendorTemp[1]->status == "1") { $action = '<span class="badge bg-info">View</span>'; }
                        else { 
                            // $action = '<span class="badge bg-warning">Notification</span>';
                            $action = '';
                         }

                        switch ($vendorTemp[1]->status) {
                            case 0:
                                $status = 'Sent to Vendor';
                                break;
                            case 1:
                                $status = 'Pending for approval';
                                break;
                            case 2:
                                $status = 'Sent to SAP';
                                break;
                            case 3:
                                $status = 'Approved';
                                break;
                            case 4:
                                $status = 'Rejected';
                                break;
                            default:
                                $status = $vendorTemp[0];
                                break;
                        }

                    ?>
                        <tr>
                            <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp[1]->id) ?>">
                                <?= h($vendorTemp->name) ?>
                            </td>
                            <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp[1]->id) ?>">
                                <?= h($vendorTemp->email) ?>
                            </td>
                            <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp[1]->id) ?>">
                                <?= h($vendorTemp->mobile) ?>
                            </td>
                            <td redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/sapView/<?= h($vendorTemp[1]->id) ?>">
                                <?= $status ?>
                            </td>
                            <td>
                                <?= $action ?>
                            </td>
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
        $('#example1').on('click', 'tbody tr', function() {
            window.location = $(this).closest('tr').attr('redirect');
        });




    });
</script>
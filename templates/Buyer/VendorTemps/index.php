<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp[]|\Cake\Collection\CollectionInterface $vendorTemps
 */

?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('vendortemps_index') ?>
<div class="row" style="height:90vh;">
    <div class="col-12">
        <div class="card">
            <div class="card-body vendor-list">
                <div class="table-responsive">
                    <table class="table table-hover" id="example1">
                        <thead>
                            <tr>
                                <th><?= h('Name') ?></th>
                                <th><?= h('Email') ?></th>
                                <th><?= h('Mobile') ?></th>
                                <th><?= h('SAP Vendor Code') ?></th>
                                <th><?= h('City') ?></th>
                                <th><?= h('Pincode') ?></th>
                                <th><?= h('Contact Person') ?></th>
                                <th><?= h('Contact Email') ?></th>
                                <th><?= h('Contact Mobile') ?></th>
                                <th><?= h('Status') ?></th>
                                <!-- <th><?= h('Added Date') ?></th> -->
                                <!-- <th><?= h('Updated Date') ?></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vendorTemps as $vendorTemp): 
                                
                                switch($vendorTemp->status) {
                                    case 0 : $status = '<span class="badge bg-warning">Sent to Vendor</span>'; break;
                                    case 1 : $status = '<span class="badge bg-info">Pending for approval</span>'; break;
                                    case 2 : $status = '<span class="badge bg-info">Sent to SAP</span>'; break;
                                    case 3 : $status = '<span class="badge bg-success">Approved</span>'; break;
                                    case 4 : $status = '<span class="badge bg-danger">Rejected</span>'; break;
                                    case 5:
                                        $status = '<span class="badge bg-info">Sap Import</span>';
                                        break;
                                }
                                ?>
                                <tr redirect="<?= $this->Url->build('/') ?>buyer/vendor-temps/view/<?= h($vendorTemp->id) ?>">
                                    <td><?= h($vendorTemp->name) ?></td>
                                    <td><?= h($vendorTemp->email) ?></td>
                                    <td><?= h($vendorTemp->mobile) ?></td>
                                    <td><?= h($vendorTemp->sap_vendor_code) ?></td>
                                    <td><?= h($vendorTemp->city) ?></td>
                                    <td><?= h($vendorTemp->pincode) ?></td>
                                    <td><?= h($vendorTemp->contact_person) ?></td>
                                    <td><?= h($vendorTemp->contact_email) ?></td>
                                    <td><?= h($vendorTemp->contact_mobile) ?></td>
                                    <td><?= $status ?></td>
                                <!-- <td><?= h($vendorTemp->added_date) ?></td> -->
                                <!-- <td><?= h($vendorTemp->updated_date) ?></td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('vendortemps_index') ?>
